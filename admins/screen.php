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

<body style="background: url('../images/gr1.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center; background-attachment: fixed;">
    <!--------main container------------>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <!---------login container------------------->
        <div class="row border rounded-4 p-3 shadow box-area">
            <!----------------left box-------------------------->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box">
                <div class="featured-image mb-3">
                    <img src="../images/as.png" class="img-fluid d-flex" />
                </div>
                <p class="text-bg-danger fs-2" style="font-family: 'Courier New', sans-serif; font-weight: bolder; padding: 8px 20px;">Welcome to Funscape</p>
                <small class="text-bg-danger text-wrap text-center" style="width: 18rem; font-family: 'Courier New', sans-serif; font-weight:bold; padding: 8px 18px;">Enjoy the Gaming Experience</small>
            </div>

            <!----------------right box-------------------------->
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h1 class="tito">Add Screen</h1>
                    </div>

                    <!---------------------------register form----------------------------------->
                    <form action="add_screen.php" method="post" novalidate>
                        <div class="form-group mb-2">
                            <label for="name" class="form-label" style="color: #fff; font-weight: bold;">Screen Name</label>
                            <input type="text" id="name" name="name" class="form-control form-control-lg bg-light fs-6" placeholder="Enter screen Name">
                        </div>

                        <!--------------------------
                        Adding time
                        <div class="form-group mb-2">
                        <select name="time">
                            <option disabled selected>Choose Time</option>
                            <option value="30">30 Minutes</option>
                            <option value="60">1 Hours</option>
                            <option value="90">1 Hour 30 minutes</option>
                            <option value="120">2 Hours</option>
                            <option value="180">3 Hours</option>
                        </select>
                        </div>  
                        
                        
                        <div class="form-group mb-2">
                            <label for="price" class="form-label" style="color: #fff; font-weight: bold;">Price</label>
                            <input type="text" id="price" name="price" class="form-control form-control-lg bg-light fs-6" placeholder="Enter Price" required>
                        </div>

                        ----->
                        <div class="input-group mb-2">
                            <button class="btn btn-lg btn btn-secondary w-100 fs-6" style="color: #fff; text-decoration: none; font-weight: bold;">Add screen</button>
                        </div>
                        <div class="input-group mb-2">
                            <button class="btn btn-lg btn btn-danger w-100 fs-6"><a href="../users.php" style="color: #fff; text-decoration: none; font-weight: bold;" >Back to Users Dashboard</a></button>
                        </div> 
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>

</html>