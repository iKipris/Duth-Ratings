<?php
$key = '';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function encryptthis($data, $key) {
    $encryption_key = base64_decode($key);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
    return base64_encode($encrypted.
        '::'.$iv);
}

function decryptthis($data, $key) {
    $encryption_key =base64_decode($key);
    list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2), 2, null);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
}

require('http.php');
require('oauth_client.php');
require('config.php');
require('connect.php');
session_start();   

$client = new oauth_client_class;
// set the offline access only if you need to call an API
// when the user is not present and the token may expire
$client->offline = FALSE;
$client->debug = false;
$client->debug_http = true;
$client->redirect_uri = REDIRECT_URL;
$client->client_id = CLIENT_ID;
$application_line = __LINE__;
$client->client_secret = CLIENT_SECRET;
if (strlen($client->client_id) == 0 || strlen($client->client_secret) == 0)
 die("set client ID and Client secret correctly");
// API permission
$client->scope = SCOPE;
if (($success = $client->Initialize())) {
  if (($success = $client->Process())) {
    if (strlen($client->authorization_error)) {
      $client->error = $client->authorization_error;
      $success = false;
    } elseif (strlen($client->access_token)) {
      $success = $client->CallAPI(
              'https://www.googleapis.com/oauth2/v1/userinfo', 'GET', array(), array('FailOnAccessError' => true), $user);
    }  
  }
  $success = $client->Finalize($success);
}
if ($client->exit)
  exit;
if ($success) {
  // Check if user email ID exist
  
  //****TODO*****
  //for each email stored in users decrypt it and check if same with :email_id 
  try {
    $stmt = $DB->prepare('SELECT * FROM users');
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $check=True;
    
    foreach ($results as $result) {
		if (decryptthis($result["email"],$key) == $user->email)
		{
		// User Exist 
        $check = False;
        $myemail=decryptthis($result["email"],$key);
        
        $query="SELECT * FROM MyGuests WHERE  email='$myemail'" ;
        $result1=mysqli_query($con,$query);
        $row = mysqli_fetch_array($result1,MYSQLI_ASSOC);
        if (mysqli_num_rows($result1) > 0) 
        {
	        $active = $row['active'];
	        $myname=$row["firstname"];
	        $mylastname=$row["lastname"];
	        $_SESSION['name'] = $myname . ' ' . $mylastname ;
        }
        //if not assign account google acc name to session name
        else
        {
        $_SESSION["name"] = $user->name;
        
        }
        
        $_SESSION['email'] =  $user->email;
        $_SESSION["new_user"] = "no";
      
    }
}

if ($check == True)		
		
		{
			//if name doesnt exist insert user in database
			$encryptedname = encryptthis($user->name, $key);
			$encryptedemail = encryptthis($user->email, $key);
			$stmt = $DB->prepare('INSERT INTO users (`name`, `email`) VALUES (?,?)');
			$stmt->execute([ $encryptedname, $encryptedemail]);
			$result2 = $stmt->rowCount();
      if ($result2 > 0) {
        $_SESSION["name"] = $user->name;
        $_SESSION["email"] = $user->email;
        $_SESSION["new_user"] = "yes";
        $_SESSION["e_msg"] = "";
		}
			
     
  }
  }catch (Exception $ex) {
    $_SESSION["e_msg"] = $ex->getMessage();
  }
  $_SESSION["user_id"] = $user->id;
} else {
  $_SESSION["e_msg"] = $client->error;
}
header('Location: welcome.php');
exit;
?>