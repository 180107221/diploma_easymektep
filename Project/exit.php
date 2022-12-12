<?php
session_start(); 
    if(isset($_POST['exit'])){
        if(isset($_COOKIE['id']) && isset($_COOKIE['password'])){
            setcookie('id',$cookie,time() - (86400 * 30),'/');
            setcookie('password',$cookie,time() - (86400 * 30),'/');
            header("Location: index.php");
            exit();
        }
        else{
            unset($_SESSION['username']);
            unset($_SESSION['password']);
            header("Location: index.php");
            exit();
        }
    }
?>