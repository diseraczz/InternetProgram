<?php 
  session_start();
  require_once ('connection.php');
  $query = mysqli_query($conn,"set char set utf8");
  $sql = "SELECT * FROM job_posts";
  $result = $conn->query($sql);
?>


<!DOCTYPE html>

<html lang="en">
<!-- action here -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- icon -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <link rel="shortcut icon" type="image/x-icon" href="../images/logo.png">

  <title>Admin_page</title>
  <!-- bootstrap 5.1.3 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>

  <!-- CSS here -->
  <link rel="stylesheet" href="../styles/styles_admin.css">
  <link rel="stylesheet" href="../styles/styles.css">
</head>
<script>
function searchposition() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("sawasdy");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function searchemployment() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myJob");
  filter = input.value.toUpperCase();
  table = document.getElementById("sawasdy");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>

<body>
  <!--Top menu -->
  <header class="section">
    <div class="top_navbar align-items-center header-bar">
      <div class="hamburger" id="bottonbar">
        <img src="../images/meIT2.png" alt="" width="150" height="auto" onclick="w3_open()">
      </div>
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-start">
          <div class="d-flex align-items-center me-md-auto"></div>
          <div class="context">
            <h1 class="text-dark fs-2">Enterprises</h1>
          </div>
        </div>
      </div>
      <div class="dropdown" style="margin-right: 2.5rem;">
        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1"
          data-bs-toggle="dropdown" aria-expanded="false">
          <img src="../images/man (2).png" alt="" width="40" height="auto" class="rounded-circle success"
            style="border: #000000 solid; ">
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownUser1" style="font-size: 1.35rem;">
          <li><a class="dropdown-item" href="#">Profile</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
      </div>
    </div>
    <div class="sidebar" id="mySidebar" style="display:none">
      <!--menu item-->
      <div class="btn-group-vertical">
        <ul>
          <button onclick="w3_close()" class="btn btn-danger">Close &times;</button>
          <li>
            <div class="d-grid gap-2 d-md-block">
              <h6 class="dropdown-header">Users</h6>
              <a class="btn btn-primary" href="../php/enterprises.php" role="button">บริษัท</a>
              <a class="btn btn-primary" href="../php/applicant.php" role="button">คนหางาน</a>
            </div>

          </li>

          <li>
            <div class="d-grid gap-2 d-md-block">
              <h6 class="dropdown-header">JOB</h6>
              <a class="btn btn-primary" href="../php/job.php" role="button">งานที่ลงทะเบียนไว้</a>
            </div>
          </li>
          <li>
            <h6 class="dropdown-header">Search Position</h6>
          </li>
          <input type="text" id="myInput" onkeyup="searchposition()" placeholder="Search for Position..">
          <li>
            <h6 class="dropdown-header">Employment Type</h6>
            <input type="text" id="myJob" onkeyup="searchemployment()" placeholder="Search for Employment..">

          </li>
        </ul>

        <!--<a>
          <button class="btn btn-success" type="submit" value="Submit"
            onclick="alert('Button was clicked!');">Success</button>
          <button class="btn btn-danger" type="reset" value="Reset">Reset</button>
        </a>-->
      </div>
    </div>
  </header>
  <!-- body web -->
  <div class="mainContent">
    <div class="column">
      <div class="candidate rounded-25">
        <table id="sawasdy">
          <thead>
            <tr>
              <th width="5%">ID</td>
              <th width="10%">Position</td>
              <th width="25%">Skill</td>
              <th width="15%">Employment Type</td>
              <th width="10%">Income</td>
            </tr>
          </thead>
          <tbody>
            <?php 
            $my_array = array();
            while($row = $result->fetch_assoc()):
              array_push($my_array, explode(',',$row['job_post_skill_id']));
             ?>
            <tr onclick="w3_open()">
              <td>
                <?php echo $row['job_post_id']; ?>
              </td>
              <td>
                <?php echo $row['job_post_position_id'];?>
              </td>
              <td>
                <?php echo $row['job_post_skill_id']; ?>
              </td>
              <td>
                <?php echo $row['job_post_employment_type_id']; ?>
              </td>
              <td>
                <?php echo $row['job_post_income']; ?>
              </td>
            </tr>
            <?php endwhile ?>
            <?php 
            $doggy = $row['job_post_skill_id'];
            $gg = explode(',',$doggy);
            echo "<script>console.log('$gg')</script>"; ?>

          </tbody>
        </table>

        <div class="candidate_all">
          <canvas id="skillcandidateChart" style="width:100%;max-width:600px"></canvas>
          <?php 
          $my_array = array();
          $dd = 'asd';
          while($row = $result->fetch_assoc()):
            $skillcount = explode(',',$row['job_post_skill_id']) ;
            array_push($skillcount);
          endwhile
          ?>
          <script>
          var xValues = ["HTML", "PHP", "JavaScript", "Java", "SQL"];
          var yValues = [55, 49, 44, 24, 15];
          var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#e8c3b9",
            "#1e7145"
          ];

          new Chart("skillcandidateChart", {
            type: "pie",
            data: {
              labels: xValues,
              datasets: [{
                backgroundColor: barColors,
                data: yValues
              }]
            },
            options: {
              title: {
                display: true,
                text: "123456"
              }
            }
          });
          </script>
        </div>

      </div>
    </div>

  </div>
</body>

</html>
