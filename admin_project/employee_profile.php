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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sourcecode-Admin Dashboard</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</head>

<body>

    <div class="card">
        <div class="">
            <h5>Employee Details</h5>
        </div>
        <div class="card-body">
            <!-- <p>Already have an account? <a href="page-login.php">Log in instead!</a></p> -->
            <?php
            include 'db.php';
            $id = $_GET['id'];
            $query = "SELECT * FROM `add_employe` WHERE id = '$id'";
            $query_show = mysqli_query($conn, $query);
            $show = mysqli_fetch_assoc($query_show);
            ?>
            <form action="update.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Customer Profile <span class="required">*</span></label><br>
                        <img src="<?php echo $show['uploadfile']; ?>" width="100px" height="" alt="">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Email Address <span class="required">*</span></label>
                        <h6><?php echo $show['email']; ?></h6>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Full Name <span class="required">*</span></label>
                        <h6><?php echo $show['name']; ?></h6>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Mobile Number <span class="required">*</span></label>
                        <h6><?php echo $show['mob1']; ?></h6>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Employee ID <span class="required">*</span></label>
                        <h6><?php echo $show['e_id']; ?></h6>
                    </div>
                    <div class="form-group col-md-6">
                        <label>DOB <span class="required">*</span></label>
                        <h6><?php echo $show['dob']; ?></h6>
                    </div>
                    <div class="form-group col-md-6">
                        <label>designation<span class="required">*</span></label>
                        <h6><?php echo $show[' 	designation']; ?></h6>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Address <span class="required">*</span></label>
                        <h6><?php echo $show['padd']; ?></h6>
                    </div>
                    <!-- <div class="col-md-12">
                                                                            <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Account details</a>
                                                                            <button type="submit" class="btn btn-sm btn-fill-out submit font-weight-bold" name="submit" value="Submit">Edit Details</button>
                                                                        </div> -->
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
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