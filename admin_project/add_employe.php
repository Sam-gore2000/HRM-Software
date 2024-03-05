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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style_admin.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />

  <link rel="stylesheet" href="stylezzz.css">

  <title>SourceCode Admin Dashboard</title>
  <style>
    .error {
      color: red;
    }
    ::placeholder{
        font-size: 14px;
    }
    </style>
</head>

<body>

  <!-- navigation & offcanvas starts -->

  <?php
  include "include/header_ad.php";
  ?>

  <!-- navigation & offcanvas ends -->



  <main class="mt-5 pt-3">
    


  <div class="container mt-5">
     <h2><b>Add Employee</b></h2>
        <form action="#" method="POST" enctype="multipart/form-data" id="validForm" >
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="firstName">Employe Name</label>
                    <input type="text" class="form-control" id="emp_name" name="emp_name" placeholder="Employe Name">
                    <div class="error" id="emp_nameError"></div>
                </div>
                <div class="form-group col-md-6">
                    <label for="lastName">Employe ID</label>
                    <input type="text" class="form-control" id="emp_id" name="emp_id" placeholder="Employe ID">
                    <div class="error" id="emp_idError"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="firstName">Email</label>
                    <input type="email" class="form-control" id="emp_email" name="email" placeholder="Employe Email">
                    <div class="error" id="emp_emailError"></div>
                </div>
                <div class="form-group col-md-6">
                    <label for="lastName">Date Of Birth</label>
                    <input type="date" class="form-control" id="emp_dob" name="emp_dob" placeholder="Date Of Birth">
                    <div class="error" id="emp_dobError"></div>

                </div>
            </div>
            <div class="form-row">
          
                <div class="form-group col-md-6">
                    <label for="firstName">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="emp_password" name="emp_password" placeholder="Employee Password">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-secondary" id="generatePassword">Generate <i class="bi bi-eye" id="togglePassword"></i></button>
                           
                        </div>
                    </div>
                    <div class="error" id="emp_passError"></div>
                </div>
    
                <div class="form-group col-md-6">
                <label for="position">Designation</label>
                <select class="form-control" id="emp_position" name="designation">
                    <option value="Select Position">Select Position</option>
                    <option value="Front-End Developer">Front-End Developer</option>
                    <option  value="Back-End Developer"> Back-End Developer</option>
                    <option  value="Software Developer">Software Developer</option>
                    <!-- <option  value="Fullstack Developer">Fullstack Developer</option> -->
                    <option  value="Manager">Manager</option>
                    <!-- <option  value="Digital marketing executive">Digital marketing executive</option> -->
                    <!-- <option  value="Data Analyst">Data Analyst</option> -->
                    <option value="HR">HR</option>

                </select>
                <div class="error" id="emp_postError"></div>

                    
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="position">Gender</label>
                <select class="form-control" id="emp_gender" name="gender">
                    <option value="Select Gender">Select Gender</option>
                    <option value="Male">Male</option>
                    <option  value="Female"> Female</option>
                    
                    <option value="Other">Other</option>

                </select>
                <div class="error" id="emp_genderError"></div>

                </div>
                <div class="form-group col-md-6">
                <label for="position">Marital Status</label>
                <select class="form-control" id="emp_status" name="married_status">
                <option value="Select Status">Select Status</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                 
                    <option value="Other">Other</option>

                </select>
                <div class="error" id="emp_statusError"></div>

                </div>
            </div>
            
            <div class="form-row">
             <div class="form-group col-md-6">
                <label for="firstName">Phone No*</label>
                <input type="text" class="form-control " id="emp_phone" id="mobileNumber1"  placeholder="Phone Number" name="emp_mob1" pattern="\d{10}" oninput="validateMobileNumber(this)">
                <div class="error" id="emp_mobError" maxlength="10"></div>
            </div>


            <div class="form-group col-md-6">
                <label for="lastName">Phone Number</label>
                <input type="text" class="form-control " id="emp_phone2" id="mobileNumber2" name="emp_mob2" placeholder="Phone Number" pattern="\d{10}"  maxlength="10">
                <div class="error" id="emp_mob2Error"></div>
              </div>
            </div>

            <div class="form-row">
                    
            <div class="form-group col-md-6">
                <label for="firstName">Current Address</label>
                <input type="text" class="form-control" id="emp_add" name="emp_add" placeholder="Employee Current Address">
                <div class="error" id="emp_addError"></div>
            </div>

            <div class="form-group col-md-6">
                <label for="lastName">Permanent Address</label>
                <input type="text" class="form-control" id="emp_padd" name="emp_padd" placeholder="Employee Permanent Address">
                
                <!-- Add a checkbox for the user to indicate whether the permanent address is the same as the current address -->
                <input type="checkbox" id="sameAddress" onclick="setPermanentAddress()">
                <label for="sameAddress">Same as Current Address</label>
                <div class="error" id="emp_paddError"></div>
            </div>
        </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="firstName">Photo</label>
                    <input type="file" class="form-control-file" id="emp_photo" name="uploadfile" >
                    <div class="error" id="emp_photoError"></div>

                </div>
                <div class="form-group col-md-6">
                    <label for="lastName">Comment</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment" ></textarea>
                   
                </div>
            </div>
           
                    <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstName">Account No</label>
                        <input type="text" class="form-control" id="emp_ac" name="ac_num" placeholder="Account No" pattern="\d{6,18}" maxlength="18">
                        <div class="error" id="emp_acError"></div>
                    </div>


                <div class="form-group col-md-6">
                    <label for="lastName">Bank Name</label>
                    <input type="text" class="form-control" id="emp_bank" name="bank_name" placeholder="Bank Name">
                    <div class="error" id="emp_banknError"></div>

                </div>
               

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="firstName">Branch Name</label>
                    <input type="text" class="form-control" id="emp_branch" name="branch_name" placeholder="Branch Name">
                    <div class="error" id="emp_branchError"></div>

                </div>
                <div class="form-group col-md-6">
                    <label for="lastName">IFSC Code</label>
                    <input type="text" class="form-control" id="emp_ifsc" name="bank_code" placeholder="IFSC Code">
                </div>
                <div class="error" id="emp_ifscError"></div>

            </div>
            
        
           
            <center><button type="submit" class="btn btn-primary" name="submit">Submit</button></center>
        </form>
    </div>

        
  </main>


