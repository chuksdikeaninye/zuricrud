<?php   
if (function_exists("isLoggedIn") ===FALSE ) {
  function isLoggedIn(){
      if(isset($_SESSION['is_logged_in'])){
         return true;
      }else {
         return false;
      }
   }; 
}
 ?>
<body style="position: absolute; top: 0; left: 0; bottom: 0; right: 0;  height:50%; max-width: 500px; margin: auto; text-align: center; background-color:#A9A9A9;">
<?php if(!isLoggedIn()): ?>
<h1><strong>Welcome</a></strong></h1>
<button  name="submit" type="submit" class="btn btn-default" style="border-radius: 30px 30px 30px 30px;width: 180px; height: 30px;background-color:#000000 ; color:#FFFFFF ;"><a href="logout.php" style="text-decoration: none; color:#FFFFFF ;">Logout</a></button><br><br>
<?php else:  ?>
Kindly enter Valid Email and Password<br>	
 <?php endif;  ?>
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
 echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
 }
}
 


















 




  



		
