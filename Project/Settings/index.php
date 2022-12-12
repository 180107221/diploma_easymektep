<?php 
    session_start();

    include('../conn.php');

    if((empty($_SESSION['id']) && empty($_SESSION['token'])) && (empty($_COOKIE['id']) && empty($_COOKIE['token']))){
        header("Location: ../");
        exit();
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

            }  
            else{  
                header("Location: ../");
                exit();
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
            }  
            else{  
                header("Location: ../");
                exit();
            }
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Settings - EasyMektep</title>
    <link rel="stylesheet" href="../lib/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/site.css" />
    <link rel="stylesheet" href="../views/shared/layout.css" />
</head>
<body>
    <header>
        <div class="wrapper">
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion mt-3" id="accordionSidebar">
                <li class="nav-item">
                    <a class="nav-link" href="../Dashboard/">
                        <i>
                            <img class="mainIcon" src="../icons/em.svg" />
                        </i>
                    </a>
                </li>
                <li class="nav-item mt-3">
                        <a class="nav-link" href="../Dashboard/">
                            <i>
                                <img class="icons" src="../icons/dashboardIcon.svg" />
                            </i>
                        </a>
                </li>
                <li class="nav-item mt-3">
                        <a class="nav-link" href="../Projects/">
                            <i>
                                <img class="icons" src="../icons/projectsIcon.svg" />
                            </i>
                        </a>
                </li>
                <li class="nav-item mt-3">
                        <a class="nav-link" href="../Statistics/">
                            <i>
                                <img class="icons" src="../icons/statisticsIcon.svg" />
                            </i>
                        </a>
                </li>
                <li class="nav-item mt-3">
                        <a class="nav-link" href="../Timer/">
                            <i>
                                <img class="icons" src="../icons/timerIcon.svg" />
                            </i>
                        </a>
                </li>
                <li class="nav-item mt-3">
                        <a class="nav-link" href="../Settings/">
                            <i>
                                <img class="icons" src="../icons/settings_futureActive.svg" />
                            </i>
                        </a>
                </li>
                <li style="margin-top: 300%;" class="nav-item">
                   
                        <a class="nav-link" href="../Exit/">
                                <i>
                                    <img style="width:45%" class="icons" src="../icons/logoutMain.svg" />
                                </i>
                        </a>
                </li>
            </ul>
        </div>
        <div class="wrapperMobile col-9" id="mobileWrapper" style="display:none">
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion ml-3" id="accordionSidebar">                
                <li class="nav-item mt-3">
                <a class="nav-link" href="../Dashboard/">
                    <i class="iconsMobile">
                        <img src="../icons/dashboardIcon.svg" />
                        Dashboard
                    </i>
                </a>
                </li>
                <li class="nav-item mt-3">
                <a class="nav-link" href="../Projects/">
                    <i class="iconsMobile">
                        <img src="../icons/dashboardIcon.svg" />
                        Projects
                    </i>
                    
                </a>
                </li>
                <li class="nav-item mt-3">
                <a class="nav-link" href="../Statistics/">
                    <i class="iconsMobile">
                        <img src="../icons/dashboardIcon.svg" />
                        Statistics
                    </i>
                    
                </a>
                </li>
                <li class="nav-item mt-3">
                <a class="nav-link" href="../Timer/">
                    <i class="iconsMobile">
                        <img src="../icons/dashboardIcon.svg" />
                        Timer
                    </i>
                    
                </a>
                </li>
                <li class="nav-item mt-3">
                        <a class="nav-link" href="../Settings/">
                            <i class="iconsMobileActive">
                                <img src="../icons/dashboardIcon.svg" />
                                Settings
                            </i>

                        </a>
                </li>
            </ul>
            <div class="logout ml-3">
                <img src="../icons/logout.svg" />
                Log out
            </div>
        </div>
        <div class="cover" onclick="hideWrapper()" id="cover" style="display:none">

        </div>
    </header>
    <section>
        <div class="container">
            <main role="main" class="pb-3">
                <div  class="mb-3 mt-3" style="display:flex">
                    <div class="col" style="padding-left:0px;">
                        <p class="title">Settings</p>
                    </div>
                    <div class="float-right" style="display:flex;">
                        <div class="mr-2">
                            <img class="headImg" src="../icons/notif.svg" />
                        </div>
                        <div class="listHead mr-2">
                            <img onclick="showWrapper()" class="headImg" src="../icons/list.svg" />
                        </div>
                        <div class="mr-2">
                            <img class="headImg" src="../persons/2.svg" />
                        </div>
                        <div class="user align-self-center mr-2">
                            Betty Cooper
                        </div>
                        <div class="mr-2 align-self-center">
                            <div class="dropdown show">
                                <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="../icons/arrow.svg" />
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <head>
    <link rel="stylesheet" href="../views/setting/index.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
