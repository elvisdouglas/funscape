<?php
include 'conn.php';
include 'include/header.php';

session_start();

if (isset($_SESSION["user_id"])){
    $mysqli = require __DIR__ . "/conn.php";

    $sql = "SELECT * FROM user 
            WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}
?>

<?php if (isset($_SESSION["user_id"])): ?>
    <p>You are logged in</p>
    <?php else: ?>
        <p><a href="login.php">Login</a> or <a href="register.php">Sign up</a></p>
    <?php endif ?>

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
                        <h1 class="tito">Hello, <?= htmlspecialchars($user["names"]) ?></h1>
                        <h3 class="tito1">Welcome to Funscape </h3>
                    </div>
                    <div class="form-group mb-3">
                        <button class="btn btn-lg btn btn-outline-danger w-100 fs-6"><a href="logout.php" style="font-weight:bolder; color: #fff; text-decoration: none;">Log Out</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>