<?php
session_start();

include("db.php");
$userprofile = $_SESSION['$user_name'];
if ($userprofile == true) {
} else {
  header('location:login_admin.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap CSS CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- Bootstrap JS CDN Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
       
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >

  

    <!-- Font Awesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Other CSS Links -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="stylezzz.css">
    <link rel="stylesheet" href="style_admin.css" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

    <title>Sourcecode-Admin Dashboard</title>
    <style>
    .container {
        padding-left: 10%;
        padding-top: 3%;
        padding-right: 3%;
        margin-left: 13%;
        margin-top: 3%;
        margin-right: 3%;
    }
    .monthlyreport h2 {
        text-align: start;
    }
    .error {
        color: red;
    }
    </style>
</head>

<?php
include 'db.php';
$id = $_SESSION['$user_name'];
$query = "SELECT * FROM `emp_rating` WHERE emp_id = '$id'";
$query_show = mysqli_query($conn, $query);
$show = mysqli_fetch_assoc($query_show);
?>

<body>
    <!-- INCLUDE HEADER FILE -->
    <?php
    include "include/header_ad.php";
    error_reporting(0);
    ?>
    <!-- FORM SECTION -->

    <div class="monthlyreport">
    <div class="container mt-5">
        <h2><b>Performance Report</b></h2>

        <form action="#" method="GET" id="validateForm" novalidate>
            <div class="row">
            <div class="col-md-6">
    <div class="form-group">
        <label>Employee ID:</label>
        <input type="text" name="emp_id" id="employeeid" class="form-control" placeholder="Enter Employee Id" oninput="fetchEmployeeName(this.value)">
        <div class="error" id="emp_id_error"></div>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label>Employee Name:</label>
        <input type="text" name="emp_name" class="form-control" id="employeename" placeholder="Enter Employee Name" oninput="fetchEmployeeId(this.value)">
        <div class="error" id="emp_name_error"></div>
    </div>
</div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Month and Year:</label>
                        <input type="month" name="date" class="form-control" required>
                        <div class="error" id="date_error"></div><br>
                    </div>
                </div>

                <div class="col-md-12 text-center">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="submit">Show Rating</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


    <script>
    document.getElementById("validateForm").addEventListener("submit", function (event) {
        const empId = document.getElementsByName("emp_id")[0];
        const empname = document.getElementsByName("emp_name")[0];
        const date = document.getElementsByName("date")[0];

        if (!empId.value) {
            displayError("emp_id_error", "Please enter an Employee ID.");
            event.preventDefault();
        } else {
            clearError("emp_id_error");
        }
        if (!empname.value) {
            displayError("emp_name_error", "Please enter an Employee Name.");
            event.preventDefault();
        } else {
            clearError("emp_name_error");
        }
        if (!date.value) {
            displayError("date_error", "Please select a Date.");
            event.preventDefault();
        } else {
            clearError("date_error");
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

    <!-- PHP SELECT QUERY -->
    <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "db_hrmsoftwere";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "GET") {

            $employee_id = $conn->real_escape_string($_GET["emp_id"]);
            $emp_name = $conn->real_escape_string($_GET["emp_name"]);

            $selected_month = $conn->real_escape_string($_GET["date"]);

            $sql = "SELECT emp_id, emp_name, date, dept, shift, emp_status FROM emp_rating WHERE emp_id = ? AND DATE_FORMAT(date, '%Y-%m') = ?";

            $stmt = $conn->prepare($sql);

            $stmt->bind_param("ss", $employee_id, $selected_month);

            $stmt->execute();

            $result = $stmt->get_result();

            if ($result->num_rows > 0) {

                echo "<div class='container mt-5 text-center'>";
                echo "<h2><b>Monthly Rating</b></h2>";

                echo "<hr>";
                echo "<h5>Employee-Name: $emp_name</h4>";
                echo "<h5>Employee-ID: $employee_id</h4>";

                echo "<div class='table-responsive'>";
                echo "<table class='table table-striped ' style='width:100%'>";
                echo "<thead>
                        <tr>

                        <th>Date</th>

                        <th>Emp_Dept</th>
                        <th>Emp_Shift</th>
                        <th>Emp_Rating</th>
                        </tr>
                    </thead>";
                echo "<tbody>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";

                   echo "<td>" . date('d/m/Y', strtotime($row["date"])) . "</td>";

                    echo "<td>" . $row["dept"] . "</td>";
                    echo "<td>" . $row["shift"] . "</td>";
                    echo "<td>" . $row["emp_status"] . "</td>";
                    echo "</tr>";
                }

                echo "</tbody></table>";
                echo "</div>";
            }
            if (basename($_SERVER['PHP_SELF']) === 'specific_page.php') {
                echo "<script>alert('This is the specific page. You can customize your alert message here.');</script>";
            }
        }

        $stmt->close();

        $conn->close();
    ?>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>


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


<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

<script>
function fetchEmployeeId(employeeName) {
    // Make an AJAX request to get the employee ID
    $.ajax({
        url: 'get_employee_id.php',
        method: 'POST',
        data: { employeeName: employeeName },
        success: function (response) {
            if (response === "Employee not found") {
                displayError('emp_id_error', 'Employee not found');
                clearError('emp_name_error');
            } else {
                $('#employeeid').val(response); // Update the Employee ID input field
                clearError('emp_id_error');
                clearError('emp_name_error');
            }
        },
        error: function () {
            displayError('emp_id_error', 'Failed to fetch employee ID');
        }
    });
}
</script>

</body>
</html>