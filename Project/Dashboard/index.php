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
    <title>Dashboard - EasyMektep</title>
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
                                <img class="icons" src="../icons/dashboardIconActive.svg" />
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
                        <i class="iconsMobileActive">
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
                        <p class="title">Dashboard</p>
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
    <link rel="stylesheet" href="../views/dashboard/index.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
</head>
<div class="row-form" id="mainRow" style="display:none">
    <div id="slick">
        <div class="single-item col col-xxl-8" style="margin-bottom: 0px;">
                <div>
                    <div class="bannerMobile">
                        <div class="bannerCol">
                            <div class="row-form"><p class="bannerTitle">Top 5 books for <br/> self - development</p></div>
                            <div class="row-form"><p class="bannerDesc">British scientists have found out that in order to develop yourself you need to read a lot of books and here are collected books for you</p></div>

                            <div class="row-form" style="display: inline-flex">
                                <div class="col" style="align-self: center;"><button class="btn btn-block bannerButton" href=" ../ Projects /"><p class="bannerButtonText">More</p></button></div>
                                <div class="col"><img class="bannerImg" src="../img//BannerFirst.svg" /></div>
                            </div>

                        </div>
                    </div>
                    <div class="bannerPc">
                        <div class="col" style="padding: 24px;margin-left: 24px;">
                            <div><p class="bannerTitle">Top 5 books for <br/> self - development</p></div>
                            <div><p class="bannerDesc">British scientists have found out that in order to develop yourself you need to read a lot of books and here are collected books for you</p></div>
                            <div class="col-5 mt-4"><button class="btn btn-block bannerButton" href=" ../ Projects / "><p class="bannerButtonText justify-content-center">More</p></button></div>
                        </div>
                        <div class="col-5"><img class="bannerImg" src="../img//BannerFirst.svg" /></div>
                    </div>
                </div>
                <div>
                    <div class="bannerMobile">
                        <div class="bannerCol">
                            <div class="row-form"><p class="bannerTitle">Test 2 banner <br/> add banner</p></div>
                            <div class="row-form"><p class="bannerDesc">British scientists have found out that in order to develop yourself you need to read a lot of books and here are collected books for you</p></div>

                            <div class="row-form" style="display: inline-flex">
                                <div class="col" style="align-self: center;"><button class="btn btn-block bannerButton" href=" ../ Statistics / "><p class="bannerButtonText">More2</p></button></div>
                                <div class="col"><img class="bannerImg" src="../img//course1.svg" /></div>
                            </div>

                        </div>
                    </div>
                    <div class="bannerPc">
                        <div class="col" style="padding: 24px;margin-left: 24px;">
                            <div><p class="bannerTitle">Test 2 banner <br/> add banner</p></div>
                            <div><p class="bannerDesc">British scientists have found out that in order to develop yourself you need to read a lot of books and here are collected books for you</p></div>
                            <div class="col-5 mt-4"><button class="btn btn-block bannerButton" href=" ../ Statistics / "><p class="bannerButtonText justify-content-center">More2</p></button></div>
                        </div>
                        <div class="col-5"><img class="bannerImg" src="../img//course1.svg" /></div>
                    </div>
                </div>
                <div>
                    <div class="bannerMobile">
                        <div class="bannerCol">
                            <div class="row-form"><p class="bannerTitle">Test 3 banner <br/> add banner</p></div>
                            <div class="row-form"><p class="bannerDesc">British scientists have found out that in order to develop yourself you need to read a lot of books and here are collected books for you</p></div>

                            <div class="row-form" style="display: inline-flex">
                                <div class="col" style="align-self: center;"><button class="btn btn-block bannerButton" href=" ../ Timer / "><p class="bannerButtonText">More3</p></button></div>
                                <div class="col"><img class="bannerImg" src="../img//course2.svg" /></div>
                            </div>

                        </div>
                    </div>
                    <div class="bannerPc">
                        <div class="col" style="padding: 24px;margin-left: 24px;">
                            <div><p class="bannerTitle">Test 3 banner <br/> add banner</p></div>
                            <div><p class="bannerDesc">British scientists have found out that in order to develop yourself you need to read a lot of books and here are collected books for you</p></div>
                            <div class="col-5 mt-4"><button class="btn btn-block bannerButton" href=" ../ Timer / "><p class="bannerButtonText justify-content-center">More3</p></button></div>
                        </div>
                        <div class="col-5"><img class="bannerImg" src="../img//course2.svg" /></div>
                    </div>
                </div>
                <div>
                    <div class="bannerMobile">
                        <div class="bannerCol">
                            <div class="row-form"><p class="bannerTitle">Test 3 banner <br/> add banner</p></div>
                            <div class="row-form"><p class="bannerDesc">British scientists have found out that in order to develop yourself you need to read a lot of books and here are collected books for you</p></div>

                            <div class="row-form" style="display: inline-flex">
                                <div class="col" style="align-self: center;"><button class="btn btn-block bannerButton" href=" ../ Timer /"><p class="bannerButtonText">More4</p></button></div>
                                <div class="col"><img class="bannerImg" src="../img//course3.svg" /></div>
                            </div>

                        </div>
                    </div>
                    <div class="bannerPc">
                        <div class="col" style="padding: 24px;margin-left: 24px;">
                            <div><p class="bannerTitle">Test 3 banner <br/> add banner</p></div>
                            <div><p class="bannerDesc">British scientists have found out that in order to develop yourself you need to read a lot of books and here are collected books for you</p></div>
                            <div class="col-5 mt-4"><button class="btn btn-block bannerButton" href=" ../ Timer /"><p class="bannerButtonText justify-content-center">More4</p></button></div>
                        </div>
                        <div class="col-5"><img class="bannerImg" src="../img//course3.svg" /></div>
                    </div>
                </div>
                <div>
                    <div class="bannerMobile">
                        <div class="bannerCol">
                            <div class="row-form"><p class="bannerTitle">Test 5 banner <br/> add banner</p></div>
                            <div class="row-form"><p class="bannerDesc">British scientists have found out that in order to develop yourself you need to read a lot of books and here are collected books for you</p></div>

                            <div class="row-form" style="display: inline-flex">
                                <div class="col" style="align-self: center;"><button class="btn btn-block bannerButton" href=" ../ Timer /"><p class="bannerButtonText">More</p></button></div>
                                <div class="col"><img class="bannerImg" src="../img//BannerFirst.svg" /></div>
                            </div>

                        </div>
                    </div>
                    <div class="bannerPc">
                        <div class="col" style="padding: 24px;margin-left: 24px;">
                            <div><p class="bannerTitle">Test 5 banner <br/> add banner</p></div>
                            <div><p class="bannerDesc">British scientists have found out that in order to develop yourself you need to read a lot of books and here are collected books for you</p></div>
                            <div class="col-5 mt-4"><button class="btn btn-block bannerButton" href=" ../ Timer /"><p class="bannerButtonText justify-content-center">More</p></button></div>
                        </div>
                        <div class="col-5"><img class="bannerImg" src="../img//BannerFirst.svg" /></div>
                    </div>
                </div>
        </div>
    </div>
    <div class="task col" id="calendar">
        <div class="ml-5">
            <div class="titleDiv" id="timeJS"></div>
            <div class="calendarDay mb-3" id="dayJS">Monday, June  13</div>
        </div>
        <ul class="weekdays">
            <li>mn</li>
            <li>tu</li>
            <li>we</li>
            <li>th</li>
            <li>fr</li>
            <li>st</li>
            <li>sn</li>
        </ul>

        <ul class="days">
                <li></li>
                <li></li>
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>4</li>
                    <li>5</li>
                    <li>6</li>
                    <li>7</li>
                    <li>8</li>
                    <li>9</li>
                    <li>10</li>
                    <li>11</li>
                    <li>12</li>
                    <li>13</li>
                    <li>14</li>
                    <li>15</li>
                    <li>16</li>
                    <li><span class="active">17</span></li>
                    <li>18</li>
                    <li>19</li>
                    <li>20</li>
                    <li>21</li>
                    <li>22</li>
                    <li>23</li>
                    <li>24</li>
                    <li>25</li>
                    <li>26</li>
                    <li>27</li>
                    <li>28</li>
                    <li>29</li>
                    <li>30</li>
        </ul>
    </div>

