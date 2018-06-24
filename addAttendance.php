<?php

include("header.php");

$conn = mysqli_connect("localhost","root","","attendance");

if (mysqli_connect_errno())  {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	die;
}

if(isset($_POST['submit']))
{	
	$currentTime = new \DateTime();
	$sql = "INSERT INTO attendance_log(student_name,roll_number,attendance_status) VALUES('$_POST[name]','$_POST[roll]','PRESENT')";
	$result = $conn->query($sql);

	if($result){
	$flag = 1;
 	}
}

?>

<div class = "panel panel-default">
	
	<?php if($flag){ ?>
	<div class ="alert alert-success">Successfully registered attendance</div>
	<?php } ?>


	<div class = "panel-heading">
	<h2>
	<a class = "btn btn-success" href="add.php"> Add student </a>
	<a class = "btn btn-info pull-right" href="index.php"> Back </a>
	</h2>

	</div>

	<div class = "panel-body">
	
	<form action = "add.php" method = "POST">

        <div class = "form-group">
	<label for = "name"> Student name </label>
	<input type = "text" name = "name" id = "name" class = "form-control" required	>
	</div>

	<div class = "form-group">
	<label for = "name"> Roll Number  </label>
	<input type = "text" name = "roll" id = "roll" class = "form-control" required	>
	</div>

	<div class = "form-group">
	<input type = "submit" name = "submit" value = "submit" class = "btn btn-primary">
	</div>

	</form>
	</div>


</div>
