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
                header("Location: ../../");
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
    <title> - EasyMektep</title>
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
    <link rel="stylesheet" href="../../views/projects/assignment.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
</head>

<div class="mt-5" style="display:inline-flex">
    <div id="instructions" class="assignmentAct col" onclick="GetAssignment(1)">Instructions</div>
    <div id="mySubmission" class="assignment col" onclick="GetAssignment(2)">My submission</div>
</div>

<div class="mt-5" id="instruction">
    <div>
        <div style="display:inline-flex">
            <div style="padding-left: 0px;font-weight:500;font-size: 16px;" class="col">Date</div>
            <div style="padding-left: 0px;font-size: 16px;color: #939DA8" class="col">01.02.2022</div>
        </div>
    </div>
    <div>
        <div style="display:inline-flex">
            <div style="padding-left: 0px;font-weight:500;font-size: 16px;" class="col">Time</div>
            <div style="padding-left: 0px; font-size: 16px; color: #939DA8" class="col">11:30</div>
        </div>
    </div>
    <div class="mt-3">Description</div>
    <div>
        In this assignment I'd like you to experiment with a variety of imagemaking techniques to create a range of images of a single household object. This assignment is graded, and it will also help you towards completing the optional peer review assignment at the end of this week, Brief 1.2: Making Images, Making Meaning. <br><br>Choose a household object. Choose something that comes in different varieties, something that isn’t too visually complicated, or too simple, and something that is easily recognizable.<br><br>Make at least 10 images of your object. Make each image with different techniques, and in a different way. Make them all approximately the same size, 5 x 5 inches, each in the middle of an 8.5 x 11” or A4 (vertical) sheet of paper. If you make your images by hand, please scan them at 300ppi at 100% of size.<br><br>Choose your 10 best images and bundle them into one PDF document for upload. Please submit 10 and only 10.<br><br>Please include a title for your assignment, and submit! After submitting, you will be prompted to review two of your peers’ assignments. Good luck!
    </div>
</div>


				
<?php 
	if(isset($_GET['Id']) && $_GET['Id'] == 1){
		?>
				<div class="mt-5" id="submission" style="display:none">
        <div>In this assignment I&#x27;d like you to experiment with a variety of imagemaking techniques to create a range of images of a single household object.This assignment is graded, and it will also help you towards completing the optional peer review assignment at the end of this week, Brief 1.2: Making Images, Making Meaning. </div>
        <div class="mt-3" style="display: table-caption">
                <div class="mt-2" style="display: inline-flex;border: 1px solid #F6F6F9;border-radius: 4px;">
                    <div class="col-9" style="display:inline-flex;white-space:nowrap">
                        <div><img width="40" onclick="Show(this)" style="cursor:pointer;" height="40" src="../../items/dogBoy.jpg" /></div>
                        <div class="ml-2 mt-2">dogBoy.jpg</div>
                    </div>
                    <div class="col-1 mt-2">
                        <img style="cursor: pointer;" src="../../icons/trash.svg" />
                    </div>
                </div>
                <div class="mt-2" style="display: inline-flex;border: 1px solid #F6F6F9;border-radius: 4px;">
                    <div class="col-9" style="display:inline-flex;white-space:nowrap">
                        <div><img width="40" onclick="Show(this)" style="cursor:pointer;" height="40" src="../../items/dogGirl.jpg" /></div>
                        <div class="ml-2 mt-2">dogGirl.jpg</div>
                    </div>
                    <div class="col-1 mt-2">
                        <img style="cursor: pointer;" src="../../icons/trash.svg" />
                    </div>
                </div>
        </div>
        <div class="mt-5" style="display:flex">
            <div class="col-3">
                <button style="background: #6B408C;border-radius: 4px;font-weight: 600;font-size: 14px;color: #FFFFFF;" class="btn btn-primary btn-block">Unsubmit</button>
            </div>
            <div class="col-3">
                <button style="border: 1px solid #6B408C;box-sizing: border-box;border-radius: 4px;font-size: 14px;color: #6B408C;white-space: nowrap" class="btn btn-light btn-block">Edit submition</button>
            </div>
        </div>

</div>
		<?php
	}
	else{
	?>
				<div class="mt-5" id="submission" style="display:none">
        <center class="mt-5">
            <div style="color:#939DA8;font-size: 24px;">No Summission yet!</div>
            <div>
                <img src="../../img/AddFile.svg" />
            </div>
            <div class="col-2">
                <button onclick="AddSubmittion()" class="btn btn-primary btn-block" style="background: #6B408C; border-radius: 4px; font-weight: 600; font-size: 14px; color: #FFFFFF; ">
                    Add submittion
                </button>
            </div>
        </center>

</div>
	<?php
	}
?>

<div id="myModal" class="modal" style="background: #22222280;">
    <img class="modal-content" id="img01" style="width:auto;height:70%;margin-top:5%">
