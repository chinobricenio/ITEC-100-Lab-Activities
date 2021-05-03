<?php
session_start();
include "Database.php";


	if(isset($_POST['fp_username']) && isset($_POST['fp_userid'])){

		function validate($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}


		$fp_user = validate ($_POST['fp_username']);
		$fp_userid = validate ($_POST['fp_userid']);
		$userid = "SELECT user_id FROM `user` WHERE u_username='$fp_user'";
	   			if ($idresult =mysqli_query($conn,$userid)){ 
					while ($idrow = mysqli_fetch_assoc($idresult)){
	    					$_SESSION['userid'] = $iduser=$idrow['user_id'];
	    			}
				}


		if(empty($fp_user) && empty($fp_userid)){
			echo nl2br  ("<p align=center><font color=white face='arial' size='3pt'>Input Username and User ID</font></p></font></p>");
		}
		else if(empty($fp_user)){
			echo nl2br  ("<p align=center><font color=white face='arial' size='3pt'>Username is required</font></p></font></p>");
		}
		else if(empty($fp_userid)){
			echo nl2br  ("<p align=center><font color=white face='arial' size='3pt'>User ID is required</font></p></font></p>");
		}
		else{
			$sql1 = "SELECT u_username FROM user WHERE u_username='$fp_user' and user_id='$fp_userid'";
			$sql2 = "SELECT user_id FROM user WHERE user_id='$fp_userid' and u_username='$fp_user'";
			$result1 = mysqli_query($conn,$sql1);
			$result2 = mysqli_query($conn,$sql2);

			if (mysqli_num_rows($result1) === 1 && mysqli_num_rows($result2) === 1){
				$row1 = mysqli_fetch_assoc($result1);
				$row2 = mysqli_fetch_assoc($result2);
				if ($row1['u_username'] === $fp_user && $row2['user_id'] === $fp_userid){
					//for verification
					$_SESSION['transcode']	= $fp_code=rand(100000,999999);
					date_default_timezone_set('Asia/Manila');
					$fp_date = date("Y-m-d");
					$_SESSION['fp_transtime'] = $fp_time = date("h:i:s"." a");

					$fp_minutes_to_add = 5;
					$fp_time2 = new DateTime();
					$fp_time2->add(new DateInterval('PT' . $fp_minutes_to_add . 'M'));
					$_SESSION['transexp'] = $fp_timeexp = $fp_time2->format("h:i:s"." a");

					$fp_sqlcodes = "INSERT INTO authentication (user_id, code, auth_date, auth_timecreated, auth_timeexpiration) VALUES ('$iduser', '$fp_code', '$fp_date', '$fp_time', '$fp_timeexp')";
					$fp_insertstatement = mysqli_query($conn,$fp_sqlcodes);
					
					//event log
					$fp_event = "INSERT INTO event_log (event_id, activity, user_id, event_date, event_time) VALUES ('null', 'Account Verification Code', '$iduser', '$fp_date', '$fp_time')";
					$insertstatement_event = mysqli_query($conn,$fp_event);

						echo '<script type="text/javascript">'; 
						echo 'window.open("Authentication.php");'; 
						echo 'window.location.href = "forgotpassverification.php";';
						echo '</script>';
				}			
			}

			else if (mysqli_num_rows($result1) === 1 && mysqli_num_rows($result2) === 0){
				echo nl2br  ("<p align=center><font color=white face='arial' size='3pt'>Username and User ID didn't matched</font></p></font></p>");			
			}
			else{
				echo nl2br  ("<p align=center><font color=white face='arial' size='3pt'>Invalid Account</font></p></font></p>");
			}	
			
		}
		

	}
	else{
		
	}
?>