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
    <h6 class="m-0 font-weight-bold text-primary">Edit Screen
    </h6>
  </div>

<div class="card-body">

<?php
if(isset($_GET['id'])){
    $screen_id = $_GET['id'];
    $screen = "SELECT * FROM screen WHERE id='$screen_id' ";
    $user_run = mysqli_query($conn, $screen);

    if(mysqli_num_rows($user_run)>0){
        foreach($user_run as $screen){

        
        ?>
            
    <form action="update_screen.php" method="post">
    <input type="hidden" name="screen_id" value="<?=$screen['id'];?>">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name">Screen Name</label>
                <input type="text" name="name" value="<?=$screen['screen'];?>" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <button type="submit" name="update_screen" class="btn btn-success">Update Screen Name</button>
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
