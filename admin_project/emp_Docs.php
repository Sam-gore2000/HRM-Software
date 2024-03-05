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
          
      
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="style_admin.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css">
   
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="stylezzz.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<title>Sourcecode-Admin Dashboard</title>
   
</head>
<style>
  .form-control::placeholder {
    font-size: 14px;
  }

  .btn-group {
    float: right;
  }

  h2, label {
    color: black;
  }

  h2 {
    text-align: start;
  }

  /* .container {
    padding-left: 10%;
    padding-top: 2%;
    padding-right: 3%;
    margin-left: 13%;
    margin-top: 3%;
    margin-right: 3%;
  } */

  .container-fluid h2 {
    text-align: center;
  }

  label {
    font-size: 17px;
  }

  .error {
    color: red;
  }

  img {
    width: 100px;
    height: 100px;
  }
</style>

<body>
    <?php
   include "include/header_ad.php";
    ?>

    <main class="mt-5 pt-5">
    <div class="container">
    <h2><b>Documentation Form</b></h2>
    <form action="#" method="POST" enctype="multipart/form-data" id="noticeForm"  novalidate>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="employeeid">Employee ID:</label>
                <input type="text" class="form-control" id="employeeid" name="emp_id" oninput="fetchEmployeeName(this.value)" required placeholder="Enter employee id">
                <div class="error" id="id_error"></div>
                <span id="empIdError" class="error"></span>
            </div>
            <div class="col-md-6">
                <label for="employeename">Employee Name:</label>
                <input type="text" class="form-control" id="employeename" name="emp_name" required placeholder="Enter employee name" oninput="fetchEmployeeId(this.value)">
                <div class="error" id="name_error"></div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="adhar">Upload Your Adhar Card Image*</label><br>
                <input type="file" class="form-control-file" name="myfile" accept=".jpg, .jpeg, .png, .pdf, .docx" required>
                <div class="error" id="adhar_error"></div>
            </div>
            <div class="col-md-6">
                <label for="pancard">Upload Your Pan Card Image*</label><br>
                <input type="file" class="form-control-file" name="myfile1" required>
                <div class="error" id="pancard_error"></div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="grad_cert">Upload Your Graduation Certificate Image</label><br>
                <input type="file" class="form-control-file" name="myfile2" required>
                <div class="error" id="grad_cert_error"></div>
            </div>
            <div class="col-md-6">
                <label for="grad_marksheet">Upload Your Graduation Marksheets Image</label><br>
                <input type="file" class="form-control-file" name="myfile3" required>
                <div class="error" id="grad_marksheet_error"></div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary" name="submit">Add Docs</button>
            </div>
        </div>
    </form>
</div>

     </main>


    
<script>
    document.getElementById("noticeForm").addEventListener("submit", function (event) {
        const id = document.getElementsByName("emp_id")[0];
        const name = document.getElementsByName("emp_name")[0];
        const adhar = document.getElementsByName("myfile")[0];
        const pan = document.getElementsByName("myfile1")[0];
      
        

        if (!id.value) {
            displayError("id_error", "Please enter employee id.");
            event.preventDefault();
        } else {
            clearError("id_error");
        }

        if (!name.value) {
            displayError("name_error", "Please enter employee name.");
            event.preventDefault();
        } else {
            clearError("name_error");
        }

        if (!name.value) {
            displayError("adhar_error", "Please add your adhar card.");
            event.preventDefault();
        } else {
            clearError("adhar_error");
        }

        if (!name.value) {
            displayError("pancard_error", "Please add your pan card.");
            event.preventDefault();
        } else {
            clearError("pancard_error");
        }


        

        
    });

    function displayError(id, message) {
        const errorElement = document.getElementById(id);
        errorElement.textContent = message;
        errorElement.style.color = "red";
    }

    function clearError(id) {
        const errorElement = document.getElementById(id);
        errorElement.textContent = "";
    }
</script>





