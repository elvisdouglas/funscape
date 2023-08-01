<?php
session_start();

if (!isset($_SESSION["user_id"])) {
  header("location: login.php");
}
?>


<?php
// error_reporting(0);
include 'conn.php';
include('includes/header.php');
include('includes/navbar.php');



$conn = require __DIR__ . "/conn.php";
$mysqli = require __DIR__ . "/conn.php";
$sql = sprintf("SELECT * FROM gamer");
$result = mysqli_query($mysqli, $sql);

// creating a timer countdown from data in the database
// $duration = "";

$timer = "SELECT * FROM gamer";
$c_timer = mysqli_query($conn, $timer);
while ($row1 = mysqli_fetch_assoc($c_timer)) {
  $id = $row1['id'];
  $duration = $row1["duration"];
  $date = $row1["date"];
  $_SESSION["end-time"] = $row1["duration"];
  $_SESSION["date_t"] = $row1["date"];
  //echo $_SESSION["end-time"];
  $date = strtotime($row1["date"]);
  $t = date("h:i:s", $date);
  // echo $id;
}


//echo $duration;


// $adding= strtotime("17:26:11 + $duration minute");
//   echo date('H:i:s', $adding);

// $_session["end_time"]=$duration;
// $_session["start_time"]=date("H:i:s");

// $end_time=date('H:i:s', 
//     strtotime('+'.$_session["end_time"].'duration', 
//     strtotime('+'.$_session["start_time"])));

// $_SESSION["end_time"]=$end_time;

?>

<!-- 
<script type="text/javascript">
  setInterval(function(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "progress.php",false);
    xmlhttp.send(null);
    document.getElementById("response").innerHTML=xmlhttp.responseText;
  },1000);

</script> -->