</div>
<div id="modalAdd" class="modal">
    <div id="modalBack" class="modalBack">
    </div>
        <div class="block">
            <form method="post" enctype="multipart/form-data" action="../../Projects/Add/">
                <div class="blockRow">
                    <div class="col">
                        <div style="font-size: 14px;color: #939DA8;">Add submission</div>
                        <div>
                            <div class="dropBlock file-upload-wrapper mt-3">
                                <center>
                                    <div>
                                        <img src="../../img/dropFile.svg" />
                                    </div>
                                    <div>
                                        <div class="col"><img /></div>
                                        <div class="col" style="color: #939DA8;font-size: 14px;font-weight:400;">
                                            <img src="../../icons/download.svg" />
                                            Drop your file here or <p style="color: #6B408C;font-size: 14px; font-weight: 500">Browse</p>
                                        </div>
                                    </div>

                                </center>



                                <input class="file-input" id="fileElem" name="files" type="file" multiple onchange="handleFiles(this.files)">
                            </div>


                            <div style="padding-bottom: 3%;">
                                <div style="padding-left:0px;padding-right:0px;" class="col" id="preview">
                                </div>
                            </div>
                        </div>
                    </div>
                    <input name="id" style="display:none" type="text" value="1" />
                    <div class="col mt-5">
                        <div class="boxForm">
                            <label class="labelForm ml-2"><abbr style="color:#ffffff">_</abbr> Your id <abbr style="color:#ffffff">_</abbr></label>
                            <input id="yourId" name="yourId" placeholder="Enter your first name" class="form-control mt-2" type="text" />

                        </div>
                        <div class="boxForm mt-4" style="height: 70%; ">
                            <label class="labelForm ml-2"><abbr style="color:#ffffff">_</abbr> Description <abbr style="color:#ffffff">_</abbr></label>

                            <textarea id="description" name="description" style="height: 80%;" placeholder="Enter your first name" class="form-control mt-2"></textarea>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <button class="btn btn-primary btn-block" style="background: #6B408C; border-radius: 4px; font-weight: 600; font-size: 14px; color: #FFFFFF; ">
                        Add
                    </button>
                </div>
            <input name="__RequestVerificationToken" type="hidden" value="CfDJ8Hzh1Ir4NrRGln2m7n5dQVmQQEQnxpdbNRiW-0G3SQpICkcNspyh0Ems16LXJy_Cqy-WBB7pGnk-17UnMoju5N64diMho1Ph6peyqCaDhl2SSfcGzLVcSaHlT_6W2djWw8MM52-kTp2xMPOlZ6lmDSkdSEmWjz8-O1_xTRems5CeL0KuxhLVQnu6GngroPkWEw" /></form>

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
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            if (window.matchMedia("(max-width: 1279px)").matches) {
                var els = document.getElementsByClassName("col-2");

                Array.prototype.forEach.call(els, function (el) {
                    el.className = 'col';
                });
            }
        });
        function handleFiles(files) {
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var fcolRight = document.createElement("div");
                fcolRight.classList.add("colRight");
                fcolRight.innerHTML = '<img class="trash" src="../../icons/trash.svg" onclick="Remove(' + "'divObjId" +i+"'"+')"/>';
                var div = document.createElement("div");
                div.classList.add("divObj");
                div.id = "divObjId" + i;
                var fcol = document.createElement("div");
                fcol.classList.add("colObj");
                var fname = document.createElement("div");
                fname.innerText = file.name;
                fname.classList.add("fname");
                var inputFname = document.createElement("input");
                inputFname.type = 'text';
                inputFname.style.display = 'none';
                inputFname.value = file.name;
                inputFname.name = 'fname';
                var fsize = document.createElement("div");
                fsize.innerText = Math.round(file.size / 1024) + " KB";
                fsize.classList.add("fsize");
                if (file.type.includes("image")==false) {
                    var imgEx = document.createElement("img");
                    imgEx.src = "../../icons/newFile.svg";
                    imgEx.classList.add("obj");
                    var f = document.createElement("div");
                    f.appendChild(imgEx);
                    f.classList.add("colObj");
                    div.appendChild(f);
                }
                else {
                    var img = document.createElement("img");
                    img.classList.add("obj");
                    img.file = file;
                    var f = document.createElement("div");
                    f.appendChild(img);
                    f.classList.add("colObj");
                    div.appendChild(f);
                }

                fcol.appendChild(inputFname);
                fcol.appendChild(fname);
                fcol.appendChild(fsize);


                div.appendChild(fcol);

                div.appendChild(fcolRight);
                let preview = document.getElementById('preview');
                preview.appendChild(div); 

                var reader = new FileReader();
                reader.onload = (function (aImg) { return function (e) { aImg.src = e.target.result; }; })(img);
                reader.readAsDataURL(file);
            }
        }
        function GetAssignment(state) {
            if (state == 1) {
                document.getElementById('instruction').style.display = '';
                document.getElementById('submission').style.display = 'none';

                document.getElementById('instructions').className = 'assignmentAct col'
                document.getElementById('mySubmission').className = 'assignment col'
            }
            else {
                document.getElementById('instruction').style.display = 'none';
                document.getElementById('submission').style.display = '';

                document.getElementById('instructions').className = 'assignment col'
                document.getElementById('mySubmission').className = 'assignmentAct col'
            }

        }
        function Show(img) {
            var modal = document.getElementById("myModal");
            var modalImg = document.getElementById("img01");
            modal.style.display = "block";
            modalImg.src = img.src;
            modal.onclick = function () {
                modal.style.display = "none";
            }
        }
        function AddSubmittion() {
            var modal = document.getElementById("modalAdd");
            var modalBack = document.getElementById("modalBack");
            modal.style.display = "block";
            modalBack.style.display = "block";
            modalBack.onclick = function () {
                modal.style.display = "none";
            }
        }
        function Remove(id) {
            var el = document.getElementById(id);
            el.remove();
        }
        function getBase64(file) {
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function () {
                console.log(reader.result);
            };
            reader.onerror = function (error) {
                console.log('Error: ', error);
            };
        }
    </script>

</body>
</html>
