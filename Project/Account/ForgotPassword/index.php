<?php 
include('../../conn.php');
if(isset($_POST['forget'])){
    $email = $_POST['email'];
    $mes = '';
    $res = mysqli_query($con,"SELECT * FROM `student` WHERE `email` = '$email'");
    if(mysqli_num_rows($res) > 0){
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
            $mes = '<div style="position: relative; top: 150px;"> Change password
                <div class="already mt-3">Already have an account? <a href="../Register">Sign up now</a></div></div>';
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
    <link rel="stylesheet" href="../../views/account/login.css" />
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
                <div class="col-xxl-3 col-md-4 col-sm-5 mt-5">
                    <div>
                        <div class="title1">
                            How would you like to get your security code?
                        </div>
                        <div class="mt-5">
                            <form method="POST" id="login-form" name="forget">
                                <div class="boxForm form-group mt-5">
                                    <label for="email" class="labelForm ml-2"><abbr style="color:#ffffff">_</abbr> E-mail <abbr style="color:#ffffff">_</abbr></label>
                                    <input type="email" placeholder="Enter your e-mail" class="form-control" name="email" id="email">
                                </div>
                                
                                <button type="submit" name="signin" id="signin" class="btn btn-primary btn-block mt-5">Send</button>
                            </form>
                        </div>
                    </div>
                        <div class="already mt-3">Dont have an account? <a href="../Register">Sign up now</a></div>
                </div>
                <img class="imgLine" src="../../img/line.svg" />
                <div class="col-xxl col-md-8 col-sm-7 mt-3">
                        <div class="title">
                            Easy Mektep
                        </div>
                        <div class="desc">
                            Education tracker, that helps to improve your skills
                        </div>

                    <div>

                        <img id="imgMan" src="../../img/Man.svg" />
                        <img id="imgWoman" src="../../img/Woman.svg" />
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

    
</script>