<!-- Begin Page Content -->
<div class="container-fluid">


  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <h1>Hello Admin, </h1>
  </div>

  <br>
  <!-- <script type="text/javascript" src="count_timer.js"></script> -->

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

                if ($admin_total = mysqli_num_rows($admins_run)) {
                  echo '<h4 class="mb-0" style="font-weight:bolder;">' . $admin_total . '</h4>';
                } else {
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

                if ($user_total = mysqli_num_rows($user_run)) {
                  echo '<h4 class="mb-0" style="font-weight:bolder;">' . $user_total . '</h4>';
                } else {
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

                    if ($screen_total = mysqli_num_rows($screen_run)) {
                      echo '<h4 class="mb-0" style="font-weight:bolder;">' . $screen_total . '</h4>';
                    } else {
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

                if ($game_run !== false) {
                  $game_total = mysqli_num_rows($game_run);

                  if ($game_total > 0) {
                    echo '<h4 class="mb-0" style="font-weight:bolder;">' . $game_total . '</h4>';
                  } else {
                    echo '<h4 class="mb-0" style="font-weight:bolder;">SCREENS UNUSED</h4>';
                  }
                } else {
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

  <!-- Screens timer countdown -->

  <div class="table-responsive">

    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr class="bg-dark text-white">
          <th> Gamer Action </th>
          <th>Time Left </th>
          <th>Screen</th>
        </tr>
      </thead>
      <tbody>
        <!-- screens names -->

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>

            <td>
              <button id="start" class="btn btn-danger">Start</button>
              <button id="pauseButton" class="btn btn-success">Pause</button>
              <button id="unpauseButton" class="btn btn-info">Continue</button>
              <!-- </form> -->
            </td>
            <!-- duration timer -->
            <td>


              <!-- <?php echo $row["duration"]; ?> </br> -->
              <?php

              $d_id = $row["id"];
              // echo $d_id;

              $to_time1 = $row["duration"];
              // echo htmlspecialchars($t);
              echo $to_time1;

              $dat = strtotime($row["date"]);
              //$t = date("h:i:s", $dat);
              //echo $t;
              ?>

              <div data-duration="<?= $row["duration"]; ?>" class="timer center" id="tim" style="display: flex; font-size: 24px; font-weight:bold; margin:5px;"></div>

              <script>
                var serverDate = new Date(<?php echo $dat * 1000; ?>);

                var formatter = new Intl.DateTimeFormat("en-US", {
                  timeZone: "Africa/Nairobi",
                  hour: "2-digit",
                  minute: "2-digit",
                  second: "2-digit"
                });
                var pstDate = formatter.format(serverDate);
                // Convert pstDate to a Date object
                // var pstDateObj = new Date(pstDate);
                // console.log(pstDateObj);
                // // Get the time value (in milliseconds since the Unix Epoch)
                // var timeInMilliseconds = pstDateObj.getTime();

                // console.log(timeInMilliseconds);

                //   // Defines identifiers for accessing HTML elements
                //       const startButton = document.getElementById("startButton")
                //       const pauseButton = document.getElementById("pauseButton")
                //       const unpauseButton = document.getElementById("unpauseButton")

                // // event listeners for the button
                //       startButton.addEventListener('click', start);
                //       pauseButton.addEventListener('click', pauseTimer);
                //       unpauseButton.addEventListener('click', runTimer);

                //       //Disables buttons that are not needed yet
                //     disable(pauseButton);
                //     disable(unpauseButton);
                // function myFunction(setTime) {

                //   clearInterval(timerLoop);

                //   var timerLoop = setInterval(function countDownTimer(setTime) {
                //     console.log("This is timeLoop", timerLoop);
                //     console.log("This is setTime", setTime);
                //     const currentTime = Date.now();

                //     // const remainingTime = futureTime - currentTime;
                //     const remainingTime = setTime - currentTime;

                //     const hrs = Math.floor((remainingTime / (1000 * 60 * 60)) % 24).toLocaleString('en-US', {
                //       minimumIntegerDigits: 2,
                //       useGrouping: false
                //     });
                //     const mins = Math.floor((remainingTime / (1000 * 60)) % 60).toLocaleString('en-US', {
                //       minimumIntegerDigits: 2,
                //       useGrouping: false
                //     });
                //     const secs = Math.floor((remainingTime / 1000) % 60).toLocaleString('en-US', {
                //       minimumIntegerDigits: 2,
                //       useGrouping: false
                //     });

                //     const formattedTime = `${hrs}:${mins}:${secs}`;
                //     console.log(formattedTime);

                //     // timer.textContent = formattedTime;

                //     // var allTimers = document.body.querySelectorAll('.timer');

                //     demo.textContent = formattedTime;

                //     if (remainingTime < 0) {
                //       clearInterval(timerLoop);
                //       // timer.textContent = "00:00:00";
                //       demo.textContent = "00:00:00";
                //       // timer.style.color = "lightgrey";
                //     }

                //   }, 1000);
                // }


                document.querySelectorAll("#tim").forEach((demo) => {
                  demoFunction(demo);
                });


                function demoFunction(demo) {
                  var duration = demo.getAttribute('data-duration');
                  var pstDateObj = new Date(pstDate);
                  var dbTime = Number(pstDateObj);

                  var x = Number(duration);
                  var setTime = (dbTime + x);

                  var button = document.getElementById("start");
                  button.addEventListener('click', function() {
                    myFunction(setTime, demo);
                  });
                }


                // start of myFunction

                function myFunction(setTime, demo) {
                  clearInterval(timerLoop);

                  var timerLoop = setInterval(function countDownTimer() {
                    // ... (rest of the code for the countDownTimer function)
                    console.log("This is timeLoop", timerLoop);
                    console.log("This is setTime", setTime);
                    const currentTime = Date.now();

                    // const remainingTime = futureTime - currentTime;
                    const remainingTime = setTime - currentTime;

                    const hrs = Math.floor((remainingTime / (1000 * 60 * 60)) % 24).toLocaleString('en-US', {
                      minimumIntegerDigits: 2,
                      useGrouping: false
                    });
                    const mins = Math.floor((remainingTime / (1000 * 60)) % 60).toLocaleString('en-US', {
                      minimumIntegerDigits: 2,
                      useGrouping: false
                    });
                    const secs = Math.floor((remainingTime / 1000) % 60).toLocaleString('en-US', {
                      minimumIntegerDigits: 2,
                      useGrouping: false
                    });

                    const formattedTime = `${hrs}:${mins}:${secs}`;
                    console.log(formattedTime);

                    // timer.textContent = formattedTime;

                    // var allTimers = document.body.querySelectorAll('.timer');

                    demo.textContent = formattedTime;

                    if (remainingTime < 0) {
                      clearInterval(timerLoop);
                      // timer.textContent = "00:00:00";
                      demo.textContent = "00:00:00";
                      // timer.style.color = "lightgrey";
                    }

                  }, 1000);
                }
                // end of myFunction



                //   button.addEventListener("start", function(){

                //   setTime = dbTime.setMinutes(dbTime.getMinutes() + x); // Date object


                //   // future time => setTime = deadline
                //   const futureTime = setTime;
                // console.log(futureTime);
                //   var timerLoop;  // timer variable

                //     clearInterval(timerLoop);

                //     timerLoop = setInterval(function countDownTimer() {

                //     const currentTime = Date.now();

                //     const remainingTime = futureTime - currentTime;  

                //     const hrs = Math.floor((remainingTime / (1000 * 60 * 60)) % 24).toLocaleString('en-US', { minimumIntegerDigits: 2, useGrouping: false });
                //     const mins = Math.floor((remainingTime / (1000 * 60)) % 60).toLocaleString('en-US', { minimumIntegerDigits: 2, useGrouping: false });
                //     const secs = Math.floor((remainingTime / 1000) % 60).toLocaleString('en-US', { minimumIntegerDigits: 2, useGrouping: false });

                //     const formattedTime = `${hrs}:${mins}:${secs}`;
                //     console.log(formattedTime);

                //     // timer.textContent = formattedTime;

                //     // var allTimers = document.body.querySelectorAll('.timer');

                //       demo.textContent = formattedTime;

                //     if (remainingTime < 0) {
                //         clearInterval(timerLoop);
                //         // timer.textContent = "00:00:00";
                //         demo.textContent = "00:00:00";         
                //         // timer.style.color = "lightgrey";
                //     }

                // }, 1000);
                // });

                // countDownTimer();


                // })
              </script>
              <!-- <p id="response" style="font-weight:bolder;"></p>                   -->
            </td>
            <!-- end of duration timer -->
            <!-------  fetching screens from database  ------->
            <td><?php

                $screen_name = "SELECT * FROM screen WHERE id= '" . $row['screen_id'] . "'";
                $check = mysqli_query($conn, $screen_name);
                if ($check !== FALSE) {
                  $row2 = mysqli_fetch_assoc($check);
                  echo $row2['screen'];
                } else {
                  echo "Error executing the query" . mysqli_error($conn);
                }



                // select from screens where id = $row['screen_id'];
                // $row2 = mysqli_fetch_assoc($result)
                //echo $row2['']

                // echo "<div class='timer'></div>";
                ?>
            </td>
            <!-- end of screens -->
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>


  </div>

  <!-- <script src="script.js"></script> -->


  <?php
  // echo $to_time1;
  // $_SESSION["end_time"] = strtotime(' 5 minute');
  // $currentTimestamp = time();
  // $end_Time = strtotime("+ $to_time1 minute");

  // if($end_Time !== false){
  //     $remaining_time = $end_Time - $currentTimestamp;

  //     if($remaining_time > 0){
  //         $hours = floor($remaining_time / 3600);
  //         $minutes = floor(($remaining_time % 3600) / 60);
  //         $seconds = $remaining_time % 60;

  //         echo "Time remaining: $hours hours, $minutes minutes, $seconds seconds";
  //     }else{
  //         echo "Countdown expired";
  //     }
  // }else{
  //     echo "Invalid duration Format";
  // }
  ?>

  <?php
  include('includes/scripts.php');
  include('includes/footer.php');
  ?>