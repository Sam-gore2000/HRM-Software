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
include "db.php";

function deleteFiles($filePaths) {
    foreach ($filePaths as $filePath) {
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve the file paths before deleting the record
    $query = "SELECT myfile, myfile1, myfile2, myfile3 FROM emp_docs WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $filePaths = [
        $row['myfile'],
        $row['myfile1'],
        $row['myfile2'],
        $row['myfile3'],
    ];

    // Delete the record from the database
    $deleteQuery = "DELETE FROM emp_docs WHERE id = $id";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        // Use the deleteFiles function to delete the associated files from the server
        deleteFiles($filePaths);

        // Show a success SweetAlert and redirect
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Record Deleted Successfully',
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
                title: 'Data not deleted',
                text: 'Something went wrong!',
            });
        </script>";
    }
}
?>