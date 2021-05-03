<?php
	
    include_once 'Loginprocess.php';
    include_once 'Database.php';

    if(isset($_POST['verify'])){

    	function validate($cdata){
		$cdata = trim($cdata);
		$cdata = stripslashes($cdata);
		$cdata = htmlspecialchars($cdata);
		return $cdata;
		}

    		$vcode = validate ($_POST['verifycode']);
		 	$sqlcode = "SELECT * FROM authentication WHERE code='$vcode'";
			$resultcode = mysqli_query($conn,$sqlcode);
			$countcode = $resultcode->num_rows;
			$id = $_SESSION['userid'];

			date_default_timezone_set('Asia/Manila');
			$date = date("Y-m-d");
			$_SESSION['codetranstime'] = $codetime = date("h:i:s"." a");

			if($countcode === 1){
				$rowcode = mysqli_fetch_assoc($resultcode);
			 		
		 		if($rowcode['code'] === $vcode) {
					if($rowcode['auth_timeexpiration'] > $codetime){

						$successfully_login_event = "INSERT INTO event_log (event_id, activity, user_id, event_date, event_time) VALUES ('null', 'Successfully Login', '$id', '$date', '$codetime')";
						$insertstatement_event = mysqli_query($conn,$successfully_login_event);

					 	echo '<script type="text/javascript">'; 
						echo 'alert("Successfully Login!");'; 
						echo 'window.location.href = "Home.php";';
						echo '</script>';


					}
					else{
						$code_expired_event = "INSERT INTO event_log (event_id, activity, user_id, event_date, event_time) VALUES ('null', 'Code Expired', '$id', '$date', '$codetime')";
						$insertstatement_event = mysqli_query($conn,$code_expired_event);

						echo '<script type="text/javascript">'; 
						echo 'alert("Code is already expired!");'; 
						echo 'window.location.href = "Index.php";';
						echo '</script>';
					}
				}
			else{					 			
 			}
		 	}
			else if($countcode === 0){	
				$invalid_code_event = "INSERT INTO event_log (event_id, activity, user_id, event_date, event_time) VALUES ('null', 'Invalid Code', '$id', '$date', '$codetime')";
				$insertstatement_event = mysqli_query($conn,$invalid_code_event);	
				echo '<script type="text/javascript">'; 
				echo 'alert("Invalid Code");'; 
				echo 'window.location.href = "Index.php";';
				echo '</script>';

			} 	
	}      
?>




<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<title>Untitled Document</title>
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
				<td style="font-size:20px; color:white;">Verification code:</td>
				<td><input type="number" name="verifycode" placeholder="Enter 6 Digits Code"></td>
			</tr>
		</table>

		<button class="buttonL btn button1"  name="verify" value="verify"  >Submit</button>
	</form>

	</body>
</html>