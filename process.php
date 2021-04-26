 <?php include 'database.php' ;?>
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
<h1><strong><a style="text-decoration: none; color:#000000 ;" href="index.php">Zuri CRUD</a></strong></h1>
 <?php if(isLoggedIn()): ?>
<button  name="submit" type="submit" class="btn btn-default" style="border-radius: 30px 30px 30px 30px;width: 180px; height: 30px;background-color:#000000 ; color:#FFFFFF ;"><a href="logout.php" style="text-decoration: none; color:#FFFFFF ;">Logout</a></button><br><br>
<?php else:  ?>
 <?php endif;  ?>

  <?php if(!isLoggedIn()): ?>
  <button  name="submit" type="submit" class="btn btn-default" style="border-radius: 30px 30px 30px 30px;width: 180px; height: 30px;background-color:#000000 ; color:#FFFFFF ;"><a href="register.php" style="text-decoration: none; color:#FFFFFF ;">Register</a></button><br><br>
 <?php endif;  ?>
</body>

<?php  

if(isset($_POST['register'])) 
{
  $errorMessage = "";
  if(empty($_POST['firstName'])) 
  {
    $errorMessage .="<li>You forgot to enter your firstName</li>";
  }
  if(empty($_POST['lastName'])) 
  {
    $errorMessage .="<li>You forgot to enter your lastName</li>";
  }
  if(empty($_POST['email'])) 
  {
    $errorMessage .="<li>You forgot to enter your email</li>";
  }
  if(empty($_POST['password'])) 
  {
    $errorMessage .="<li>You forgot to enter your password</li>";
  }
  if(empty($_POST['password1'])) 
  {
    $errorMessage .="<li>kindly enter same password</li>";
  }
    
      $firstName = mysqli_real_escape_string($connect,$_POST['firstName']);
      $lastName = mysqli_real_escape_string($connect,$_POST['lastName']);
      $email = mysqli_real_escape_string($connect,$_POST['email']);
      $password = mysqli_real_escape_string($connect,md5($_POST['password']));
      $password1 = mysqli_real_escape_string($connect,md5($_POST['password1']));
  

  // normally we cout just set the code as $_POST['user'], but it is better we use a string, therefore we use $user=$_POST['user'] then we add the msqli real escape command to strip the code off any excesses and always do not forget to include yout connection string along side
 if($_POST['password'] !== $_POST['password1']){
     die('Password and Confirm password should match');
  }

  // step3; we use this codeline to validate the users info input(||(double pipes represent or))

  if(!isset($firstName) || $firstName == '' || !isset($lastName) || $lastName == '' || !isset($email) || $email == '' || !isset($password) || $password == '' || !isset($password1) || $password1 == '' || !isset($password) !== !isset($password1) ){
       // echo "bad";
    // the below code line is to display an error message when the form isint properly filled
    $error = 'Please fill in each detail correctly';
    // the below code is for redirection draging the possible error along
    echo ("<p>There was an error with your form</p>\n");
      echo ("<ul>" .$error . "</ul>\n");
  }

       else {
         // echo "good"; we first used echo to test, then since it worked, we now set it to populate the query row in our database using the code below NB same comma order should be followed in both places
        $query = "insert into users(firstName,lastName,email,password,password1)VALUES('$firstName','$lastName','$email','$password','$password1')";
        // Else, if it didnt insert we use the !mysqli_connect funtion to ascertain 
        if (!mysqli_query($connect, $query)) {
          die('Error:'.mysqli_error($connect));
        }
        // Else redirect us back to our index page
        else {
           echo "Account created<br><br>, Welcome.<br>".$firstName;
                header('Refresh: 2; URL = welcome.php');
          exit();
      }
    }
  }
