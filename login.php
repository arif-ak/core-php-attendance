<?php

include("header.php");
include("db.php");

$flag = 0;

if(isset($_POST['submit']))
{	
	$sql = "SELECT * FROM students where roll_number = '" . $_POST['roll_number'] . "' AND password = '" . $_POST['password'] . "'";
    // $sql = "SELECT * FROM students";
    $result = $conn->query($sql);

    $name = ''; 
    $roll_number = '';
    
    while($row = mysqli_fetch_array($result))
	{   
        echo "Welcome, " . $row['name'];	
        //Start your session
        session_start();
        $name = $row['name'];
        $roll_number = $row['roll_number'];
        //Store the name in the session
        $_SESSION['name'] = $name;
        $_SESSION['roll_number'] = $roll_number;
        header("Location:./sessions.php");
    } 
        if(!$name && !$roll_number)
            echo "Invalid credentials, Please try again!";	
    

}

?>

<div class = "panel-heading">

<?php if($flag){ ?>
	<div class ="alert alert-success">Invalid Credentials</div>
	<?php } ?>

	<div class = "panel-heading">
	<h2>Enter Student Login Credentials: </h2>
	</div>
</div>

<div class = "panel panel-default panel-heading container">
<form method = "post" action="login.php">
    <div class = "form-group">
	<label for = "name"> Roll Number </label>
	<input type = "text" name = "roll_number" id = "roll_number" class = "form-control" required	>
	</div>

  	<div class = "form-group">
	<label for = "name"> Password  </label>
	<input type = "password" name = "password" id = "password" class = "form-control" required	>
	</div>

    <div class = "form-group">
	<input type = "submit" name = "submit" value = "login" class = "btn btn-primary">
	</div>

</form>
</div>