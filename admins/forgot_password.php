<?php session_start(); ?>
<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include 'conn.php';

$conn = require __DIR__ . "/conn.php";

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $n_p = $_POST['n_p'];
    $c_p = $_POST['c_p'];

    $sql = mysqli_query($conn, "SELECT email, password_hash FROM register WHERE email = '$email' AND password_hash = '$password'");

    $num = mysqli_fetch_array($sql);

    if($num > 0){
        $con = mysqli_query($conn, "UPDATE register set password_hash = '$n_p' WHERE email = '$email'");
        echo ("password updated");
        header("location:admins.php");
    }else{
        echo ("password not updated");
        header("location:admins.php");
    }
}


?>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
  </div>

<div class="card-body">

            
    <form action="" name="change_p" method="post" onSubmit="return valid();">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="">Email</label>
                <input type="text" name="email" id="user_email"  class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Current Password</label>
                <input type="password" name="password" id="password"  class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">New password</label>
                <input type="password" name="n_p" id="n_p" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Confirm Password</label>
                <input type="password" name="c_p" id="c_p" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <button type="submit" name="submit" value="change password" class="btn btn-success">Change Password</button>
            </div>
        </div>
    </form>

</div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
