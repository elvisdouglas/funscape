<?php
include 'conn.php';
include('includes/header.php'); 
include('includes/navbar.php'); 

$conn = require __DIR__ . "/conn.php";
?>



<!-- Begin Page Content -->
<div class="container-fluid">


  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <h1>Hello Admin, </h1>
  </div>
<br>
  <!-- Content Row -->
  <div class="row">

    <!-- Registered admins Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Registered Admins</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
                $admins = "SELECT * FROM register";
                $admins_run = mysqli_query($conn, $admins);
                
                if($admin_total = mysqli_num_rows($admins_run)){
                  echo '<h4 class="mb-0" style="font-weight:bolder;">'.$admin_total.'</h4>';
                }else{
                  echo '<h4 class="mb-0" style="font-weight:bolder;"> No Data</h4>';
                }
              ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-4x text-black-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Registered user Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Registered Users</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
                $user = "SELECT * FROM user";
                $user_run = mysqli_query($conn, $user);
                
                if($user_total = mysqli_num_rows($user_run)){
                  echo '<h4 class="mb-0" style="font-weight:bolder;">'.$user_total.'</h4>';
                }else{
                  echo '<h4 class="mb-0" style="font-weight:bolder;"> No Data</h4>';
                }
              ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-address-card fa-4x text-black-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- screens in the system Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Screens Available</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                  <?php
                    $screen = "SELECT * FROM screen";
                    $screen_run = mysqli_query($conn, $screen);
                    
                    if($screen_total = mysqli_num_rows($screen_run)){
                      echo '<h4 class="mb-0" style="font-weight:bolder;">'.$screen_total.'</h4>';
                    }else{
                      echo '<h4 class="mb-0" style="font-weight:bolder;"> No Data</h4>';
                    }
                  ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-film fa-4x text-black-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Screens that are in use Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Active screens</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?php
                    $game = "SELECT * FROM gamer WHERE status_g='1' ";
                    $game_run = mysqli_query($conn, $game);

                    if($game_run !== false){
                      $game_total = mysqli_num_rows($game_run);

                      if($game_total > 0){
                        echo '<h4 class="mb-0" style="font-weight:bolder;">'.$game_total.'</h4>';
                      }else{
                        echo '<h4 class="mb-0" style="font-weight:bolder;">SCREENS UNUSED</h4>';
                      }

                    }else{
                      echo "Error executing the query: " . mysqli_error($conn);
                    }
                    
                    //if($game_total = mysqli_num_rows($game_run)){
                    //  echo '<h4 class="mb-0">'.$game_total.'</h4>';
                    //}else{
                    //  echo '<h4 class="mb-0"> No Data</h4>';
                    //}
                  ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fab fa-playstation fa-4x text-black-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->








  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>