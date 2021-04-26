

 
<?php
include 'database.php';
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['login'])){
        // removes backslashes
 $email = stripslashes($_REQUEST['email']);
        //escapes special characters in a string
 $email = mysqli_real_escape_string($connect,$email);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($connect,$password);
 //Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE email='$email'
and password='".md5($password)."'";
 $result = mysqli_query($connect,$query) or die('Error:'.mysqli_error($connect));
 $rows = mysqli_num_rows($result);
        if($rows==1){
     $_SESSION['email'] = $email;
            // Redirect user to index.php
     header("Location: welcome.php");
         }else{
 echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
 }
}
 


















 




  



		
