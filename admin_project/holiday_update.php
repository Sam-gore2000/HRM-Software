<?php
session_start();

include("db.php");
$userprofile = $_SESSION['$user_name'];
if($userprofile == true)
{

}
else
{
    header('location:login_admin.php');
}

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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="stylezzz.css">

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
  .error {
    color: red;
}

   /* Decrease the font size of placeholders */
   ::placeholder {
        font-size: 15px; /* Adjust the font size as needed */
    }
</style>

</head>

<body>

    <!-- navigation & offcanvas starts -->

    <?php
    include "include/header_ad.php";
    ?>

    <!-- navigation & offcanvas ends -->

    <?php
include 'db.php';
$id=$_GET['id'];

     $query = "SELECT * FROM add_holiday WHERE id='$id'";
     $data = mysqli_query($conn, $query);
    //  $total= mysqli_num_rows($data);
     $result = mysqli_fetch_assoc($data);
?>



    <div class="container mt-5">
    <h2><b>Update Holiday</b></h2>
        <hr>
        <form action="#" method="POST" id="holidayForm" novalidate>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="fromDate">From Date:</label>
                    <input type="date" class="form-control" id="fromDate" name="from_date" value= <?php echo $result['from_date'];?> required>
                    <div class="error" id="from_date_error"></div>
                </div>

              <div class="form-group col-md-6">
                <label for="toDate">To Date:</label>
                <input type="date" class="form-control" id="toDate" name="to_date" value="<?php echo isset($result['to_date']) ? $result['to_date'] : ''; ?>" required>
                <div class="error" id="to_date_error"></div>
             </div>

                </div>  

                <div class="form-group col-md-14">
                    <label for="eventDescription">Description:</label>
                    <textarea class="form-control" id="eventDescription" name="holiday_name" placeholder="Enter Description" required><?php echo isset($result['holiday_name']) ? $result['holiday_name'] : ''; ?></textarea>
                    <div class="error" id="holiday_name_error"></div>
               </div>
           
               <div class="text-center">
               <button type="submit" name="submit" class="btn btn-primary">Update Holiday</button>
              </div>
        </form>
    </div>


<script>
    document.getElementById("holidayForm").addEventListener("submit", function (event) {
        // Check required fields and display error messages
        const from_date = document.getElementById("fromDate");
        const to_date = document.getElementById("toDate");
        const holiday_name = document.getElementById("eventDescription");

        if (!from_date.value) {
            displayError("from_date_error", "Please select From Date.");
            event.preventDefault();
        } else {
            clearError("from_date_error");
        }

        if (!to_date.value) {
            displayError("to_date_error", "Please select To Date.");
            event.preventDefault();
        } else {
            clearError("to_date_error");
        }

        if (!holiday_name.value) {
            displayError("holiday_name_error", "Description is required.");
            event.preventDefault();
        } else {
            clearError("holiday_name_error");
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

        // Add validation to prevent selecting past dates
        const today = new Date().toISOString().split("T")[0]; // Get today's date in yyyy-mm-dd format
    document.getElementById("fromDate").setAttribute("min", today);
    document.getElementById("toDate").setAttribute("min", today);
    
</script>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>

</html>

<?php
// error_reporting(0);
if(isset($_POST['submit']))
{
        // $emp_name = $_POST['emp_name'];
    
        $from_date = $_POST['from_date'];
    
        $to_date = $_POST['to_date'];
    
        $holiday_name = $_POST['holiday_name'];

    $query = "UPDATE `add_holiday` SET `from_date`='$from_date',`to_date`='$to_date',`holiday_name`='$holiday_name' WHERE id = '$id'";
    $data = mysqli_query($conn, $query);

    if ($data) {
        // Show a success SweetAlert and redirect
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Record Updated Successfully',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location.href = 'manage_holiday.php';
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