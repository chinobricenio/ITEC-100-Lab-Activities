<?php
    include_once 'Loginprocess.php';    
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<title>Login Page</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<h2 align="center" style="font-size:80px; font-family:'Brush Script MT'; color:white;">Chi Music</h2>
		<br>
		<h1 align="center" style="font-size:20px; font-family:'Helvetica'; color:white;">Connect with your musician friends and the world</h1>
		<h1 align="center" style="font-size:20px; font-family:'Helvetica'; color:white;">around you on Chi Music</h1>	

		<form action="" method="POST">
			<table id="div1">
				<tr>
					<td style="font-size:20px; color:white;">Username:</td>
					<td><input type="text" name="username" placeholder="Enter you username"></td>
				</tr>
				<tr>
					<td style="font-size:20px; color:white;">Password:</td>
					<td><input type="password" name="password" placeholder="Enter you password"></td>
				</tr>
				<tr>
					<td></td>
					<td><a href="forgotpass.php" >Forgot Password?</a></td>
				</tr>
			</table>
			<button class="buttonL btn button1" id="submit" name="submit" value="submit"  >Submit</button>
		</form>

		<form action="Register.php" method="post">
		<button class="buttonReg btn button1" id="register" name="register" value="register">Register</button>
		</form>
	</body>
</html>