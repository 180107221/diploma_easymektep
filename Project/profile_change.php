<?php
include "conn.php";
session_start();

if(!empty($_SESSION['username']) && !empty($_SESSION['password'])){
    $email = $_SESSION['username'];
    $res = mysqli_query($con,"SELECT * FROM `student` WHERE `email` = '$email'");
    $row= mysqli_fetch_array($res);
}

if(!empty($_COOKIE['id']) && !empty($_COOKIE['password'])){
    $id = $_COOKIE['id'];
    $res = mysqli_query($con,"SELECT * FROM `student` WHERE `id` = '$id'");
    $row= mysqli_fetch_array($res);
}



if(isset($_POST['change'])){
    if (count($_FILES) > 0) {
        if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
            
            $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
            $imageProperties = getimageSize($_FILES['userImage']['tmp_name']);     
    
            if(isset($_SESSION['username'])){
                $email = $_SESSION['username'];
                mysqli_query($con,"UPDATE student set `image` ='" . $imgData . "' WHERE email='" . $email . "'");
            }
            if(isset($_COOKIE['id'])){
                $id = $_COOKIE['id'];
                mysqli_query($con,"UPDATE student set `image` ='" . $imgData . "' WHERE id='" . $id . "'");
            }
            header("Location: index.php");
            exit();
        }
    }
    if(!empty($_POST['password']) && !empty($_POST['passwordAgain'])){
        if($_POST['password'] == $_POST['passwordAgain']){
            $password = $_POST['password'];
            if(isset($_SESSION['username'])){
                $email = $_SESSION['username'];
                mysqli_query($con,"UPDATE student set `password` ='" . $password . "' WHERE email='" . $email . "'");
            }
            if(isset($_COOKIE['id'])){
                $id = $_COOKIE['id'];
                mysqli_query($con,"UPDATE student set `password` ='" . $password . "' WHERE id='" . $id . "'");
            }
            header("Location: index.php");
            exit();
        }
        else{
            echo '<style>
                #err{
                    visibility: visible;
                }
            </style>';
        }
    }
}
?>
<head>
<title>Profile change</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
</head>
<style>
    .err{
        visibility: hidden;
    }
</style>
<body>
    <div>
    <?php 
        if(isset($_GET['prof_change'])){
            ?>
            <form name="frmImage" enctype="multipart/form-data" action="" method="post" class="frmImageUpload">
                <label>Upload Image File:</label><br /> 
                <input name="userImage" type="file" class="inputFile" accept="image/*" />
                <div class="err" id="err">
                    Passwords does not match!
                </div>
                <div>
                    <input type="password" placeholder="Password"  name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" id="pass">
                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                </div>
                <div>
                    <input type="password" placeholder="Password Again" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="passwordAgain" id="pass1">
                </div>
                <div>
                    <a href="index.php">
                        <input type="button" value="Back" />
                    </a>
                    <input type="submit" value="Submit" class="btnSubmit" name="change"/>
                </div>
            </form>
            <?php
        }
        else{
            echo '<img src="data:image/png;base64,'.base64_encode($row['image']).'" style="width 200px; height:200px;
            border-style:solid; border-radius: 50%; border-color: rgba(73, 59, 172, 1);"/></br>';
            echo '<div>Full name: '.$row['name'].' '.$row['surname'].'</div>';
            echo '<div>Birth date: '.$row['birth_date'].'</div>'; 
            echo '<div>E-mail address: '.$row['email'].'</div>';
            echo '<form method="get" action="">
                <div>
                    <input type="submit" name="prof_change" value="Change"> 
                </div>
            </form>';
        }
    ?>

    <form method='POST' action='exit.php'>
            <input type='submit' name='exit' value='Log out'>
    </form>
    </div>
</body>
<script >
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#pass");
    const password1 = document.querySelector("#pass1");

        togglePassword.addEventListener("click", function() {
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            password1.setAttribute("type", type);
            this.classList.toggle("bi-eye");
        });
</script>