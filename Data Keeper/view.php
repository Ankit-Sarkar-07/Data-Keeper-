<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form || User Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mt-1">User Details</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered w-100">
                                <thead>
                                    <tr>
                                        <th>Sno</th>
                                        <th>Userid</th>
                                        <th>User Name</th>
                                        <th>Mobile Number</th>
                                        <th>Email Id</th>
                                        <th>Username</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include 'sql/config.php';
                                        $sql = mysqli_query($conn, "SELECT * FROM user") or mysqli_error($conn);
                                        if(mysqli_num_rows($sql) > 0){
                                            while($row = mysqli_fetch_array($sql)){
                                    ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td>
                                                <?php
                                                    echo $row['userid'];
                                                ?>
                                            </td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['mobile']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['username']; ?></td>
                                            <td>
                                               <?php
                                                    if($row['status'] == 0){
                                               ?>
                                                    <span class="badge badge-success">Active</span>
                                               <?php
                                                    }else{
                                                ?>
                                                    <span class="badge badge-warning">In-Active</span>
                                                <?php
                                                    }
                                               ?> 
                                            </td>
                                            <td>
                                                <?php
                                                    $file = $row['image'];
                                                    $extension = pathinfo($file, PATHINFO_EXTENSION);
                                                    if($extension == 'pdf'){
                                                ?>
                                                    <a href="sql/image/<?php echo $row['image']; ?>" target="_blank"><img src="img/pdf.png" alt="" class="img-thumbnail" height="40px" width="40px"></a>
                                                <?php
                                                    }else{
                                                ?>
                                                    <a href="sql/image/<?php echo $row['image']; ?>" target="_blank"><img src="sql/image/<?php echo $row['image']; ?>" alt="" class="img-thumbnail" height="40px" width="40px"></a>
                                                <?php
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="badge badge-primary">Edit</a>
                                                <a href="sql/del.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="badge badge-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php
                                            }
                                        }else{
                                    ?>
                                        <tr>
                                            <td colspan="8"><span style="color:red;">Data Not Available</span></td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>