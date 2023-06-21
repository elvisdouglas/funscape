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
    <h6 class="m-0 font-weight-bold text-primary">Edit Admin Profile 
    </h6>
  </div>

<div class="card-body">

<?php
if(isset($_GET['id'])){
    $admin_id = $_GET['id'];
    $admin = "SELECT * FROM register WHERE id='$admin_id' ";
    $user_run = mysqli_query($conn, $admin);

    if(mysqli_num_rows($user_run)>0){
        foreach($user_run as $admin){

        ?>
            
    <form action="update_admin.php" method="post">
        <input type="hidden" name="admin_id" value="<?=$admin['id'];?>">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="">UserName</label>
                <input type="text" name="username" value="<?=$admin['username'];?>" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Email</label>
                <input type="text" name="email" value="<?=$admin['email'];?>" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <button type="submit" name="update_admin" class="btn btn-success">Update Admin</button>
            </div>
        </div>
    </form>

        <?php
        }
    }else{
        ?>
        <h3>No records found</h3>
        <?php
    }
}
?>

</div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