</head>
    <div style="display:none" id="successAlert" class="successAlert">
        <div class="container">
            <div class="row" style="display:flex">
                <div class="col" style="display:flex; font-weight: 500; font-size: 14px;">
                    <img src="../icons/success.svg" />
                    <div class="col align-self-center">
                        Personal data successfully
                    </div>
                </div>
                <div class="col">
                    <a style="text-decoration: underline; font-weight: 400; font-size: 14px; color: white" class="float-right" href="../Dashboard/">Return to profile page</a>
                </div>
            </div>
        </div>
    </div>
<div style="display:flex">
    <div class="col-2 mr-5" style="padding-left:0px;">
        <div style="display:flex; cursor:pointer">
            <div style="padding-left: 0px;" class="col-1"><img src="../icons/personal.svg" /></div>
            <div onclick="location.href='../Settings/?key=PersonalData'" style="padding-left: 10px; font-weight: 600; font-size: 16px; color: #6B408C;" class="col">Personal data</div>
        </div>
        <div onclick="location.href='../Settings/?key=PrivatePolicy'"  style="cursor: pointer;font-size: 14px; color: #939DA8;" class="mt-3">Privacy policy</div>
        <div onclick="location.href='../Settings/?key=ChangePassword'"  style="cursor: pointer;font-size: 14px; color: #939DA8;" class="mt-3">Change password</div>
    </div>
    <div id="personPhoto" class="col-1 mr-5">
        <div>
            <img style="height: auto;width: 100%; border-radius: 100px;" src="../persons/2.svg" />
        </div>
    </div>
    <div id="personInfo" class="col-6">
        <?php 
            if(isset($_GET['key']) && $_GET['key'] == 'ChangePassword'){
                ?>
        <div style="font-weight: 500; font-size: 16px; color:#222222">Personal data</div>
        <div style="font-weight: 400; font-size: 14px; color: #676565;" class="mt-3">Your data is only visible to you</div>
        <div class="mt-3">
            <div class="row">
                <div id="oldBox" class="boxForm col mt-3 mr-4">
                    <label class="labelForm"><abbr style="color:#ffffff">_</abbr>Old password  <img id="oldError" style="display:none" src="/icons/error.svg" />  <abbr style="color:#ffffff">_</abbr></label>
                    <input id="old" type="password" class="form-control mt-2" />
                </div>
                <div class="col mt-3"></div>
            </div>
            <div class="row">
                <div id="newBox" class="boxForm col mt-3 mr-4">
                    <label class="labelForm"><abbr style="color:#ffffff">_</abbr>New password <img id="newError" style="display:none" src="/icons/error.svg" />  <abbr style="color:#ffffff">_</abbr></label>
                    <input id="new" type="password" class="form-control mt-2" />
                </div>
                <div class="col mt-3"></div>
            </div>
            <div class="row">
                <div id="repeatBox" class="boxForm col mt-3 mr-4">
                    <label class="labelForm"><abbr style="color:#ffffff">_</abbr>Repeat new password <img id="repeatError" style="display:none" src="/icons/error.svg" />  <abbr style="color:#ffffff">_</abbr></label>
                    <input id="repeat" type="password" class="form-control mt-2" />
                </div>
                <div class="col mt-3"></div>
            </div>
        </div>
        <div class="row">
                <div class="col-7 mt-3" style="padding-left: 0px; padding-right: 0px;">
                    <input onclick="Save()" type="button" class="btn btn-light btn-block" value="Save changes" />
                </div>
            </div>
        <?php
            }
            if(isset($_GET['key']) && $_GET['key'] == 'PrivacyPolicy'){

            }
            if(isset($_GET['key']) && $_GET['key'] == 'PersonalData'){
        ?>
        <div style="font-weight: 500; font-size: 16px; color:#222222">Personal data</div>
        <div style="font-weight: 400; font-size: 14px; color: #676565;" class="mt-3">Your data is only visible to you</div>
        <div class="mt-3">
            <div class="row">
                <div id="nameBox" class="boxForm col mt-3 mr-4">
                    <label class="labelForm"><abbr style="color:#ffffff">_</abbr>First name  <img id="nameError" style="display:none" src="../icons/error.svg" />  <abbr style="color:#ffffff">_</abbr></label>
                    <input id="firstName" class="form-control mt-2" name="name" value="Betty" />
                </div>
                <div id="surnameBox" class="boxForm col mt-3">
                    <label class="labelForm"><abbr style="color:#ffffff">_</abbr>Second name <img id="surnameError" style="display:none" src="../icons/error.svg" />  <abbr style="color:#ffffff">_</abbr></label>
                    <input id="secondName" class="form-control mt-2" name="surname" value="Cooper" />
                </div>
            </div>
            <div class="row">
                <div id="emailBox" class="boxForm col mt-3 mr-4">
                    <label class="labelForm"><abbr style="color:#ffffff">_</abbr>E-mail <img id="emailError" style="display:none" src="../icons/error.svg" />  <abbr style="color:#ffffff">_</abbr></label>
                    <input id="email" class="form-control mt-2" name="email" value="bettycooper@gmail.com" />
                </div>
                <div id="birthDayBox" class="boxForm col mt-3">
                    <label class="labelForm"><abbr style="color:#ffffff">_</abbr>Birth day <img id="birthDayError" style="display:none" src="../icons/error.svg" />  <abbr style="color:#ffffff">_</abbr></label>
                    <input id="birthDay" type="date" name="birthDay"  class="form-control mt-2" value="1996-02-02" />
                </div>
            </div>
            <div class="row">   
                <div id="radioBox" class="boxFormRadio col-7 mt-3 mr-4">
                    <label class="labelForm"><abbr style="color:#ffffff">_</abbr> I am <img id="radioError" style="display:none" src="../icons/error.svg" />   <abbr style="color:#ffffff">_</abbr> </label>
                    <div style="white-space:nowrap" class="row mt-3 mb-2 ml-1 mr-1">
                        <div class="col">
                            <input checked type="radio" name="radio" class="form-check-input" id="woman">
                            <label class="form-check-label" for="woman">Woman</label>
                        </div>
                        <div class="col">
                            <input  type="radio" name="radio" class="form-check-input" id="man">
                            <label class="form-check-label" for="man">Man</label>
                        </div>
                        <div class="col">
                            <input  type="radio" name="radio" class="form-check-input" id="notSay">
                            <label class="form-check-label" for="notSay"><nobr>Prefer to not say</nobr></label>
                        </div>
                    </div>
                </div>
                <div id="tempForPC" class="col mt-3"></div>
            </div>
            <div class="row">
                <div class="col-7 mt-3" style="padding-left: 0px; padding-right: 0px;">
                    <input onclick="Save()" type="button" class="btn btn-light btn-block" value="Save changes" />
                </div>
            </div>
            <?php }
            ?>

        </div>
    </div>

