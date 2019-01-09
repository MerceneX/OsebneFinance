<?php
      session_start();
      ?>
      <?php 
        require 'includes.php';
        redirectUnlogged();
      ?>
    
        <div class="container-fluid">
          <div class="row">
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
              <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2"><?php
                  if(isThisSessionSet(array("currentUser")))
                  {
                      echo $_SESSION["currentUser"];
                  }
                  else
                  {
                      echo "Dashboard";
                  }
                ?></h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                  <div class="btn-group mr-2">
                    <button class="btn btn-sm btn-outline-secondary">Share</button>
                    <button class="btn btn-sm btn-outline-secondary">Export</button>
                  </div>
                  <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <span data-feather="calendar"></span>
                    This week
                  </button>
                </div>
              </div>
    
              <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
    

              <?php
                $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
                $userID = getCurrentUserID($_SESSION['currentUser']);
                $query = "SELECT id, vsota, datum, nujno FROM izdatek WHERE fk_uporabnik = '$userID'";
                $result = mysqli_query($db,$query);
                $rows = mysqli_fetch_assoc($result);
              ?>
              <h2>Expenses <?php echo $rows['id'];?></h2>
              <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th>Datum</th>
                      <th>Vsota</th>
                      <th>Nujno</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    if ($result = mysqli_query($db, $query)) {
                      while ($row = mysqli_fetch_assoc($result)) {
                          if($row['nujno']==0){
                            $row['nujno'] = "No";
                          }
                          else{
                            $row['nujno'] = "Yes";
                          }
                          echo "<tr>
                          <td>$row[datum]</td>
                          <td>$row[vsota]</td>
                          <td>$row[nujno]</td>
                          <td><form action=\"delete.php\" method=\"post\"><button class=\"btn\" value=\"$row[id]\" name=\"delete\">Delete</button></form></td>
                        </tr>";
                      }
                      mysqli_free_result($result);
                    }
                  ?>
                  </tbody>
                </table>
              </div>
            </main>
          </div>
        </div>
        <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
        <script>
          feather.replace()
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
        <script>
          var ctx = document.getElementById("myChart");
          var myChart = new Chart(ctx, {
            type: 'line',
            data: {
              labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
              datasets: [{
                data: [7, 6.5, 10, 5,6],
                lineTension: 0,
                backgroundColor: 'transparent',
                borderColor: '#007bff',
                borderWidth: 4,
                pointBackgroundColor: '#007bff'
              }]
            },
            options: {
              scales: {
                yAxes: [{
                  ticks: {
                    beginAtZero: true
                  }
                }]
              },
              legend: {
                display: false,
              }
            }
          });
        </script>
<?php
  require 'footer.php';
?>