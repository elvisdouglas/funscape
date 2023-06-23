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
    <form action="game_code.php" method="post">

        <div class="row">
            <?php
            $conn = require __DIR__ . "/conn.php";
            $g_screen = "SELECT * FROM screen";
            $g_run = mysqli_query($conn,$g_screen);

            if(mysqli_num_rows($g_run) > 0){
                ?>
            <div class="form-group col-md-6 mb-3">
                <label> Gamer screen </label>
                <select name="screen_id" class="form-control" required>
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
                <label>Hour</label>
                <input type="number" name="hour" class="form-control" placeholder="Hour" required>
            </div>
            <div class="form-group col-md-6 mb-3">
                <label>Minutes</label>
                <input type="number" name="minute" class="form-control" placeholder="Minutes" required>
            </div>
            <div class="form-group col-md-6 mb-3">
                <label>Price</label>
                <input type="number" name="price" class="form-control" placeholder="Price" required>
            </div>
            <div class="form-group col-md-6 mb-3">
                <label for="status">Screen Status</label>
                <select class="form-control" name="status" id="status">
                <option>--Select screen status--</option>
                    <option value="1">Screen Used</option>
                    <option value="0">Screen Free</option>
                </select>
            </div>
        
        </div> 
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="gamer" class="btn btn-danger">Gaming Time</button>
            <script type="text/javascript" src="timer.js"></script>
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