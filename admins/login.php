<?php
include('includes/header.php'); 

?>

<?php
if(isset($_SESSION['user_id'])){
    header("location:index.php");
}

?>

<?php
include 'conn.php';


$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/conn.php";
    
    $sql = sprintf("SELECT * FROM register
                    WHERE email = '%s'",
                    $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            session_start();

            session_regenerate_id();

            $_SESSION["user_id"] = $user["id"];

            header("refresh:1;url='index.php");
            exit;
        }
    }
    $is_invalid = true;
}
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


<body style="background: url('../images/btt.png'); background-size: cover; background-repeat: no-repeat; background-position: center; background-attachment: fixed;">
    <!--------main container------------>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <!---------login container------------------->
        <div class="row border rounded-4 p-3 shadow box-area">
            <!----------------left box-------------------------->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box">
                <div class="featured-image mb-3">
                    <img src="../images/nfs.png" class="img-fluid d-flex" />
                </div>
                <p class="text-bg-danger fs-2" style="font-family: 'Courier New', sans-serif; font-weight: bolder">Welcome to Funscape</p>
                <small class="text-bg-danger text-wrap text-center" style="width: 22rem;font-family: 'Courier New', sans-serif">Enjoy the Gaming Experience</small>
            </div>
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h1 class="tito">Hello, Admin</h1>
                        <h3 class="tito1">Welcome to Funscape </h3>
                    </div>



                    <!---------------Login Form------------------------>

                    <?php if ($is_invalid): ?>
                        <em>Invalid Login</em>
                    <?php endif; ?>
                    <form method="post">
                        <div class="form-group mb-2">
                            <label for="email" class="form-label" style="color: #fff; font-weight: bold;">Email</label>
                            <input type="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" name="email" class="form-control fs-6" placeholder="Enter Access Email">
                        </div>
                        <div class="form-group mb-2">
                            <label for="password" class="form-label" style="color: #fff; font-weight: bold;">password</label>
                            <input type="password" id="password" name="password" class="form-control fs-6" placeholder="Enter Password">
                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-lg btn btn-danger w-100 fs-6" style="font-weight: bold">Login</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

</body>

<?php
include('includes/scripts.php'); 
?>