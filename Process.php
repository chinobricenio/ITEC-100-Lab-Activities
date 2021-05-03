<?php
include_once 'Database.php';


if(isset($_POST['signup']))
{  
    $user = $_POST["username"];
    $pass  = $_POST["password"];
    $cpass  = $_POST["confirmpassword"];
    $email   = $_POST["email"];
    $passOne = $pass;
    $checker = 0;


    $userresult = mysqli_query($conn,"SELECT * FROM `user` WHERE u_username='$user'");
    $userresult = mysqli_fetch_assoc($userresult);  


    $emailresult = mysqli_query($conn,"SELECT * FROM `user` WHERE u_email='$email'");
    $emailresult = mysqli_fetch_assoc($emailresult);
    

    // checks username

    if($user==null){
            echo nl2br("<p align=center><font color=white face='arial' size='3pt'>Username is required. </font></p></font></p>");
            $checker=1;
    }
    else if (!$userresult) {                                // check if user exists in the database

        if (!preg_match("/^[a-z0-9A-Z@_.']*$/",$user)){
            echo nl2br("<p align=center><font color=white face='arial' size='3pt'>Other special characters are not allowed. </font></p>");
            $checker=1;
        }
        
       

    }
    else if  ($userresult['username'] != null) {
        echo nl2br("<p align=center><font color=white face='arial' size='3pt'>Username already exists.</font></p>");
        $checker = 1;
    }

    // checks email address

    if($email==null){
        echo nl2br("<p align=center><font color=white face='arial' size='3pt'>Email address is required. </font></p>");
        $checker = 1;
    }
    else if (!$emailresult) {                               // check if email address exists in the database

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo nl2br("<p align=center><font color=white face='arial' size='3pt'>Invalid e-mail format. </font></p>");
                 $checker=1;
        }

           
    }

     

    else if  ($emailresult['email'] != null) {
        echo nl2br("<p align=center><font color=white face='arial' size='3pt'>Email address already exists. </font></p>");
        $checker = 1;
    } 

       
    // checks password

    if ($pass==null){
        echo nl2br("<p align=center><font color=white face='arial' size='3pt'>Password field should not be blank. </font></p>");
        $checker=1;
    }
    
    else if ($cpass==null){
        echo nl2br("<p align=center><font color=white face='arial' size='3pt'>Confirm Password Field should not be blank. </font></p>");
        $checker=1;
    }
    
    else if ($pass != $cpass){
        echo ("<p align=center><font color=white face='arial' size='3pt'>Password didn't match. </font></p>");
        $checker=1;
    }

    else{
        if(!preg_match("@[0-9]@", $passOne)){
            echo nl2br("<p align=center><font color=white face='arial' size='3pt'>Password should contain at least 1 digit. </font></p>");
            $checker=1;
        }
        if(!preg_match("@[A-Z]@", $passOne)){
            echo nl2br("<p align=center><font color=white face='arial' size='3pt'>Password should contain at least 1 uppercase. </font></p>");
            $checker=1;
        }
        if(!preg_match("@[a-z]@", $passOne)){
            echo nl2br("<p align=center><font color=white face='arial' size='3pt'>Password should contain at least 1 lowercase. </font></p>");
            $checker=1;
        }
        if(!preg_match("@[^\w]@", $passOne)){
            echo nl2br("<p align=center><font color=white face='arial' size='3pt'>Password should contain at least 1 special character. </font></p>");
            $checker=1;
        }
        if(!preg_match("/.{8,}/", $passOne)){
            echo nl2br("<p align=center><font color=white face='arial' size='3pt'>Password should be at least 8 characters. </font></p>");
            $checker=1;
        }
    }
    

    // insert data to table in no error exists

    if($checker==0){
       
        $sqls = "INSERT INTO user (u_username,u_password,u_confirmpassword,u_email)
                VALUES ('$user','$pass','$cpass','$email')";


        if (mysqli_query($conn, $sqls)){
           
          echo  "<script>alert('Registration completed Successfully!')</script>";

        }
        else{
            echo "Error: " . $sqls . "
            " . mysqli_error($conn);
        }
    
    mysqli_close($conn);
    }
    
}
?>
