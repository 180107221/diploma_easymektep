<?php
include "conn.php";
if($_GET['key'] && $_GET['token']){
    $email = $_GET['key'];
    $token = $_GET['token'];
    $query = mysqli_query($con,"SELECT * FROM `student` WHERE `token`='".$token."' and `email`='".$email."';");
    $d = date('Y-m-d H:i:s');
    if (mysqli_num_rows($query) > 0) {
        $row= mysqli_fetch_array($query);
        if($row['verified_at'] == NULL){
            mysqli_query($con,"UPDATE student set verified_at ='" . $d . "' WHERE email='" . $email . "'");
            $msg = "Congratulations! Your email has been verified.";
            $msg .= "<div><a href='index.php'>Go to SignIn page</a></div>";
        }else{
            $msg = "You have already verified your account with us";
            $msg .= "<div><a href='index.php'>Go to SignIn page</a></div>";
        }
    } else {
        $msg = "This email has been not registered with us\n";
        $msg .= "<div><a href='reg.php'>Go to SignUp page</a></div>";
    }
}
else{
    $msg = "Danger! Your something goes to wrong.\n";
    $msg .= "<div><a href='index.php'>Go to SignIn page</a></div>";
} 
echo $msg; 
?>