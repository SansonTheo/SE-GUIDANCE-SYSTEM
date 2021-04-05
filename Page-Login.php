<!DOCTYPE html>
<!-- <?php include "server.php";?> -->
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<style>@import url('https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&display=swap');</style>
	</head>
	<body>
		<div class="login-container">
			<div class="logo-container">
				<div class="login-seal-container">
					<img src="https://i.imgur.com/VxkLZEA.png" alt="WMSU SEAL" style="object-fit: contain; height:40%;">
					<div style="text-align:center; font-family:PT Sans; font-style: normal; font-weight: bold; font-size:3vw;  color:white; margin:auto; padding:10px;">
						Western Mindanao State University
						<br>Digital Student Profiling System
					</div>
				</div>
			</div>
			<div class="login">
				<div class="text-container">
					<p style="font-family:PT Sans; font-size:50px; color:white; font-weight:bold;">
						Login
					</p> <br> <br>
					<form method="post" action="login.php" style="font-size:30px; text-align:center; display:inline;">
							<input type="text" name="username" placeholder="Username" class="signintextbox"> <br> <br>
							<input type="password" name="password" placeholder="Password" class="signintextbox"> <br> <br>
							<input type="Submit" class="generic-button" value="Sign-in" id="Login" style="margin-bottom: 20px; background-color:pink; color:black; width:70px; height:20%;">
					</form>
					<a href="recovery_page.php" style="font-size:15px; color:rgba(239,199,199,1);">
						FORGOT PASSWORD?
					</a>
				</div>
				<div class="text-container-1">
					<a href="Page-Register.php" style="margin-top:auto; font-size:15px; color:rgba(239,199,199,1);">
						REGISTER
					</a>
				</div>
			</div>
		</div>
	</body>
</html>