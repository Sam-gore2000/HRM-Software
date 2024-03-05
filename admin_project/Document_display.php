<?php
session_start();

include("db.php");

$userprofile = $_SESSION['$user_name'];

// Check if the user is logged in
if (!$userprofile) {
    header('location:login_admin.php');
}

// Update the last activity time in the session
$_SESSION['last_activity'] = time();

// Check if the user has been inactive for more than 1 minute
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 180)) {
    // Destroy the session and redirect to the login page
    session_unset();
    session_destroy();
    header('location:login_admin.php');
    exit();
}

?>

<?php
include 'db.php';

error_reporting(0);
$query = "SELECT * FROM db_table ORDER BY id DESC"; // Fetch rows in descending order by 'id'
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if ($total != 0)
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sourcecode-Admin Dashboard</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


	<style>
		body {
			color: #566787;
			background: #f5f5f5;
			font-family: 'Varela Round', sans-serif;
			
		}

		.table-responsive {
			margin: 30px 0;
		}

		.table-wrapper {
			background: #fff;
			padding: 20px 25px;
			border-radius: 3px;
			min-width: 1000px;
			box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
		}

		.table-title {
			padding-bottom: 15px;
			background: #435d7d;
			color: #fff;
			padding: 16px 30px;
			min-width: 100%;
			margin: -20px -25px 10px;
			border-radius: 3px 3px 0 0;
		}

		h2 {
			text-align: center;
			padding-top: 30px;
		
		}

		.show {
			font-size: 20px;
			/* border: 1px solid #fff; */
			padding-top: 20px;

		}

		#sea {
			font-size: 18px;
		}

		.table-title .btn-group {
			float: right;
		}

		.table-title .btn {
			color: #fff;
			float: right;
			font-size: 13px;
			border: none;
			min-width: 50px;
			border-radius: 2px;
			border: none;
			outline: none !important;
			margin-left: 10px;
		}

		.table-title .btn i {
			float: left;
			font-size: 21px;
			margin-right: 5px;
		}

		.table-title .btn span {
			float: left;
			margin-top: 2px;
		}

		table.table tr th,
		table.table tr td {
			border-color: #e9e9e9;
			padding: 12px 15px;
			vertical-align: middle;
		}

		table.table tr th:first-child {
			width: 60px;
		}

		table.table tr th:last-child {
			width: 100px;
		}

		table.table-striped tbody tr:nth-of-type(odd) {
			background-color: #fcfcfc;
		}

		table.table-striped.table-hover tbody tr:hover {
			background: #f5f5f5;
		}

		table.table th i {
			font-size: 13px;
			margin: 0 5px;
			cursor: pointer;
		}

		table.table td:last-child i {
			opacity: 0.9;
			font-size: 22px;
			margin: 0 5px;
		}

		table.table td a {
			font-weight: bold;
			color: #566787;
			display: inline-block;
			text-decoration: none;
			outline: none !important;
		}

		table.table td a:hover {
			color: #2196F3;
		}

		table.table td a.edit {
			color: #FFC107;
		}

		table.table td a.delete {
			color: #F44336;
		}

		table.table td i {
			font-size: 19px;
		}

		table.table .avatar {
			border-radius: 50%;
			vertical-align: middle;
			margin-right: 10px;
		}

		.pagination {
			float: right;
			margin: 0 0 5px;
		}

		.pagination li a {
			border: none;
			font-size: 13px;
			min-width: 30px;
			min-height: 30px;
			color: #999;
			margin: 0 2px;
			line-height: 30px;
			border-radius: 2px !important;
			text-align: center;
			padding: 0 6px;
		}

		.pagination li a:hover {
			color: #666;
		}

		.pagination li.active a,
		.pagination li.active a.page-link {
			background: #03A9F4;
		}

		.pagination li.active a:hover {
			background: #0397d6;
		}

		.pagination li.disabled i {
			color: #ccc;
		}

		.pagination li i {
			font-size: 16px;
			padding-top: 6px
		}

		.hint-text {
			float: left;
			margin-top: 10px;
			font-size: 13px;
		}


		/* Modal styles */
		.modal .modal-dialog {
			max-width: 400px;
		}

		.modal .modal-header,
		.modal .modal-body,
		.modal .modal-footer {
			padding: 20px 30px;
		}

		.modal .modal-content {
			border-radius: 3px;
			font-size: 14px;
		}

		.modal .modal-footer {
			background: #ecf0f1;
			border-radius: 0 0 3px 3px;
		}

		.modal .modal-title {
			display: inline-block;
		}

		.modal .form-control {
			border-radius: 2px;
			box-shadow: none;
			border-color: #dddddd;
		}

		.modal textarea.form-control {
			resize: vertical;
		}

		.modal .btn {
			border-radius: 2px;
			min-width: 100px;
		}

		.modal form label {
			font-weight: normal;
		}

		#backButton {
			text-align: center;
			border: 1px solid #fff;
			background-color: #449eda;
			color: #fff;
			border-radius: 5px;
			width: 80px;
			font-weight: 700;

		}
    table{
                background-color:#c4f2e5 ;
                color: #090a0a;
            }
           
            .button a{
                text-decoration: none;
                height: 30px;
                float: left;
                background-color: skyblue;
                color: white;
                margin-left: 10px;
                width: 50px;
                padding: 6px;
                border-radius: 5px;
                padding-left: 10px;
                padding-right: 10px;
            }
            .delete{
                background-color: red;
                margin-left: 40px;
            }
            td img{
                height: 100px;
                width: 100px;
            }
            .dataTables_length{
              float: left;
            }
            i{
              color: white;
            }
            .view{
background-color: yellow;
            }
			.update{
				background-color: skyblue;
			}
	</style>

