<?php
 
require_once './config.php';
if (isset($_SESSION["name"]) && $_SESSION["name"] != "" ) {
  // user already logged in the site
  header('location: welcome.php');
}

?>
<?php 
    
   include("connect.php");
    if (isset($_POST['userID'])) {
        //facebook login credentials
        $myemailfb=mysqli_real_escape_string($con,$_POST['email']);
        $_SESSION['userID'] = mysqli_real_escape_string($_POST['userID']);
        $sql = "SELECT * FROM MyGuests WHERE email ='$myemailfb'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active = $row['active'];
        $count = mysqli_num_rows($result);
	    $myname=$row["firstname"];
	    $mylastname=$row["lastname"];
      
      // If result matched $myusername and $mypassword, table row must be 1 row
	  
   
	   if($count == 1) 
	    {
	        $_SESSION['name'] = $myname . ' ' . $mylastname ;
        }
        else 
        {
            $_SESSION['name'] = $_POST['name'];
        }
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['picture'] = $_POST['picture'];
        $_SESSION['accessToken'] = $_POST['accessToken'];

        exit("success");
    }

   else if( isset($_POST['firstname1']) && isset($_POST['lastname1']) && isset($_POST['email1']) && isset($_POST['pass1']))  {
       //custom login 
	$first_1= mysqli_real_escape_string($con,$_POST['firstname1']);
    $last_1 = mysqli_real_escape_string($con,$_POST['lastname1']);
    $email_1 = mysqli_real_escape_string($con,$_POST['email1']);
    $pass_1 = mysqli_real_escape_string($con,$_POST['pass1']);
    
    
     //$sql3 = "SELECT COUNT(*) AS count from MyGuests where email_1 = '$email_1' ";
     //$result = mysqli_query($con,$sql3);
     
      $myemail=mysqli_real_escape_string($con,$_POST['email1']);
	  
      $sql = "SELECT * FROM MyGuests WHERE email = '$myemail' limit 1";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	  
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
     
	  
      
      
            if ($count == 0)
            {
    
    $query = "INSERT INTO MyGuests (firstname,lastname,email,password) VALUES 
   ('$first_1','$last_1','$email_1','$pass_1')";
    //execute query 
    $queryexe = mysqli_query($con, $query);
    //$_SESSION['name'] = $first_1 . ' ' . $last_1;
	//$_SESSION['email'] = $email_1;
    //header("Location: welcome.php");
	//}
            }
            else 
             {
	        $error = "This email has  already been registered";
	        
            }
   
    
}
   else if (isset($_POST['email']) && isset($_POST['pass'])) {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($con,$_POST['email']);
      $mypassword = mysqli_real_escape_string($con,$_POST['pass']); 
      
	  
      $sql = "SELECT * FROM MyGuests WHERE email = '$myusername' and password = '$mypassword' limit 1";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	  
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
	  $myname=$row["firstname"];
	  $mylastname=$row["lastname"];
      
      // If result matched $myusername and $mypassword, table row must be 1 row
	  
   
	   if($count == 1) {
	        $_SESSION['name'] = $myname . ' ' . $mylastname ;
	        $_SESSION['email'] = $myusername;
            header("Location: welcome.php");
            }
         
      
      else {
         $error = "Your Login Name or Password is invalid";
      }
      
   }
   

    
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="assets/css/indexstyle.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form method = "post" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="pass" placeholder="Password" />
            </div>
            <input type="submit" value="Login" class="btn solid" />
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a onclick="logIn()" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              
              <a href="./google_login.php" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              
            </div>
          </form>
          <form  class="sign-up-form" method="POST">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text"  name="lastname1" placeholder="First Name" required/>
            </div>
			<div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="firstname1" placeholder="Last Name" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email1" placeholder="Email" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="pass1" placeholder="Password" required/>
            </div>
            <input type="submit" class="btn" value="Sign up" />
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a onclick="logIn()" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="./google_login.php" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3 id="hero-item-text1" >New here ?</h3>
            <h4  id="welcome-message" >
              <i><?php if ($error){echo $error ;} else if(isset($_POST['firstname1'])) { echo  'Hello ' . htmlspecialchars($_POST["firstname1"]) .'<br> Your account has been succesfully created' . '!';};?></i>
            </h4>
            <p >
              Duth Ratings are the most usefull , user friendly tool for courses and books assessments,
               Welcome!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="assets/img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              If you are already signed up , you can log in by pressing the button below,Lets add some ratings!
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="assets/img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/js/indexjs.js"></script>
	<script>
        var person = { userID: "", name: "", accessToken: "", picture: "", email: ""};

        function logIn() {
            FB.login(function (response) {
                if (response.status == "connected") {
                    person.userID = response.authResponse.userID;
                    person.accessToken = response.authResponse.accessToken;

                    FB.api('/me?fields=id,name,email,picture.type(large)', function (userData) {
                        person.name = userData.name;
                        person.email = userData.email;
                        person.picture = userData.picture.data.url;

                        $.ajax({
                           url: "index.php",
                           method: "POST",
                           data: person,
                           dataType: 'text',
                           success: function (serverResponse) {
                               console.log(person);
                               if (serverResponse == "success")
                               {
                                   window.location = "welcome.php";
                               }
                           }
                        });
                    });
                }
            }, {scope: 'public_profile, email'})
        }

        window.fbAsyncInit = function() {
            FB.init({
                appId            : '',
                autoLogAppEvents : true,
                xfbml            : true,
                version          : 'v2.11'
            });
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
  </body>
</html>
