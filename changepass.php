<?php
    
    include_once 'Database.php'; 
    include_once 'forgotpassprocess.php';

    if(isset($_POST['verify'])){

    	function validate($cdata){
		$cdata = trim($cdata);
		$cdata = stripslashes($cdata);
		$cdata = htmlspecialchars($cdata);
		return $cdata;
		}

    		$new_pass = validate ($_POST['new_password']);
			$confirm_pass = validate ($_POST['confirm_password']);
			$pass_id = $_SESSION['userid'];
			$checker = 0;

			date_default_timezone_set('Asia/Manila');
			$cp_date = date("Y-m-d");
			$_SESSION['codetranstime'] = $cp_codetime = date("h:i:s"." a");

			//check pass
			if(($new_pass==null)&&($confirm_pass==null)){
				echo nl2br("<p align=center><font color=white face='arial' size='3pt'>Input New Password and Confirm Password. </font></p></font></p>");
				$checker=1;
			}
			else if($new_pass == null){
				echo nl2br("<p align=center><font color=white face='arial' size='3pt'>Input New Password. </font></p></font></p>");
				$checker=1;
			}
			else if($confirm_pass == null){
				echo nl2br("<p align=center><font color=white face='arial' size='3pt'>Input Confirm Password. </font></p></font></p>");
				$checker=1;
			}
			else{
				if(!preg_match("@[0-9]@", $new_pass)){
		            echo nl2br("<p align=center><font color=white face='arial' size='3pt'>Password should contain at least 1 digit. </font></p>");
		            $checker=1;
		        }
		        if(!preg_match("@[A-Z]@", $new_pass)){
		            echo nl2br("<p align=center><font color=white face='arial' size='3pt'>Password should contain at least 1 uppercase. </font></p>");
		            $checker=1;
		        }
		        if(!preg_match("@[a-z]@", $new_pass)){
		            echo nl2br("<p align=center><font color=white face='arial' size='3pt'>Password should contain at least 1 lowercase. </font></p>");
		            $checker=1;
		        }
		        if(!preg_match("@[^\w]@", $new_pass)){
		            echo nl2br("<p align=center><font color=white face='arial' size='3pt'>Password should contain at least 1 special character. </font></p>");
		            $checker=1;
		        }
		        if(!preg_match("/.{8,}/", $new_pass)){
		            echo nl2br("<p align=center><font color=white face='arial' size='3pt'>Password should be at least 8 characters. </font></p>");
		            $checker=1;
        		}
        	}

        	if($checker==0){
        		if($new_pass == $confirm_pass){
				$changepass_event = "INSERT INTO event_log (event_id, activity, user_id, event_date, event_time) VALUES ('null', 'Changed Password', '$pass_id', '$cp_date', '$cp_codetime')";
				$insertstatement_event = mysqli_query($conn,$changepass_event);

				$updatepass = "UPDATE user SET u_password='$confirm_pass', u_confirmpassword='$confirm_pass' WHERE user_id='$pass_id'";
				$insertstatement_event = mysqli_query($conn,$updatepass);


				echo '<script type="text/javascript">'; 
				echo 'alert("Password Successfully Changed!");'; 
				echo 'window.location.href = "Index.php";';
				echo '</script>';
				}
				else{
				echo nl2br  ("<p align=center><font color=white face='arial' size='3pt'>Password didn't matched</font></p></font></p>");
				}
        	}
			
	}
 
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
				<td style="font-size:20px; color:white;">New Password:</td>
				<td><input type="text" name="new_password"  placeholder="Enter New Password"></td>
			</tr>
			<tr>
				<td style="font-size:20px; color:white;">Confirm Password:</td>
				<td><input type="text" name="confirm_password"  placeholder="Enter Confirm Password"></td>
			</tr>
		</table>

		<button class="buttonL btn button1"  name="verify" value="verify"  >Submit</button>
	</form>

</body>
</html>