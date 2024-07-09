
<?php
    session_start();
    if(isset($_SESSION['name'])){
        $msg = $_SESSION['name'];
        echo "<script>
                alert('$msg');
            </script>";
    }
    session_destroy();
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
    <section>
        <div class="container mt-3 mb-5">
            <div class="row">
                <div class="col-12 col-md-4"></div>
                <div class="col-12 col-md-4 whole-form">
                    <form action="sql/adduser.php" method="POST" enctype="multipart/form-data">
                        <div class="form pl-3 pr-3">
                            <img src="img/profile.png" alt="" height="80px" width="80px">
                            <h6 class="text-center pt-3">User Sign in</h6>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name <sup><span style="color:red;">*</span></sup></label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Name">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Mobile Number <sup><span style="color:red;">*</span></sup></label>
                                <input type="text" name="mobile" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Mobile">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email Id <sup><span style="color:red;">*</span></sup></label>
                                <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Email Id">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Username <sup><span style="color:red;">*</span></sup> <span style="color:red; font-size:10px;">( Enter Username Max 8 Digit )</span></label>
                                <input type="text" name="username" maxlength="8" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Password <sup><span style="color:red;">*</span></sup> <span style="color:red; font-size:10px;">( Enter Password Max 8 Digit )</span></label>
                                <input type="password" name="password" maxlength="8" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="*********">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image <sup><span style="color:red;">*</span></sup></label>
                                <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" accept=".jpg,.png,.pdf">
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="d-block text-center">
                                        <input type="submit" name="ok" value="Submit" style="background-color:#F97300; color:#fff; border:none; padding:6px 30px; border-radius:50px;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;">
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