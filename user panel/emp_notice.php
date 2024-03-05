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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
       
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    

    <link rel="stylesheet" href="style_admin.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css">
   
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="stylezzz.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>SourceCode User Dashboard</title>
   
</head>
<style>
  body{
    background-color: #fff;
  }
  .form-control::placeholder
    {
        font-size: 14px;
    }
.btn-group{
		float: right;
	}
  h2,label{
        color:black;
        
    }
    h2{
        text-align: start;
    }
    .container {
            padding-left: 10%;
            padding-top: 2%;
            padding-right: 3%;
            margin-left: 13%;
            margin-top: 3%;
            margin-right: 3%;
        }
    .container-fluid h2{
        text-align: center;
        margin-top: 50px;
    }
    label{
        font-size:17px;
    }
    .error{
      color:red;
    }
    img{
        width:100px;
    }
    #top{
        margin-top: 80px;
    }
</style>
<body>
    <?php
    include "include/header_us.php";
    ?>

    <!-- <main> -->
      
    <!-- </main> -->





<?php

$query = "SELECT * FROM emp_notice ORDER BY id DESC";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if ($total != 0) {
    ?>
    <?php
    include "include/header_us.php";
    ?>
    <main>
        <div class="container-fluid mt-5">
            <h2 id="top"><b>Notice</b></h2>
                <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr</th>
                        <th>Date</th>
                        <th>Subject</th>
                        <th>Emp_File</th>
                        <th>Emp_Notice</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                    $no = 1;
                    while ($result = mysqli_fetch_assoc($data)) {
                        echo "<tr>
                        <td>" . $no . "</td>
                        <td>" . date('d/m/Y', strtotime($result['date'])) . "</td>
                        <td>" . $result['subject'] . "</td>

                        <td > 
                              <img src=".$result['myfile']." >
                        </td>

                        <td>" . $result['emp_notice'] . "</td>
                        
                        </tr>";
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
<?php
}
?>


<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  
    


    <script type="text/javascript">
    $(document).ready(function () {
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