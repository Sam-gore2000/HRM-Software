<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sourcecode-Admin Dashboard</title>

    <!-- Bootstrap CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />

    <!-- DataTables CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >


    <!-- Other CSS Links -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />        
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="stylezzz.css">
    <link rel="stylesheet" href="style_admin.css" />

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    
</head>
<body>

<?php
 include "include/header_ad.php";
?>

<main class="mt-5 pt-3">
    <div class="container">
        <h2><strong>Employee Salary Slip</strong></h2>

        <form action="#" method="POST" id="attendanceform" enctype="multipart/form-data" novalidate>

           <!--  employee details -->
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="employeeID">Employee ID</label>
                    <input type="text" class="form-control" id="employeeid" name="emp_id" placeholder="Enter Employee-Id" oninput="fetchEmployeeDetails(this.value, true)">
                </div>

                <div class="form-group col-md-4">
                    <label for="employeeName">Employee Name</label>
                    <input type="text" class="form-control" id="employeename" name="emp_name" placeholder="Enter Employee Name" oninput="fetchEmployeeDetails(this.value, false)">
                </div>
            
                <div class="form-group col-md-4">
                    <label for="month">Month</label>
                    <input type="month" class="form-control" id="month" name="month" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="month">Present Day</label>
                    <input type="number" class="form-control" id="present_day" name="pday" oninput="calculateTotal()" required>
                </div>
            </div>

    

            <!-- Salary Details -->
            <h4 class="mb-3"><b>EARNINGS</b></h4>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="basicSalary">Basic Salary</label>
                        <input type="number" class="form-control" id="basicSalary" name="basicsalary" placeholder="Enter basic salary" oninput="calculateTotal()" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="conveyance">Conveyance</label>
                        <input type="number" class="form-control" id="conveyance" name="conveyance" placeholder="Enter Conveyance" oninput="calculateTotal()" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="allowances">Allowances</label>
                        <input type="number" class="form-control" id="allowances" name="allowances" placeholder="Enter allowances" oninput="calculateTotal()" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="HRE">House Rent Allowance</label>
                        <input type="number" class="form-control" id="hra" name="hra" placeholder="Enter HRA" oninput="calculateTotal()" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="medicalAllowance">Medical Allowance</label>
                        <input type="number" class="form-control" id="medicalAllowance" name="medicalallowance" placeholder="Enter Medical Allowance" oninput="calculateTotal()" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="da">Dearness Allowance</label>
                        <input type="number" class="form-control" id="da" name="da" placeholder="Enter DA" oninput="calculateTotal()" required>
                    </div>
                </div>


                <h4 class="mb-3"><b>DEDUCTIONS</b></h4>

                <div class="form-row">
                   
                    <div class="form-group col-md-4">
                        <label for="esi">ESI</label>
                        <input type="number" class="form-control" id="esi" name="esi" placeholder="Enter ESI" oninput="calculateTotal()" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="pf">PF</label>
                        <input type="number" class="form-control" id="pf" name="pf" placeholder="Enter PF" oninput="calculateTotal()" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="tds">TDS</label>
                        <input type="number" class="form-control" id="tds" name="tds" placeholder="Enter TDS" oninput="calculateTotal()" required>
                    </div>
                </div>

            <!-- Net Salary -->
           
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="employeeID">In Hand Salary</label>
                    <input type="text" class="form-control" id="inhand" name="in_hand" >
                </div>
                <div class="form-group col-md-6">
                <label for="netSalary">Net Salary</label>
                <input type="text" class="form-control" id="total" name="netsalary">
            </div>
                
            </div>


            <!-- Button outside of form-group -->
            <div class="d-flex justify-content-center mt-3">
                <input type="submit" name="submit" value="Add Salary" class="btn btn-primary">
            </div>
        </form>
    </div>
</main>

