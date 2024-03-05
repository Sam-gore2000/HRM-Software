<?php
$servername="localhost";
$username="root";
$password="";
$dbname="db_admin";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn){
    echo "connection succesfull";
}
else{
    echo "not connected";
}






?>


<?php
// include ("db.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sourcecode-Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">
    <style>
 
        .row{
            background-color: gray;
        }
        .d-flex .btn{
            padding: 6px;
            margin: 6px;
        }
        



        </style>

</head>
<body>


      <div class="border rounded-5">
    
    <section class="w-100 px-4 py-5 bg-dark" style="border-radius: .5rem .5rem 0 0;">
      <div class="row">
        <div class="col">
          <div class="card card-registration">
            <div class="row g-0">
             
              <div class="col-xl-6">
                <div class="card-body p-md-5 text-black">
                  <h4 class="mb-5 text-uppercase text-center">Student registration form</h4>
                  <form  method="post">

                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="form3Example1m">First name</label>
                        <input type="text" id="firstname" class="form-control form-control-lg" fdprocessedid="rycpn" name="firstname">
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="form3Example1n">Last name</label>
                        <input type="text" id="lastname" class="form-control form-control-lg" fdprocessedid="756x4g" name="lastname">
                      </div> 
                    </div>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example8">Address</label>
                    <input type="text" id="address" class="form-control form-control-lg" fdprocessedid="99vvuo" name="address">
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example90">city</label>
                    <input type="text" id="pin" class="form-control form-control-lg" fdprocessedid="oa4m1t" name="city">
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example90">Pincode</label>
                    <input type="text" id="pin" class="form-control form-control-lg" fdprocessedid="oa4m1t" name="pin">
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example90">Course</label>
                    <input type="text" id="pin" class="form-control form-control-lg" fdprocessedid="oa4m1t" name="course">
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example97">Email ID</label>
                    <input type="text" id="email" class="form-control form-control-lg" fdprocessedid="hzio1" name="email">
                  </div>
                  <div class="d-flex justify-content-center pt-4">
                    <button type="button" name="submit" class="btn btn-warning btn-lg ms-6" fdprocessedid="cgwrrb">Submit</button>
                  </div>
                  </div>             
    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
    <?php
// include 'db.php';


if(isset($_POST['submit'])){
   

$firstname =$_POST['firstname'];
$lastname  =$_POST['lastname'];
$address   =$_POST['address'];
$city      =$_POST['city'];
$pin       =$_POST['pin'];
$course    =$_POST['course'];
$email     =$_POST['email'];

$sql = "INSERT INTO `register`(`firstname`, `lastname`, `address`, `city`, `pin`, `course`, `email`) VALUES( '$firstname', '$lastname', '$address', '$city', '$pin', '$course', '$email')";

$data = mysqli_query($conn, $sql);
if ($data) {
    // echo "Data Inserted";
    echo "Add Succesfully";
 
   
    }
    else{
     echo "data Not Updated";
    }

}
?>



















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   
</body>
</html>