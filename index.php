<body style="position: absolute; top: 0; left: 0; bottom: 0; right: 0;  height:50%; max-width: 500px; margin: auto; text-align: center; background-color:#A9A9A9;">
<h1><strong><a style="text-decoration: none; color:#000000 ;" href="index.php">Zuri CRUD</a></strong></h1>
<!-- This contains the parameter forms -->
<form role="form" method="post" action="index.php">
  <div class="form-group">
    <input name="email" type="Email" class="form-control" placeholder="Enter Email" style="border-radius: 30px 30px 30px 30px;">
  </div><br>
  <div class="form-group">
    <input name="password" type="password" class="form-control" placeholder="Enter password" style="border-radius: 30px 30px 30px 30px;">
  </div><br>
  <div class="access">
  	<button name="login" type="submit" class="btn btn-default" style="border-radius: 30px 30px 30px 30px;width: 180px; height: 30px;background-color:#000000 ; color:#FFFFFF ;">Login</button><br>
  	<br>
  </div>
  <div class="register">
  <button style="float: left;"><a style="text-decoration: none; color:#000000 ;"  href ="register.php"> Register</a></button><button style="float: right"><a style="text-decoration: none; color:#000000 ;"  href="forgotPassword.php">Forgot Password</button>
  </div>
</form>
</body>
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
 echo 
"<h3>Username/password is incorrect.</h3>";
 }
}
  