<?php
include "conn.php";
if(isset($_GET['password']) && isset($_GET['passwordAgain']) && isset($_GET['key'])){
    $token = $_GET['password'];
    $token1 = $_GET['passwordAgain'];
    $email = $_GET['key'];
    if($token == $token1){
        $query = mysqli_query($con,"SELECT * FROM `student` WHERE `password`='".$token."';");
        if (mysqli_num_rows($query) == 0){
            mysqli_query($con,"UPDATE `student` set `password`='".$token."' WHERE `email`='".$email."';");
            $msg = "<h1>You successfully change your password</h1>\n";
            $msg .= "<a href='http://localhost/diploma/login/'>Go to SignIn page</a>";
        }
        else{
            $msg = "<h1>You cannot change the password to the currenе</h1>\n";
            $msg .= "<a href='http://localhost/diploma/login/'>Go to SignIn page</a>";
        }
    }
    else{
        $msg = "<h1>Passwords does not exists</h1>\n";
        $msg .= "<a href='http://localhost/diploma/login/forget_password.php?key=$email'>Try again to change</a>";
    }
}
elseif(isset($_GET['key'])){
    $email = $_GET['key'];
    $query = mysqli_query($con,"SELECT * FROM `student` WHERE `email`='".$email."';");
    if (mysqli_num_rows($query) > 0){

        $msg = "<head>
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css'/>
        </head>
        <form action = 'forget_password.php' method = 'GET'>
        <div>
            <input type='hidden' name='key' value=$email>
            <input type='password' placeholder='Password'  name='password' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}' 
            title='Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters' id='pass'>
            <i class='bi bi-eye-slash' id='togglePassword'></i>
        </div>
        <div>
            <input type='password' placeholder='Password Again' name='passwordAgain' id='pass1'>
        </div>
        <div>
                <input type = 'submit' value='Submit'/>
        </div>
        </form>
        <script>
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#pass');
            const password1 = document.querySelector('#pass1');

            togglePassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                password1.setAttribute('type', type);
                this.classList.toggle('bi-eye');
            });
        </script>";
    } 
    else {
        $msg = "<h1>Account with this email does not exist</h1>";
        $msg .= "<a href='http://localhost/diploma/login/forget_password.php'>Try Again</a>";
    }
}

else{
    $msg = "<form action = 'forget_password.php' method = 'GET'>
            <input type = 'text' name = 'key' placeholder='Email' />
            <div>
                <input type = 'submit' value='Submit'/>
            </div>
            </form>";
}
echo $msg;
?>