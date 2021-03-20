
<?php
// !!!check if subject_name exists on subject table else  exit('silence is golden');
// !!!check if name1 exists on users or MyGuests Table and he is active else exit('silence is golden');

$DATABASE_HOST = '';
$DATABASE_USER = '';
$DATABASE_PASS = '';
$DATABASE_NAME = '';


 
try {
    $pdo = new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
} catch (PDOException $exception) {
    // If there is an error with the connection, stop the script and display the error
    exit('Failed to connect to database!');
   
}


function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);
    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;
    $string = array('y' => 'year', 'm' => 'month', 'w' => 'week', 'd' => 'day', 'h' => 'hour', 'i' => 'minute', 's' => 'second');
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }
    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function show_comments($comments, $parent_id = -1) {
    $html = '';
    if ($parent_id != -1) {
        // If the comments are replies sort them by the "submit_date" column
        array_multisort(array_column($comments, 'submit_date'), SORT_ASC, $comments);
        
    }
    // Iterate the comments using the foreach loop
    foreach ($comments as $comment) {
        
        $DATABASE_HOST = '';
        $DATABASE_USER = '';
        $DATABASE_PASS = '';
        $DATABASE_NAME = '';
        try {
    $pdo = new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
} catch (PDOException $exception) {
    // If there is an error with the connection, stop the script and display the error
    exit('Failed to connect to database!');
   
}
        $stmt = $pdo->prepare("SELECT COUNT(*) AS total_replies FROM comments WHERE parent_id = ?");
        $stmt->execute([ $comment['unique_id'] ]);
        $comments_total_replies = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($comment['parent_id'] == $parent_id) {
            // Add the comment to the $html variable
            $html .= '
            <div class="comment">
                <div>
                <div class="media">
  <img class="mr-3 d-flex g-width-15 g-height-15 rounded-circle mt-2" src="assets/img/avatar7.png" alt="Generic placeholder image">
  <div class="media-body">
    <h3 class="name">' . htmlspecialchars($comment['name_student'], ENT_QUOTES) . '</h3>
    <span class="date">' . time_elapsed_string($comment['submit_date']) . '</span>
    <div>
    <ul class="list-group my-0" style="list-style: none;">

                                    

                                    <li class="list-item g-mr-20 wpac-rating-custom " data-wpac-chan="' . htmlspecialchars($comment['unique_id'], ENT_QUOTES) . '">

                                      
                                      
                                        
                                    </li>
                                    <br>

                                  </ul>
    </div>
  </div>
</div>
                    
                </div>
                <p class="content">' . nl2br(htmlspecialchars($comment['content'], ENT_QUOTES)) . '</p>
                 <a  style="color:#000045 !important; cursor: pointer;"  class="childcomments">Check replies</a>
                                      
                                       ( ' . $comments_total_replies['total_replies'] . ' )
                                        
                <a  style="color:#000045 !important" class="reply_comment_btn" href="#" data-comment-id="' . $comment['unique_id'] . '">Reply</a>
                ' . show_write_comment_form($comment['unique_id']) . '
                
                <div class="replies" id="answersid" hidden>
               ' . show_comments($comments, $comment['unique_id']) . ' 
                </div>
            </div>
            <br>
            ';
        }
    }
    return $html;
}
// This function is the template for the write comment form

function show_write_comment_form($parent_id = -1) {
    $html = '
    <div class="write_comment" data-comment-id="' . $parent_id . '">
        <form>
           <input name="parent_id" type="hidden" value="' . $parent_id . '">
            
            <textarea name="content" placeholder="Write your comment here..." required></textarea>
            <button type="submit">Submit Comment</button>
        </form>
    </div>
    ';
    return $html;
}
//this is used to determine which subjects_name are for which page


if (isset($_GET['subject_name']) && isset($_GET['name1'])) {
    // Check if the submitted form variables exist
    if ( isset($_POST['content']) ) {
        // POST variables exist, insert a new comment into the MySQL comments table (user submitted form)
        $stmt = $pdo->prepare('INSERT INTO comments (subject_name, parent_id, name_student, content, submit_date) VALUES (?,?,?,?,NOW())');
        $stmt->execute([ $_GET['subject_name'], $_POST['parent_id'], $_GET['name1'], $_POST['content'] ]);
        exit('Your comment has been submitted!');
    }
    // Get all comments by the Page ID ordered by the submit date
    $stmt = $pdo->prepare("SELECT * FROM comments WHERE subject_name = ?  ORDER BY submit_date DESC");
    $stmt->execute([ $_GET['subject_name'] ]);
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Get the total number of comments
    $stmt = $pdo->prepare("SELECT COUNT(*) AS total_comments FROM comments WHERE subject_name = ?");
    $stmt->execute([ $_GET['subject_name'] ]);
    $comments_info = $stmt->fetch(PDO::FETCH_ASSOC);
    
    
} else
{
    exit('silence is golden');
}

?>

<div class="comment_header" >
    <span class="total"><?=$comments_info['total_comments']?> Reviews</span>
    <a href="#" class="write_comment_btn" style="color: white !important; " data-comment-id="-1">Write Review</a>
</div>

<?=show_write_comment_form()?>

<?=show_comments($comments)?>


