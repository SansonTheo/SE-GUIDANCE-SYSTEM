<?php
	include "server.php";
	$username = mysqli_real_escape_string($link,$_POST['username']);
	$password = mysqli_real_escape_string($link,$_POST['password']);
	$record=mysqli_query($link,"SELECT * FROM user WHERE username='$username'");
	$count = mysqli_num_rows($record);
	if($count == 0){
		echo "	<script type='text/javascript'>
					alert('No Record of Given Username');
					window.location='Page-Login.php';
				</script>";
	}	
	else{
		$sql=mysqli_query($link,"SELECT * FROM user WHERE username='$username' and password='$password'");
		$count = mysqli_num_rows($sql);
		if($count == 0){
			echo "	<script type='text/javascript'>
						alert('Invalid Password!');
						window.location='Page-Login.php';
					</script>";
		}
		else{
			$message = "Login Successful!";
			echo "	<script type='text/javascript'>
						alert('$message');
						window.location='Page-Guidance-Index.php';
					</script>";			
		}
	}
	echo "Error: Could not be able to execute $sql. " .mysqli_error($link);
	mysqli_close($link);
?>