</div>
<div class="chartMobile">
    <div class="task col">
        <div class="titleDiv">Number of completed tasks</div>
        <div>
            <div class="mt-3"><input class="daterange" style="width:100%" type="text" name="daterange" /></div>
            <div class="mt-3" style="display:flex"  >
                <div style="display:flex" onclick="CurveChart('Total')" class="col">
                    <div class="col">
                        <img class="float-right" id="totalOnM" src="../icons/radioOnBut.svg" />
                        <img class="float-right" style="display:none" id="totalOffM" src="../icons/radioOffBut.svg" />
                    </div>
                    <div class="col">
                        Total
                    </div>
                </div>
                <div style="display:flex" onclick="CurveChart('New')" class="col">
                    <div class="col">
                        <img class="float-right" style="display:none" id="newOnM" src="../icons/radioOnBut.svg" />
                        <img class="float-right" id="newOffM" src="../icons/radioOffBut.svg" />
                    </div>
                    <div class="col">
                        New
                    </div>
                </div>
            </div>
            </div>
        <div id="curve_chart"></div>
    </div>

    <div class="task col">
        <div class="row-form" style="display:flex;">

            <div class="titleDiv">Completed tasks</div>
            <div class="col" style="text-align:right">
                <a href="*">More</a>
            </div>
        </div>
        <div class="row-form" style="display:flex;">

            <div onclick="Completed('completedTotalMobile')" id="completedTotalMobile" class="completedActive col">Total</div>
            <div onclick="Completed('completedMonthMobile')" id="completedMonthMobile" class="completed col">Month</div>
        </div>
        <div id="piechart"></div>
    </div>
