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
    <title>Projects - EasyMektep</title>
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
                                <img class="icons" src="../icons/projectsIconActive.svg" />
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
                    <i class="iconsMobile">
                        <img src="../icons/dashboardIcon.svg" />
                        Dashboard
                    </i>
                </a>
                </li>
                <li class="nav-item mt-3">
                    <a class="nav-link" href="../Projects/">
                        <i class="iconsMobileActive">
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
                        <p class="title">Projects</p>
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
    <link rel="stylesheet" href="../views/projects/index.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
</head>
    <div class="titleLesson">Last opened</div>
    <div class="lessonPC">
            <div class="task col" style="background-image: url('../img/course1.svg');">
                <div class="row-form">
                    <div onclick="location.href='../Projects/Course?Id=1'" style="cursor:pointer" class="titleCourse col-8  float-left">Math for Computer Science</div>
                    <div style="cursor:pointer" class="titleCourseEx col-1 align-self-center float-right" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</div>
                    <div class="dropdown-menu courseDropdown" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item courseDropdownitem" href="#" onclick="Complete(1)">Mark as complete</a>
                        <a class="dropdown-item courseDropdownitem" style="color: #EB5757" href="#" onclick="Delete(1)">Delete course</a>
                    </div>
                </div>
                <div class="footerCourse">Maria Nemchenko</div>
            </div>
            <div class="task col" style="background-image: url('../img/course2.svg');">
                <div class="row-form">
                    <div onclick="location.href='../Projects/Course?Id=2'" style="cursor:pointer" class="titleCourse col-8  float-left">Math for Computer Science</div>
                    <div style="cursor:pointer" class="titleCourseEx col-1 align-self-center float-right" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</div>
                    <div class="dropdown-menu courseDropdown" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item courseDropdownitem" href="#" onclick="Complete(2)">Mark as complete</a>
                        <a class="dropdown-item courseDropdownitem" style="color: #EB5757" href="#" onclick="Delete(2)">Delete course</a>
                    </div>
                </div>
                <div class="footerCourse">Maria Nemchenko</div>
            </div>
            <div class="task col" style="background-image: url('../img/course3.svg');">
                <div class="row-form">
                    <div onclick="location.href='../Projects/Course?Id=3'" style="cursor:pointer" class="titleCourse col-8  float-left">Math for Computer Science</div>
                    <div style="cursor:pointer" class="titleCourseEx col-1 align-self-center float-right" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</div>
                    <div class="dropdown-menu courseDropdown" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item courseDropdownitem" href="#" onclick="Complete(3)">Mark as complete</a>
                        <a class="dropdown-item courseDropdownitem" style="color: #EB5757" href="#" onclick="Delete(3)">Delete course</a>
                    </div>
                </div>
                <div class="footerCourse">Maria Nemchenko</div>
            </div>
    </div>

    <div class="titleLesson mt-5">New courses</div>
    <div class="lessonPC">
            <div class="task col" style="background-image: url('../img/course1.svg');">
                <div class="row-form">
                    <div onclick="location.href='../Projects/Course?Id=4'" style="cursor:pointer" class="titleCourse col-8  float-left">Math for Computer Science</div>
                    <div style="cursor:pointer" class="titleCourseEx col-1 align-self-center float-right" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</div>

                    <div class="dropdown-menu courseDropdown" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item courseDropdownitem" href="#" onclick="Complete(4)">Mark as complete</a>
                        <a class="dropdown-item courseDropdownitem" style="color: #EB5757" href="#" onclick="Delete(4)">Delete course</a>
                    </div>
                </div>
                <div class="footerCourse">Maria Nemchenko</div>
            </div>
            <div class="task col" style="background-image: url('../img/course2.svg');">
                <div class="row-form">
                    <div onclick="location.href='../Projects/Course?Id=5'" style="cursor:pointer" class="titleCourse col-8  float-left">Math for Computer Science</div>
                    <div style="cursor:pointer" class="titleCourseEx col-1 align-self-center float-right" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</div>

                    <div class="dropdown-menu courseDropdown" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item courseDropdownitem" href="#" onclick="Complete(5)">Mark as complete</a>
                        <a class="dropdown-item courseDropdownitem" style="color: #EB5757" href="#" onclick="Delete(5)">Delete course</a>
                    </div>
                </div>
                <div class="footerCourse">Maria Nemchenko</div>
            </div>
            <div class="task col" style="background-image: url('../img/course3.svg');">
                <div class="row-form">
                    <div onclick="location.href='../Projects/Course?Id=6'" style="cursor:pointer" class="titleCourse col-8  float-left">Math for Computer Science</div>
                    <div style="cursor:pointer" class="titleCourseEx col-1 align-self-center float-right" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</div>

                    <div class="dropdown-menu courseDropdown" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item courseDropdownitem" href="#" onclick="Complete(6)">Mark as complete</a>
                        <a class="dropdown-item courseDropdownitem" style="color: #EB5757" href="#" onclick="Delete(6)">Delete course</a>
                    </div>
                </div>
                <div class="footerCourse">Maria Nemchenko</div>
            </div>
    </div>

    <div class="titleLesson mt-5">All courses</div>
    <div class="lessonPC">
            <div class="task col" style="background-image: url('../img/course1.svg');">
                <div class="row-form">
                    <div onclick="location.href='../Projects/Course?Id=1'" style="cursor:pointer" class="titleCourse col-8  float-left">Math for Computer Science</div>
                    <div style="cursor:pointer" class="titleCourseEx col-1 align-self-center float-right" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</div>
                    <div class="dropdown-menu courseDropdown" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item courseDropdownitem" href="#" onclick="Complete(1)">Mark as complete</a>
                        <a class="dropdown-item courseDropdownitem" style="color: #EB5757" href="#" onclick="Delete(1)">Delete course</a>
                    </div>
                </div>
                <div class="footerCourse">Maria Nemchenko</div>
            </div>
            <div class="task col" style="background-image: url('../img/course2.svg');">
                <div class="row-form">
                    <div onclick="location.href='../Projects/Course?Id=2'" style="cursor:pointer" class="titleCourse col-8  float-left">Math for Computer Science</div>
                    <div style="cursor:pointer" class="titleCourseEx col-1 align-self-center float-right" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</div>
                    <div class="dropdown-menu courseDropdown" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item courseDropdownitem" href="#" onclick="Complete(2)">Mark as complete</a>
                        <a class="dropdown-item courseDropdownitem" style="color: #EB5757" href="#" onclick="Delete(2)">Delete course</a>
                    </div>
                </div>
                <div class="footerCourse">Maria Nemchenko</div>
            </div>
            <div class="task col" style="background-image: url('../img/course3.svg');">
                <div class="row-form">
                    <div onclick="location.href='../Projects/Course?Id=3'" style="cursor:pointer" class="titleCourse col-8  float-left">Math for Computer Science</div>
                    <div style="cursor:pointer" class="titleCourseEx col-1 align-self-center float-right" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</div>
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
    <script type="text/javascript">
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
    </script>

</body>
</html>