<?php
include "db.php";
$query = "SELECT * FROM emp_docs ORDER BY id DESC";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if ($total != 0) {
    ?>
    <?php
    include "include/header_ad.php";
    ?>
    <main>
        <div class="container-fluid mt-5">
            <h2><b>Manage Document's</b></h2>
                <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr_No</th>
                        <th>Emp_ID</th>
                        <th>Emp_Name</th>
                        <th>Adhar_Card</th>
                        <th>Pan_Card</th>
                        <th>Graduation_Certificate</th>
                        <th>Graduation_Marksheets</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                    $no = 1;
                    while ($result = mysqli_fetch_assoc($data)) {
                        echo "<tr>
                        <td>" . $no . "</td>
                        <td>" . $result['emp_id'] . "</td>
                        <td>" . $result['emp_name'] . "</td>

                        <td > 
                              <img src=".$result['myfile']." >
                        </td>

                        <td > 
                              <img src=".$result['myfile1']." >
                        </td>

                        <td > 
                              <img src=".$result['myfile2']." >
                        </td>

                        <td > 
                              <img src=".$result['myfile3']." >
                        </td>

                        <td > 
                        
                        <div class='btn-group'>
                        <a href='emp_updatedocs.php?id=" . $result['id'] . "' class='btn btn-info text-white'><i class='fa fa-edit' style='font-size: 14px;'></i></a>

                        <a href='emp_deletedocs.php?id=" . $result['id'] . "' class='btn btn-danger text-white' style='background-color: #ed112e; margin-left: 20px;'><i class='fa fa-trash' style='font-size: 14px;'></i></a>
                        </div>

                        </td>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    


    <script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>


<?php
   include "db.php";

    if (isset($_POST['submit'])) {
        $emp_id = mysqli_real_escape_string($conn, $_POST['emp_id']);
        $emp_name = mysqli_real_escape_string($conn, $_POST['emp_name']);

        
        $filename = $_FILES["myfile"]["name"];
        $tempname = $_FILES["myfile"]["tmp_name"];
        $folder = "../files&img/".$filename;
        move_uploaded_file($tempname,$folder);

         
        $filename = $_FILES["myfile1"]["name"];
        $tempname = $_FILES["myfile1"]["tmp_name"];
        $folder1 = "../files&img/".$filename;
        move_uploaded_file($tempname,$folder1);

          
        $filename = $_FILES["myfile2"]["name"];
        $tempname = $_FILES["myfile2"]["tmp_name"];
        $folder2 = "../files&img/".$filename;
        move_uploaded_file($tempname,$folder2);

        $filename = $_FILES["myfile3"]["name"];
        $tempname = $_FILES["myfile3"]["tmp_name"];
        $folder3 = "../files&img/".$filename;
        move_uploaded_file($tempname,$folder3);
       

        $sql = "INSERT INTO `emp_docs`(`emp_id`,`emp_name`,`myfile`,`myfile1`,`myfile2`,`myfile3`) VALUES ('$emp_id','$emp_name','$folder','$folder1','$folder2','$folder3')";

        $data = mysqli_query($conn, $sql);

          if ($data) {
            // Show a success SweetAlert and redirect
            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Record Inserted Successfully',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = 'emp_docs.php';
                });
            </script>";
        } else {
            // Show an error SweetAlert
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Data not inserted',
                    text: 'Something went wrong!',
                });
            </script>";
        }
    }
    
?> 

<script>
    function fetchEmployeeName(employeeId) {
    // Make an AJAX request to get the employee name
    $.ajax({
        url: 'get_employee_name.php',
        method: 'POST',
        data: { employeeId: employeeId },
        success: function (response) {
            // Update the Employee Name input field with the fetched name
            $('#employeename').val(response);
            clearError('empIdError'); // Clear any previous error
        },
        error: function () {
            displayError('empIdError', 'Failed to fetch employee name.');
        }
    });
}
</script>

<script>
function fetchEmployeeId(employeeName) {
    $.ajax({
        url: 'get_docs_id.php',
        method: 'POST',
        data: { employeeName: employeeName },
        success: function (response) {
            if (response !== "Employee ID not found") {
                $('#employeeid').val(response);
                clearError('empIdError');
            } else {
                displayError('empIdError', 'Employee ID not found');
            }
        },
        error: function () {
            displayError('empIdError', 'Failed to fetch employee ID.');
        }
    });
}
</script>

<script>
    document.getElementById("noticeForm").addEventListener("submit", function (event) {
        const adhar = document.getElementsByName("myfile")[0];
        const pan = document.getElementsByName("myfile1")[0];
        const gradCert = document.getElementsByName("myfile2")[0];
        const gradMarksheet = document.getElementsByName("myfile3")[0];

        if (adhar.files.length > 0 && adhar.files[0].size > 5 * 1024 * 1024) {
            displayError("adhar_error", "Adhar Card file size must be less than 5MB.");
            event.preventDefault();
        } else {
            clearError("adhar_error");
        }

        if (pan.files.length > 0 && pan.files[0].size > 5 * 1024 * 1024) {
            displayError("pancard_error", "Pan Card file size must be less than 5MB.");
            event.preventDefault();
        } else {
            clearError("pancard_error");
        }

        if (gradCert.files.length > 0 && gradCert.files[0].size > 5 * 1024 * 1024) {
            displayError("grad_cert_error", "Graduation Certificate file size must be less than 5MB.");
            event.preventDefault();
        } else {
            clearError("grad_cert_error");
        }

        if (gradMarksheet.files.length > 0 && gradMarksheet.files[0].size > 5 * 1024 * 1024) {
            displayError("grad_marksheet_error", "Graduation Marksheet file size must be less than 5MB.");
            event.preventDefault();
        } else {
            clearError("grad_marksheet_error");
        }
    });

    // Other functions (displayError, clearError) as in your original code.
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