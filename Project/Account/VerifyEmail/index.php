<?php
    include('../../conn.php');
    $ver = '';
    if(isset($_GET['key']) && isset($_GET['token'])){
        $email = $_GET['key'];
        $token = $_GET['token'];
        $query = mysqli_query($con,"SELECT * FROM `student` WHERE `token`='".$token."' and `email`='".$email."';");
        $d = date('Y-m-d H:i:s');
        if (mysqli_num_rows($query) > 0) {
            $row= mysqli_fetch_array($query);
            if($row['verified_at'] == NULL){
                mysqli_query($con,"UPDATE student set verified_at ='" . $d . "' WHERE email='" . $email . "'");
                $ver = "<div style='position: absolute; top: 150px;'>Congratulations! Your email has been verified.";
                $ver .= "<div><a href='../../'>Go to SignIn page</a></div></div>";
            }else{
                $ver = "<div style='position: absolute; top: 150px;'>You have already verified your account with us";
                $ver .= "<div><a href='../../'>Go to SignIn page</a></div></div>";
            }
        } else {
            $ver = "<div style='position: absolute; top: 150px;'>This email has been not registered with us\n";
            $ver .= "<div><a href='../Register/'>Go to SignUp page</a></div></div>";
        }
    }
    else{
        $ver = "<div style='position: absolute; top: 150px;'>If you want to register to our site click this link\n";
        $ver .= "<div><a href='../Register/'>Go to SignUp page</a></div></div>";
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
                    <div>
                        <?php echo $ver; ?>
                    </div>
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