</head>
 <!-- navigation & offcanvas starts -->

 <?php
    include "header_ad.php";
    ?>

 

  <!-- add cource section starts -->
  <?php 
include("connection.php");

$query = "SELECT * FROM db_table";
$data = mysqli_query($conn,$query);

$total= mysqli_num_rows($data);
$result= mysqli_fetch_assoc($data);

if($total !=0)
{
    ?>
<body>

  <!-- navigation & offcanvas starts -->

  <?php
    include "header_ad.php";
  ?>

  <!-- navigation & offcanvas ends -->                
  <main class="mt-5 pt-3">
        <div class="container">
            <h2><b>Employee Documentation</b></h2>
            <div class="table-responsive">
                <div class="table-wrapper">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                        <tr style="background-color: #a795f5;" width="100%">
            <th width="5%">emp_id</th>
                            <th width="5%">emp_name</th>
                            <th width="5%">email</th>
                            <th width="5%">contact_no</th>
                            <th width="10%">emp_file1</th>
                            <th width="10%">emp_file2</th>
                            <th width="10%">emp_file3</th>
                            <th width="10%">emp_file4</th>
                            <th width="10%">emp_file5</th>
                            <th width="5%">Action</th>
        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1; // Initialize row number
                            while ($result = mysqli_fetch_assoc($data)) {
                              echo "<tr style='height:40px; '>
							  <td>" . $result['emp_id'] . "</td>
                    <td>" . $result['emp_name'] . "</td>
                    <td>" . $result['email'] . "</td>
                    <td>" . $result['contact_no'] . "</td>
					<td>
                    <img src=".$result['emp_file1'] . " >
					</td>
                    <td>
					<img src=" . $result['emp_file2'] . " >
					</td>
                    <td>
					<img src=" . $result['emp_file3'] . " >
					</td>
                    <td>
					<img src=" . $result['emp_file4'] . " > 
					</td>
                    <td>
					<img src=" . $result['emp_file5'] . " > 
					</td>

                              
                              
                       
                       
                           <td   class='button'><a href='Document_update.php?empname= $result[emp_id] & name= $result[emp_name]& mail= $result[email]& empno= $result[contact_no]& folder= $result[emp_file1]& folder1= $result[emp_file2]& folder2= $result[emp_file3]& folder3= $result[emp_file4]& folder4= $result[emp_file5]% '><i class='fa fa-edit'></i></a> 
                                 
                              <a href='Doc_delete.php?empname= $result[emp_id]; ?>&name=<?php echo $result[emp_name]; ?>&mail=<?php echo $result[email]; ?>&empno=<?php echo $result[contact_no]; ?>&folder=<?php echo $result[emp_file1]; ?>&folder1=<?php echo $result[emp_file2]; ?>&folder2=<?php echo $result[emp_file3]; ?>&folder3=<?php echo $result[emp_file4]; ?>&folder4=<?php echo $result[emp_file5]; ?>' style='background-color:#ed112e;margin-left:20px;' onclick='return sam()'><i class='fa fa-trash'></i></a>


                                 <a href='Doc_view.php?empname= $result[emp_id] & name= $result[emp_name]& mail= $result[email]& empno= $result[contact_no]& folder= $result[emp_file1]& folder1= $result[emp_file2]& folder2= $result[emp_file3]& folder3= $result[emp_file4]& folder4= $result[emp_file5]%  ' ><i class='fa fa-eye '></i></a> 
                              
                              </td>
                       
                              </tr>" ;
                                $no++; // Increment row number
                            }
                            if ($no == 1) {
                                echo "<tr><td colspan='8'>No records found</td></tr>";
                            }
                          }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
           
        </div>
    </main>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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

