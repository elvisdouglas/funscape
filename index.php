<?php
session_start();
if (!isset($_SESSION["user_id"])) {
  header("location: login.php");
}
?>


<?php
// error_reporting(0);
include './admins/conn.php';
include('include/header.php');
include('include/navbar.php');



$conn = require __DIR__ . "/conn.php";
$User = "SELECT * FROM user";
$n_user = mysqli_query($conn, $User);
while($row5 = mysqli_fetch_assoc($n_user)){
  $user_name = $row5["names"];
  $_SESSION["names"] = $row5["names"];
}


$mysqli = require __DIR__ . "/conn.php";
$sql = sprintf("SELECT * FROM gamer");
$result = mysqli_query($mysqli, $sql);

// creating a timer countdown from data in the database
$duration = "";

$timer = "SELECT * FROM gamer";
$c_timer = mysqli_query($conn, $timer);
while ($row1 = mysqli_fetch_assoc($c_timer)) {
  $duration = $row1["duration"];
  $_SESSION["end-time"] = $row1["duration"];
  // echo $_SESSION["end-time"];
}

$_session["duration"] = $duration;
$_session["start_time"] = date("H:i:s");

$end_time = date(
  'H:i:s',
  strtotime(
    '+' . $_session["duration"] . 'duration',
    strtotime('+' . $_session["start_time"])
  )
);

$_SESSION["end_time"] = $end_time;

?>

<!-- Begin Page Content -->
<div class="container-fluid">


  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <h1>Hello <?php echo $user_name ?>, </h1>
  </div>

  <br>
  <script type="text/javascript" src="count_timer.js"></script>

  <div class="timer-container center">
    <div class="timer center"></div>
  </div>
  <!-- Content Row -->
  <div class="row">

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
          <th> Screen </th>
        </tr>
      </thead>
      <tbody>

        <tr>
          <?php
          while ($row = mysqli_fetch_assoc($result)) {
          ?>
            <!-------  fetching users from database  ------->
            <td>
              <button data-id="<?php echo $row['id']; ?>" id="start_<?php echo $row['id']; ?>" class="btn btn-danger" onclick="startTimer(<?php echo $row['id']; ?>)">Start</button>

              <button id='pause_<?php echo $row['id']; ?>' class="btn btn-info" onclick="pauseTimer(<?php echo $row['id']; ?>)">Pause</button>
            </td>
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

              <div data-duration="<?= $row["duration"]; ?>" class="timer center" id="<?= $row['id']; ?>" style="display: flex; font-size: 24px; font-weight:bold; margin:5px;"></div>

            </td>

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
                ?></td>
        </tr>

        <script>
            // Fetch data from the database (example: hardcoded data)
            var dataFromDatabase = [
              <?php
              while ($row = mysqli_fetch_assoc($result)) {
                echo "{ id: " . $row['id'] . ", duration: " . $row['duration'] . " },";
              }
              ?>
            ];

            var timers = {}; // An object to store timer objects and their respective IDs

            // Function to create a timer and store it in the timers object
            function createTimer(id, duration) {
              var timerElement = document.createElement('div');
              timerElement.classList.add('timer', 'center');
              timerElement.style.display = 'flex';
              timerElement.style.fontSize = '24px';
              timerElement.style.fontWeight = 'bold';
              timerElement.style.margin = '5px';
              timerElement.setAttribute('id', `timer_${id}`);

              timers[id] = {
                element: timerElement,
                duration: duration,
                timerId: id // Store the timer interval ID
              };
            }

            // Loop through the timer data and create timers for each entry
            dataFromDatabase.forEach(function(timerData) {
              createTimer(timerData.id, timerData.duration);
            });

            // Function to pause a timer
            function pauseTimer(id) {
              clearInterval(timers[id].timerId);
              document.getElementById(`start_${id}`).style.display = 'inline';
              document.getElementById(`pause_${id}`).style.display = 'none';
            }

            // Function to start a timer
            function startTimer(id) {
              document.getElementById(`start_${id}`).style.display = 'none';
              document.getElementById(`pause_${id}`).style.display = 'inline';

              var demo = timers[id].element;
              var duration = timers[id].duration;
              var x = Number(duration);
              

              var serverDate = new Date(<?php echo $dat * 1000; ?>);
              var formatter = new Intl.DateTimeFormat("en-US", {
                timeZone: "Africa/Nairobi",
                year: "numeric",
                month: "numeric",
                day: "numeric",
                hour: "numeric",
                minute: "numeric",
                second: "numeric"
              });
              var pstDate = formatter.format(serverDate);

              var pstDateObj = new Date(pstDate);
              pstDateObj.setHours(pstDateObj.getHours() - 1);

              var setTime = pstDateObj.setMinutes(pstDateObj.getMinutes() + x);

              timers[id].timerId = setInterval(function countDownTimer() {
                const currentTime = Date.now();
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
                demo.textContent = formattedTime;

                if (remainingTime < 0) {
                  clearInterval(timers[id].timerId);
                  demo.textContent = "00:00:00";
                }
              }, 1000);
            }

            // Dynamically create timers based on the data fetched from the database
            dataFromDatabase.forEach(function(timerData) {
              createTimer(timerData.id, timerData.duration);

              var row = document.createElement('tr');
              // Create cell for the timer display
              var timerCell = document.createElement('td');
              var timerElement = timers[timerData.id].element;
              timerCell.appendChild(timerElement);

              // Create cell for the start button
              var startCell = document.createElement('td');
              var startButton = document.createElement('button');
              startButton.textContent = 'Start';
              startButton.id = `start_${timerData.id}`;
              startButton.classList.add('btn', 'btn-danger');
              startButton.onclick = function() {
                startTimer(timerData.id);
              };
              startCell.appendChild(startButton);

              // Create cell for the pause button
              var pauseCell = document.createElement('td');
              var pauseButton = document.createElement('button');
              pauseButton.textContent = 'Pause';
              pauseButton.id = `pause_${timerData.id}`;
              pauseButton.style.display = 'none'; // Hide the pause button initially
              pauseButton.classList.add('btn', 'btn-info');
              pauseButton.onclick = function() {
                pauseTimer(timerData.id);
              };
              pauseCell.appendChild(pauseButton);

              // Append cells to the row
              row.appendChild(timerCell);
              row.appendChild(startCell);
              row.appendChild(pauseCell);

              // Append the row to the table body
              var tableBody = document.querySelector('#dataTable tbody');
              tableBody.appendChild(row);
            });
          </script>
      <?php
          }
      ?>
      </tbody>
    </table>


  </div>





  <?php
  include('include/scripts.php');
  include('include/footer.php');
  ?>