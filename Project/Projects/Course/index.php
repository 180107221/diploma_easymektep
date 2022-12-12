<?php 
    session_start();

    include('../../conn.php');
	$name = '';
	$surname = '';
	$email = '';
	$bdate = '';
	$gender = '';
	$img = '';
	$pass = '';
    if((empty($_SESSION['id']) && empty($_SESSION['token'])) && (empty($_COOKIE['id']) && empty($_COOKIE['token']))){
        header("Location: ../../");
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
				$name = $row['name'];
				$surname = $row['surname'];
				$email = $row['email'];
				$bdate = $row['birth_date'];
				$gender = $row['gender'];
				$img = $row['image'];
				$pass = $row['password'];
            }  
            else{  
                header("Location: ../../");
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
				$name = $row['name'];
				$surname = $row['surname'];
				$email = $row['email'];
				$bdate = $row['birth_date'];
				$gender = $row['gender'];
				$img = $row['image'];
				$pass = $row['password'];
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
    <title>Course - EasyMektep</title>
    <link rel="stylesheet" href="../../lib/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/site.css" />
    <link rel="stylesheet" href="../../views/shared/layout.css" />
</head>
<body>
    <header>
        <div class="wrapper">
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion mt-3" id="accordionSidebar">
                <li class="nav-item">
                    <a class="nav-link" href="*">
                        <i>
                            <img class="mainIcon" src="../../icons/em.svg" />
                        </i>
                    </a>
                </li>
                <li class="nav-item mt-3">
                        <a class="nav-link" href="../../Dashboard/">
                            <i>
                                <img class="icons" src="../../icons/dashboardIcon.svg" />
                            </i>
                        </a>
                </li>
                <li class="nav-item mt-3">
                        <a class="nav-link" href="../../Projects/">
                            <i>
                                <img class="icons" src="../../icons/projectsIcon.svg" />
                            </i>
                        </a>
                </li>
                <li class="nav-item mt-3">
                        <a class="nav-link" href="../../Statistics/">
                            <i>
                                <img class="icons" src="../../icons/statisticsIcon.svg" />
                            </i>
                        </a>
                </li>
                <li class="nav-item mt-3">
                        <a class="nav-link" href="../../Timer/">
                            <i>
                                <img class="icons" src="../../icons/timerIcon.svg" />
                            </i>
                        </a>
                </li>
                <li class="nav-item mt-3">
                        <a class="nav-link" href="../../Settings/">
                            <i>
                                <img class="icons" src="../../icons/settings_future.svg" />
                            </i>
                        </a>
                </li>
                <li style="margin-top: 300%;" class="nav-item">
                   
                        <a class="nav-link" href="../../Exit">
                                <i>
                                    <img style="width:45%" class="icons" src="../../icons/logoutMain.svg" />
                                </i>
                        </a>
                </li>
            </ul>
        </div>
        <div class="wrapperMobile col-9" id="mobileWrapper" style="display:none">
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion ml-3" id="accordionSidebar">                
                <li class="nav-item mt-3">
                <a class="nav-link" href="../../Dashboard/">
                    <i class="iconsMobile">
                        <img src="../../icons/dashboardIcon.svg" />
                        Dashboard
                    </i>
                </a>
                </li>
                <li class="nav-item mt-3">
                <a class="nav-link" href="../../Projects/">
                    <i class="iconsMobile">
                        <img src="../../icons/dashboardIcon.svg" />
                        Projects
                    </i>
                    
                </a>
                </li>
                <li class="nav-item mt-3">
                <a class="nav-link" href="../../Statistics/">
                    <i class="iconsMobile">
                        <img src="../../icons/dashboardIcon.svg" />
                        Statistics
                    </i>
                    
                </a>
                </li>
                <li class="nav-item mt-3">
                <a class="nav-link" href="../../Timer/">
                    <i class="iconsMobile">
                        <img src="../../icons/dashboardIcon.svg" />
                        Timer
                    </i>
                    
                </a>
                </li>
                <li class="nav-item mt-3">
                        <a class="nav-link" href="../../Settings/">
                            <i class="iconsMobile">
                                <img src="../../icons/dashboardIcon.svg" />
                                Settings
                            </i>

                        </a>
                </li>
            </ul>
            <div class="logout ml-3">
                <img src="../../icons/logout.svg" />
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
                        <p class="title"></p>
                    </div>
                    <div class="float-right" style="display:flex;">
                        <div class="mr-2">
                            <img class="headImg" src="../../icons/notif.svg" />
                        </div>
                        <div class="listHead mr-2">
                            <img onclick="showWrapper()" class="headImg" src="../../icons/list.svg" />
                        </div>
                        <div class="mr-2">
                            <?php 
							if($img == ''){
								echo '<img class="headImg" src="../../icons/personalGray.svg"  style="width:30px;"/>';
							}
							else{
								echo '<img class="headImg" src="data:image/png;base64,'.base64_encode($img).'" style="width:30px;"/>';
							}
							?>
                        </div>
                        <div class="user align-self-center mr-2">
                            <?php echo $name;
							echo ' ';
							echo $surname;
							?>
                        </div>
                        <div class="mr-2 align-self-center">
                            <div class="dropdown show">
                                <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="../../icons/arrow.svg" />
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
    <link rel="stylesheet" href="../../views/projects/course.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
</head>

<div>
    <div class="mainCourse">
        <div class="title">Python</div>
        <div class="mt-3  mb-5" style="display:flex">
                <div class="description col" style="padding-left:0px;">
                    Python is a general-purpose, versatile, and powerful programming language. It&#x2019;s a great first language because it&#x2019;s concise and easy to read. Whatever you want to do, Python can do it. From web development to machine learning to data science, Python is the language for you.
                </div>
                <div class="description col" style="padding-left:0px;">
                    Why we love it:<br> &#x22C5; Great first language<br> &#x22C5; Large programming community<br> &#x22C5; Excellent online documentation<br> &#x22C5; Endless libraries and packages<br> &#x22C5; World-wide popularity<br> &#x22C5; Powerful and flexible
                </div>
                <div class="description col" style="padding-left:0px;">
                    Python is a general-purpose, versatile, and powerful programming language. It&#x2019;s a great first language because it&#x2019;s concise and easy to read. Whatever you want to do, Python can do it. From web development to machine learning to data science, Python is the language for you.
                </div>
        </div>
    </div>

    <div class="mainCourse">

        <div class="title mt-3 mb-3">In this course</div>
        <div id="forums" class="mt-3  mb-5" style="display:flex">
                <div class="col" style="display: inline-flex;padding-left: 0px;">
                    <div class="col-2" id="forum 1" style="padding-left:0px;">
                        <img src="../../img/forum1.svg" />
                    </div>
                    <div class="col" style="padding-left:0px;">
                        <div class="titleForum mt-2">FORUM</div>
                        <div class="descriptionForum">
                            Python 3 Codecademy Forums
                        </div>
                    </div>
                </div>
                <div class="col" style="display: inline-flex;padding-left: 0px;">
                    <div class="col-2" id="forum 2" style="padding-left:0px;">
                        <img src="../../img/forum2.svg" />
                    </div>
                    <div class="col" style="padding-left:0px;">
                        <div class="titleForum mt-2">FORUM</div>
                        <div class="descriptionForum">
                            Python 3 Codecademy Forums
                        </div>
                    </div>
                </div>
                <div class="col" style="display: inline-flex;padding-left: 0px;">
                    <div class="col-2" id="forum 3" style="padding-left:0px;">
                        <img src="../../img/forum3.svg" />
                    </div>
                    <div class="col" style="padding-left:0px;">
                        <div class="titleForum mt-2">FORUM</div>
                        <div class="descriptionForum">
                            Python 3 Codecademy Forums
                        </div>
                    </div>
                </div>
        </div>

    </div>

    <div class="mt-5" style="display:inline-flex">
        <div id="all" class="assignmentAct col" onclick="GetAssignment(1)">ALL</div>
        <div id="toDo" class="assignment col" onclick="GetAssignment(2)">TO DO</div>
        <div id="inProgress" class="assignment col" onclick="GetAssignment(3)">IN PROGRESS</div>
        <div id="done" class="assignment col" onclick="GetAssignment(4)">DONE</div>
    </div>

    <div class="mt-5">
        <div class="row" id="allPC">
                <div class="doAssignment col-3 mr-3 mb-3">
                    <div class="row mt-3 assignmentHead">
                        <div class="col" onclick="location.href='../../Projects/Assignment/?Id=1'" style="cursor:pointer;font-size: 16px;">Do assignment 1</div>
                        <div class="col-4" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer; text-align: right;">...</div>
                        <div class="dropdown-menu assignmentDropdown" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item assignmentDropdownitem" href="#" onclick="Complete(1)">Mark as complete</a>
                            <a class="dropdown-item assignmentDropdownitem" style="color: #EB5757" href="#" onclick="Delete(1)">Delete</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="assignmentDate col">00:00/Saturday, 12 November</div>

                            <div style="color: #FB9818" class="assignmentStatus col-4">in progress</div>
                    </div>
                    <div class="row mt-3 mb-3">
                        <div class="col" style="display:flex">
                            <div class="assignmentProgress" style="background: #6B408C;width: 25%;">
                            </div>
                            <div class="assignmentProgress"  style="background: #F1F1F1;width: 75%;">
                            </div>
                        </div>
                        <div class="col-3" style="font-weight: 500; font-size: 13px; text-align: right;">25%</div>
                    </div>
                </div>
                <div class="doAssignment col-3 mr-3 mb-3">
                    <div class="row mt-3 assignmentHead">
                        <div class="col" onclick="location.href='/Projects/Assignment/?Id=2'" style="cursor:pointer;font-size: 16px;">Do assignment 1</div>
                        <div class="col-4" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer; text-align: right;">...</div>
                        <div class="dropdown-menu assignmentDropdown" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item assignmentDropdownitem" href="#" onclick="Complete(2)">Mark as complete</a>
                            <a class="dropdown-item assignmentDropdownitem" style="color: #EB5757" href="#" onclick="Delete(2)">Delete</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="assignmentDate col">00:00/Saturday, 12 November</div>

                            <div style="color: #37C24E" class="assignmentStatus col-4">done</div>
                    </div>
                    <div class="row mt-3 mb-3">
                        <div class="col" style="display:flex">
                            <div class="assignmentProgress" style="background: #6B408C;width: 25%;">
                            </div>
                            <div class="assignmentProgress"  style="background: #F1F1F1;width: 75%;">
                            </div>
                        </div>
                        <div class="col-3" style="font-weight: 500; font-size: 13px; text-align: right;">25%</div>
                    </div>
                </div>
                <div class="doAssignment col-3 mr-3 mb-3">
                    <div class="row mt-3 assignmentHead">
                        <div class="col" onclick="location.href='/Projects/Assignment/?Id=3'" style="cursor:pointer;font-size: 16px;">Do assignment 1</div>
                        <div class="col-4" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer; text-align: right;">...</div>
                        <div class="dropdown-menu assignmentDropdown" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item assignmentDropdownitem" href="#" onclick="Complete(3)">Mark as complete</a>
                            <a class="dropdown-item assignmentDropdownitem" style="color: #EB5757" href="#" onclick="Delete(3)">Delete</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="assignmentDate col">00:00/Saturday, 12 November</div>

                            <div style="color: #FC514E" class="assignmentStatus col-4">time is up</div>
                    </div>
                    <div class="row mt-3 mb-3">
                        <div class="col" style="display:flex">
                            <div class="assignmentProgress" style="background: #6B408C;width: 25%;">
                            </div>
                            <div class="assignmentProgress"  style="background: #F1F1F1;width: 75%;">
                            </div>
                        </div>
                        <div class="col-3" style="font-weight: 500; font-size: 13px; text-align: right;">25%</div>
                    </div>
                </div>
                <div class="doAssignment col-3 mr-3 mb-3">
                    <div class="row mt-3 assignmentHead">
                        <div class="col" onclick="location.href='/Projects/Assignment/?Id=4'" style="cursor:pointer;font-size: 16px;">Do assignment 1</div>
                        <div class="col-4" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer; text-align: right;">...</div>
                        <div class="dropdown-menu assignmentDropdown" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item assignmentDropdownitem" href="#" onclick="Complete(4)">Mark as complete</a>
                            <a class="dropdown-item assignmentDropdownitem" style="color: #EB5757" href="#" onclick="Delete(4)">Delete</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="assignmentDate col">00:00/Saturday, 12 November</div>

                            <div style="color: #FB9818" class="assignmentStatus col-4">in progress</div>
                    </div>
                    <div class="row mt-3 mb-3">
                        <div class="col" style="display:flex">
                            <div class="assignmentProgress" style="background: #6B408C;width: 25%;">
                            </div>
                            <div class="assignmentProgress"  style="background: #F1F1F1;width: 75%;">
                            </div>
                        </div>
                        <div class="col-3" style="font-weight: 500; font-size: 13px; text-align: right;">25%</div>
                    </div>
                </div>
                <div class="doAssignment col-3 mr-3 mb-3">
                    <div class="row mt-3 assignmentHead">
                        <div class="col" onclick="location.href='/Projects/Assignment/?Id=5'" style="cursor:pointer;font-size: 16px;">Do assignment 1</div>
                        <div class="col-4" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer; text-align: right;">...</div>
                        <div class="dropdown-menu assignmentDropdown" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item assignmentDropdownitem" href="#" onclick="Complete(5)">Mark as complete</a>
                            <a class="dropdown-item assignmentDropdownitem" style="color: #EB5757" href="#" onclick="Delete(5)">Delete</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="assignmentDate col">00:00/Saturday, 12 November</div>

                            <div style="color: #37C24E" class="assignmentStatus col-4">done</div>
                    </div>
                    <div class="row mt-3 mb-3">
                        <div class="col" style="display:flex">
                            <div class="assignmentProgress" style="background: #6B408C;width: 25%;">
                            </div>
                            <div class="assignmentProgress"  style="background: #F1F1F1;width: 75%;">
                            </div>
                        </div>
                        <div class="col-3" style="font-weight: 500; font-size: 13px; text-align: right;">25%</div>
                    </div>
                </div>
                <div class="doAssignment col-3 mr-3 mb-3">
                    <div class="row mt-3 assignmentHead">
                        <div class="col" onclick="location.href='/Projects/Assignment/?Id=6'" style="cursor:pointer;font-size: 16px;">Do assignment 1</div>
                        <div class="col-4" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer; text-align: right;">...</div>
                        <div class="dropdown-menu assignmentDropdown" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item assignmentDropdownitem" href="#" onclick="Complete(6)">Mark as complete</a>
                            <a class="dropdown-item assignmentDropdownitem" style="color: #EB5757" href="#" onclick="Delete(6)">Delete</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="assignmentDate col">00:00/Saturday, 12 November</div>

                            <div style="color: #37C24E" class="assignmentStatus col-4">done</div>
                    </div>
                    <div class="row mt-3 mb-3">
                        <div class="col" style="display:flex">
                            <div class="assignmentProgress" style="background: #6B408C;width: 25%;">
                            </div>
                            <div class="assignmentProgress"  style="background: #F1F1F1;width: 75%;">
                            </div>
                        </div>
                        <div class="col-3" style="font-weight: 500; font-size: 13px; text-align: right;">25%</div>
                    </div>
                </div>
        </div>
        <div id="toDoPC" class="row" style="display:none">
        </div>
        <div id="inProgressPC" class="row" style="display:none">
            <div class="doAssignment col-3 mr-3 mb-3">
                <div class="row mt-3 assignmentHead">
                    <div class="col" onclick="location.href='/Projects/Assignment/?Id=1'" style="cursor:pointer;font-size: 16px;">Do assignment 1</div>

                    <div class="col-4" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer; text-align: right;">...</div>
                    <div class="dropdown-menu assignmentDropdown" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item assignmentDropdownitem" href="#" onclick="Complete(1)">Mark as complete</a>
                        <a class="dropdown-item assignmentDropdownitem" style="color: #EB5757" href="#" onclick="Delete(1)">Delete</a>
                    </div>
                </div>
                <div class="row">
                    <div class="assignmentDate col">00:00/Saturday, 12 November</div>
                    <div style="color: #FB9818" class="assignmentStatus col-4">in progress</div>
                </div>
                <div class="row mt-3 mb-3">
                    <div class="col" style="display:flex">
                        <div class="assignmentProgress" style="background: #6B408C;width: 25%;">
                        </div>
                        <div class="assignmentProgress" style="background: #F1F1F1;width: 75%;">
                        </div>
                    </div>
                    <div class="col-3" style="font-weight: 500; font-size: 13px; text-align: right;">25%</div>
                </div>
            </div>
            <div class="doAssignment col-3 mr-3 mb-3">
                <div class="row mt-3 assignmentHead">
                    <div class="col" onclick="location.href='/Projects/Assignment/?Id=4'" style="cursor:pointer;font-size: 16px;">Do assignment 1</div>

                    <div class="col-4" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer; text-align: right;">...</div>
                    <div class="dropdown-menu assignmentDropdown" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item assignmentDropdownitem" href="#" onclick="Complete(4)">Mark as complete</a>
                        <a class="dropdown-item assignmentDropdownitem" style="color: #EB5757" href="#" onclick="Delete(4)">Delete</a>
                    </div>
                </div>
                <div class="row">
                    <div class="assignmentDate col">00:00/Saturday, 12 November</div>
                    <div style="color: #FB9818" class="assignmentStatus col-4">in progress</div>
                </div>
                <div class="row mt-3 mb-3">
                    <div class="col" style="display:flex">
                        <div class="assignmentProgress" style="background: #6B408C;width: 25%;">
                        </div>
                        <div class="assignmentProgress" style="background: #F1F1F1;width: 75%;">
                        </div>
                    </div>
                    <div class="col-3" style="font-weight: 500; font-size: 13px; text-align: right;">25%</div>
                </div>
            </div>
        </div>
        <div id="donePC" class="row" style="display:none">
            <div class="doAssignment col-3 mr-3 mb-3">
                <div class="row mt-3 assignmentHead">
                    <div class="col" onclick="location.href='/Projects/Assignment/?Id=2'" style="cursor:pointer;font-size: 16px;">Do assignment 1</div>

                    <div class="col-4" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer; text-align: right;">...</div>
                    <div class="dropdown-menu assignmentDropdown" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item assignmentDropdownitem" href="#" onclick="Complete(2)">Mark as complete</a>
                        <a class="dropdown-item assignmentDropdownitem" style="color: #EB5757" href="#" onclick="Delete(2)">Delete</a>
                    </div>
                </div>
                <div class="row">
                    <div class="assignmentDate col">00:00/Saturday, 12 November</div>
                    <div style="color: #37C24E" class="assignmentStatus col-4">done</div>
                </div>
                <div class="row mt-3 mb-3">
                    <div class="col" style="display:flex">
                        <div class="assignmentProgress" style="background: #6B408C;width: 25%;">
                        </div>
                        <div class="assignmentProgress" style="background: #F1F1F1;width: 75%;">
                        </div>
                    </div>
                    <div class="col-3" style="font-weight: 500; font-size: 13px; text-align: right;">25%</div>
                </div>
            </div>
            <div class="doAssignment col-3 mr-3 mb-3">
                <div class="row mt-3 assignmentHead">
                    <div class="col" onclick="location.href='/Projects/Assignment/?Id=5'" style="cursor:pointer;font-size: 16px;">Do assignment 1</div>

                    <div class="col-4" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer; text-align: right;">...</div>
                    <div class="dropdown-menu assignmentDropdown" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item assignmentDropdownitem" href="#" onclick="Complete(5)">Mark as complete</a>
                        <a class="dropdown-item assignmentDropdownitem" style="color: #EB5757" href="#" onclick="Delete(5)">Delete</a>
                    </div>
                </div>
                <div class="row">
                    <div class="assignmentDate col">00:00/Saturday, 12 November</div>
                    <div style="color: #37C24E" class="assignmentStatus col-4">done</div>
                </div>
                <div class="row mt-3 mb-3">
                    <div class="col" style="display:flex">
                        <div class="assignmentProgress" style="background: #6B408C;width: 25%;">
                        </div>
                        <div class="assignmentProgress" style="background: #F1F1F1;width: 75%;">
                        </div>
                    </div>
                    <div class="col-3" style="font-weight: 500; font-size: 13px; text-align: right;">25%</div>
                </div>
            </div>
            <div class="doAssignment col-3 mr-3 mb-3">
                <div class="row mt-3 assignmentHead">
                    <div class="col" onclick="location.href='/Projects/Assignment/?Id=6'" style="cursor:pointer;font-size: 16px;">Do assignment 1</div>

                    <div class="col-4" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer; text-align: right;">...</div>
                    <div class="dropdown-menu assignmentDropdown" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item assignmentDropdownitem" href="#" onclick="Complete(6)">Mark as complete</a>
                        <a class="dropdown-item assignmentDropdownitem" style="color: #EB5757" href="#" onclick="Delete(6)">Delete</a>
                    </div>
                </div>
                <div class="row">
                    <div class="assignmentDate col">00:00/Saturday, 12 November</div>
                    <div style="color: #37C24E" class="assignmentStatus col-4">done</div>
                </div>
                <div class="row mt-3 mb-3">
                    <div class="col" style="display:flex">
                        <div class="assignmentProgress" style="background: #6B408C;width: 25%;">
                        </div>
                        <div class="assignmentProgress" style="background: #F1F1F1;width: 75%;">
                        </div>
                    </div>
                    <div class="col-3" style="font-weight: 500; font-size: 13px; text-align: right;">25%</div>
                </div>
            </div>
        </div>
    </div>
</div>
            </main>
        </div>
    </section>

    <script src="../../lib/jquery/dist/jquery.min.js"></script>
    <script src="../../lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../js/site.js?v=4q1jwFhaPaZgr8WAUSrux6hAuh0XDg9kPS3xIVq36I0"></script>
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
                var els = document.getElementsByClassName("doAssignment");

                Array.prototype.forEach.call(els, function (el) {
                    el.className = 'doAssignment col mb-3';
                });

                    document.getElementById('forum 1').className = 'mr-3 mb-3';
                    document.getElementById('forum 2').className = 'mr-3 mb-3';
                    document.getElementById('forum 3').className = 'mr-3 mb-3';
                
                document.getElementById('forums').style.display = '';
                document.getElementById('allPC').className = '';
                document.getElementById('toDoPC').className = '';
                document.getElementById('inProgressPC').className = '';
                document.getElementById('donePC').className = '';
            }
        });
        function GetAssignment(state) {
            if (state == 1) {
                document.getElementById('allPC').style.display = '';
                document.getElementById('toDoPC').style.display = 'none';
                document.getElementById('inProgressPC').style.display = 'none';
                document.getElementById('donePC').style.display = 'none';

                document.getElementById('all').className = 'assignmentAct col'
                document.getElementById('toDo').className = 'assignment col'
                document.getElementById('inProgress').className = 'assignment col'
                document.getElementById('done').className = 'assignment col'
            }
            else if (state == 2) {
                document.getElementById('allPC').style.display = 'none';
                document.getElementById('toDoPC').style.display = '';
                document.getElementById('inProgressPC').style.display = 'none';
                document.getElementById('donePC').style.display = 'none';

                document.getElementById('all').className = 'assignment col'
                document.getElementById('toDo').className = 'assignmentAct col'
                document.getElementById('inProgress').className = 'assignment col'
                document.getElementById('done').className = 'assignment col'
            }
            else if (state == 3) {
                document.getElementById('allPC').style.display = 'none';
                document.getElementById('toDoPC').style.display = 'none';
                document.getElementById('inProgressPC').style.display = '';
                document.getElementById('donePC').style.display = 'none';

                document.getElementById('all').className = 'assignment col'
                document.getElementById('toDo').className = 'assignment col'
                document.getElementById('inProgress').className = 'assignmentAct col'
                document.getElementById('done').className = 'assignment col'
            }
            else if (state == 4) {
                document.getElementById('allPC').style.display = 'none';
                document.getElementById('toDoPC').style.display = 'none';
                document.getElementById('inProgressPC').style.display = 'none';
                document.getElementById('donePC').style.display = '';

                document.getElementById('all').className = 'assignment col'
                document.getElementById('toDo').className = 'assignment col'
                document.getElementById('inProgress').className = 'assignment col'
                document.getElementById('done').className = 'assignmentAct col'
            }
        }
        function Complete(id) {
            $.ajax({
                type: "POST",
                url: "/Projects/CompleteAssignment",
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
                url: "/Projects/DeleteAssignment",
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
