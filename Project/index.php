
<?php 
    session_start();

    include('conn.php');

    if((empty($_SESSION['id']) && empty($_SESSION['token'])) && (empty($_COOKIE['id']) && empty($_COOKIE['token']))){
        if(isset($_POST['signin'])){
            $username = $_POST['login'];  
            $password = $_POST['password'];
        
            $username = stripcslashes($username);  
            $password = stripcslashes($password);  
            $username = mysqli_real_escape_string($con, $username);  
            $password = mysqli_real_escape_string($con, $password);
        
            $sql = "select * from student where email = '$username' and password = '$password' and verified_at IS NOT NULL";  
            $result = mysqli_query($con, $sql);  
            $row = mysqli_fetch_array($result);  
            $count = mysqli_num_rows($result);
        
            if($count == 1){
                if(!empty($_POST['rememberMe'])){
                    setcookie("id",$row['id'],time() + (86400 * 30), "/");
                    setcookie("token",$row['token'],time() + (86400 * 30), "/");
                }
                else{
                    $_SESSION["id"] = $row['id'];
                    $_SESSION["token"] = $row['token'];
                } 
                header("Location: Dashboard/");
                exit();   
                    
            }  
            else{  
                ?>
                <script>
                var div = document.getElementById('error');
                div.innerText += "Login failed. Invalid username or password";
                </script>
                <?php
            }
        }
    }
    else{
    if(!empty($_COOKIE['id']) && !empty($_COOKIE['token'])){
        $id = $_COOKIE['id'];
        $password = $_COOKIE['token'];

        $sql = "select * from student where id = '$id' and token = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            header("Location: Dashboard/");
            exit();
        }  
        else{  
            setcookie('id',$_COOKIE['id'],time() - (86400 * 30),'/');
            setcookie('token',$_COOKIE['token'],time() - (86400 * 30),'/');
        }
    }
    else{
        $username = $_SESSION['id'];
        $password = $_SESSION['token'];  
      
        $sql = "select * from student where id = '$username' and token = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            header("Location: Dashboard/");
            exit();
        }  
        else{  
            unset($_SESSION['id']);
            unset($_SESSION['token']);
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
	<link rel="stylesheet" href="lib/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/site.css" />
	<link rel="stylesheet" href="views/account/login.css" />
</head>
<body>
    <header class="container mt-5">
        <div class="flexC">
            <div class="flexB">
                <img src="icons/emA.svg" />
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
                            Nice to see you again!
                        </div>
                        <div class="mt-5">
                            <form method="POST" id="login-form">
                                <div class="boxForm form-group mt-5">
                                    <label for="login" class="labelForm ml-2"><abbr style="color:#ffffff">_</abbr> Login <abbr style="color:#ffffff">_</abbr></label>
                                    <input type="text" placeholder="Enter your e-mail or phone number" class="form-control" name="login" id="login">
                                </div>
                                <div class="boxForm form-group mt-5">
                                    <label for="password" class="labelForm ml-2"><abbr style="color:#ffffff">_</abbr> Password <abbr style="color:#ffffff">_</abbr></label>
                                    <div style="display:flex">
                                        <input type="password" placeholder="Enter your password" class="form-control" name="password" id="password">
                                        <img onclick="ShowPassword()" class="float-right mr-3" src="icons/showPassword.svg" />
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" name="rememberMe" id="rememberMe" />
                                            <label class="custom-control-label" for="rememberMe">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col" style="text-align:right">
                                        <a href="Account/ForgotPassword">Forgot password?</a>
                                    </div>
                                </div>
                                <div id="error">
                                </div>
                                <button type="submit" name="signin" id="signin" class="btn btn-primary btn-block mt-5">Sing in</button>
                            </form>
                        </div>
                    </div>
                    <div>
                        <div class="already mt-3">Dont have an account? <a href="Account/Register">Sign up now</a></div>
                    </div>
                </div>
                <img class="imgLine" src="img/line.svg" />
                <div class="col-xxl col-md-8 col-sm-7 mt-3">
                    <div>
                        <div class="title">
                            Easy Mektep
                        </div>
                        <div class="desc">
                            Education tracker, that helps to improve your skills
                        </div>

                    </div>
                    <div>

                        <img id="imgMan" src="img/Man.svg" />
                        <img id="imgWoman" src="img/Woman.svg" />
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

    function ShowPassword() {
        if (document.getElementById('password').type == 'password') {
            document.getElementById('password').type = 'text';
        }
        else {
            document.getElementById('password').type = 'password';
        }
    }
</script>