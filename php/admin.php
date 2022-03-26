<?php 
  session_start();
  require_once ('connection.php');
  $query = mysqli_query($conn,"set char set utf8");
  $sql = "SELECT * FROM applicants";
  $sql2 = "SELECT * FROM applicants,enterprises";
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
function searchjob() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2");
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

function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}

function applicant() {
  var io = 0;
  var dis = "SELECT * FROM applicants,enterprises";
  if(io == 1){
    
  }
  
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
            <h1 class="text-dark fs-2">STATISTICS</h1>
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
            <h6 class="dropdown-header">Users</h6>
          </li>
          <input type="checkbox" class="btn-check" id="employer" autocomplete="off" onclick="">
          <label class="btn btn-outline-primary" for="employer">บริษัท</label>
          <input type="checkbox" class="btn-check" id="applicant" autocomplete="off">
          <label class="btn btn-outline-primary" for="applicant">คนหางาน</label>
          <li>
            <h6 class="dropdown-header">Education stats</h6>
          </li>
          <li class="btn-group-vertical">
            <input type="checkbox" class="btn-check" id="bachelordg" autocomplete="off">
            <label class="btn btn-outline-primary" for="bachelordg">ปริญญาตรี</label>
            <input type="checkbox" class="btn-check" id="masterdg" autocomplete="off">
            <label class="btn btn-outline-primary" for="masterdg">ปริญญาโท</label>
            <input type="checkbox" class="btn-check" id="doctorate" autocomplete="off">
            <label class="btn btn-outline-primary" for="doctorate">ปริญญาเอก</label>
          </li>
          <li>
            <h6 class="dropdown-header">Skill stats</h6>
          </li>
          <input type="checkbox" class="btn-check" id="employer" autocomplete="off">
          <label class="btn btn-outline-primary" for="employer">บริษัท</label>
          <input type="checkbox" class="btn-check" id="applicant" autocomplete="off">
          <label class="btn btn-outline-primary" for="applicant">คนหางาน</label>
          <li>
            <h6 class="dropdown-header">Salary stats</h6>
          </li>
          <label for="minsalary" class="form-label">Min.</label>
          <input type="range" class="form-range" id="minsalary">
          <label for="maxsalary" class="form-label">Max.</label>
          <input type="range" class="form-range" id="maxsalary">
          <li>
            <h6 class="dropdown-header">job</h6>
          </li>
          <input type="text" id="myInput" onkeyup="searchjob()" placeholder="Search for names..">
          <li>
            <h6 class="dropdown-header">Position</h6>
          </li>
          <input type="text" id="myInput" onkeyup="searchjob()" placeholder="Search for names..">
          <li>
            <h6 class="dropdown-header">Province</h6>
          </li>
        </ul>

        <a>
          <button class="btn btn-success" type="submit" value="Submit"
            onclick="alert('Button was clicked!');">Success</button>
          <button class="btn btn-danger" type="reset" value="Reset">Reset</button>
        </a>
      </div>
    </div>
  </header>
  <!-- body web -->
  <div class="mainContent">
    <div class="column">
      <div class="candidate rounded-25">
        <h2>หางาน</h2>
        <table id="sawasdy">
          <thead>
            <tr>
              <th width="5%">ID</td>
              <th width="25%">Name</td>
              <th width="25%">Phone Number</td>
            </tr>
          </thead>
          <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?php echo $row['applicant_id']; ?></td>
              <td class="name">
                <?php echo $row['applicant_name'] ,"  ",$row['applicant_lastname'];?>
              </td>
              <td><?php echo $row['applicant_telephone_number']; ?></td>
            </tr>
            <?php endwhile ?>
          </tbody>
        </table>
        <div class="candidate_all">
          <canvas id="skillcandidateChart" style="width:100%;max-width:600px"></canvas>
          <script>
          var xValues = ["HTML", "PHP", "JavaScript", "Java", "SQL"];
          var yValues = [40, 49, 21, 30, 25];
          var barColors = ["red", "green", "blue", "orange", "brown"];
          new Chart("skillcandidateChart", {
            type: "bar",
            data: {
              labels: xValues,
              datasets: [{
                backgroundColor: barColors,
                data: yValues
              }]
            },
            options: {
              legend: {
                display: false
              },
              title: {
                display: true,
                text: "ภาพรวมความสามารถผู้สมัครงาน"
              }
            }
          });
          </script>
        </div>
        <div class="candidate_want">
          <canvas id="jobcandidateChart" style="width:100%;max-width:600px"></canvas>
          <script>
          var xValues = ["UX/UI", "Beck-end Dev.", "Font-end Dev.", "Android Dev.", "IOS Dev."];
          var yValues = [50, 30, 25, 30, 22];
          var barColors = ["red", "green", "blue", "orange", "brown"];
          new Chart("jobcandidateChart", {
            type: "bar",
            data: {
              labels: xValues,
              datasets: [{
                backgroundColor: barColors,
                data: yValues
              }]
            },
            options: {
              legend: {
                display: false
              },
              title: {
                display: true,
                text: "ภาพรวมตำแหน่งที่ผู้หางานสนใจ"
              }
            }
          });
          </script>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>

</html>
