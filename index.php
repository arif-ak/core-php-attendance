<?php
include("header.php");
include("db.php"); 

date_default_timezone_set('Asia/Kolkata');
?>

<div class = "panel panel-default">
	
	<!-- <?php if($flag){ ?>
	<div class ="alert alert-success">Successfully registered attendance</div>
	<?php } ?> -->


	<div class = "panel-heading">
	<h2><div class = "text-center"> Attendance Log </div></h2>
	<h3>
	<a class = "btn btn-success" href="addSession.php"> Create New Session </a>
	<!-- <a class = "btn btn-info" href="index.php"> View All </a> -->
	</h3>

	</div>

	<div class = "panel panel-body">
	
	<form action = "index.php" method = "POST">
	<table class = "table table-striped">
	<tr>
		<th>Student Name</th>
		<th>Roll Number</th>
		<th>Session Id </th>
		<th>Attendance Status</th>
		<th>Created</th>
		<th>Question</th>
		<th>Answer By Student</th>
		<th>True or False</th>
		<th>Feedback</th>
	</tr>

	<?php
		$sql = "SELECT * FROM attendance_log";
		$result = $conn->query($sql); 
		 
		$currentDate = new \DateTime();
		$currentDate = $currentDate->format('Y-m-d');
		while($row = mysqli_fetch_array($result))
		{
			$row['created'] = new \DateTime($row['created']);
			$row['created'] = $row['created']->format('Y-m-d');
			if($row['created'] == $currentDate ){	
	?>	<tr>
		<td> <?php echo $row['student_name']; ?> </td>
		<td> <?php echo $row['roll_number']; ?> </td>
		<td> <?php echo $row['session_id']; ?> </td>
		<td> <?php echo $row['attendance_status']; ?> </td>
		<td> <?php echo $row['created']; ?> </td>
		<td> <?php echo $row['question']; ?> </td>
		<td> <?php echo $row['answer_entered']; ?> </td>
		<td> <?php echo $row['true_or_false']; ?> </td>
		<td> <?php echo $row['feedback']; ?> </td>
		</tr>
	<?php
			}
		}
	?>

	</table>
	</form>
	</div>


</div>
