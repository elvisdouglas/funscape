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
    <h6 class="m-0 font-weight-bold text-primary">Funscape Gamer 
            <button type="button" class="btn btn-Danger" data-toggle="modal" data-target="#" disabled>
              #_Gamer_Funscape
            </button>
    </h6>
  </div>

    <div class="modal-body">
    <form action="#" method="POST">

        <div class="row">
            <?php
            $conn = require __DIR__ . "/conn.php";
            $g_screen = "SELECT * FROM screen";
            $g_run = mysqli_query($conn,$g_screen);

            if(mysqli_num_rows($g_run) > 0){
                ?>
            <div class="form-group col-md-6 mb-3">
                <label> Gamer screen </label>
                <select name="" id="" class="form-control" required>
                    <option value="">Choose Screen</option>
                    <?php
                        foreach($g_run as $row) 
                        {
                    ?>
                    <option value="<?php  echo $row['id']; ?>"><?php  echo $row['screen']; ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>               
                
            <?php
            }else{
                echo "no screen available";
            }
            
            ?>

            
            <div class="form-group col-md-6 mb-3">
                <label>Time</label>
                <input type="text" name="time" class="form-control" placeholder="Time Duration" required>
            </div>
            <div class="form-group col-md-6 mb-3">
                <label>Price</label>
                <input type="text" name="price" class="form-control" placeholder="Price" required>
            </div>
            <div class="form-group col-md-6 mb-3">
                <label>status</label>
                <input type="text" name="status" class="form-control" placeholder="status" required>
            </div>
        
        </div> 
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="register" class="btn btn-primary">Save</button>
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