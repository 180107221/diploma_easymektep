<?php      
    include('conn.php');
    
    session_start();
    $username = $_POST['user'];  
    $password = $_POST['pass'];

    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = mysqli_real_escape_string($con, $username);  
    $password = mysqli_real_escape_string($con, $password);

    $sql = "select * from test where email = '$username' and pass = '$password'";  
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result);  
    $count = mysqli_num_rows($result);

    if($count == 1){
        if(!empty($_POST['rememberMe'])){
            setcookie("id",$row['id'],time() + (86400 * 30), "/");
            setcookie("password",$_POST['pass'],time() + (86400 * 30), "/");
        }
        else{
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
        } 
        header("Location: index.php");
        exit();   
            
    }  
    else{  
        echo "<h1> Login failed. Invalid username or password.</h1>";  
    }
?>
