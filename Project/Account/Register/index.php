<?php 
    include('../../conn.php');
    $error_password = '';
    $error_email = '';
    $mes = '';
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
                
            }
            else if($password != $passwordAgain){
                $error_password = 'Passwords do not match';
            }
            else{
                if(mysqli_num_rows($res) > 0){
                    $error_email = 'An account with this mail has already been created';
                }
                else{
                    mysqli_query($con,"INSERT INTO `student`(`name`,`surname`,`email`,`password`,`birth_date`,`gender`,`token`) VALUES('$name','$surname','$email','$password','$date','$gender','$token')");

                    
                    $to = $email;
                    $subject = "Verification link";
         
                    $message = "<b>Welcome to our platform</b>";
                    $message .= "<h1>Click and Verify your email</h1>";
                    $message .= "<a href='http://localhost/EasyMektep/Account/VerifyEmail/?key=".$email."&token=".$token."'>Verificate your account</a>";
         
                    $header = "From: 180107221@stu.sdu.edu.kz \r\n";
                    $header .= "MIME-Version: 1.0 \r\n";
                    $header .= "Content-type: text/html\r\n";
         
                    $retval = mail ($to,$subject,$message,$header);
         
                    if( $retval == true ) {
                        $mes = '<div style="position: absolute; top: 150px;"> Verifate your account <a href=https://gmail.com>Go to Gmail</a> 
                            <div class="already mt-3">Already have an account? <a href="../../">Sign in now</a></div></div>';
                    }
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>EasyMektep</title>
	<link rel="stylesheet" href="../../lib/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../../css/site.css" />
	<link rel="stylesheet" href="../../views/account/register.css" />
</head>
<body>
    <header class="container mt-5">
        <div class="flexC">
            <div class="flexB">
                <img src="../../icons/emA.svg" />
            </div>
            <div class="flexB ml-3">
                <div class="title2 row">
                    EASY MEKTEP
                </div>
                <div class="desc2 row">
                    Easy education tracking
                </div>
            </div>
        </div>
    </header>
    <section>
        <div class="container">
            <div class="row">
                <form class="col-xxl-3 col-md-4 col-sm-5" name="Reg" method="POST">
                    <?php 
                    if($mes != ''){
                        echo $mes;
                    }
                    else{
                        ?>
                        <div id="mainStep" class="mt-5">
                        <div class="flexC">
                            <div class="flexB">
                                <div>
                                    <img src="../../icons/ellipseActive.svg" />
                                </div>
                            </div>
                            <div class="flexB ml-3">
                                <img src="../../icons/ellipse2.svg" />
                            </div>
                        </div>
                        <div style="font-weight: 500; font-size: 14px; color: #493BAC">
                            Step 1
                        </div>
                    </div>
                    <div id="passStep" style="display:none" class="mt-5">
                        <div class="flexC">
                            <div class="flexB">
                                <div>
                                    <img src="../../icons/ellipse1.svg" />
                                </div>
                            </div>
                            <div class="flexB ml-3">
                                <img src="../../icons/ellipseActive.svg" />
                            </div>
                        </div>
                        <div class="ml-5" style="font-weight: 500; font-size: 14px; color: #493BAC">
                            Step 2
                        </div>
                    </div>
                    <div id="main" class="mt-3">
                        <div class="title1">
                            Personal information
                        </div>
                        <div class="desc1">
                            Enter your personal information details to continue the registration
                        </div>
                        <div class="mt-5">
                                <div id="nameBox" class="boxForm form-group">
                                    <label for="firstName" class="labelForm ml-2"><abbr style="color:#ffffff">_</abbr> First name <img id="nameError" style="display:none" src="../../icons/error.svg" />  <abbr style="color:#ffffff">_</abbr></label>
                                    <input required type="text" placeholder="Enter your first name" class="form-control" id="firstName" name="firstName">
                                </div>
                                <div id="surnameBox" class="boxForm form-group mt-5">
                                    <label for="secondName" class="labelForm ml-2"><abbr style="color:#ffffff">_</abbr> Second name <img id="surnameError" style="display:none" src="../../icons/error.svg" />  <abbr style="color:#ffffff">_</abbr></label>
                                    <input required type="text" placeholder="Enter your second name" class="form-control" id="secondName" name="lastName">
                                </div>
                                <div id="emailBox" class="boxForm form-group mt-5">
                                    <label for="email" class="labelForm ml-2"><abbr style="color:#ffffff">_</abbr> E-mail <img id="emailError" style="display:none" src="../../icons/error.svg" />  <abbr style="color:#ffffff">_</abbr></label>
                                    <input required type="email" placeholder="Enter your e-mail" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                                </div>
                                <div id="birthDayBox" class="boxForm form-group mt-5">
                                    <label for="birthDay" class="labelForm ml-2"><abbr style="color:#ffffff">_</abbr> Birth day <img id="birthDayError" style="display:none" src="../../icons/error.svg" />  <abbr style="color:#ffffff">_</abbr></label>
                                    <input required type="text" onfocus="(this.type='date')" placeholder="Enter your birth day" class="form-control" id="birthDay" name="date">
                                </div>
                                <div id="radioBox" class="boxFormRadio form-group form-check mt-5">
                                    <label class="labelForm"><abbr style="color:#ffffff">_</abbr> I am <img id="radioError" style="display:none" src="../../icons/error.svg" />  <abbr style="color:#ffffff">_</abbr> </label>
                                    <div class="row mt-3 mb-2 ml-1 mr-1">
                                        <div class="col">
                                            <input type="radio" name="gender" class="form-check-input" id="woman" >
                                            <label class="form-check-label" for="woman">Woman</label>
                                        </div>
                                        <div class="col">
                                            <input type="radio" name="gender" class="form-check-input" id="man">
                                            <label class="form-check-label" for="man">Man</label>
                                        </div>
                                        <div class="col">
                                            <input type="radio" name="gender" class="form-check-input" id="notSay">
                                            <label class="form-check-label" for="notSay"><nobr>Prefer to not say</nobr></label>
                                        </div>
                                    </div>


                                </div>
                                <button onclick="Next()" type="button" class="btn btn-primary btn-block mt-5">Next</button>
                        </div>
                    </div>
                    <div id="pass" style="display:none">
                        <div class="title1">
                            Create password
                        </div>
                        <div class="desc1">
                            Create a password that has 8 symbols mininum
                        </div>
                        <div class="mt-5">
                            <div id="labelPassword"  class="boxForm form-group mt-5">
                                <label for="password"class="labelForm ml-2"><abbr style="color:#ffffff">_</abbr> Password <img id="passError" style="display:none" src="../../icons/error.svg" /> <abbr style="color:#ffffff">_</abbr></label>
                                <input type="password" placeholder="Enter password" class="form-control" id="password" name="password">
                            </div>
                            <div id="labelRePassword" boxForm class="boxForm form-group mt-5">
                                <label for="repassword"  class="labelForm ml-2"><abbr style="color:#ffffff">_</abbr> Reapet password <img id="rePassError" style="display:none" src="../../icons/error.svg" /> <abbr style="color:#ffffff">_</abbr></label>
                                <input type="password" placeholder="Enter password again" class="form-control" id="repassword" name="passwordAgain">
                            </div>
                            <div id="errorPass" style="display:none" class="errorPass mt-5">
                                Passwords do not match
                            </div>
                            <button onclick="Register()" class="btn btn-primary btn-block mt-5" name="Reg">Done</button>
                        </div>
                    </div>
                    <div class="already mt-3">Already have an account? <a href="../../">Sign in now</a></div>
                    <?php
                    }
                    ?>
                </form>
                <img class="imgLine" src="../../img/line.svg" />
                <div class="col-xxl col-md-8 col-sm-7 mt-3">
                        <div class="title">
                            Easy Mektep
                        </div>
                        <div class="desc">
                            Education tracker, that helps to improve your skills
                        </div>
                        <div>
                            <img id="imgRegister" src="../../img/Notebook.svg" />
                        </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="tac mt-5 mb-1">
        <div class="container">
            by clicking submit you agree to the Terms and Conditions
        </div>
    </footer>
</body>
</html>
    <script type="text/javascript" src="code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript">

        function Next() {
            let i = 0;
            if (document.getElementById("firstName").value == "") {
                i++;
                document.getElementById("nameBox").className = 'labelFormError form-group mt-5';
                document.getElementById("nameError").style.display = "";
            }
            else {
                document.getElementById("nameBox").className = 'boxForm form-group mt-5';
                document.getElementById("nameError").style.display = "none";
            }
            if (document.getElementById("secondName").value == "") {
                i++;
                document.getElementById("surnameBox").className = 'labelFormError form-group mt-5';
                document.getElementById("surnameError").style.display = "";
            }
            else {
                document.getElementById("surnameBox").className = 'boxForm form-group mt-5';
                document.getElementById("surnameError").style.display = "none";
            }
            if (document.getElementById("email").value == "") {
                i++;
                document.getElementById("emailBox").className = 'labelFormError form-group mt-5';
                document.getElementById("emailError").style.display = "";
            }
            else {
                document.getElementById("emailBox").className = 'boxForm form-group mt-5';
                document.getElementById("emailError").style.display = "none";
            }
            if (document.getElementById("birthDay").value == "") {
                i++;
                document.getElementById("birthDayBox").className = 'labelFormError form-group mt-5';
                document.getElementById("birthDayError").style.display = "";
            }
            else {
                document.getElementById("birthDayBox").className = 'boxForm form-group mt-5';
                document.getElementById("birthDayError").style.display = "none";
            }
            if (!document.getElementById('woman').checked && !document.getElementById('man').checked && !document.getElementById('notSay').checked) {
                i++;
                document.getElementById("radioBox").className = 'boxFormRadioError form-group mt-5';
                document.getElementById("radioError").style.display = "";
            }
            else {
                document.getElementById("radioBox").className = 'boxFormRadio form-group mt-5';
                document.getElementById("radioError").style.display = "none";
            }
            if (i == 0) {
                document.getElementById("mainStep").style.display = "none";
                document.getElementById("main").style.display = "none";
                document.getElementById("passStep").style.display = "";
                document.getElementById("pass").style.display = "";
            }
        }
        function Register() {
            let password = document.getElementById("password").value;
            let repassword = document.getElementById("repassword").value;
            if (password == "") {
                document.getElementById("labelRePassword").className = 'labelFormError form-group mt-5';
                document.getElementById("labelPassword").className = 'labelFormError form-group mt-5';
                document.getElementById("passError").style.display = "";
                document.getElementById("rePassError").style.display = "";
            }
            else {
                if (password != repassword) {
                    document.getElementById("labelRePassword").className = 'labelFormError form-group mt-5';
                    document.getElementById("labelPassword").className = 'labelFormError form-group mt-5';
                    document.getElementById("passError").style.display = "";
                    document.getElementById("rePassError").style.display = "";
                    document.getElementById("errorPass").style.display = "";
                }
                else {
                    document.getElementById("labelRePassword").className = 'boxForm form-group mt-5';
                    document.getElementById("labelPassword").className = 'boxForm form-group mt-5';
                    document.getElementById("passError").style.display = "none";
                    document.getElementById("rePassError").style.display = "none";
                    document.getElementById("errorPass").style.display = "none";

                    let name = document.getElementById("firstName").value;
                    let surname = document.getElementById("secondName").value;
                    let email = document.getElementById("email").value;
                    let birthDay = document.getElementById("birthDay").value;
                    let gender = 0;
                    if (document.getElementById('woman').checked) {
                        gender = 1;
                    } else if (document.getElementById('man').checked) {
                        gender = 2;
                    }
                    else {
                        gender = 3;
                    }

                    $.ajax({
                        type: "POST",
                        url: "register.php",
                        data: {
                            Name: name,
                            Surname: surname,
                            Email: email,
                            BirthDay: birthDay,
                            Gender: gender,
                            Password: password
                        },

                        success: function (data) {
                            location.href = "login.php"
                        }
                    });
                }
            }
        }
    </script>