<!-- Fetch Employee Name/ID Script -->
<script>
    // Function to fetch employee details by ID or Name
    function fetchEmployeeDetails(input, isId) {
        const targetInput = isId ? "#employeename" : "#employeeid";
        const errorElementId = isId ? "empIdError" : "empNameError";

        // Prepare the data to be sent in the AJAX request
        const requestData = isId ? { employeeId: input } : { employeeName: input }; 

        // Make an AJAX request to get the employee details
        $.ajax({
            url: 'fetch_employee_details.php',
            method: 'POST',
            data: requestData,
            success: function (response) {
                $(targetInput).val(response);
                clearError(errorElementId); // Clear any previous error
            },
            error: function () {
                displayError(errorElementId, 'Failed to fetch employee details.');
            }
        });
    }
</script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- DataTables CSS and JS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<script type="text/javascript">
    
        function calculateTotal() {
            // Get values from the input fields
            var basic_salary = parseFloat(document.getElementById('basicSalary').value) || 0;
            var conveyance = parseFloat(document.getElementById('conveyance').value) || 0;
            var house_rent = parseFloat(document.getElementById('hra').value) || 0;
            var allowances = parseFloat(document.getElementById('allowances').value) || 0;

            var medical = parseFloat(document.getElementById('medicalAllowance').value) || 0;
            var da = parseFloat(document.getElementById('da').value) || 0;
            var esi = parseFloat(document.getElementById('esi').value) || 0;
            var pf= parseFloat(document.getElementById('pf').value) || 0;
            var tds= parseFloat(document.getElementById('tds').value) || 0;
            var present_day= parseFloat(document.getElementById('present_day').value) || 0;





            var btotal =basic_salary + conveyance+ allowances+ house_rent + medical+da;
            var stotal=(btotal/30);
            var inhand=stotal*present_day;

// Update the total field
document.getElementById('inhand').value = inhand.toFixed(2); // Display total with two decimal places

            // Calculate total
            var total =(basic_salary + conveyance+ allowances+ house_rent + medical+da+ esi + pf + tds );


            // Update the total field
            document.getElementById('total').value = total.toFixed(2); // Display total with two decimal places
        }
  
</script>
</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $servername = "localhost";
    $username   = "root";
    $password   =  "";
    $dbname     =  "db_hrmsoftwere";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get other form data
    $emp_id             = test_input($_POST['emp_id']);
    $emp_name           = test_input($_POST['emp_name']);
    $month              = test_input($_POST['month']);
   
    $pday                =test_input($_POST['pday']);
    $basicSalary        = test_input($_POST['basicsalary']);
    $allowances         = test_input($_POST['allowances']);
    $da                 = test_input($_POST['da']);
    $esi                = test_input($_POST['esi']);
    $pf                 = test_input($_POST['pf']);
    $conveyance         = test_input($_POST['conveyance']);
    
    $medicalAllowance   = test_input($_POST['medicalallowance']);
    $labourWelfare      = test_input($_POST['hra']);
    $tds                = test_input($_POST['tds']);
    $inhand                = test_input($_POST['in_hand']);

    $netSalary          = test_input($_POST['netsalary']);
    
    // Validate input data
    if (empty($emp_id) || empty($emp_name) || empty($month) || empty($basicSalary) || empty($allowances) || empty($da) || empty($esi) || empty($pf) || empty($conveyance) || empty($medicalAllowance) || empty($labourWelfare) || empty($tds) || empty($netSalary)) {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'All fields must be filled out.',
            });
        </script>";
        mysqli_close($conn);
        exit;
    }

    // Insert data into the database
    $insertQuery = "INSERT INTO emp_salary (emp_id,pday, emp_name, basicsalary, allowances, da, esi, pf, conveyance, month, medicalallowance, hra, tds,in_hand, netsalary)
                    VALUES ('$emp_id', '$emp_name','  $day ', '$basicSalary', '$allowances', '$da', '$esi', '$pf', '$conveyance', '$month', '$medicalAllowance', '$labourWelfare', '$tds',  $inhand , '$netSalary')";

    if (mysqli_query($conn, $insertQuery)) {
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Salary Added Successfully',
                text: 'You have successfully added a record.',
            }).then(function() {
                window.location.replace('manage_salary.php'); // Replace with the actual page name
            });
        </script>";
    } else {
        echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);

    exit;
}
?>