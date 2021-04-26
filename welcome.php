<?php include 'database.php';  ?>
<?php   
$query = "SELECT * FROM courses";

$rows = mysqli_query($connect,$query);
;?>
<head><script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"   crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="js/bootstrap.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script></head>
<nav class="navbar navbar-default navbar-right">
  <div class="container-fluid">
  	<br>
    <button  name="submit" type="submit" class="btn btn-default" style="border-radius: 30px 30px 30px 30px;width: 180px; height: 30px;background-color:#000000 ; color:#FFFFFF ; float: right; "><a href="logout.php" style="text-decoration: none; color:#FFFFFF ;">Logout</a></button><br><br>
  </div>
</nav>

<body style="  max-width: 500px; margin: auto; text-align: center; background-color:#A9A9A9;">

<h1><strong>Welcome</a></strong></h1>
<center>
<div class="col-md-10 col-md-offset-1">
	<table class="table">
		<a  href="addcourse.php"  class="btn btn-success" style="float: left; background-color:#00FF7F; text-decoration: none; color: #FFFFFF;padding: 10px 25px; border: thick;" >Add Course</a><button type="button" class="btn btn-success" style="float: right;">Print</button>

		<br>
		<br>
		<br><hr><br>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    
<thead>
<tr>
<th>ID</th>
<th>Course</th>
</tr>
</thead>
<tbody>
<tr>

<td>Mark</td>

</tr>
</tbody>
</table>
</center>

    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>

