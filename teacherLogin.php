<?php

include("header.php");
include("db.php");

$flag = 0;

if(isset($_POST['submit']))
{	
	$sql = "SELECT * FROM teachers where user_name = '" . $_POST['user_name'] . "' AND password = '" . $_POST['password'] . "'";
    // $sql = "SELECT * FROM students";
    $result = $conn->query($sql);

    $name = ''; 
    $user_name = '';
    
    while($row = mysqli_fetch_array($result))
	{   
        echo "Welcome, " . $row['name'];	
        //Start your session
        session_start();
        $name = $row['name'];
        $user_name = $row['user_name'];
        //Store the name in the session
        $_SESSION['name'] = $name;
        $_SESSION['user_name'] = $user_name;
        header("Location:./addSession.php");
    } 
        if(!$name && !$user_name)
            echo "Invalid credentials, Please try again!";	
    

}

?>

<div class = "panel-heading">

<?php if($flag){ ?>
	<div class ="alert alert-success">Invalid Credentials</div>
	<?php } ?>

	<h2>
	Enter Teacher Login Credentials:
	</h2>
</div>

<div class = "container">
<form method = "post" action="teacherLogin.php">
    <div class = "form-group">
	<label for = "name"> User Name </label>
	<input type = "text" name = "user_name" id = "user_name" class = "form-control" required	>
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