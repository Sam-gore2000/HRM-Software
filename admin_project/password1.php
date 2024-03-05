<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style3.css">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Sourcecode-Admin Dashboard</title>
</head>

<body>

    <?php
    include "include/header_ad.php";
    ?>

<main>
<div class="card login-form">
    <div class="card-body">
        <h3 class="card-title text-center">Reset password</h3>

        <div class="card-text">
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Enter your email address and we will send you a link to reset your
                        password.</label>
                    <input type="email" class="form-control form-control-sm" placeholder="Enter your email address">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Send password reset email</button>
            </form>
        </div>
    </div>
</div>
</main>

</body>
</html>