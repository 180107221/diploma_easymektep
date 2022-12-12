<?php
    session_start(); 
        if(isset($_COOKIE['id']) && isset($_COOKIE['token'])){
            setcookie('id',$cookie,time() - (86400 * 30),'/');
            setcookie('token',$cookie,time() - (86400 * 30),'/');
            header("Location: ../");
            exit();
        }
        else{
            unset($_SESSION['id']);
            unset($_SESSION['token']);
            header("Location: ../");
            exit();
        }
?>