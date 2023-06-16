  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>


  <?php

/*
if (empty($_POST["name"])) {
    echo("Name is required");
    header("refresh:3;url=signup.php");
    exit();
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    echo("Valid email is required");
    header("refresh:3;url=signup.php");
    exit();
}

if (strlen($_POST["password"]) < 8) {
    echo("Password must be at least 8 characters");
    header("refresh:3;url=signup.php");
    exit();
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    echo("Password must contain at least one letter");
    header("refresh:3;url=signup.php");
    exit();
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    echo("Password must contain at least one number");
    header("refresh:3;url=signup.php");
    exit();
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    echo("Passwords don't match");
    header("refresh:3;url=signup.php");
    exit();
}


//retrieving data from form
$username = $_POST["name"];
$email = $_POST["email"];
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$conn = require __DIR__ . "/conn.php";


$sql = "INSERT INTO user (names, email, password_hash)
        VALUES ('$username', '$email', '$password_hash')";


if ($conn->query($sql) === TRUE) {
    //redirect to admin dashboard
    echo "User registered successfully";
    header("refresh:3;url=login.php");
    exit();
} else {
    if ($mysqli->errno === 1062) {
        echo("email already taken");
        header("refresh:3;url=signup.php");
        exit();
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
    //echo "Error: " . $sql . "<br>" . $con->error;
}
*/


?>