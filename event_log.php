<?php
	include 'Database.php';
	include 'Loginprocess.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="style.css">
	</head>
	<style type="text/css">
		table{
			position: absolute;
			left: 400px;
			top: 250px;
			border-collapse: collapse;
			width: 50%;
			color: #588c7e;
			font-family: arial;
			font-size: 25px;
			text-align: left;
			border:solid black 1px;
		}
		tr{
			 background-color: white;
			 color: black;
			 border:solid black 1px;

		}
		td{
			background-color: white;
			color: black;
			border:solid black 1px;
		}
	</style>
	<body>	
		<h2 align="center" style="font-size:80px; font-family:'Brush Script MT'; color:white;">Welcome to Chi Music</h2>
		<div><label style="font-size: 30px; font-family: 'arial'; color: white; position: absolute; left: 400px; top: 200px;">Event Log</label>
			<table>
			<?php
				$event_id = $_SESSION['userid'];
				if($event_id == 1){
					$sql = "SELECT event_log.event_id, event_log.user_id, event_log.activity, event_log.event_date, event_log.event_time FROM `event_log` INNER JOIN user ON event_log.user_id = user.user_id ORDER BY event_id DESC";
				}
				else{
					$sql = "SELECT event_log.event_id, event_log.user_id, event_log.activity, event_log.event_date, event_log.event_time FROM `event_log` INNER JOIN user ON event_log.user_id = user.user_id WHERE user.user_id='$event_id' ORDER BY event_id DESC";
				}
				



				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
					echo "<tr><td>" . "Event ID" . "</td><td>" . "User ID" . "</td><td>" . "Activity" . "</td><td>" . "Event Date" . "</td><td>" . "Event Time" . "</td></tr>"."<br>";
	
				if ($resultCheck > 0){
					while($row = mysqli_fetch_assoc($result)){
						
						echo "<tr><td>" . $row["event_id"] . "</td><td>" . $row["user_id"] . "</td><td>" . $row["activity"] . "</td><td>" . $row["event_date"] . "</td><td>" . $row["event_time"] . "</td></tr>"."<br>";
							
				}
			}	


			?>
		</table>
		</div>
		<form action="home.php" method="POST">
		<button id="back_btn" name="back" type="submit" value="back">Back</button>
		</form>
	</body>
</html>