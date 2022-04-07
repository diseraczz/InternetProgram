<?php 
  session_start();
  require_once ('connection.php');
  $query = mysqli_query($conn,"set char set utf8");
  $sql = "SELECT * FROM applicants INNER JOIN positions ON applicants.applicant_position_id = positions.position_id";
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

  <title>Applicants</title>
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
function searchenterprise() {
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
            <h1 class="text-dark fs-2">Applicants</h1>
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
            <a class="btn btn-primary" href="../php/admin.php" role="button">กลับหน้าแรก</a>

              <h6 class="dropdown-header">Users</h6>
              <a class="btn btn-primary" href="../php/enterprises.php" role="button">บริษัท</a>
              <a class="btn btn-primary" href="../php/applicant.php" role="button">คนหางาน</a>
            </div>
          </li>
          <li>
            <h6 class="dropdown-header">Search Province</h6>
          </li>
          <input type="text" id="myInput" onkeyup="searchenterprise()" placeholder="Search for Province..">
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
              <th width="20%">Name</td>
              <th width="5%">GPAX</td>
              <th width="30%">University</td>
              <th width="15%">Degree</td>
              <th width="15%">Position</td>
              <th width="10%">Salary</td>
              <th width="15%">Province</td>
            </tr>
          </thead>
          <tbody>
          <?php 
            $my_array = array();
            echo "<script>var sin = [];</script>";
            echo "<script>var posit = [];</script>";
            ?>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
              <td>
                <?php echo $row['applicant_id']; ?>
              </td>
              <td>
                <?php echo $row['applicant_name']," ",$row['applicant_lastname'];?>
              </td>
              <td>
                <?php echo $row['applicant_edu_gpax']; ?>
              </td>
              <td>
                <?php echo $row['applicant_edu_university']; ?>
              </td>
              <td>
                <?php echo $row['applicant_edu_level']; ?>
              </td>
              <td>
                <?php echo $row['position_name']; ?>
              </td>
              <td>
                <?php echo $row['applicant_expected_salary'];?>
              </td>
              <td>
                <?php echo $row['applicant_province'];?>
              </td>
            </tr>
            <?php 
            $applicant_edu_level = $row['applicant_edu_level'];
            echo "<script>sin.push('$applicant_edu_level');</script>";

            $applicant_position = $row['position_name'];
            echo "<script>posit.push('$applicant_position');</script>";
            ?>
            <?php endwhile ?>
          </tbody>
        </table>
        
      </div>

      <div>
        <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

        <script>
            var degrees = [];
            var degrees2 = [];
            var strings = '';
            for (let i = 0; i < sin.length; i++) {
              var sin2 = sin[i];
              strings = strings + ',' + sin2;
            }
            degrees.push(strings.split(','));
            degrees2 = degrees[0];
            console.log(degrees2);
            var bachelor = 0;
            var master = 0;
            var doctor = 0;

            for (let index = 0; index < degrees2.length; index++) {
              var degrees_check = degrees2[index].toLocaleLowerCase();
              if (degrees_check.match('ปริญญาตรี')) {
                bachelor++;
              } else if (degrees_check.match('ปริญญาโท')) {
                master++;
              } else if (degrees_check.match('ปริญญาเอก')) {
                doctor++;
              }
            }

        var xValues = ["ปริญญาตรี", "ปริญญาโท", "ปริญญาเอก"];
        var yValues = [bachelor, master, doctor];
        var barColors = [
          "#b91d47",
          "#00aba9",
          "#2b5797",
        ];

        new Chart("myChart", {
          type: "doughnut",
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
                text: "ระดับการศึกษา"
            }
          }
        });
        </script>
      </div>

            <div>
        <canvas id="edulevel" style="width:100%;max-width:600px"></canvas>

        <script>
            var degrees = [];
            var degrees2 = [];
            var strings = '';
            for (let i = 0; i < sin.length; i++) {
              var sin2 = sin[i];
              strings = strings + ',' + sin2;
            }
            degrees.push(strings.split(','));
            degrees2 = degrees[0];
            console.log(degrees2);
            var bachelor = 0;
            var master = 0;
            var doctor = 0;

            for (let index = 0; index < degrees2.length; index++) {
              var degrees_check = degrees2[index].toLocaleLowerCase();
              if (degrees_check.match('ปริญญาตรี')) {
                bachelor++;
              } else if (degrees_check.match('ปริญญาโท')) {
                master++;
              } else if (degrees_check.match('ปริญญาเอก')) {
                doctor++;
              }
            }

        var xValues = ["ปริญญาตรี", "ปริญญาโท", "ปริญญาเอก"];
        var yValues = [bachelor, master, doctor];
        var barColors = [
          "#b91d47",
          "#00aba9",
          "#2b5797",
        ];

        new Chart("myChart", {
          type: "doughnut",
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
                text: "ระดับการศึกษา"
            }
          }
        });
        </script>
      </div>

      <div>
        <canvas id="position" style="width:100%;max-width:600px"></canvas>

        <script>
            var pos = [];
            var pos2 = [];
            var strings = '';
            for (let i = 0; i < posit.length; i++) {
              var posit2 = posit[i];
              strings = strings + ',' + posit2;
            }
            pos.push(strings.split(','));
            pos2 = pos[0];
            console.log(posit);
            var an = 0;
            var ba = 0;
            var da = 0;
            var de = 0;
            var hw = 0;
            var ita = 0;
            var itm = 0;
            var itp = 0;
            var its = 0;
            var itshd = 0;
            var mis = 0;
            var programmer = 0;
            var se = 0;
            var st = 0;
            var sadmin = 0;
            var sa = 0;
            var sea = 0;
            var mw = 0;
            var seo = 0;
            var network = 0;
            var it = 0;
            var uxui = 0;

            for (let index = 0; index < pos2.length; index++) {
              var pos_check = pos2[index];
              if (pos_check.match('Application Network')) {
                an++;
              } else if (pos_check.match('Business Analyst (BA)')) {
                ba++;
              } else if (pos_check.match('Data Analysis')) {
                da++;
              } else if (pos_check.match('Data Engineer')) {
                de++;
              } else if (pos_check.match('Hardware')) {
                hw++;
              } else if (pos_check.match('IT Audit')) {
                ita++;
              } else if (pos_check.match('IT Manager/Senior Programmer')) {
                itm++;
              } else if (pos_check.match('IT Project Manager')) {
                itp++;
              } else if (pos_check.match('IT Security')) {
                its++;
              } else if (pos_check.match('IT Support Help Desk')) {
                itshd++;
              } else if (pos_check.match('MIS')) {
                mis++;
              } else if (pos_check.match('Programmer')) {
                programmer++;
              } else if (pos_check.match('Software Engineer')) {
                se++;
              } else if (pos_check.match('Software Tester')) {
                st++;
              } else if (pos_check.match('System Admin')) {
                sadmin++;
              } else if (pos_check.match('System Analyst')) {
                sa++;
              } else if (pos_check.match('System Engineer and Architect')) {
                sea++;
              } else if (pos_check.match('Mobile Wireless')) {
                mw++;
              } else if (pos_check.match('ดูแลเว็บไซต์ และ SEO')) {
                seo++;
              } else if (pos_check.match('ดูแลระบบ Network')) {
                network++;
              } else if (pos_check.match('ที่ปรึกษาไอที')) {
                it++;
              } else if (pos_check.match('นักออกแบบ UX/UI')) {
                uxui++;
              }
            }

        var aValues = ["Application Network", "Business Analyst (BA)", "Data Analysis", "Data Engineer", "Hardware", "IT Audit", "IT Manager/Senior Programmer", "IT Manager/Senior Programmer", "IT Security", "IT Support Help Desk", "MIS", "Programmer", "Software Engineer", "Software Tester", "System Admin", "System Analyst", "System Engineer and Architect", "Mobile Wireless", "ดูแลเว็บไซต์ และ SEO", "ดูแลระบบ Network", "ที่ปรึกษาไอที", "นักออกแบบ UX/UI"];
        var bValues = [an, ba, da, de, hw, ita, itm, itp, its, itshd, mis, programmer, se, st, sadmin, sa, sea, mw, seo, network, it, uxui];
        var barColors2 = [
          "#b91d47",
          "#00aba9",
          "#2b5797",
          "#DFFF00",
          "#FFBF00",
          "#FF7F50",
          "#DE3163",
          "#000000",
          "#9FE2BF",
          "#40E0D0",
          "#6495ED",
          "#CCCCFF",
          "#00FFFF",
          "#FF0000",
          "#800000",
          "#FFFF00",
          "#808000",
          "#00FF00",
          "#008080",
          "#000080",
          "#FFFFFF",
          "#FF00FF"
        ];

        new Chart("position", {
          type: "doughnut",
          data: {
            labels: aValues,
            datasets: [{
              backgroundColor: barColors2,
              data: bValues
            }]
          },
          options: {
            title: {
              display: true,
                text: "ตำแหน่งงาน"
            }
          }
        });
        </script>
      </div>

    </div>
  </div>
  
</body>

</html>
