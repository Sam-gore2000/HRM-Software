<?php
session_start();

include("db.php");

$userprofile = $_SESSION['$user_name'];
if ($userprofile == true) {

} else {
    header('location:login_admin.php');
}

if (isset($_POST['submit'])) {
    $team = $_POST['teamname'];
    $members = isset($_POST['members']) && is_array($_POST['members']) ? implode(", ", $_POST['members']) : '';

    // Validate input
    if (empty($team) || empty($members)) {
        echo "
        <script type='text/javascript'>
            Swal.fire({
                title: 'Error!',
                text: 'Please fill in all the fields.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>";
    } else {
        $query = "INSERT INTO `add_team` (`teamname`, `members`) VALUES ('$team', '$members')";
        $data = mysqli_query($conn, $query);

        if ($data) {
            // Data inserted successfully
            echo "
            <script type='text/javascript'>
                Swal.fire({
                    title: 'Team Added Successfully',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000
                }).then(function() {
                    window.location.replace('add_team.php');
                });
            </script>";
        } else {
            // Data not inserted
            echo "
            <script type='text/javascript'>
                Swal.fire({
                    title: 'Error!',
                    text: 'Something went wrong. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            </script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<?php
session_start();

include("db.php");

$userprofile = $_SESSION['$user_name'];

// Check if the user is logged in
if (!$userprofile) {
    header('location:login_manager.php');
}

// Update the last activity time in the session
$_SESSION['last_activity'] = time();

// Check if the user has been inactive for more than 1 minute
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 180)) {
    // Destroy the session and redirect to the login page
    session_unset();
    session_destroy();
    header('location:login_manager.php');
    exit();
}

?>


<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sourcecode-Manager Dashboard</title>
<link rel="stylesheet" href="style_admin.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="stylezzz.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

   
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <!-- Bootstrap CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
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

    <!-- Other CSS Links -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />        
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="stylezzz.css">
    <link rel="stylesheet" href="style_admin.css" />

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <style>
    .error {
      color: red;
    }
    ::placeholder{
        font-size: 14px;
    }
    #multiSelectDropdown
    {
        border: 1px solid;
        font-size: 14px;
    }
    </style>
    <title>SourceCode Admin Dashboard</title>
</head>

<body>

  <?php
    include "include/header_ad.php";
    ?>
  
  <main class="mt-5 pt-3">
    <div class="container">
            <h2><b>Create Team</b></h2>
        <div class="rkform">
            <form class="row g-3 ms-2 me-2" method="POST" id="teamForm" novalidate>

                <div class="col-md-6">
                    <label for="project_name" class="form-label">Team Name</label>
                    <input type="text" class="form-control" id="team_name" name="teamname" placeholder="Enter your team name">
                    <div class="error" id="team_nameError"></div>
                </div>

                <div class="col-md-6">

                <div class="dropdown col-md-6 ">
                <label for="team_size" class="">Team Members</label>
                    <button class="btn dropdown-toggle" type="button" class=""
                        id="multiSelectDropdown" data-bs-toggle="dropdown" aria-expanded="false" required>
                        Select Team Members
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="multiSelectDropdown">
                    <li>                                             
                <?php
                $i = 1;
                $query_show = mysqli_query($conn, "SELECT * FROM add_employe ORDER BY emp_name,emp_id ASC");
                while ($show = mysqli_fetch_array($query_show)) {
                ?>
                <input type="checkbox"   name="members[]" value="<?php echo $show['emp_id'] . '-' . $show['emp_name']; ?>
">
                    <?php echo $show['emp_id']; ?> (<?php echo $show['emp_name']; ?>)<br><br>          
                <?php $i++;               
                }
                ?>
                </li>
                </ul>
                        
                </div> 
                    
                </div>

                <div class="col-12 mb-3">
                   <center> <button id="submitBtn" type="submit" class="btn btn-primary" name="submit">Submit</button></center> 
                </div>
            </form>
        </div>
    </div>
</main>


<main class="mt-5 pt-3">
  <div class="container">
<h2 align="center"><b>Manage Team Members</b></h2>
<hr>
<table id="example" class="table table-striped table-responsive" style="width:100%">
          <thead>
            <tr>
              <th width="10%">Sr_No</th>
              <th width="10%">Team_Name</th>
              <th width="65%">Team_Members</th>
              <th width="15%">Action</th>
            </tr>
          </thead>
          <?php
include("db.php");

$query = "SELECT * FROM `add_team` ORDER BY id DESC";
$data = mysqli_query($conn, $query);

$total = mysqli_num_rows($data);

if ($total != 0) {
    include "include/header_ad.php";
    ?>
    
        <tbody>
        <?php
        $rowNumber = 0; // Initialize the row number counter
        while ($result = mysqli_fetch_assoc($data)) {
            $rowNumber++; // Increment the row number
            echo "<tr>
                <td>" . $rowNumber . "</td> <!-- Display the row number -->
                <td>" . $result['teamname'] . "</td>
                <td>" . $result['members'] . "</td>
                <td>
                    <a class='btn text-white btn-info mb-2' style='font-size: 14px;' href='team_update.php?id=$result[id]'><i class='fa fa-edit'></i></a>
                    <a class='btn text-white btn-danger  mb-2' style='font-size: 14px;' href='team_delete.php?id=$result[id]'><i class='fa fa-trash'></i></a>
                </td>
            </tr>";
        }
        ?>
        </tbody>
    </table>

    <?php
    } else {
        echo "No records found";
    }
    ?>
  </tbody>
</table>
</div>
  </main>

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



<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- DataTables CSS and JS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<!-- Popper.js and Bootstrap JS Bundle -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>

</html>