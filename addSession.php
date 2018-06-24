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
	$sql = "INSERT INTO session(subject,teacher,password,question,option_1,option_2,option_3,option_4,answer) 
			VALUES('$_POST[subject]','$_POST[teacher]','$_POST[password]',
			'$_POST[question]','$_POST[option_1]','$_POST[option_2]','$_POST[option_3]','$_POST[option_4]','$_POST[answer]')";
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

	<div class = "panel-body" id = "form-1">
	
	<form action = "addSession.php" method = "POST">

	<div class ="alert">Enter Session Details</div>

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
	<input type = "button" id = "next" value = "next" class = "btn btn-primary pull-right">
	</div>

	<!-- </form> -->
	</div>

	<div class = "panel-body"  id = "form-2" style = "display:none">
	
	<!-- <form action = "addSessionNew.php" method = "POST"> -->
	<div class ="alert">Enter Question and Options</div>

    <div class = "form-group">
	<label for = "name"> Question </label>
	<input type = "text" name = "question" class = "form-control"	>
	</div>

	<div class = "form-group">
	<label for = "name"> Option 1  </label>
	<input type = "text" name = "option_1" class = "form-control"	>
	</div>

	<div class = "form-group">
	<label for = "name"> Option 2  </label>
	<input type = "text" name = "option_2" class = "form-control"	>
	</div>

	<div class = "form-group">
	<label for = "name"> Option 3  </label>
	<input type = "text" name = "option_3" class = "form-control"	>
	</div>

	<div class = "form-group">
	<label for = "name"> Option 4  </label>
	<input type = "text" name = "option_4" class = "form-control"	>
	</div>

	<div class = "form-group">
	<label for = "name"> Answer  </label>
	<select name="answer" class="form-control">
		<option value="">Select...</option>
		<option value=1>Option 1</option>
		<option value=2>Option 2</option>
		<option value=3>Option 3</option>
		<option value=4>Option 4</option>
	</select>

	</div>

	<div class = "form-group">
	<input type = "button" id = "previous" value = "previous" class = "btn btn-primary">
	<input type = "submit" name = "submit" id = "submit" value = "submit" class = "btn btn-primary pull-right">
	</div>

	</form>
	</div>

</div>

<script>

	$('#next').click(function(){
			$('#form-2').show()
			$('#form-1').hide()
	})

	$('#previous').click(function(){
		$('#form-1').show()
		$('#form-2').hide()
	})

</script>
