<?php
    include 'config.php';

    if(isset($_POST['ok'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $mail = $_POST['mail'];
        $username = $_POST['username'];
        $status = $_POST['status'];

        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "image/".$_FILES['image']['name']);

        if(empty($image)){
            $sql = mysqli_query($conn ,"UPDATE `user` SET `name` = '$name', `mobile` = '$mobile', `email` = '$mail', `username` = '$username', `status` = '$status' WHERE id = '$id'") or die($conn);

            if($sql == TRUE){
                echo "<script>
                        alert('Updated');
                        window.location = '../view.php';
                    </script>";
            }else{
                echo "Error".mysqli_error($conn);
            }
        }else{
            $sql = mysqli_query($conn ,"UPDATE `user` SET `name` = '$name', `mobile` = '$mobile', `email` = '$mail', `username` = '$username', `image` = '$image', `status` = '$status' WHERE id = '$id'") or die($conn);

            if($sql == TRUE){
                echo "<script>
                        alert('Updated');
                        window.location = '../view.php';
                    </script>";
            }else{
                echo "Error".mysqli_error($conn);
            }
        }

        
    }
?>