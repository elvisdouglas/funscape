<?php
include 'conn.php';

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funscape Game station</title>
    <link rel="stylesheet" href="../bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../main.css" />
</head>

<body style="background: url('../images/spider2.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center; background-attachment: fixed;">
    <!--------main container------------>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <!---------login container------------------->
        <div class="row border rounded-4 p-3 shadow box-area">
            <!----------------left box-------------------------->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box">
                <div class="featured-image mb-3">
                    <img src="../images/as.png" class="img-fluid d-flex" />
                </div>
                <p class="text-bg-danger fs-2" style="font-family: 'Courier New', sans-serif; font-weight: bolder">Welcome to Funscape</p>
                <small class="text-bg-danger text-wrap text-center" style="width: 22rem;font-family: 'Courier New', sans-serif">Enjoy the Gaming Experience</small>
            </div>
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h1 class="tito">Register User</h1>
                        <h3 class="tito1">Welcome to Funscape</h3>
                    </div>


                    <!---------------------------register form----------------------------------->
                    <form action="register.php" method="post" novalidate>
                        <div class="form-group mb-2">
                            <label for="name" class="form-label" style="color: #fff; font-weight: bold;">Name</label>
                            <input type="text" id="name" name="name" class="form-control form-control-lg bg-light fs-6" placeholder="Enter name">
                        </div>
                        <div class="form-group mb-2">
                            <label for="email" class="form-label" style="color: #fff; font-weight: bold;">Email</label>
                            <input type="email" id="email" name="email" class="form-control form-control-lg bg-light fs-6" placeholder="Enter Email Address">
                        </div>
                        <div class="form-group mb-2">
                            <label for="password" class="form-label" style="color: #fff; font-weight: bold;">Password</label>
                            <input type="password" id="password" name="password" class="form-control form-control-lg bg-light fs-6" placeholder="Enter password">
                        </div>
                        <div class="form-group mb-2">
                            <label for="password_confirmation" class="form-label" style="color: #fff; font-weight: bold;">Repeat password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-lg bg-light fs-6" placeholder="Repeat Password">
                        </div>
                        <div class="input-group mb-2">
                            <button class="btn btn-lg btn btn-outline-info w-100 fs-6">Register</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>

</html>