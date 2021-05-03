<!DOCTYPE html>
<html>
<head>
	<title>Authentication Code</title>
</head>
<body>
	<h1>Authentication Code</h1>
	<br>
	<br>
	<h2>
		<?php
			session_start();
			echo $_SESSION['transcode'];
		?>
	</h2>
</body>
</html>