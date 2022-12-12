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
    <title>Timer - EasyMektep</title>
    <link rel="stylesheet" href="../lib/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/site.css" />
    <link rel="stylesheet" href="../views/shared/layout.css" />
    <link rel="stylesheet" href="../views/timer/index.css" />
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
                                <img class="icons" src="../icons/timerIconActive.svg" />
                            </i>
                        </a>
                </li>
                <li class="nav-item mt-3">
                        <a class="nav-link" href="../Settings/">
                            <i>
                                <img class="icons" src="../icons/settings_future.svg" />
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
                        <i class="iconsMobileActive">
                            <img src="../icons/dashboardIcon.svg" />
                            Timer
                        </i>
                        
                    </a>
                </li>
                <li class="nav-item mt-3">
                        <a class="nav-link" href="../Settings/">
                            <i class="iconsMobile">
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
                        <p class="title">Timer</p>
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
    <link rel="stylesheet" href="../views/timer/index.css" />
</head>
<div class="cover" onclick="hideWrapper()" id="cover" style="display:none">

</div>
<div class="timerDesktop">
    <div id="setTimer" style="display:none">
        <div onclick="closeSetTimer()" class="closeBtnImg float-right">
            <img src="../icons/closeButton.svg" />
        </div>
        <div class="set mt-5">
            <div class="text-center" style="padding-top: 10%; display: flex">
                <div class="col">
                    <div class="setTick" id="setHour">0</div>
                    <div class="nameTick">hrs</div>
                    <div class="scroll">
                            <div onclick="setTickHour(1)" class="tickS">1</div>
                            <div onclick="setTickHour(2)" class="tickS">2</div>
                            <div onclick="setTickHour(3)" class="tickS">3</div>
                            <div onclick="setTickHour(4)" class="tickS">4</div>
                            <div onclick="setTickHour(5)" class="tickS">5</div>
                            <div onclick="setTickHour(6)" class="tickS">6</div>
                            <div onclick="setTickHour(7)" class="tickS">7</div>
                            <div onclick="setTickHour(8)" class="tickS">8</div>
                            <div onclick="setTickHour(9)" class="tickS">9</div>
                            <div onclick="setTickHour(10)" class="tickS">10</div>
                    </div>
                </div>
                <div class="col">
                    <div class="setTick" id="setMin">0</div>
                    <div class="nameTick">min</div>
                    <div class="scroll">
                            <div onclick="setTickMin(1)" class="tickS">1</div>
                            <div onclick="setTickMin(2)" class="tickS">2</div>
                            <div onclick="setTickMin(3)" class="tickS">3</div>
                            <div onclick="setTickMin(4)" class="tickS">4</div>
                            <div onclick="setTickMin(5)" class="tickS">5</div>
                            <div onclick="setTickMin(6)" class="tickS">6</div>
                            <div onclick="setTickMin(7)" class="tickS">7</div>
                            <div onclick="setTickMin(8)" class="tickS">8</div>
                            <div onclick="setTickMin(9)" class="tickS">9</div>
                            <div onclick="setTickMin(10)" class="tickS">10</div>
                            <div onclick="setTickMin(11)" class="tickS">11</div>
                            <div onclick="setTickMin(12)" class="tickS">12</div>
                            <div onclick="setTickMin(13)" class="tickS">13</div>
                            <div onclick="setTickMin(14)" class="tickS">14</div>
                            <div onclick="setTickMin(15)" class="tickS">15</div>
                            <div onclick="setTickMin(16)" class="tickS">16</div>
                            <div onclick="setTickMin(17)" class="tickS">17</div>
                            <div onclick="setTickMin(18)" class="tickS">18</div>
                            <div onclick="setTickMin(19)" class="tickS">19</div>
                            <div onclick="setTickMin(20)" class="tickS">20</div>
                            <div onclick="setTickMin(21)" class="tickS">21</div>
                            <div onclick="setTickMin(22)" class="tickS">22</div>
                            <div onclick="setTickMin(23)" class="tickS">23</div>
                            <div onclick="setTickMin(24)" class="tickS">24</div>
                            <div onclick="setTickMin(25)" class="tickS">25</div>
                            <div onclick="setTickMin(26)" class="tickS">26</div>
                            <div onclick="setTickMin(27)" class="tickS">27</div>
                            <div onclick="setTickMin(28)" class="tickS">28</div>
                            <div onclick="setTickMin(29)" class="tickS">29</div>
                            <div onclick="setTickMin(30)" class="tickS">30</div>
                            <div onclick="setTickMin(31)" class="tickS">31</div>
                            <div onclick="setTickMin(32)" class="tickS">32</div>
                            <div onclick="setTickMin(33)" class="tickS">33</div>
                            <div onclick="setTickMin(34)" class="tickS">34</div>
                            <div onclick="setTickMin(35)" class="tickS">35</div>
                            <div onclick="setTickMin(36)" class="tickS">36</div>
                            <div onclick="setTickMin(37)" class="tickS">37</div>
                            <div onclick="setTickMin(38)" class="tickS">38</div>
                            <div onclick="setTickMin(39)" class="tickS">39</div>
                            <div onclick="setTickMin(40)" class="tickS">40</div>
                            <div onclick="setTickMin(41)" class="tickS">41</div>
                            <div onclick="setTickMin(42)" class="tickS">42</div>
                            <div onclick="setTickMin(43)" class="tickS">43</div>
                            <div onclick="setTickMin(44)" class="tickS">44</div>
                            <div onclick="setTickMin(45)" class="tickS">45</div>
                            <div onclick="setTickMin(46)" class="tickS">46</div>
                            <div onclick="setTickMin(47)" class="tickS">47</div>
                            <div onclick="setTickMin(48)" class="tickS">48</div>
                            <div onclick="setTickMin(49)" class="tickS">49</div>
                            <div onclick="setTickMin(50)" class="tickS">50</div>
                            <div onclick="setTickMin(51)" class="tickS">51</div>
                            <div onclick="setTickMin(52)" class="tickS">52</div>
                            <div onclick="setTickMin(53)" class="tickS">53</div>
                            <div onclick="setTickMin(54)" class="tickS">54</div>
                            <div onclick="setTickMin(55)" class="tickS">55</div>
                            <div onclick="setTickMin(56)" class="tickS">56</div>
                            <div onclick="setTickMin(57)" class="tickS">57</div>
                            <div onclick="setTickMin(58)" class="tickS">58</div>
                            <div onclick="setTickMin(59)" class="tickS">59</div>
                    </div>
                </div>
                <div class="col">
                    <div class="setTick" id="setSec">0</div>
                    <div class="nameTick">sec</div>
                    <center>
                        <div class="scroll">
                                <div onclick="setTickSec(1)" class="tickS">1</div>
                                <div onclick="setTickSec(2)" class="tickS">2</div>
                                <div onclick="setTickSec(3)" class="tickS">3</div>
                                <div onclick="setTickSec(4)" class="tickS">4</div>
                                <div onclick="setTickSec(5)" class="tickS">5</div>
                                <div onclick="setTickSec(6)" class="tickS">6</div>
                                <div onclick="setTickSec(7)" class="tickS">7</div>
                                <div onclick="setTickSec(8)" class="tickS">8</div>
                                <div onclick="setTickSec(9)" class="tickS">9</div>
                                <div onclick="setTickSec(10)" class="tickS">10</div>
                                <div onclick="setTickSec(11)" class="tickS">11</div>
                                <div onclick="setTickSec(12)" class="tickS">12</div>
                                <div onclick="setTickSec(13)" class="tickS">13</div>
                                <div onclick="setTickSec(14)" class="tickS">14</div>
                                <div onclick="setTickSec(15)" class="tickS">15</div>
                                <div onclick="setTickSec(16)" class="tickS">16</div>
                                <div onclick="setTickSec(17)" class="tickS">17</div>
                                <div onclick="setTickSec(18)" class="tickS">18</div>
                                <div onclick="setTickSec(19)" class="tickS">19</div>
                                <div onclick="setTickSec(20)" class="tickS">20</div>
                                <div onclick="setTickSec(21)" class="tickS">21</div>
                                <div onclick="setTickSec(22)" class="tickS">22</div>
                                <div onclick="setTickSec(23)" class="tickS">23</div>
                                <div onclick="setTickSec(24)" class="tickS">24</div>
                                <div onclick="setTickSec(25)" class="tickS">25</div>
                                <div onclick="setTickSec(26)" class="tickS">26</div>
                                <div onclick="setTickSec(27)" class="tickS">27</div>
                                <div onclick="setTickSec(28)" class="tickS">28</div>
                                <div onclick="setTickSec(29)" class="tickS">29</div>
                                <div onclick="setTickSec(30)" class="tickS">30</div>
                                <div onclick="setTickSec(31)" class="tickS">31</div>
                                <div onclick="setTickSec(32)" class="tickS">32</div>
                                <div onclick="setTickSec(33)" class="tickS">33</div>
                                <div onclick="setTickSec(34)" class="tickS">34</div>
                                <div onclick="setTickSec(35)" class="tickS">35</div>
                                <div onclick="setTickSec(36)" class="tickS">36</div>
                                <div onclick="setTickSec(37)" class="tickS">37</div>
                                <div onclick="setTickSec(38)" class="tickS">38</div>
                                <div onclick="setTickSec(39)" class="tickS">39</div>
                                <div onclick="setTickSec(40)" class="tickS">40</div>
                                <div onclick="setTickSec(41)" class="tickS">41</div>
                                <div onclick="setTickSec(42)" class="tickS">42</div>
                                <div onclick="setTickSec(43)" class="tickS">43</div>
                                <div onclick="setTickSec(44)" class="tickS">44</div>
                                <div onclick="setTickSec(45)" class="tickS">45</div>
                                <div onclick="setTickSec(46)" class="tickS">46</div>
                                <div onclick="setTickSec(47)" class="tickS">47</div>
                                <div onclick="setTickSec(48)" class="tickS">48</div>
                                <div onclick="setTickSec(49)" class="tickS">49</div>
                                <div onclick="setTickSec(50)" class="tickS">50</div>
                                <div onclick="setTickSec(51)" class="tickS">51</div>
                                <div onclick="setTickSec(52)" class="tickS">52</div>
                                <div onclick="setTickSec(53)" class="tickS">53</div>
                                <div onclick="setTickSec(54)" class="tickS">54</div>
                                <div onclick="setTickSec(55)" class="tickS">55</div>
                                <div onclick="setTickSec(56)" class="tickS">56</div>
                                <div onclick="setTickSec(57)" class="tickS">57</div>
                                <div onclick="setTickSec(58)" class="tickS">58</div>
                                <div onclick="setTickSec(59)" class="tickS">59</div>
                        </div>
                    </center>
                </div>
            </div>
            <div style="padding-bottom: 10%; margin-left: 10%; margin-right: 10%; margin-top: 30%;">
                <button onclick="set()" class="btnSet btn btn-light btn-block" style="color:#ffffff">Set</button>
            </div>
        </div>

    </div>
    <div class="text-center mainTimer">
        <div>
            <div style="display:flex">
                <div class="tick col">
                    <div id="hour">0</div>
                    <div>hrs</div>
                </div>
                <div class="tick col mr-5 ml-5">
                    <div id="min">0</div>
                    <div>min</div>
                </div>
                <div class="tick col">
                    <div id="sec">0</div>
                    <div>sec</div>
                </div>
            </div>
        </div>
        <div>
            <div id="startTimer" class="mt-5" style="display:flex">
                <div class="col" style="padding-left: 0px;">
                    <button onclick="startTimer()" class="btnTickStart btn btn-light btn-block">Start timer</button>
                </div>
                <div class="col" style="padding-right: 0px;">
                    <button onclick="setTimer()" class="btnTickSet btn btn-light btn-block">Set the time</button>
                </div>
            </div>
            <div id="stopTimer" class="col mt-5" style="display:none">
                <button onclick="stopTimer()" class="btnTickStop btn btn-light btn-block">Stop</button>
            </div>
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
    

    <script type="text/javascript">
        var timerBool = false;
        function setTickHour(i) {
            document.getElementById('setHour').innerHTML = i;
        }
        function setTickMin(i) {
            document.getElementById('setMin').innerHTML = i;
        }
        function setTickSec(i) {
            document.getElementById('setSec').innerHTML = i;
        }
        function stopTimer() {
            document.getElementById('startTimer').style.display = 'flex';
            document.getElementById('stopTimer').style.display = 'none';
            document.getElementById('hour').innerHTML = document.getElementById('hour').innerHTML;
            document.getElementById('min').innerHTML = document.getElementById('min').innerHTML;
            document.getElementById('sec').innerHTML = document.getElementById('sec').innerHTML;
            timerBool = false;
        }
        function Timer() {
            if(document.getElementById('startTimer').style.display == 'none'){        
                let h = document.getElementById('hour').innerHTML;
                let m = document.getElementById('min').innerHTML;
                let s = document.getElementById('sec').innerHTML;
                if (s > 0) {
                    document.getElementById('sec').innerHTML = s - 1;
                }
                if (s == 0 && m != 0) {
                    document.getElementById('sec').innerHTML = 59;
                    document.getElementById('min').innerHTML = m-1;
                }
                if (s == 0 && m == 0 && h!= 0) {
                    document.getElementById('sec').innerHTML = 59;
                    document.getElementById('min').innerHTML = 59;
                    document.getElementById('hour').innerHTML = h - 1;
                }
                if (h == 0 && m == 0 && s == 0) {
                    document.getElementById('startTimer').style.display = 'flex';
                    document.getElementById('stopTimer').style.display = 'none';
                }
                if(timerBool){
                    setTimeout(Timer,1000);
                }
            }   
        }
        function set() {
            document.getElementById('hour').innerHTML = document.getElementById('setHour').innerHTML;
            document.getElementById('min').innerHTML = document.getElementById('setMin').innerHTML;
            document.getElementById('sec').innerHTML = document.getElementById('setSec').innerHTML;
            document.getElementById('setHour').innerHTML = '0';
            document.getElementById('setMin').innerHTML = '0';
            document.getElementById('setSec').innerHTML = '0';
            document.getElementById('setTimer').style.display = 'none';
            document.getElementById('cover').style.display = 'none';
        }
        function setTimer() {
            document.getElementById('setTimer').style.display = '';
            document.getElementById('cover').style.display = '';
        }
        function hideWrapper() {
            document.getElementById('setHour').innerHTML = '0';
            document.getElementById('setMin').innerHTML = '0';
            document.getElementById('setSec').innerHTML = '0';
            document.getElementById('setTimer').style.display = 'none';
            document.getElementById('cover').style.display = 'none';
        }
        function closeSetTimer() {
            document.getElementById('setHour').innerHTML = '0';
            document.getElementById('setMin').innerHTML = '0';
            document.getElementById('setSec').innerHTML = '0';
            document.getElementById('setTimer').style.display = 'none';
            document.getElementById('cover').style.display = 'none';
        }
        function startTimer(){
            timerBool = true;
            if(document.getElementById('stopTimer').style.display == 'none'){
                document.getElementById('startTimer').style.display = 'none';
                document.getElementById('stopTimer').style.display = 'flex'; 
            }
            Timer();
        }
    </script>

</body>
</html>