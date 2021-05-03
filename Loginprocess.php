<?php
session_start();
include "Database.php";


	if(isset($_POST['username']) && isset($_POST['password'])){

		function validate($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}


		$user = validate ($_POST['username']);
		$pass = validate ($_POST['password']);
		$userid = "SELECT user_id FROM `user` WHERE u_username='$user'";
	   			if ($idresult =mysqli_query($conn,$userid)){ 
					while ($idrow = mysqli_fetch_assoc($idresult)){
	    					$_SESSION['userid'] = $iduser=$idrow['user_id'];
	    			}
				}



		if(empty($user)){
			echo nl2br  ("<p align=center><font color=white face='arial' size='3pt'>Input Username and Password</font></p></font></p>");
		}
		else if(empty($pass)){
			echo nl2br  ("<p align=center><font color=white face='arial' size='3pt'>Password is required</font></p></font></p>");
		}
		else{
			$sql1 = "SELECT * FROM user WHERE u_username='$user'";
			$sql2 = "SELECT * FROM user WHERE u_password='$pass'";
			$result1 = mysqli_query($conn,$sql1);
			$result2 = mysqli_query($conn,$sql2);

			if (mysqli_num_rows($result1) === 1 && mysqli_num_rows($result2) === 1){
				$row1 = mysqli_fetch_assoc($result1);
				$row2 = mysqli_fetch_assoc($result2);
				if ($row1['u_username'] === $user && $row2['u_password'] === $pass){
					//for verification
					$_SESSION['transcode']	= $code=rand(100000,999999);
					date_default_timezone_set('Asia/Manila');
					$date = date("Y-m-d");
					$_SESSION['transtime'] = $time = date("h:i:s"." a");

					$minutes_to_add = 5;
					$time2 = new DateTime();
					$time2->add(new DateInterval('PT' . $minutes_to_add . 'M'));
					$_SESSION['transexp'] = $timeexp = $time2->format("h:i:s"." a");

					$sqlcodes = "INSERT INTO authentication (user_id, code, auth_date, auth_timecreated, auth_timeexpiration) VALUES ('$iduser', '$code', '$date', '$time', '$timeexp')";
					$insertstatement = mysqli_query($conn,$sqlcodes);
					
					//event log
					$login_event = "INSERT INTO event_log (event_id, activity, user_id, event_date, event_time) VALUES ('null', 'Login Verification', '$iduser', '$date', '$time')";
					$insertstatement_event = mysqli_query($conn,$login_event);

						echo '<script type="text/javascript">'; 
						echo 'window.open("Authentication.php");'; 
						echo 'window.location.href = "Verify.php";';
						echo '</script>';
				}			
			}

			else if (mysqli_num_rows($result1) === 1 && mysqli_num_rows($result2) === 0){
				echo nl2br  ("<p align=center><font color=white face='arial' size='3pt'>Incorrect Password</font></p></font></p>");			
			}
			else{
				echo nl2br  ("<p align=center><font color=white face='arial' size='3pt'>Invalid Account</font></p></font></p>");
			}	
			
		}
		

	}
	else{
		
	}
?>