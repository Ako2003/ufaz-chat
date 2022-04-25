<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $follower_id = mysqli_real_escape_string($conn, $_GET['follower_id']);
        if(isset($follower_id)){
            $status = "followed";
            $sql = mysqli_query ($conn, "INSERT INTO follows (unique_id, follower_id, status) VALUES ('{$_SESSION['unique_id']}', '{$follower_id}', '{$status}')");
            if($sql){
                header("location: ../page.php");
            }
        }else{
            header("location: ../page.php");
            }
    }else{  
        header("location: ../page.php");
    }
?>