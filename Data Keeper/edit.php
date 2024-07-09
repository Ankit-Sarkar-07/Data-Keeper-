
<?php
    include 'sql/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php
        $id = $_GET['id'];
        $sql = mysqli_query($conn, "SELECT * FROM user WHERE id = '$id'") or die($conn);
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_array($sql);
        }
    ?>
    <section>
        <div class="container mt-3 mb-5">
            <div class="row">
                <div class="col-12 col-md-4"></div>
                <div class="col-12 col-md-4 whole-form">
                    <form action="sql/edituser.php" method="POST" enctype="multipart/form-data">
                        <div class="form pl-3 pr-3">
                            <img src="img/profile.png" alt="" height="80px" width="80px">
                            <h6 class="text-center pt-3">Edit User Details</h6>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name </label>
                                <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Mobile Number</label>
                                <input type="text" name="mobile" value="<?php echo $row['mobile']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email Id </label>
                                <input type="email" name="mail" value="<?php echo $row['email']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Username <span style="color:red; font-size:10px;">( Enter Username Max 8 Digit )</span></label>
                                <input type="text" name="username" value="<?php echo $row['username']; ?>" maxlength="8" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status</label>

                                <?php
                                    if($row['status'] == 0){
                                ?>
                                    <select name="status" class="form-control" id="exampleFormControlSelect1">
                                        <option value="0" selected>Active</option>
                                        <option value="1">In-Active</option>
                                    </select>
                                <?php
                                    }else{
                                ?>
                                     <select name="status" class="form-control" id="exampleFormControlSelect1">
                                        <option value="0">Active</option>
                                        <option value="1" selected>In-Active</option>
                                    </select>
                                <?php
                                    }
                                ?>
                                
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image </label>
                                <input type="file" name="image" class="form-control" accept=".pdf, .jpg, .png" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>

                            <p class="text-center">Old Image</p>
                            <a href="sql/image/<?php echo $row['image'] ?>" target="_blank"><img src="sql/image/<?php echo $row['image'] ?>" alt="" height="40px" width="40px" class="img-thumbnail"></a>

                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="d-block text-center">
                                        <input type="submit" name="ok" value="Edit Details" style="background-color:#F97300; color:#fff; border:none; padding:6px 30px; border-radius:50px;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>