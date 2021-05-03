<?php
    include_once 'Process.php';
?>

<!DOCTYPE html>

<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="style.css">
	</head>

	<body>	
		<h2 id="h2">Register Account</h2>

		<form action="Register.php" method="POST">

			<table id="div1">
				<tr>
					<td style="font-size:20px; color:white;">Username:</td>
					<td><input type="text" name="username" placeholder="Enter you username"></td>
				</tr>
				<tr>
					<td style="font-size:20px; color:white;">Password:</td>
					<td><input type="text" name="password" placeholder="Enter you password"></td>
				</tr>
				<tr>
					<td style="font-size:20px; color:white;">Confirm Password:</td>
					<td><input type="text" name="confirmpassword" placeholder="Enter you confirm password"></td>
				</tr>
				<tr>
					<td style="font-size:20px; color:white;">Email:</td>
					<td><input type="text" name="email" placeholder="Enter you Email"></td>
				</tr>					
			</table>
				
			<button class="buttonR btn" id="signup" name="signup" value="signup">Signup</button>
			<h4 style="color:white; size:10px; margin-top:300px; margin-left: 890px; text-align: center; position: absolute;">Have an account?</h4>
		</form>

		<form action="Index.php" >
			<button style="position: absolute; margin-top: 300px; margin-left: 1020px;" class="btn" name="log_in" value="log_in">Log in</button>
		</form>

	</body>
</html>

