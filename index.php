<?php
include "include/header.php";
?>

<body>
    <!--------main container------------>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <!---------login container------------------->
        <div class="row border rounded-4 p-3 shadow box-area">
            <!----------------left box-------------------------->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box">
                <div class="featured-image mb-3">
                    <img src="images/bt.png" class="img-fluid d-flex" />
                </div>
                <p class="text-bg-danger fs-2" style="font-family: 'Courier New', sans-serif; font-weight: bolder">Welcome to Funscape</p>
                <small class="text-bg-danger text-wrap text-center" style="width: 22rem;font-family: 'Courier New', sans-serif">Enjoy the Gaming Experience</small>
            </div>
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h1 class="tito">Hello, Again</h1>
                        <h3 class="tito1">Welcome back to Funscape Manager</h3>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Enter Access name">
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Enter Password">
                    </div>
                    <div class="input-group mb-3">
                        <button class="btn btn-lg btn btn-outline-danger w-100 fs-6">Login</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>