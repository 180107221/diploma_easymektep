<?php 
    include('conn.php');
    if(isset($_POST['Reg'])){
        $name = $_POST['firstName'];
        $surname = $_POST['lastName'];
        $date = $_POST['date'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordAgain = $_POST['passwordAgain'];
        $gender = $_POST['gender'];
        $token = md5($email).rand(10,9999);
        $res = mysqli_query($con,"SELECT * FROM `student` WHERE `email` = '$email'");
        if($name == "" || $surname == "" || $email == "" || $password == "" || $passwordAgain == "" || $gender == ""){
            echo '<script type="text/javascript">alert("Fill in the entire field!")</script>';
        }
        else{
            if(!preg_match('/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/',$email)){
                echo '<script type="text/javascript">alert("Invalid account format");</script>';
            }
            else if($password != $passwordAgain){
                echo '<script type="text/javascript">alert("Passwords do not match!")</script>';
            }
            else{
                if(mysqli_num_rows($res) > 0){
                    echo '<script type="text/javascript">alert("An account with this mail has already been created!");return false;</script>';
                }
                else{
                    mysqli_query($con,"INSERT INTO `student`(`name`,`surname`,`email`,`password`,`birth_date`,`gender`,`token`) VALUES('$name','$surname','$email','$password','$date','$gender','$token')");

                    
                    $to = $email;
                    $subject = "Verification link";
         
                    $message = "<b>Welcome to our platform</b>";
                    $message .= "<h1>Click and Verify your email</h1>";
                    $message .= "<a href='http://localhost/diploma/login/verify-email.php?key=".$email."&token=".$token."'>Click link</a>";
         
                    $header = "From:magzhankozhakhmet@gmail.com \r\n";
                    $header .= "MIME-Version: 1.0\r\n";
                    $header .= "Content-type: text/html\r\n";
         
                    $retval = mail ($to,$subject,$message,$header);
         
                    if( $retval == true ) {
                        echo "<h1>Message sent successfully... Verify your account</h1>";
                        echo "<a href='index.php'>Go to SignIn page</a>";
                    }else {
                        echo "<h1>Message could not be sent...</h1>";
                        echo "<a href='reg.php'>Try again on SignUp page</a>";
                    }
                }
            }
        }
    }
?>
