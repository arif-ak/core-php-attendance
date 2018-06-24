<?php
include("header.php");
include("db.php");

$flag = 0;
date_default_timezone_set('Asia/Kolkata');

if(isset($_POST['submit']))
{	
	// var_dump($_POST);die;
	$currentTime = new \DateTime();
	$sessionId = (int)$_POST['id'];
	$trueOrFlase = '';
	$answerEntered = 'NULL';
		
	switch($_POST['answer']){

		case "1": 
			$answerEntered = $_POST['option_1'];
			break;

		case "2": 
			$answerEntered = $_POST['option_2'];
			break;

		case "3": 
			$answerEntered = $_POST['option_3'];
			break;

		case "4": 
			$answerEntered = $_POST['option_4'];
			break;

		default: 
			$answerEntered = "NULL";
	}

	if($_POST['answer'] == $_POST['actualAnswer'] ){
		$trueOrFlase = 'TRUE';
	} else {
		$trueOrFlase = 'FALSE';
	}

	session_start();
	if($_POST['password'] == $_POST['actualPassword']){
		$sql = "INSERT INTO attendance_log(student_name,roll_number,attendance_status,session_id,question,answer_entered,true_or_false,feedback) 
				VALUES('".$_SESSION['name']."','".$_SESSION['roll_number']."','PRESENT',$sessionId,
				'".$_POST['question']."','$answerEntered','$trueOrFlase','".$_POST['feedback']."')";
		$result = $conn->query($sql);

		if($result){
		$flag = 1;
	 	}
	} else {
		$flag = 2;
	}
}
?>

