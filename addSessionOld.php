<?php

include("header.php");
include("db.php");

$flag = 0;

session_start();

if (!isset($_SESSION["user_name"]))
{
   header("location: teacherLogin.php");
}

if(isset($_POST['submit']))
{	
	$currentTime = new \DateTime();
	$sql = "INSERT INTO session(subject,teacher,password) VALUES('$_POST[subject]','$_POST[teacher]','$_POST[password]')";
	$result = $conn->query($sql);

	if($result){
	$flag = 1;
 	}
}

?>

<div class = "panel panel-default">
	
	<?php if($flag){ ?>
	<div class ="alert alert-success">Successfully created session</div>
	<?php } ?>


	<div class = "panel-heading">
	<h2>
	<a class = "btn btn-success" href="index.php"> List of Sessions </a>
	<a class = "btn btn-info pull-right" href="index.php"> Back </a>
	</h2>

	</div>

	<div class = "panel-body">
	
	<form action = "addSession.php" method = "POST">

    <div class = "form-group">
	<label for = "name"> Subject </label>
	<input type = "text" name = "subject" id = "subject" class = "form-control" required	>
	</div>

	<div class = "form-group">
	<label for = "name"> Teacher  </label>
	<input type = "text" name = "teacher" id = "teacher" class = "form-control" required	>
	</div>

	<div class = "form-group">
	<label for = "name"> Password  </label>
	<input type = "text" name = "password" id = "password" class = "form-control" required	>
	</div>

	<div class = "form-group">
	<input type = "submit" name = "submit" value = "submit" class = "btn btn-primary">
	</div>

	</form>
	</div>


</div>