<script>
    document.getElementById("validForm").addEventListener("submit", function (event) {
        // Check required fields and display error messages
        const empName = document.getElementById('emp_name');
        const empID = document.getElementById('emp_id');
        const empEmail = document.getElementById('emp_email');
        const empDob = document.getElementById('emp_dob');
        const empPassword = document.getElementById('emp_password');
        const empGender = document.getElementById('emp_gender');
        const empMob1 = document.getElementById('emp_mob1');
        const empAdd = document.getElementById('emp_add');
        const empPadd = document.getElementById('emp_padd');
        const empStatus = document.getElementById('emp_status');
        const empPhoto = document.getElementById('emp_photo');
        const empAc = document.getElementById('emp_ac');
        const empBank = document.getElementById('emp_bank');
        const empBranch = document.getElementById('emp_branch');
        const empIfsc = document.getElementById('emp_ifsc');
        const empPosition = document.getElementById('emp_position');

        if (!emp_name.value) {
            displayError("emp_nameError", "Please Enter Name.");
            event.preventDefault();
        } else {
            clearError("emp_nameError");
        }

        if (!emp_id.value) {
            displayError("emp_idError", "Please Enter ID.");
            event.preventDefault();
        } else {
            clearError("emp_idError");
        }

        if (!emp_email.value) {
            displayError("emp_emailError", "Please Enter Email.");
            event.preventDefault();
        } else {
            clearError("emp_emailError");
        }

        if (!emp_dob.value) {
            displayError("emp_dobError", "Please Enter DOB.");
            event.preventDefault();
        } else {
            clearError("emp_dobError");
        }
        if (!emp_password.value) {
            displayError("emp_passError", "Please Enter Password.");
            event.preventDefault();
        } else {
            clearError("emp_passError");
        }
        if (!emp_position.value) {
            displayError("emp_postError", "Please Enter Designation.");
            event.preventDefault();
        } else {
            clearError("emp_postError");
        }

        if (!emp_gender.value) {
            displayError("eemp_genderError", "Please Enter Gender.");
            event.preventDefault();
        } else {
            clearError("emp_genderError");
        }
        if (!emp_status.value) {
            displayError("emp_statusError", "Please Enter Status.");
            event.preventDefault();
        } else {
            clearError("emp_statusError");
        }
        if (!emp_phone.value) {
            displayError("emp_mobError", "Please Enter Mobile No.");
            event.preventDefault();
        } else {
            clearError("emp_mobError");
        }
        if (!emp_add.value) {
            displayError("emp_addError", "Please Enter Address.");
            event.preventDefault();
        } else {
            clearError("emp_addError");
        }
        if (!emp_padd.value) {
            displayError("emp_paddError", "Please Enter Address.");
            event.preventDefault();
        } else {
            clearError("emp_paddError");
        }

        if (!emp_photo.value) {
            displayError("emp_photoError", "Please Enter Photo.");
            event.preventDefault();
        } else {
            clearError("emp_photoError");
        } 
         if (!emp_ac.value) {
            displayError("emp_acError", "Please Enter Account No.");
            event.preventDefault();
        } else {
            clearError("emp_acError");
        }
          if (!emp_bank.value) {
            displayError("emp_banknError", "Please Enter Bank Name.");
            event.preventDefault();
        } else {
            clearError("emp_banknError");
        }

        if (!emp_branch.value) {
            displayError("emp_branchError", "Please Enter Branch Name.");
            event.preventDefault();
        } else {
            clearError("emp_branchError");
        }
        if (!emp_ifsc.value) {
            displayError("emp_ifscErrorr", "Please Enter Address.");
            event.preventDefault();
        } else {
            clearError("emp_ifscError");
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
// error_reporting(0);
  if (isset($_POST['submit'])) {
    $ename = $_POST['emp_name'];



    $email = $_POST['email'];
    $dob = $_POST['emp_dob'];
    $designation = $_POST['designation'];
    $eid = $_POST['emp_id'];
    $pass = $_POST['emp_password'];
    



    $gender = $_POST['gender'];
    $mob1 = $_POST['emp_mob1'];
    $mob2 = $_POST['emp_mob2'];
    $add = $_POST['emp_add'];
    $padd = $_POST['emp_padd'];

    
    // Check if the current address is the same as the permanent address
    $addressMatch = ($add == $padd) ? 'Yes' : 'No';
   
    $status = $_POST['married_status'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../image/".$filename;
    move_uploaded_file($tempname,$folder);
    $comment = $_POST['comment'];
    $ac_num = $_POST['ac_num'];
    $bank_name = $_POST['bank_name'];
    $branch_name = $_POST['branch_name'];
    $bank_code = $_POST['bank_code'];


// Array of designations
$designations = array(
    "Select Position",
    "Front-End Developer",
    "Back-End Developer",
    "Software Developer",
    "Fullstack Developer",
    "Manager",
    "Digital Marketing Executive",
    "Data Analyst",
    "HR",
    // Add more designations as needed
);
   
$query = "INSERT INTO `add_employe`( `emp_name`,`email`,`emp_dob`,`designation`,`emp_id`,`emp_password`,`gender`,`emp_mob1`,`emp_mob2`,`emp_add`,`emp_padd`,`married_status`,`uploadfile`,`comment`,`ac_num`,`bank_name`,`branch_name`,`bank_code`) VALUES ('$ename','$email','$dob','$designation','$eid','$pass','$gender','$mob1','$mob2','$add','$padd','$status','$folder','$comment','$ac_num','$bank_name','$branch_name','$bank_code')";


    $data = mysqli_query($conn, $query);

    if ($data) {
        // echo "Data Inserted";
        echo 
     
        "<script type='text/javascript'>
        Swal.fire({
        title:'Add Data successfully',
        icon:'success',
        showConfirmButton: false,
        timer:2000
        }).then(function() {
        window.location.replace('display.php');
        });
        </script>";
        }
        else{
         echo "data Not Updated";
        }
     
     }

  ?>






  <script src="./js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
  <script src="./js/jquery-3.5.1.js"></script>
  <script src="./js/jquery.dataTables.min.js"></script>
  <script src="./js/dataTables.bootstrap5.min.js"></script>
  <script src="./js/script.js"></script>
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



    <!-- sweetalert -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    // Your existing script...

    // Add an event listener to the "Generate" button
    document.getElementById("generatePassword").addEventListener("click", function () {
        const randomPassword = generateRandomPassword();
        document.getElementById("emp_password").value = randomPassword;
    });

    // Function to generate a random password
    function generateRandomPassword() {
        const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        const passwordLength = 8; // You can adjust the length as needed
        let password = "";
        for (let i = 0; i < passwordLength; i++) {
            const randomIndex = Math.floor(Math.random() * charset.length);
            password += charset.charAt(randomIndex);
        }
        return password;
    }
</script>


<script>
    // Function to set the permanent address same as the current address when the checkbox is checked
    function setPermanentAddress() {
        const currentAddress = document.getElementById('emp_add').value;
        const permanentAddressInput = document.getElementById('emp_padd');

        // If the checkbox is checked, set the permanent address same as the current address
        if (document.getElementById('sameAddress').checked) {
            permanentAddressInput.value = currentAddress;
        } else {
            // If the checkbox is unchecked, clear the permanent address
            permanentAddressInput.value = '';
        }
    }
</script>

<script>
    document.getElementById("generatePassword").addEventListener("click", function () {
        const passwordInput = document.getElementById("emp_password");
        const eyeIcon = document.getElementById("togglePassword");

        const randomPassword = generateRandomPassword();
        passwordInput.value = randomPassword;

        // Toggle password visibility
        passwordInput.type = passwordInput.type === "password" ? "text" : "password";
        eyeIcon.classList.toggle("bi-eye");
        eyeIcon.classList.toggle("bi-eye-slash");
    });
</script>
<!-- mobile number -->
<script>
        function validateMobileNumber(input) {
            // Remove non-numeric characters
            input.value = input.value.replace(/\D/g, '');

            // Limit the length to 10 digits
            if (input.value.length > 10) {
                input.value = input.value.slice(0, 10);
            }
        }

        function submitForm() {
            var mobileNumber1 = document.getElementById('mobileNumber1').value;
            var mobileNumber2 = document.getElementById('mobileNumber2').value;

            // Check if both mobile numbers are valid (exactly 10 digits)
            if (mobileNumber1.length === 10 && mobileNumber2.length === 10) {
                alert('Mobile numbers are valid:\nMobile Number 1: ' + mobileNumber1 + '\nMobile Number 2: ' + mobileNumber2);
                // You can submit the form or perform other actions here
            } else {
                alert('Please enter valid 10-digit mobile numbers for both fields');
            }
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