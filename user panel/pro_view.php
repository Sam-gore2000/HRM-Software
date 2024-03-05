<?php
session_start();

include("db.php");

$userprofile = $_SESSION['$user_name'];

// Check if the user is logged in
if (!$userprofile) {
    header('location:login_user.php');
}

// Update the last activity time in the session
$_SESSION['last_activity'] = time();

// Check if the user has been inactive for more than 1 minute
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 180)) {
    // Destroy the session and redirect to the login page
    session_unset();
    session_destroy();
    header('location:login_user.php');
    exit();
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="stylezzz.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
<title>Sourcecode-User Dashboard</title>
  <style>
   

    

    .sam1 {
      position: relative;
      height: 250px;
      background-color: #392b45;
      border: 2px solid black;
    }

    .sam-1 {
      height: 250px;
      border: 2px solid black;
      width: 300px;
    }

    .box-color {
      background-color: #e4e8e3;
    }
  </style>
</head>


<style>
 
  .a1{
    background-color: #2d1540;
    position: relative;
  }
  .a2{
    color: #e4e8e3;
    margin-left: 300px;
  }
  .a3{
    width: 250px;
    height: 300px;
    position: absolute;
    right: 100px;
    top: 50%;

  }
  .a3 img{

    width: 100%;
    height: 100%;
  }
  .a4{
    border: 2px solid grey;
    height: 300px;
    margin: 100px 0 0 0;
  }
  .sam{
    width: 100%;
  }
  i{
    margin-right:10px;
  }
  .form-control{
    float: right;
    right: 0px;
  }


</style>

<body>

  <!-- navigation & offcanvas starts -->

  <?php
  include "include/header_us.php";
  ?>

  <!-- navigation & offcanvas ends -->



<main class="mt-5 pt-3">
  <div class="container rkdisplay">
    <h2 align="center"><b>Project List</b></h2>
    <hr>

        <table id="example" class="table table-striped table-responsive">
          <thead>
            <tr>
              <th width="3%">Id</th>
              <th width="10%">Emp_ID</th>
              <th width="10%">Project_Name</th>
              <th width="10%">Project_Description</th>
              <th width="5%">Start_Date</th>
              <th width="5%">End_Date</th>
              <th width="10%">Manager</th>
              <th width="30%">Team Member</th>
              <th width="2%">Team_Size</th>
              <th width="2%">Meeting_links</th>
              <th width="5%">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include 'db.php';
           // session_start(); // Start the session
            $id = $_SESSION['$user_name']; // Correct session variable name
            $query = "SELECT * FROM `new_project` WHERE emp_id = '$id' || project_manager='$id' ORDER BY id DESC";
            $query_show = mysqli_query($conn, $query);
            $total = mysqli_num_rows($query_show);

            if ($total != 0) {
              $rowNumber = 0;
              while ($result = mysqli_fetch_assoc($query_show)) {
                $rowNumber++;
                echo "<tr>
                    <td>" . $rowNumber . "</td>
                    <td>" . $result['emp_id'] . "</td>
                    <td>" . $result['project_name'] . "</td>
                    <td>" . $result['description'] . "</td>
                    <td>" . date('d/m/Y', strtotime($result['start_date'])) . "</td>
                    <td>" . date('d/m/Y', strtotime($result['end_date'])) . "</td>
                    <td>" . $result['project_manager'] . "</td>
                    <td>" . $result['members'] . "</td>
                    <td>" . $result['team_size'] . "</td>
                    <td><a href='" . $result['links'] . "' target='_blank'>" . $result['links'] . "</a></td>
                    <td>" . $result['status'] . "</td>
                </tr>";
              }
            } else {
              echo "<tr><td colspan='12'>No records found</td></tr>";
            }
            ?>
          </tbody>
        </table>
  </div>
</main>


    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>


 <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });
  </script>
  <script>
// JavaScript to track user activity
document.addEventListener('mousemove', function() {
    // Send an AJAX request to update the last activity time in the session
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'user_activity.php', true);
    xhr.send();
});

// Set a timer to check for inactivity and log out the user
setTimeout(function() {
    window.location.href = 'force_logout.php';
}, 180000); // 1 minute = 60,000 milliseconds
</script>
</body>

</html>