</div>

<div class="chartPC">
    <div class="task col-8" style="margin-right:15px;">
        <div class="row-form" style="display: flex;margin-left: 5%;">
            <div class="titleDiv col">Number of completed tasks</div>

            <div class="col" style="font-size:12px"><input class="daterange" type="text" name="daterange" /></div>
            <div class="col float-right" style="display:flex">
                <div onclick="CurveChart('Total')" class="col" style="display:flex">
                    <div class="col">
                        <img class="float-right" id="totalOn" src="../icons/radioOnBut.svg" />
                        <img class="float-right" style="display:none" id="totalOff" src="../icons/radioOffBut.svg" />
                    </div>
                    <div class="col">
                        Total
                    </div>
                </div>
                <div onclick="CurveChart('New')" class="col" style="display:flex">
                    <div class="col">
                        <img class="float-right" style="display:none" id="newOn" src="../icons/radioOnBut.svg" />
                        <img class="float-right" id="newOff" src="../icons/radioOffBut.svg" />
                    </div>
                    <div class="col">
                        New
                    </div>
                </div>
            </div>
        </div>
        <div id="curve_chartPC"></div>
    </div>

    <div class="task col">
        <div class="row-form" style="display: flex">

            <div class="titleDiv" style="margin-left: 5%;">Completed tasks</div>
            <div class="col" style="text-align:right">
                <a href="../Statistics/">More</a>
            </div>
        </div>
        <div class="row-form" style="display:flex;">
            <div class="col">
                <div id="piechartPC"></div>
            </div>
            <div class="col">
                <div class="mt-5" style="display:inline-flex">
                    <div onclick="Completed('completedTotal')" id="completedTotal" class="completedActive col">Total</div>
                    <div onclick="Completed('completedMonth')" id="completedMonth" class="completed col">Month</div>
                </div>
                <div class="mt-4" style="font-size:14px">Total amount of tasks 100</div>
                <div class="mt-2" style="display:inline-flex">
                    <div class="col" style="font-size:12px">Completed</div>
                    <div class="col" style="font-size:12px">Uncompleted</div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="lessonMobile">
        <div class="task" style="background-image: url('../img/course1.svg');">
            <div class="row-form">
                <div onclick="location.href='/Projects/Course?Id=1'" style="cursor:pointer" class="titleCourse col-8  float-left">Math for Computer Science</div>
                <div class="titleCourseEx col-1 align-self-center float-right" style="cursor:pointer" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</div>
                <div class="dropdown-menu courseDropdown" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item courseDropdownitem" href="#" onclick="Complete(1)">Mark as complete</a>
                    <a class="dropdown-item courseDropdownitem" style="color: #EB5757" href="#" onclick="Delete(1)">Delete course</a>
                </div>
            </div>
            <div class="footerCourse">Maria Nemchenko</div>
        </div>
        <div class="task" style="background-image: url('../img/course2.svg');">
            <div class="row-form">
                <div onclick="location.href='/Projects/Course?Id=2'" style="cursor:pointer" class="titleCourse col-8  float-left">Math for Computer Science</div>
                <div class="titleCourseEx col-1 align-self-center float-right" style="cursor:pointer" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</div>
                <div class="dropdown-menu courseDropdown" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item courseDropdownitem" href="#" onclick="Complete(2)">Mark as complete</a>
                    <a class="dropdown-item courseDropdownitem" style="color: #EB5757" href="#" onclick="Delete(2)">Delete course</a>
                </div>
            </div>
            <div class="footerCourse">Maria Nemchenko</div>
        </div>
        <div class="task" style="background-image: url('../img/course3.svg');">
            <div class="row-form">
                <div onclick="location.href='/Projects/Course?Id=3'" style="cursor:pointer" class="titleCourse col-8  float-left">Math for Computer Science</div>
                <div class="titleCourseEx col-1 align-self-center float-right" style="cursor:pointer" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</div>
                <div class="dropdown-menu courseDropdown" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item courseDropdownitem" href="#" onclick="Complete(3)">Mark as complete</a>
                    <a class="dropdown-item courseDropdownitem" style="color: #EB5757" href="#" onclick="Delete(3)">Delete course</a>
                </div>
            </div>
            <div class="footerCourse">Maria Nemchenko</div>
        </div>
