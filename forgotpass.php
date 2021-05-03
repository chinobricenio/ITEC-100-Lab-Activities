<?php
    include_once 'forgotpassprocess.php';    
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Forgot Password</title>
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
				<td><input type="text" name="fp_username"  placeholder="Enter 6 Digits Code"></td>
			</tr>
			<tr>
				<td style="font-size:20px; color:white;">User ID:</td>
				<td><input type="text" name="fp_userid"  placeholder="Enter 6 Digits Code"></td>
			</tr>
		</table>

		<button class="buttonL btn button1"  name="verify" value="verify"  >Submit</button>
	</form>

</body>
</html>