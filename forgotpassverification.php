<?php
	
    include_once 'forgotpassprocess.php';
    include_once 'Database.php';

    if(isset($_POST['verify'])){

    	function validate($cdata){
		$cdata = trim($cdata);
		$cdata = stripslashes($cdata);
		$cdata = htmlspecialchars($cdata);
		return $cdata;
		}

    		$fp_vcode = validate ($_POST['verifycode']);
		 	$fp_sqlcode = "SELECT * FROM authentication WHERE code='$fp_vcode'";
			$fp_resultcode = mysqli_query($conn,$fp_sqlcode);
			$fp_countcode = $fp_resultcode->num_rows;
			$fp_id = $_SESSION['userid'];

			session_start();
			date_default_timezone_set('Asia/Manila');
			$fp_date = date("Y-m-d");
			$_SESSION['codetranstime'] = $fp_codetime = date("h:i:s"." a");

			if($fp_countcode === 1){
				$fp_rowcode = mysqli_fetch_assoc($fp_resultcode);
			 		
		 		if($fp_rowcode['code'] === $fp_vcode) {
					if($fp_rowcode['auth_timeexpiration'] > $fp_codetime){

						$forgotpass_verification_event = "INSERT INTO event_log (event_id, activity, user_id, event_date, event_time) VALUES ('null', 'Account Verified', '$fp_id', '$fp_date', '$fp_codetime')";
						$insertstatement_event = mysqli_query($conn,$forgotpass_verification_event);

					 	echo '<script type="text/javascript">'; 
						echo 'alert("Account Verified!");'; 
						echo 'window.location.href = "changepass.php";';
						echo '</script>';


					}
					else{
						$fp_code_expired_event = "INSERT INTO event_log (event_id, activity, user_id, event_date, event_time) VALUES ('null', 'Forgot Pass Code Expired', '$fp_id', '$fp_date', '$fp_codetime')";
						$insertstatement_event = mysqli_query($conn,$fp_code_expired_event);

						echo '<script type="text/javascript">'; 
						echo 'alert("Code is already expired!");'; 
						echo 'window.location.href = "Index.php";';
						echo '</script>';
					}
				}
			else{					 			
 			}
		 	}
			else if($fp_countcode === 0){	
				$fp_invalid_code_event = "INSERT INTO event_log (event_id, activity, user_id, event_date, event_time) VALUES ('null', 'Invalid Code', '$fp_id', '$fp_date', '$fp_codetime')";
				$insertstatement_event = mysqli_query($conn,$fp_invalid_code_event);	
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