</div>
<div class="lessonPC">
        <div class="task col" style="background-image: url('../img/course1.svg');">
            <div class="row-form">
                <div onclick="location.href='/Projects/Course?Id=1'" style="cursor:pointer" class="titleCourse col-8  float-left">Math for Computer Science</div>
                <div class="titleCourseEx col-1 align-self-center float-right" style="cursor:pointer" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</div>
                <div class="dropdown-menu courseDropdown" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item courseDropdownitem" href="#" onclick="Complete(1)">Mark as complete</a>
                    <a class="dropdown-item courseDropdownitem" style="color: #EB5757" href="#" onclick="Delete(1)">Delete course</a>
                </div>
            </div>
            <div class="footerCourse">Maria Nemchenko</div>
        </div>
        <div class="task col" style="background-image: url('../img/course2.svg');">
            <div class="row-form">
                <div onclick="location.href='/Projects/Course?Id=2'" style="cursor:pointer" class="titleCourse col-8  float-left">Math for Computer Science</div>
                <div class="titleCourseEx col-1 align-self-center float-right" style="cursor:pointer" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</div>
                <div class="dropdown-menu courseDropdown" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item courseDropdownitem" href="#" onclick="Complete(2)">Mark as complete</a>
                    <a class="dropdown-item courseDropdownitem" style="color: #EB5757" href="#" onclick="Delete(2)">Delete course</a>
                </div>
            </div>
            <div class="footerCourse">Maria Nemchenko</div>
        </div>
        <div class="task col" style="background-image: url('../img/course3.svg');">
            <div class="row-form">
                <div onclick="location.href='/Projects/Course?Id=3'" style="cursor:pointer" class="titleCourse col-8  float-left">Math for Computer Science</div>
                <div class="titleCourseEx col-1 align-self-center float-right" style="cursor:pointer" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</div>
                <div class="dropdown-menu courseDropdown" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item courseDropdownitem" href="#" onclick="Complete(3)">Mark as complete</a>
                    <a class="dropdown-item courseDropdownitem" style="color: #EB5757" href="#" onclick="Delete(3)">Delete course</a>
                </div>
            </div>
            <div class="footerCourse">Maria Nemchenko</div>
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
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="//www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <script type="text/javascript">
        $('input[name="daterange"]').daterangepicker({
            locale: {
                format: 'DD MMM. YYYY'
            },
            startDate: '01 Feb. 2022',
            endDate: '01 Jun. 2022'
        },
            function (start, end, label) {
                window.location.href = "../Dashboard/index.php?startDate=" + start.format('YYYY-MM-DD') + '&endDate=' + end.format('YYYY-MM-DD');
            });
        function CurveChart(range) {
            if (range == 'Total') {
                document.getElementById('totalOnM').style.display = '';
                document.getElementById('totalOn').style.display = '';
                document.getElementById('newOnM').style.display = 'none';
                document.getElementById('newOn').style.display = 'none';
                document.getElementById('totalOff').style.display = 'none';
                document.getElementById('totalOffM').style.display = 'none';
                document.getElementById('newOffM').style.display = '';
                document.getElementById('newOff').style.display = '';
                var data = new google.visualization.DataTable();
                data.addColumn('date', 'xs');
                data.addColumn('number', 'y');
                var arrM = [];
                	arrM.push([new Date("31.01.2022 0:00:00"), parseInt("53")])
                	arrM.push([new Date("01.02.2022 0:00:00"), parseInt("30")])
                	arrM.push([new Date("02.02.2022 0:00:00"), parseInt("10")])
                data.addRows(arrM);


                var dataPC = new google.visualization.DataTable();
                dataPC.addColumn('date', 'xs');
                dataPC.addColumn('number', 'y');
                var arr = [];
                	arr.push([new Date("31.01.2022 0:00:00"), parseInt("53")])
                	arr.push([new Date("01.02.2022 0:00:00"), parseInt("30")])
                	arr.push([new Date("02.02.2022 0:00:00"), parseInt("10")])
                	arr.push([new Date("03.02.2022 0:00:00"), parseInt("68")])
                	arr.push([new Date("04.02.2022 0:00:00"), parseInt("33")])
                	arr.push([new Date("05.02.2022 0:00:00"), parseInt("65")])
                	arr.push([new Date("06.02.2022 0:00:00"), parseInt("35")])
                dataPC.addRows(arr);

                var options = {
                    curveType: 'function',
                    hAxis: {
                        format: 'dd/MM',
                    },
                    colors: ['#6B408C'],
                    'chartArea': { 'width': '90%', 'height': '80%' },
                    legend: 'none',
                    pointSize: 5
                };

                var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
                var chartPC = new google.visualization.LineChart(document.getElementById('curve_chartPC'));
                chart.draw(data, options);
                chartPC.draw(dataPC, options);
            }
            else {
                document.getElementById('totalOnM').style.display = 'none';
                document.getElementById('totalOn').style.display = 'none';
                document.getElementById('newOnM').style.display = '';
                document.getElementById('newOn').style.display = '';
                document.getElementById('totalOff').style.display = '';
                document.getElementById('totalOffM').style.display = '';
                document.getElementById('newOffM').style.display = 'none';
                document.getElementById('newOff').style.display = 'none';
                var data = new google.visualization.DataTable();
                data.addColumn('date', 'xs');
                data.addColumn('number', 'y');
                var arrM = [];
                	arrM.push([new Date("31.01.2022 0:00:00"), parseInt("33")])
                	arrM.push([new Date("01.02.2022 0:00:00"), parseInt("10")])
                	arrM.push([new Date("02.02.2022 0:00:00"), parseInt("10")])
                data.addRows(arrM);


                var dataPC = new google.visualization.DataTable();
                dataPC.addColumn('date', 'xs');
                dataPC.addColumn('number', 'y');
                var arr = [];
                	arr.push([new Date("31.01.2022 0:00:00"), parseInt("33")])
                	arr.push([new Date("01.02.2022 0:00:00"), parseInt("10")])
                	arr.push([new Date("02.02.2022 0:00:00"), parseInt("10")])
                	arr.push([new Date("03.02.2022 0:00:00"), parseInt("48")])
                	arr.push([new Date("04.02.2022 0:00:00"), parseInt("13")])
                	arr.push([new Date("05.02.2022 0:00:00"), parseInt("45")])
                	arr.push([new Date("06.02.2022 0:00:00"), parseInt("15")])
                dataPC.addRows(arr);

                var options = {
                    curveType: 'function',
                    hAxis: {
                        format: 'dd/MM',
                    },
                    colors: ['#6B408C'],
                    'chartArea': { 'width': '90%', 'height': '80%' },
                    legend: 'none',
                    pointSize: 5
                };

                var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
                var chartPC = new google.visualization.LineChart(document.getElementById('curve_chartPC'));
                chart.draw(data, options);
                chartPC.draw(dataPC, options);
            }
        }
        function Complete(id) {
            $.ajax({
                type: "POST",
                url: "../Projects/Complete",
                data: {
                    id: id
                },

                success: function (data) {
                    document.location.reload();
                }
            });
        }
        function Delete(id) {
            $.ajax({
                type: "POST",
                url: "../Projects/Delete",
                data: {
                    id: id
                },

                success: function (data) {
                    document.location.reload();
                }
            });
        }
        function Completed(id) {
            let completed = 0;
            let uncompleted = 0;
            if (id == 'completedTotal' || id == 'completedTotalMobile') {
                document.getElementById('completedTotal').className = 'completedActive col';
                document.getElementById('completedMonth').className = 'completed col';
                document.getElementById('completedTotalMobile').className = 'completedActive col';
                document.getElementById('completedMonthMobile').className = 'completed col';
                completed = 86;
                uncompleted = 14;
            }
            else
            {
                document.getElementById('completedMonth').className = 'completedActive col';
                document.getElementById('completedTotal').className = 'completed col';
                document.getElementById('completedMonthMobile').className = 'completedActive col';
                document.getElementById('completedTotalMobile').className = 'completed col';
                completed = 30;
                uncompleted = 70;
            }

            var data = google.visualization.arrayToDataTable([
                ['State', 'Percent'],
                ['86%', completed], ['14%', uncompleted]
            ]);

            var options = {
                legend: 'none',
                pieStartAngle: 90,
                pieSliceText: 'percentage',
                pieSliceTextStyle: { fontName: 'Poppins', fontSize: 14, fontWeight: 400 },
                slices: {
                    0: {
                        color: '#6B408C',
                    },
                    1: { color: '#37C24E', offset: 0.2 }
                }
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            var chartPC = new google.visualization.PieChart(document.getElementById('piechartPC'));
            chart.draw(data, options);
            chartPC.draw(data, options);
        }
        google.charts.load('current', { 'packages': ['corechart'] });
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawChartPie);

        $(document).ready(function () {
            document.getElementById('mainRow').style.display = '';
            $('.single-item').slick({
                infinite: true,
                dots: true,
                autoplay: true,
                autoplaySpeed: 3000,
                fade: false,
                fadeSpeed: 1000,
                cssEase: 'linear',
                arrows: true,
                dotsClass: 'slick-dots-Re',
                prevArrow: '<img class="prevArrow" src="../img/VectorL.svg" />',
                nextArrow: '<img class="nextArrow" src="../img/VectorR.svg" />'
            }
            );
            setInterval(startTime, 100);
            if (window.matchMedia("(min-width: 1200px)").matches) {
                document.getElementById('calendar').className = 'taskEx col-3';
                document.getElementById('slick').className = 'col';
                document.getElementById('mainRow').style.display = 'flex';
            }
        });
        //#6B408C
        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('date', 'xs');
            data.addColumn('number', 'y');
            var arrM = [];
            	arrM.push([new Date("31.01.2022 0:00:00"), parseInt("53")])
            	arrM.push([new Date("01.02.2022 0:00:00"), parseInt("30")])
            	arrM.push([new Date("02.02.2022 0:00:00"), parseInt("10")])
            data.addRows(arrM);

            var dataPC = new google.visualization.DataTable();
            dataPC.addColumn('date', 'xs');
            dataPC.addColumn('number', 'y');
            var arr = [];
            	arr.push([new Date("31.01.2022 0:00:00"), parseInt("53")])
            	arr.push([new Date("01.02.2022 0:00:00"), parseInt("30")])
            	arr.push([new Date("02.02.2022 0:00:00"), parseInt("10")])
            	arr.push([new Date("03.02.2022 0:00:00"), parseInt("68")])
            	arr.push([new Date("04.02.2022 0:00:00"), parseInt("33")])
            	arr.push([new Date("05.02.2022 0:00:00"), parseInt("65")])
            	arr.push([new Date("06.02.2022 0:00:00"), parseInt("35")])
            dataPC.addRows(arr);

            var options = {
                curveType: 'function',
                hAxis: {
                    format: 'dd/MM',
                },
                colors: ['#6B408C'],
                'chartArea': { 'width': '90%', 'height': '80%' },
                legend: 'none',
                pointSize: 5
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
            var chartPC = new google.visualization.LineChart(document.getElementById('curve_chartPC'));
            chart.draw(data, options);
            chartPC.draw(dataPC, options);
        }
        function drawChartPie() {
            var data = google.visualization.arrayToDataTable([
                ['State', 'Percent'],
                ['86%', 86], ['14%', 14]
            ]);

            var options = {
                legend: 'none',
                pieStartAngle: 90,
                pieSliceText: 'percentage',
                pieSliceTextStyle: { fontName: 'Poppins', fontSize: 14, fontWeight: 400 },
                slices: {
                    0: {
                        color: '#6B408C',
                    },
                    1: { color: '#37C24E', offset: 0.2 }
                }
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            var chartPC = new google.visualization.PieChart(document.getElementById('piechartPC'));
            chart.draw(data, options);
            chartPC.draw(data, options);
        }
        function startTime() {
            const today = new Date();
            let h = today.getHours();
            let m = today.getMinutes();
            m = checkTime(m);
            let ampm = (h >= 12) ? "PM" : "AM";
            document.getElementById('timeJS').innerHTML = h + ":" + m + " " + ampm;

        }

        function checkTime(i) {
            if (i < 10) { i = "0" + i };  // add zero in front of numbers < 10
            return i;
        }


    </script>

</body>
</html>