<?php
    include 'config.php';

    $id = $_GET['id'];

    $sql = mysqli_query($conn, "DELETE FROM user WHERE id = '$id'") or die($conn);
    if($sql == TRUE){
        echo "<script>
                alert('Deleted');
                window.location = '../view.php';
              </script>";
    }else{
        echo "Error".mysqli_error($conn);
    }

?>