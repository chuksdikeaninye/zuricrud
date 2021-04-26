<?php include 'database.php';  ?>
<?php  

$id = $_GET['id'];

$query = "DELETE FROM courses WHERE id = ".$id;

$delete_row = mysqli_query($connect,$query);
     if ($delete_row) {
      echo "<h3>Successfully Deleted</h3>";
      header('location:addcourse.php');
  }