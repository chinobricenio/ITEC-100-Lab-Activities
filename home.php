<?php
	
    include_once 'Loginprocess.php';
    include_once 'Database.php';
    
    if(isset($_POST['logout'])){

    	function validate($cdata){
		$cdata = trim($cdata);
		$cdata = stripslashes($cdata);
		$cdata = htmlspecialchars($cdata);
		return $cdata;
		}

    		
			$id = $_SESSION['userid'];

			date_default_timezone_set('Asia/Manila');
			$logoutdate = date("Y-m-d");
			$_SESSION['logouttranstime'] = $logouttime = date("h:i:s"." a");

			$logout_event = "INSERT INTO event_log (event_id, activity, user_id, event_date, event_time) VALUES ('null', 'Logout', '$id', '$logoutdate', '$logouttime')";
			$insertstatement_event = mysqli_query($conn,$logout_event);

			echo '<script type="text/javascript">'; 
			echo 'alert("Logout!");'; 
			echo 'window.location.href = "index.php";';
			echo '</script>';
			
		
			 	
	}      
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>	
		<h2 align="center" style="font-size:80px; font-family:'Brush Script MT'; color:white;">Welcome to Chi Music</h2>
		<form action="" method="POST">
			<button id="logout_btn" name="logout" type="submit" value="logout">Logout</button>
		</form>
		<form action="event_log.php" method="POST">
			<button id="event_btn" name="event_log" type="submit" value="event_log">Event Log</button>
		</form>
	</body>
</html>