</div>
            </main>
        </div>
    </section>

    <script src="../lib/jquery/dist/jquery.min.js"></script>
    <script src="../lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/site.js?v=4q1jwFhaPaZgr8WAUSrux6hAuh0XDg9kPS3xIVq36I0"></script>
    <script>
        var oldWidth = window.innerWidth;
        window.onresize = function () {
            var newWidth = window.innerWidth;
            if (newWidth != oldWidth) {
                oldWidth = newWidth;
                location.reload();
            }
        };
        function showWrapper() {
            document.getElementById('mobileWrapper').style.display = '';
            document.getElementById('cover').style.display = '';
        }
        function hideWrapper() {
            document.getElementById('mobileWrapper').style.display = 'none';
            document.getElementById('cover').style.display = 'none';
        }
    </script>
    
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            if (window.matchMedia("(max-width: 1279px)").matches) {
                document.getElementById('tempForPC').style.display = 'none';
                document.getElementById('personPhoto').style.display = 'none';
                document.getElementById('personInfo').className = 'col';
            }
        });
        function Save() {
            let i = 0;
            if (document.getElementById("firstName").value == "") {
                i++;
                document.getElementById("nameBox").className = 'labelFormError col mt-3 mr-4';
                document.getElementById("nameError").style.display = "";
            }
            else {
                document.getElementById("nameBox").className = 'boxForm col mt-3 mr-4';
                document.getElementById("nameError").style.display = "none";
            }
            if (document.getElementById("secondName").value == "") {
                i++;
                document.getElementById("surnameBox").className = 'labelFormError col mt-3';
                document.getElementById("surnameError").style.display = "";
            }
            else {
                document.getElementById("surnameBox").className = 'boxForm col mt-3';
                document.getElementById("surnameError").style.display = "none";
            }
            if (document.getElementById("email").value == "") {
                i++;
                document.getElementById("emailBox").className = 'labelFormError col mt-3 mr-4';
                document.getElementById("emailError").style.display = "";
            }
            else {
                document.getElementById("emailBox").className = 'boxForm col mt-3 mr-4';
                document.getElementById("emailError").style.display = "none";
            }
            if (document.getElementById("birthDay").value == "") {
                i++;
                document.getElementById("birthDayBox").className = 'labelFormError col mt-3';
                document.getElementById("birthDayError").style.display = "";
            }
            else {
                document.getElementById("birthDayBox").className = 'boxForm col mt-3';
                document.getElementById("birthDayError").style.display = "none";
            }
            if (!document.getElementById('woman').checked && !document.getElementById('man').checked && !document.getElementById('notSay').checked) {
                i++;
                document.getElementById("radioBox").className = 'boxFormRadioError col-7 mt-3 mr-4';
                document.getElementById("radioError").style.display = "";
            }
            else {
                document.getElementById("radioBox").className = 'boxFormRadio col-7 mt-3 mr-4';
                document.getElementById("radioError").style.display = "none";
            }
            if (i == 0) {
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
                    url: "../Settings/Change",
                    data: {
                        Name: name,
                        Surname: surname,
                        Email: email,
                        BirthDay: birthDay,
                        Gender: gender
                    },

                    success: function (data) {
                        document.getElementById('successAlert').style.display = '';
                    }
                });
            }
        }
    </script>

</body>
</html>