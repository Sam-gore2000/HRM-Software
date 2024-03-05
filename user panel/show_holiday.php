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

<?php


//error_reporting(0);
$query = "SELECT * FROM add_holiday ORDER BY id DESC"; // Fetch rows in descending order by 'id'";
$data = mysqli_query($conn, $query);
$total= mysqli_num_rows($data);


//echo $total

	if($total !=0) 
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SourceCode User Dashboard</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<!-- Remove duplicate links below -->
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



	<style>
		h2 {
		text-align: center;
		padding-top: 30px;
		
	}

	/* #backButton {
		text-align: center;
		border: 1px solid #fff;
		background-color: #449eda;
		color: #fff;
		border-radius: 5px;
		width: 80px;
		font-weight: 700;

	} */


	</style>
<!-- 
<style>
  .custom-table {
    width: 150%; /* Adjust as needed */
    border-collapse: collapse;
    margin-bottom: 20px;
    border-radius: 5px;
  }

  .custom-table th, .custom-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
  }

  .custom-table thead {
    background-color: #f2f2f2;
  }

  .custom-table th {
    font-weight: bold;
  }

  .custom-table th.sr, .custom-table th.from-date, .custom-table th.to-date, .custom-table th.holiday-desc {
    background-color: black; /* Set background color to black */
    color: white; /* Set text color to white for visibility */
  }
</style> -->


	
</head>

<body>

  <!-- navigation & offcanvas starts -->

  <?php
    include "include/header_us.php";
  ?>

  <!-- navigation & offcanvas ends -->
  <main class="mt-5 pt-3">
        <div class="container">
            <h2><b>All Holidays</b></h2>
            <div class="table-responsive">
                <div class="table-wrapper">
                <table id="example" class="table table-striped" style="width: 100%;">
                        <thead>

                        <tr>
            <th style="width: 5%;">SR</th>
            <th style="width: 15%;">From_Date</th>
            <th style="width: 15%;">To_Date</th>
            <th style="width: 65%;">Holiday_Description</th>
        </tr>
                        <!-- <tr>
            <th class="sr" style="width: 10%;">SR</th>
            <th class="from-date" style="width: 20%;">From_Date</th>
            <th class="to-date" style="width: 20%;">To_Date</th>
            <th class="holiday-desc" style="width: 100%;">Holiday_Desc</th>
        </tr> -->
                        </thead>
                        <tbody>
                            <?php
                            $no = 1; // Initialize row number
                            while ($result = mysqli_fetch_assoc($data)) {
                                echo "<tr>
                                    <td>" . $no . "</td>
                                    <td>" . date('d/m/Y', strtotime($result['from_date'])) . "</td>
                                    <td>" . date('d/m/Y', strtotime($result['to_date'])) . "</td>
                                    <td>" . $result['holiday_name'] . "</td>
                                </tr>";

                                $no++; // Increment row number
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- <section>
                <div class="form-group d-flex justify-content-center align-items-center">
                    <a id="backButton" href="add_holiday.php" class="btn btn-outline-white btn-md my-0 ml-sm-2">Back</a>
                </div>
            </section> -->
        </div>
    </main>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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