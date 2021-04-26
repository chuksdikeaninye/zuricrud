
<?php include 'database.php';  ?>
<?php   
$query = "SELECT * FROM courses";

$rows = mysqli_query($connect,$query);

;?>
   <body style="position: absolute; top: 0; left: 0; bottom: 0; right: 0;  height:50%; max-width: 500px; margin: auto; text-align: center; background-color:#A9A9A9;">
<h1><strong><a style="text-decoration: none; color:#000000 ;" href="welcome.php">Zuri CRUD</a></strong></h1>
      </div>
      <div class="modal-body">
        <form method="post" action="addcourse.php">
           <div class="form-group">
      <strong><label for="exampleName"></label></strong><br>
      <input name= "courseName"type="text" class="form-control" id="exampleName" placeholder="Enter your Course Name">
        </div><br>
 <button style="width: 180px; height: 30px;" name="addcourse">Add Course</button><br>
        </div>
        	<div class="form-group">
         <br>
<center>
<div class="col-md-10 col-md-offset-1">
  <table class="table">
   

    <br>
    <br>
    <br><hr><br>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    
<thead>
  <th>Mark</th>
<tr>
<th>ID</th>
<th>Course</th>
</tr>
</thead>
<tbody>
<tr>
 

  <?php while ($row = $rows->fetch_assoc())  :?>
     <th scope="row"><?php echo $row['id'];  ?></th>
<td><?php echo $row['courseName'];  ?></td>
<td><a  href="update.php?id=<?php echo $row['id'];?>"  class="btn btn-secondary" style="text-decoration: none; color: #FFFFFF; background-color:#00BFFF; float: right; padding: 10px 25px; border: thick;" >Edit</a>
</td>

<td><a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-success" style="text-decoration: none; color: #FFFFFF; background-color:#FF0000; float: right;padding: 10px 25px; border: thick;"  >Delete</a></td>
<?php endwhile ;?>
</tr>
</tbody>
</table>
</center>

<?php
    if (isset($_POST['addcourse'])) {
    // Assign Vars
    $courseName = mysqli_real_escape_string($connect, $_POST['courseName']);

        
    // simple validation
    if (!isset($courseName) || $courseName == '' ) {
      // set error
      $error = 'Please fill out required fields';
    } else {
      $query = "INSERT INTO courses
               (courseName)
               VALUES('$courseName')";
     $insert_row = mysqli_query($connect,$query);
     if ($insert_row) {
      echo "<h3>Successfully Inserted</h3>";
      header('location:addcourse.php');
      
     }
     }
 }
?>

