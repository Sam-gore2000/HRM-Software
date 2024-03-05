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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sourcecode-Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
</head>
<body>
    
</body>
</html>

<?php
include("db.php");

$id = $_GET['id'];

// Check if a confirmation flag is set in the URL
if (isset($_GET['confirm']) && $_GET['confirm'] === 'true') {
    $query = "DELETE FROM add_query WHERE id = '$id' ";
    $data = mysqli_query($conn, $query);

    if ($data) {
        echo 
        "<script type='text/javascript'>
        Swal.fire({
            title: 'Data deleted successfully',
            icon: 'success',
            showConfirmButton: false,
            timer: 2000
        }).then(function() {
            window.location.replace('manage_query.php');
        });
        </script>";
    } else {
        echo "Failed To Delete";
    }
} else {
    // Show the confirmation dialog
    echo 
    "<script type='text/javascript'>
    Swal.fire({
        title: 'Confirm Deletion',
        text: 'Are you sure you want to delete this record?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // If the user confirms, redirect with a confirmation flag
            window.location.href = 'query_delete.php?id=$id&confirm=true';
        } else {
            // If the user cancels, simply return to the previous page
            window.location.replace('manage_query.php');
        }
    });
    </script>";
}
?>