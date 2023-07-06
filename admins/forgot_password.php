<?php 
session_start();

?>
<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include 'conn.php';

$conn = require __DIR__ . "/conn.php";

?>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
  </div>

<div class="card-body">

            
    <form action="change_p.php" method="post">
        <div class="row">
        <input type="hidden" name="user_id" id="user_id" value="">
            <div class="col-md-6 mb-3">
                <label for="">Email</label>
                <input type="text" name="email" id="user_email"  class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Current Password</label>
                <input type="password" name="password" id="password"  class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="">New password</label>
                <input type="password" name="n_p" id="n_p" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Confirm Password</label>
                <input type="password" name="c_p" id="c_p" class="form-control" required>
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
