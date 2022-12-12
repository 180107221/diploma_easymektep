<?php
 include('conn.php');
 session_start();
 if((empty($_SESSION['username']) && empty($_SESSION['password'])) && (empty($_COOKIE['id']) && empty($_COOKIE['password']))){
    include('login.html');
    exit();
}
else{
if(!empty($_COOKIE['id']) && !empty($_COOKIE['password'])){
    $id = $_COOKIE['id'];
    $password = $_COOKIE['password'];

    // task_id  taken by TASK database
    $sql = "SELECT * FROM subtask where task_id = 1 and student_id = '$id' ORDER BY `priority` ASC;";  
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result);  
    $count = mysqli_num_rows($result);  
      
    if($count > 0){
        while ($row) {
            echo $row['upload_file'];
        }
    }  
    else{  
        include('login.html');
        exit();
    }
}
}
?>