<div class = "panel panel-default">
	
	<?php if($flag == 1){ ?>
	<div class ="alert alert-success">Successfully registered attendance</div>
	<?php } ?>

	<?php if($flag == 2){ ?>
	<div class ="alert">Password entered for attendance is incorrect! Please try again</div>
	<?php } ?>


	<!-- <div class = "panel-heading">
	<h2>
	<a class = "btn btn-success" href="addSession.php"> Register Attendance </a>
	<a class = "btn btn-info" href="viewall.php"> View All </a>
	</h2>

	</div> -->

	<div class = "panel panel-body">
	
	<!-- <form action = "sessions.php" method = "POST"> -->
	<table class = "table table-striped">
	<tr>
		<th>Session Id</th>
		<th>Subject</th>
		<th>Teacher</th>
		<th>Created</th>
		<th>Enter Password</th>
		<th></th>
	</tr>

	<?php

		if(!isset($_SESSION['roll_number'])){
		session_start();
		}
		
		$sql = "SELECT * FROM session";
		$result = $conn->query($sql); 

		
		$currentDate = new \DateTime();
		$currentDateString = $currentDate->format('Y-m-d');
		$currentDateTimeString = $currentDate->format('Y-m-d H:i:s');

		$getSql = "SELECT session_id FROM attendance_log where roll_number = '".$_SESSION['roll_number'] ."' AND DATE(created) = '".$currentDateString."'";
		$logResult = $conn->query($getSql);
		$sessionIdArr = array();
		
		
		while($logRow = mysqli_fetch_array($logResult)){
			array_push($sessionIdArr,$logRow['session_id']);
		}
		
		while($row = mysqli_fetch_array($result))
		{	
			$row['created'] = new \DateTime($row['created']);
			$createdString = $row['created']->format('Y-m-d');
			$createdDateTimeString = $row['created']->format('Y-m-d H:i:s');
			$timeDifference = abs(strtotime($createdDateTimeString) - strtotime($currentDateTimeString))/60;
			
			if($createdString == $currentDateString && !in_array($row['id'],$sessionIdArr)){
	?>	
		<form action = "sessions.php" method = "POST">
		<tr>
			<td> <?php echo $row['id']; ?> <input type = "hidden" name = "id" id = "id" value = <?php echo $row['id']; ?> class = "form-control"> </td>
			<td> <?php echo $row['subject']; ?> </td>
			<td> <?php echo $row['teacher']; ?> </td>
			<!-- <td> <?php echo $row['attendance_status']; ?> </td> -->
			<td> <?php echo $createdString; ?> <input type = "hidden" name = "actualPassword" id = "actualPassword" value = <?php echo $row['password']; ?> class = "form-control"> </td>
			<!-- <td> <input type = "hidden" name = "actualPassword" id = "actualPassword" class = "form-control"> </td> -->
					
			<?php if($timeDifference < 1) { ?>
				<td> <input type = "text" name = "password" id = "password" class = "form-control" required> </td>
				<td> <input type = "button" name = "next" id="next" data-selector = "<?php echo $row['id']; ?>" value = "next" class = "btn btn-primary"> </td>
			<?php } else { ?>
				<td> Attendance Registration Time Expired </td>
				<td> Attendance Registration Time Expired </td>
			<?php } ?>
				
		</tr>

		<tr class = "<?php echo $row['id']; ?>" class = "form-2" style = "display:none">
			<td> <label for = "name"> Question  </label> <br/> <?php echo $row['question']; ?> <input type = "hidden" name = "question" id = "question" value = "<?php echo $row['question']; ?>" class = "form-control"> </td>
			<td> <label for = "name"> Option 1  </label> <br/> <?php echo $row['option_1']; ?> <input type = "hidden" name = "option_1" id = "option_1" value = "<?php echo $row['option_1']; ?>" class = "form-control"> </td>
			<td> <label for = "name"> Option 2  </label> <br/> <?php echo $row['option_2']; ?> <input type = "hidden" name = "option_2" id = "option_2" value = "<?php echo $row['option_2']; ?>" class = "form-control"> </td>
			<td> <label for = "name"> Option 3  </label> <br/> <?php echo $row['option_3']; ?> <input type = "hidden" name = "option_3" id = "option_3" value = "<?php echo $row['option_3']; ?>" class = "form-control"> </td>
			<td> <label for = "name"> Option 4  </label> <br/> <?php echo $row['option_4']; ?> <input type = "hidden" name = "option_4" id = "option_4" value = "<?php echo $row['option_4']; ?>" class = "form-control"> </td>
			<td> <div class = "form-group">
					<label for = "name"> Choose your Answer  </label>
					<select name="answer" class="form-control">
						<option value="">Select...</option>
						<option value=1>Option 1</option>
						<option value=2>Option 2</option>
						<option value=3>Option 3</option>
						<option value=4>Option 4</option>
					</select>
				</div>
				<input type = "hidden" name = "actualAnswer" id = "actualAnswer" value = "<?php echo $row['answer']; ?>" class = "form-control">
			</td>
			<!-- <td> <input type = "text" name = "feedback" id = "feedback" class = "form-control" required> </td>
			<td> <label for = "name"> Enter feedback for session  </label> <input type = "submit" name = "submit" value = "next" class = "btn btn-primary pull-right"> </td> -->

		</tr>
		<tr bgcolor = "blue" class = "<?php echo $row['id']; ?>" class = "form-2" style = "display:none">
			<td > <label for = "name"> Enter feedback for session:  </label> </td>
			<td  colspan = "4"> <input type = "text" name = "feedback" id = "feedback" class = "form-control" required> </td>
			<td > <input type = "submit" name = "submit" value = "submit" class = "btn btn-primary"> </td>
		</tr>
		</form>
	<?php
			}
		}
	?>

	</table>

	<!-- <div class = "form-group">
	<input type = "submit" name = "submit" value = "submit" class = "btn btn-primary">
	</div> -->
`	
	<!-- </form> -->
	</div>


</div>

<script>

$(document).ready(function(){
    $('input[type=button]').click(function() {
	
       var selector = $(this).data('selector');
	   $('.'+selector).show();
    });
});

</script>