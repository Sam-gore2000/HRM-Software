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
    

<?php
include "db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve the file path before deleting the record
    $query = "SELECT uploadfile FROM add_employe WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $filePath = $row['uploadfile'];

    // Delete the record from the database
    if (isset($_GET['confirm']) && $_GET['confirm'] === 'true'){
    $deleteQuery = "DELETE FROM add_employe WHERE id = $id";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        // Use unlink() to delete the associated file from the server
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Show a success SweetAlert and redirect
        echo 
        "<script type='text/javascript'>
        Swal.fire({
            title:'Data deleted successfully',
            icon:'success',
            showConfirmButton: false,
            timer:2000
        }).then(function() {
            window.location.replace('display.php');
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
            window.location.href = 'delete.php?id=$id&confirm=true';
        } else {
            // If the user cancels, simply return to the previous page
            window.location.replace('display.php');
        }
    });
    </script>";
}
}
?>