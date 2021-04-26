<?php 

$id = $_GET['id'];

include 'database.php'; 

$query = "SELECT * FROM courses WHERE id ='$id'";

$rows = mysqli_query($connect,$query);

$row = $rows->fetch_assoc();



;?>

   <body style="position: absolute; top: 0; left: 0; bottom: 0; right: 0;  height:50%; max-width: 500px; margin: auto; text-align: center; background-color:#A9A9A9;">
<h1><strong><a style="text-decoration: none; color:#000000 ;" href="welcome.php">Zuri CRUD</a></strong></h1>
      </div>
        <form method="post" action="addcourse.php?id=<?php echo $id;?>">
           <div class="form-group">
      <strong><label for="exampleName"></label></strong><br>
      <input  name= "courseName" type="text" value="<?php echo $row['courseName'];?>" class="form-control" id="exampleName" placeholder="Enter your Course Name">
        </div><br>
 <button type="submit" style="width: 180px; height: 30px;" name="updatecourse" type="submit">Update Course</button>
        </div>
          <div class="form-group">
         <br><br>
       </form>
<center>
<div class="col-md-10 col-md-offset-1">
  <table class="table">
 

    <br>
    <br>
    <br><br>


    
<thead>

</table>
</center>

<?php
  if (isset($_POST['updatecourse'])) {
    // Assign Vars
    $courseName = mysqli_real_escape_string($connect, $_POST['courseName']);
 
  // simple validation
    if ($courseName == '') {
      // set error
      $error = 'Please fill out required fields';
    } else {
      $query = "UPDATE courses
                 SET 
                 courseName = '$courseName',
                WHERE id ='$id'";
               
                $update_row = mysqli_query($connect,$query);
     if ($update_row) {
      echo "<h3>Successfully Updated</h3>";
      header('location:addcourse.php');
      
    }
  }
}
