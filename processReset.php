<?php include 'database.php'; ?>
<?php
    session_start();
     
    
     
    // Did the user submit the form?
    if(isset($_POST['forgotPassword'])){
        // Is the user logged in?

    }
        // Process the form
         
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
         
        $check_current_password = trim($current_password);
        $check_new_password = trim($new_password);
         
        if($check_current_password != '' && $check_new_password != ''){
            // Continue the process
             

             
            $current_password = $mysqli->real_escape_string($current_password);
            $new_password = $mysqli->real_escape_string($new_password);
             
            $sql = "SELECT password, salt FROM users WHERE email='" . $_SESSION['email'] . "'";
            $query = $mysqli->query($sql);
             
            $pass = $query->fetch_assoc();
             
            $salt = $pass['salt'];
             
            // Does their $current_password, while encrypted, match their database password?
            $encrypt_current_password = sha1($current_password . $salt);
             
            if($encrypt_current_password == $pass['password']){
                $new_salt = time();
                 
                $encrypt_new_password = sha1($new_password . $new_salt);
                 
                $sql = "UPDATE users SET password='" . $encrypt_new_password . "', salt=" . $new_salt . " WHERE email=" . $_SESSION['userID'];
                $query = $mysqli->query($sql);
                 
                $error = 'Successfully updated your password.';
            }
            else {
                $error = 'Incorrect information. Please try again.';
            }
             
             
             
            // Always close the database connection
            $mysqli->close();
        }
        else {
            $error = 'Please provide both your current password and your new password.';
        }
    
?>
 