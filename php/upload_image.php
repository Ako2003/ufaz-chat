<?php
    session_start();
    include_once "config.php";
    if(isset($_FILES['image_uploads'])){
        $img_name = $_FILES['image_uploads']['name'];
        $img_type = $_FILES['image_uploads']['type'];
        $tmp_name = $_FILES['image_uploads']['tmp_name'];

        $img_explode = explode('.',$img_name);
        $img_ext = end($img_explode);
        $extensions = ["jpeg", "png", "jpg", "JPEG", "JPG", "PNG"];

        if(in_array($img_ext, $extensions) === true){
            $types = ["image/jpeg", "image/jpg", "image/png", "image/JPEG", "image/JPG", "image/PNG"];
            if(in_array($img_type, $types) === true){
                $time = time();
                $new_img_name = $time.$img_name;
                if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
                    $insert_query = mysqli_query($conn, "INSERT INTO files (`user_id`,`file`,`flag`)
                                VALUES ({$_SESSION['unique_id']}, '{$new_img_name}','1')");
                    if($insert_query){
                        echo "success";
                    }else{
                        echo "This email address not Exist!";
                    }
                }else{
                    echo "Something went wrong. Please try again!";
                }
            }else{
                echo "Please upload an image file - jpeg, png, jpg";
            }
        }else{
            echo "Please upload an image file - jpeg, png, jpg";
        }
    }else{
        echo "All input fields are required!";
    }
?>