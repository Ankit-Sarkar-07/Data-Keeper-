<?php
    session_start();
    include 'config.php';

    if(isset($_POST['ok'])){
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $mail = $_POST['mail'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $status = 0;

        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "image/".$_FILES['image']['name']);

        $fetch = mysqli_query($conn, "SELECT * FROM user WHERE mobile = '$mobile'") or die($conn);
        if(mysqli_num_rows($fetch) > 0){
            echo "<script>
                    alert('User Already Register');
                    window.location = '../index.php';
                </script>";
        }else{

            $query = mysqli_query($conn, "SELECT id FROM user ORDER BY id DESC LIMIT 1") or die($conn);
            if(mysqli_num_rows($query) > 0){
                $row = mysqli_fetch_array($query);
                $date = date('Y');
                $user = $row['id'] + 1;
                $userid = $date.sprintf("%04s", $user);
            }else{
                $date = date('Y');
                $user = 1;
                $userid = $date.sprintf("%04s", $user);
            }

            $sql = "INSERT INTO `user`(`userid`, `name`, `mobile`, `email`, `username`, `password`, `image`, `status`)VALUES('$userid', '$name', '$mobile', '$mail', '$username', '$hashed_password', '$image', '$status')";

            if(mysqli_query($conn, $sql)){
                $_SESSION['name'] = 'Data Inserted';
                header('location:../index.php');
            }else{
                echo "Error".mysqli_error($conn);
            }
        }
    }
    
?>