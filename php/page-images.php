<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $sql = "SELECT file FROM files WHERE NOT user_id = {$outgoing_id} AND flag = 1 ORDER BY file_id DESC";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No images yet";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "image_data.php";
    }
    echo $output;
?>