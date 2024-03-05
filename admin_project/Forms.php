<?php
include("db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style_admin.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="stylezzz.css">

    <title>Sourcecode-Admin Dashboard</title>
  <style>
        h1 {
            font-size: 30px;
            margin-top: 34px;
            margin-bottom: 24px;

        }

        .emp {
            align-items: center;
            justify-content: center;
            border: 2px solid black;
            padding: 10px;
        }

        .emp h1 {
            text-align: center;
            
        }
            
        label {
            font-weight: bold;
        }
    </style>
</head>

<body>

  <!-- navigation & offcanvas starts -->

  <?php
    include "include/header_ad.php";
    ?>

  <!-- navigation & offcanvas ends -->

  <!-- add cource section starts -->

  <main class="mt-5 pt-3">
  <div class="col-md-6 offset-md-3 mt-5">
            <div class="container emp">

                <h1>Employee Documentation</h1>
                <form action="#" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="exampleInputID">Employee ID</label>
                        <input type="text" name="emp_id" class="form-control" id="exampleInputEmpID"
                            placeholder="Enter your employee id" Required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName">Full Name</label>
                        <input type="text" name="emp_name" class="form-control" id="exampleInputName"
                            aria-describedby="emailHelp" placeholder="Enter your name" Required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail"
                            placeholder="Enter your email" Required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputNo">Contact No</label>
                        <input type="tel" name="contact_no" class="form-control" id="phonenumber"
                            placeholder="Enter your Contact Number" Required>
                    </div>

                    <hr>
                    <div class="form-group mt-3">
                        <label class="exampleFormControlaFile2 mr-2">Upload your Aadhar Card:</label>
                        <input type="file" class="form-control-file" name="uploadfile" id="exampleFormControlaFile3"
                            Required>
                    </div>

                    <hr>
                    <div class="form-group mt-3">
                        <label class="mr-2">Upload your Pan Card:</label>
                        <input type="file" name="uploadfile1" Required>
                    </div>

                    <hr>
                    <div class="form-group mt-3">
                        <label class="mr-2">Upload your graduation Certificate:</label>
                        <input type="file" name="uploadfile2">
                    </div>

                    <hr>
                    <div class="form-group mt-3">
                        <label class="mr-2">Upload your 10th Marksheet:</label>
                        <input type="file" name="uploadfile3">
                    </div>

                    <hr>
                    <div class="form-group mt-3">
                        <label class="mr-2">Upload your 12th Marksheet:</label>
                        <input type="file" name="uploadfile4">
                    </div>
                    <hr>

                    <input type="submit" class="btn btn-primary" name="register" value="Submit">

                </form>
            </div>
        </div>
  </main>




  

  <?php

if (isset($_POST['register'])) {

    $empname = $_POST['emp_id'];
    $name = $_POST['emp_name'];
    $mail = $_POST['email'];
    $empno = $_POST['contact_no'];
    $filename = $_FILES["uploadfile"]["name"];
    $filename1 = $_FILES["uploadfile1"]["name"];
    $filename2 = $_FILES["uploadfile2"]["name"];
    $filename3 = $_FILES["uploadfile3"]["name"];
    $filename4 = $_FILES["uploadfile4"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $tempname1 = $_FILES["uploadfile1"]["tmp_name"];
    $tempname2 = $_FILES["uploadfile2"]["tmp_name"];
    $tempname3 = $_FILES["uploadfile3"]["tmp_name"];
    $tempname4 = $_FILES["uploadfile4"]["tmp_name"];
    $folder = "images/" . $filename;
    $folder1 = "images/" . $filename1;
    $folder2 = "images/" . $filename2;
    $folder3 = "images/" . $filename3;
    $folder4 = "images/" . $filename4;
    move_uploaded_file($tempname, $folder);
    move_uploaded_file($tempname1, $folder1);
    move_uploaded_file($tempname2, $folder2);
    move_uploaded_file($tempname3, $folder3);
    move_uploaded_file($tempname4, $folder4);

    $query = "INSERT INTO db_table (`emp_id`,`emp_name`,`email`,`contact_no`,`uploadfile`,`uploadfile1`,`uploadfile2`,`uploadfile3`,`uploadfile4`) 
                VALUES ('$empname','$name','$mail','$empno','$folder','$folder1','$folder2','$folder3','$folder4')";

    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "Data inserted successfully";
        ?>
        <meta http-equiv="refresh" content="0; url = " />
        <?php
    } else {
        echo "Data not inserted";
    }
}

?>





  <script src="./js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
  <script src="./js/jquery-3.5.1.js"></script>
  <script src="./js/jquery.dataTables.min.js"></script>
  <script src="./js/dataTables.bootstrap5.min.js"></script>
  <script src="./js/script.js"></script>
</body>

</html>