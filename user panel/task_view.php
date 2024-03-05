<?php
session_start();

include("db.php");
$userprofile = $_SESSION['$user_name'];
if(!$userprofile) {
    header('location: login_user.php');
    exit(); // Ensure script stops execution after redirect
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style_admin.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="stylezzz.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <title>SourceCode User Dashboard</title>
    
</head>

<body>

<?php
include "include/header_us.php";
?>

<main class="mt-5 pt-3">
    <section class="h-100 ">
        <center><h2 style="color: black;"><b>My Ticket list</b></h2></center>
        <hr>
        <div class="container ">
            <div class="rkform ">
                <table id="example" class="table table-striped " style="width:100%">
                    <thead>
                    <tr>
                        <th>Sr_No</th>
                        <th>Emp_ID</th>
                        <th>Emp_Name</th>
                        <th>Project_Name</th>
                        <th>Project_Description</th>
                        <th>Assign_Ticket</th>
                        <th>Start_Date</th>
                        <th>End_Date</th>
                        <th>Upload</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <?php
                    include 'db.php';
                    $id = $_SESSION['$user_name'];
                    $query = "SELECT * FROM `new_task` WHERE emp_id = '$id' ORDER BY id DESC";
                    $query_show = mysqli_query($conn, $query);
                    $total = mysqli_num_rows($query_show);

                    if ($total != 0) {
                    ?>
                    <tbody>
                    <?php
                      $rowNumber = 1; // Initialize $rowNumber
                      while ($result = mysqli_fetch_assoc($query_show)) {
                        echo "<tr>
                              <td>" . $rowNumber . "</td>
                              <td>" . $result['emp_id'] . "</td>
                              <td>" . $result['emp_name'] . "</td>
                              <td>" . $result['project_name'] . "</td>
                              <td>" . $result['description'] . "</td>
                              <td>" . $result['a_task'] . "</td>
                              <td scope='col'>" . date('d/m/Y', strtotime($result['start_date'])) . "</td>
                              <td scope='col'>" . date('d/m/Y', strtotime($result['end_date'])) . "</td>
                              <td> <img src='" . $result['upload'] . "' height='100px' width='100px'></td>
                              <td>" . $result['status'] . "</td>
                              <td>
                              <div class='btn-group'>
                                  <a href='view_files.php?id=" . $result['id'] . "' class='btn btn-success text-white'><i class='fa fa-eye'></i></a>
                              </div>


                              </td>
                              </tr>";

                                      $rowNumber++; // Increment row number for the next row
                                  }
                                  }
                                  else {
                                      echo "<tr><td colspan='11'>No records found</td></tr>";
                                  }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
</body>
</html>
