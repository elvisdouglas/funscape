<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include 'conn.php';

$mysqli = require __DIR__ . "/conn.php";
$sql = sprintf("SELECT * FROM register");
$result = mysqli_query($mysqli,$sql);

?>


<div class="modal fade" id="#" tabindex="-1" role="dialog" aria-labelledby="#" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="bg-danger text-white" id="#">Add New Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-------------<form action="code.php" method="post" novalidate>  

        <div class="modal-body">

            <div class="form-group">
                <label> Username </label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password">
            </div>
        
        </div> 
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button name="register" class="btn btn-danger">Save</button>
        </div>
      </form> -->

    </div>
  </div>
</div>



<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile 
            <button type="button" class="btn btn-danger" >
            <a class="btn btn-danger text-white"href="register.php" style="text-decoration: none;">Add New Admin</a>
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr class="bg-dark text-white">
            <th>Admin name </th>
            <th>Email </th>
            <th>Role </th>
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
          <!-------  fetching admins from database  ------->
              <td><?php echo $row['username'] ?></td>
              <td><?php echo $row['email'] ?></td>
              <td><?php echo $row['user_type'] ?></td>
              <td><a href="edit_admin.php?id=<?=$row['id'];?>" class="btn btn-success">Edit</a></td>
              <td>
              <form action="delete_admin.php" method="post">
                <button type="submit" name="admin_delete" value="<?=$row['id'];?>"class="btn btn-danger">Delete</button>
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
