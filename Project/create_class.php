<?php
    include "conn.php";
    if(isset($_GET['create'])){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        $name = $_GET['class_name'];
        for($i = 0; $i < 6; $i++){
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        mysqli_query($con,"INSERT INTO `class`(`name`,`class_code`) VALUES('$name','$randomString')");
    }
?>
<form method="GET" action="#">
    <div>Class name: <input type="text" pattern="[a-zA-Z0-9-_.]{1,50}" title="Give name" id="class_name" name="class_name" required></div>
    <input type="submit" name="create" value="Create"> 
</form>