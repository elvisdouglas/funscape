<?php
include('include/header.php'); 
include('include/navbar.php'); 

$mysqli = require __DIR__ . "/conn.php";
$sql = sprintf("SELECT * FROM gamer");
$result = mysqli_query($mysqli,$sql);

$conn = require __DIR__ . "/conn.php";
/////////////////////////////////////
$num_per_page=8;

if(isset($_GET["page"])){
  $page = $_GET["page"];
}else{
  $page = 1;
}

$start_from = ($page-1)*8;
    $sq = "SELECT * FROM gamer limit $start_from,$num_per_page";
    $g_result = mysqli_query($conn,$sq);

?>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Funscape Gaming 
            <button type="button" class="btn btn-Danger" data-toggle="modal" data-target="#" disabled>
              #_Gaming screens_Funscape
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr class="bg-dark text-white">
            <th> Screen </th>
            <th>Gamer's Time </th>
            <th>Price </th>            
            <th>Date and Time </th>
            <th>Status </th>
          </tr>
        </thead>
        <tbody>
     
        <tr>
            <?php 
            while($row = mysqli_fetch_assoc($result))
            {
            ?>
          <!-------  fetching users from database  ------->
                <td><?php 
                
                $screen_name = "SELECT * FROM screen WHERE id= '".$row['screen_id']."'";
                $check = mysqli_query($conn,$screen_name);
                if($check !== FALSE){
                    $row2 = mysqli_fetch_assoc($check);                        
                    echo $row2['screen'];                                     
                }else{
                    echo "Error executing the query" . mysqli_error($conn);
                }
                

                    
            // select from screens where id = $row['screen_id'];
            // $row2 = mysqli_fetch_assoc($result)
            //echo $row2['']
                ?></td>
                <td><?php echo $row['duration'] ?></td>
                <td><?php echo $row['price'] ?></td>                
                <td><?php echo $row['date'] ?></td>
                <td>
                  <?php 
                  if($row['status_g']==1){
                    echo '<p><a href="status.php?id='.$row['id'].'&status_g=0" class="btn btn-success"style="text-decoration:none;">Screen Used</a></p>';
                  }else{
                    echo '<p><a href="status.php?id='.$row['id'].'&status_g=1" class="btn btn-danger" style="text-decoration:none;">Gamer Done</a></p>';
                  }
                  ?>
                </td>
          </tr>
          <?php
          }
          ?>          
        </tbody>
      </table>

      <?php
      //breaking records page
        $sq = "SELECT * FROM gamer";
        $g_result = mysqli_query($conn,$sq);
        $total_records = mysqli_num_rows($g_result);
        $total_pages = ceil($total_records/$num_per_page);
        $i = 1;
        for($i;$i<=$total_pages;$i++) {
          echo "<a href='gaming_screens.php?page=".$i."'>".$i."</a>";

        }
      ?>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('include/scripts.php');
include('include/footer.php');
?>