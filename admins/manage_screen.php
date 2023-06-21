<?php
include('includes/header.php'); 
include('includes/navbar.php'); 

$mysqli = require __DIR__ . "/conn.php";
$sql = sprintf("SELECT * FROM screen");
$result = mysqli_query($mysqli,$sql);

?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Funscape Screen 
            <button type="button" class="btn btn-Danger" data-toggle="modal" data-target="#" disabled>
              #_Screens_Funscape
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr class="bg-dark text-white">
            <th> Screen name </th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
     
        <tr>
            <?php 
            while($row = mysqli_fetch_assoc($result))
            {
            ?>
          <!-------  fetching users from database  ------->
              <td><?php echo $row['screen'] ?></td>
              <td><a href="edit_screen.php?id=<?=$row['id'];?>" class="btn btn-success" >Edit</a></td>
              <td>
                <form action="delete_screen.php" method="post">
                <button type="submit" name="screen_delete" value="<?=$row['id'];?>"class="btn btn-danger">Delete</button>
                </form>                
              </td>
          </tr>
          <?php
          }

          ?>  
        
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>