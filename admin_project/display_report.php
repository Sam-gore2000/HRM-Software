<!--===CONNECTION FILE===-->
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
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!--===BOOTSTRAP CDN LINK===-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

        <!--===FONTAWESOME CDN LINK===-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
         integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="css/bootstrap.min.css" />        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
        <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />

        <!--===CSS STYLE===-->
        <link rel="stylesheet" href="stylezzz.css">
        <link rel="stylesheet" href="style_admin.css" />
        <link rel="stylesheet" href="css/style.css">
        <title>Sourcecode-Admin Dashboard</title>

        <!--===INTERNAL CSS===-->
        <style>
            table 
            {   
                width: 800px;
                margin: 0 auto;
            }

            td, th 
            {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }
            .update 
            {
                background-color: lightseagreen;
            }
            .container-fluid
            {   
                padding-top: 20px;
                align-content: center;
                box-shadow: 0 0 10px rgba(244, 2, 2, 0.1);
                padding-left: 20px;
                padding-right: 20px;
                margin-left: 20px;
                margin-right: 20px;
            }
            table
            {
                max-width:max-content;
                background:white;
            }
            select 
            {
                width: 30%;
                padding: 10px;
                border: 1px solid black;
                border-radius: 4px;
                box-sizing: border-box;
                font-size: 12px;
            
            }
            th
            {
                padding-bottom: 20px;
                font-size: 17px;
                text-shadow: 1px 1px black;
                text-align: center;
                border-bottom: 1px solid #ddd;
            }
            td
            {
                font-size: 15px;
                font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
                text-align: center;
                border-bottom: 1px solid #ddd;
            }
            h2
            {
                text-shadow: 1.5px 1.5px whitesmoke;
                font-size: 30px;  
            }
            tr:hover
            {
                background-color: white;
            }

        </style>
        </head>
        <body>
        
        <!--===INCLUDE/HEADER FILE===-->
            <?php
            include "include/header_ad.php";
            ?>
        <!--===MANAGE LEAVE===-->
        <div class="container-fluid">
        <main mt-3 pt-5>
        <h2><b>Manage Report</b></h2><hr>

        <table class="center" cellspacing="7" width="100%"> 
          <tr>
              <th width="5%" >Id</th>
              <th width="8%" >Department</th>
              <th width="10%" >Shift</th>
              <th width="10%" >Year</th>
              <th width="10%" >Month</th>
              <th width="10%" >Action</th>
          </tr>
        
          <?php
           
           include ("db.php");

           error_reporting(0);

           $query="SELECT * FROM `report`";
           $data=mysqli_query($conn,$query);
           $total=mysqli_num_rows($data);
           $result=mysqli_fetch_assoc($data);
           if($total !=0)

           {  while($result=mysqli_fetch_assoc($data))
            {
                echo 
                "<tr>
                    <td>" .$result['id']. "</td>
                    <td>" .$result['dept']. "</td>
                    <td>" .$result['shift']. "</td>
                    <td>" .$result['year']. "</td>
                    <td>" .$result['month']. "</td>
                    
                    
                    <td>
                    <a href='update_attendance.php?id=$result[id]'>
                        <input type='submit' value='Update' class='update'>
                        <i class='fa-solid fa-pen fa-beat fa-xs'></i>
                            
                    </a>

                    <a href='delete_attendance.php?id=$result[id]'>
                        <input type='submit' value='Delete' class='delete' onclick='return checkdelete()'>
                        </a>
                    </td>
                </tr>
            ";
            }
            }
            else
            {
               // echo  "No records found";
            }
        ?>
    </table>
    </div>

    <script>
        function checkdelete()
        {
            return confirm('are you sure! you want to delete this record');
        }
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