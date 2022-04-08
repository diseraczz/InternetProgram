<?php
  session_start();
  require_once "connection.php";
  $query = mysqli_query($conn, "set char set utf8")
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Smart JOB</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="shortcut icon" type="image/x-icon" href="../images/logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
  </script>

  <link rel="stylesheet" href="../styles/styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>


<body>
  <?php
        $idadmin = $_SESSION["admin_id"];
        $query = mysqli_query($conn, "SELECT * FROM admin WHERE admin_id = $idadmin ");
        $result = mysqli_fetch_array($query);
      ?>
  <header class="p-2 border-buttom admin-bar">
    <div class="container-header">
      <div class="d-flex flex-wrap align-items-center justify-content-start">
        <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto ms-4">
          <img src="../images/meIT2.png" alt="" width="170" height="auto">
        </a>
        <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto" style="color: white;">
          <h3>Overview</h3>
        </div>
        <div class="dropdown me-5">
          <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser1"
            data-bs-toggle="dropdown" aria-expanded="false">
            <img src="../images/<?= $result['admin_img']?>" alt="mdo" width="40" height="40"
              class="rounded-circle bg-darkblue" style="border: #86b7fe solid; "> <?= $result['admin_name']?>
          </a>
          <ul class="dropdown-menu " aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="admin.php">Overview</a></li>
            <li><a class="dropdown-item" href="admin_user_information.php">จัดการข้อมูลผู้ใช้งาน</a></li>
            <li><a class="dropdown-item" href="admin_information.php">จัดการข้อมูลผู้ดูแลระบบ</a></li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="admin_profile.php">บัญชีผู้ใช้</a></li>
            <li><a class="dropdown-item" href="logout.php">ออกจากระบบ</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <!--overview-->
  <div class="p-5 bg-white rounded-30">
    <div class="container">
      <!--edu-->
      <div class="row justify-content-around">
        <div class="col-4">
          <?php
            $querys = mysqli_query($conn,"set char set utf8");
            $sqls = "SELECT `applicant_edu_level` FROM `applicants`";
            $results = $conn->query($sqls);
            echo "<script>var edu = [];</script>";
            while($row = $results->fetch_assoc()):
              $applicant_edu = $row['applicant_edu_level'];
              echo "<script>edu.push('$applicant_edu');</script>";
            endwhile;
            ?>
          ระดับการศึกษา
          <canvas id="educhart" style="width:100%;"></canvas>
          <script>
          var degrees = [];
          var degrees2 = [];
          var strings = '';
          for (let i = 0; i < edu.length; i++) {
            var edu2 = edu[i];
            strings = strings + ',' + edu2;
          }
          degrees.push(strings.split(','));
          degrees2 = degrees[0];
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

          new Chart("educhart", {
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
      </div>
      <!--skill-->
      <div class="row justify-content-around">
        ความสามารถ
        <div class="col-4">
          <?php
            $querys = mysqli_query($conn,"set char set utf8");
            $sqlskill_enterprise = "SELECT `*` FROM `job_posts` INNER JOIN skills ON `job_posts`.`job_post_skill_id` = `skills`.`skill_id` ";
            $resultsskill_en = $conn->query($sqlskill_enterprise);
            echo "<script>var skill_en = [];</script>";
            while($rowskill_en = $resultsskill_en->fetch_assoc()):
              $enterprise_skill = $rowskill_en['skill_name'];
              echo "<script>skill_en.push('$enterprise_skill');</script>";
            endwhile;
            ?>
          <canvas id="skillchart_en" style="width:100%;max-width:600px"></canvas>
          <script>
          var skill_count_en = [];
          var skill_count_en2 = [];
          var strings = '';
          for (let i = 0; i < skill_en.length; i++) {
            var skill_en2 = skill_en[i];
            strings = strings + ',' + skill_en2;
          }
          skill_count_en.push(strings.split(','));
          skill_count_en2 = skill_count_en[0];
          var html = 0;
          var css = 0;
          var javascript = 0;
          var sql = 0;
          var php = 0;
          var python = 0;
          var java = 0;
          var back_end = 0;
          var web_page_design = 0;
          var ms_office = 0;
          var os = 0;
          var network = 0;

          for (let index = 0; index < skill_count_en2.length; index++) {
            var skill_count_en2_check = skill_count_en2[index].toLocaleLowerCase();
            if (skill_count_en2_check.match('html')) {
              html++;
            } else if (skill_count_en2_check.match('css')) {
              css++;
            } else if (skill_count_en2_check.match('javascript')) {
              javascript++;
            } else if (skill_count_en2_check.match('sql')) {
              sql++;
            } else if (skill_count_en2_check.match('php')) {
              php++;
            } else if (skill_count_en2_check.match('python')) {
              python++;
            } else if (skill_count_en2_check.match('java')) {
              java++;
            } else if (skill_count_en2_check.match('back end')) {
              back_end++;
            } else if (skill_count_en2_check.match('web page design')) {
              web_page_design++;
            } else if (skill_count_en2_check.match('ms office')) {
              ms_office++;
            } else if (skill_count_en2_check.match('os')) {
              os++;
            } else if (skill_count_en2_check.match('network')) {
              network++;
            }
          }
          var xValuesskill = ["html", "css", "javascript", "sql", "php", "python", "java", "back end",
            "web page design", "ms office", "os", "network"
          ];
          var yValuesskill = [html, css, javascript, sql, php, python, java, back_end, web_page_design, ms_office, os,
            network
          ];
          var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#b91d47",
            "#00aba9",
            "#2b5797",
          ];

          new Chart("skillchart_en", {
            type: "doughnut",
            data: {
              labels: xValuesskill,
              datasets: [{
                backgroundColor: barColors,
                data: yValuesskill
              }]
            },
            options: {
              title: {
                display: true,
                text: "ความสามารถของงานที่รับสมัคร"
              }
            }
          });
          </script>
        </div>
        <div class="col-4">
          <?php
            $querys = mysqli_query($conn,"set char set utf8");
            $sqlskill = "SELECT `*` FROM `applicants` INNER JOIN skills ON `applicants`.`applicant_skill_id` = `skills`.`skill_id` ";
            $resultsskill = $conn->query($sqlskill);
            echo "<script>var skill = [];</script>";
            while($rowskill = $resultsskill->fetch_assoc()):
              $applicant_skill = $rowskill['skill_name'];
              echo "<script>skill.push('$applicant_skill');</script>";
            endwhile;
            ?>

          <canvas id="skillchart" style="width:100%;max-width:600px"></canvas>
          <script>
          var skill_count = [];
          var skill_count2 = [];
          var strings = '';
          for (let i = 0; i < skill.length; i++) {
            var skill2 = skill[i];
            strings = strings + ',' + skill2;
          }
          skill_count.push(strings.split(','));
          skill_count2 = skill_count[0];
          var html = 0;
          var css = 0;
          var javascript = 0;
          var sql = 0;
          var php = 0;
          var python = 0;
          var java = 0;
          var back_end = 0;
          var web_page_design = 0;
          var ms_office = 0;
          var os = 0;
          var network = 0;

          for (let index = 0; index < skill_count2.length; index++) {
            var skill_count2_check = skill_count2[index].toLocaleLowerCase();
            if (skill_count2_check.match('html')) {
              html++;
            } else if (skill_count2_check.match('css')) {
              css++;
            } else if (skill_count2_check.match('javascript')) {
              javascript++;
            } else if (skill_count2_check.match('sql')) {
              sql++;
            } else if (skill_count2_check.match('php')) {
              php++;
            } else if (skill_count2_check.match('python')) {
              python++;
            } else if (skill_count2_check.match('java')) {
              java++;
            } else if (skill_count2_check.match('back end')) {
              back_end++;
            } else if (skill_count2_check.match('web page design')) {
              web_page_design++;
            } else if (skill_count2_check.match('ms office')) {
              ms_office++;
            } else if (skill_count2_check.match('os')) {
              os++;
            } else if (skill_count2_check.match('network')) {
              network++;
            }
          }
          var xValuesskill = ["html", "css", "javascript", "sql", "php", "python", "java", "back end",
            "web page design", "ms office", "os", "network"
          ];
          var yValuesskill = [html, css, javascript, sql, php, python, java, back_end, web_page_design, ms_office, os,
            network
          ];
          var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#b91d47",
            "#00aba9",
            "#2b5797",
          ];

          new Chart("skillchart", {
            type: "doughnut",
            data: {
              labels: xValuesskill,
              datasets: [{
                backgroundColor: barColors,
                data: yValuesskill
              }]
            },
            options: {
              title: {
                display: true,
                text: "ความสามารถของคนหางาน"
              }
            }
          });
          </script>

        </div>
      </div>
      <!--salary-->
      <div class="row justify-content-around">
        เงินเดือน
        <div class="col-4">
          <?php
            $querys = mysqli_query($conn,"set char set utf8");
            $sqljob_en = "SELECT `job_post_income` FROM `job_posts` ";
            $result_salary_en = $conn->query($sqljob_en);
            echo "<script>var salary_en = [];</script>";
            while($rowsalary_en = $result_salary_en->fetch_assoc()):
              $salary_en_income = $rowsalary_en['job_post_income'];
              echo "<script>salary_en.push('$salary_en_income');</script>";
            endwhile;
            ?>
          <canvas id="salary_en_chart" style="width:100%;max-width:600px"></canvas>
          <script>
          var salary_count_en = [];
          var salary_count_en2 = [];
          var strings = '';
          for (let i = 0; i < salary_en.length; i++) {
            var salary_en2 = salary_en[i];
            strings = strings + ',' + salary_en2;
          }
          salary_count_en.push(strings.split(','));
          salary_count_en2 = salary_count_en[0];
          var twofive = 0;
          var twomore = 0;
          var fourmore = 0;
          var sixmore = 0;
          var eigmore = 0;
          var twnmore = 0;
          var java = 0;
          var back_end = 0;
          var web_page_design = 0;
          var ms_office = 0;
          var os = 0;
          var network = 0;

          for (let index = 0; index < salary_count_en2.length; index++) {
            var salary_count_en2_check = salary_count_en2[index];
            if (parseInt(salary_count_en2_check) < 20000) {
              twofive++;
            } else if (parseInt(salary_count_en2_check) >= 20000 && parseInt(salary_count_en2_check) < 40000) {
              twomore++;
            } else if (parseInt(salary_count_en2_check) >= 40000 && parseInt(salary_count_en2_check) < 60000) {
              fourmore++;
            } else if (parseInt(salary_count_en2_check) >= 60000 && parseInt(salary_count_en2_check) < 80000) {
              sixmore++;
            } else if (parseInt(salary_count_en2_check) >= 80000 && parseInt(salary_count_en2_check) < 100000) {
              eigmore++;
            } else if (parseInt(salary_count_en2_check) >= 100000) {
              twnmore++;
            }
          }
          var xValuesskill = ["0-20,000", "20,001-40,000", "40,001-60,000", "60,001-80,000", "80,001-100,000",
            "100,001+",
          ];
          var yValuesskill = [twofive, twomore, fourmore, sixmore, eigmore, twnmore, ];
          var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#b91d47",
            "#00aba9",
            "#2b5797",
          ];

          new Chart("salary_en_chart", {
            type: "doughnut",
            data: {
              labels: xValuesskill,
              datasets: [{
                backgroundColor: barColors,
                data: yValuesskill
              }]
            },
            options: {
              title: {
                display: true,
                text: "เงินเดือนของงาน"
              }
            }
          });
          </script>
        </div>
        <div class="col-4">
          <?php
            $querys = mysqli_query($conn,"set char set utf8");
            $sqljob_ap = "SELECT `applicant_expected_salary` FROM `applicants` ";
            $result_salary_ap = $conn->query($sqljob_ap);
            echo "<script>var salary_ap = [];</script>";
            while($rowsalary_ap = $result_salary_ap->fetch_assoc()):
              $salary_ap_income = $rowsalary_ap['applicant_expected_salary'];
              echo "<script>salary_ap.push('$salary_ap_income');</script>";
            endwhile;
            echo "<script>console.log(salary_ap);</script>";
            ?>
          <canvas id="salary_ap_chart" style="width:100%;max-width:600px"></canvas>
          <script>
          var salary_count_ap = [];
          var salary_count_ap2 = [];
          var strings = '';
          for (let i = 0; i < salary_ap.length; i++) {
            var salary_ap2 = salary_ap[i];
            strings = strings + ',' + salary_ap2;
          }
          salary_count_ap.push(strings.split(','));
          salary_count_ap2 = salary_count_ap[0];
          console.log(salary_count_ap2);
          var twofive = 0;
          var twomore = 0;
          var fourmore = 0;
          var sixmore = 0;
          var eigmore = 0;
          var twnmore = 0;
          var java = 0;
          var back_end = 0;
          var web_page_design = 0;
          var ms_office = 0;
          var os = 0;
          var network = 0;

          for (let index = 0; index < salary_count_ap2.length; index++) {
            var salary_count_ap2_check = salary_count_ap2[index];
            if (parseInt(salary_count_ap2_check) < 20000) {
              twofive++;
            } else if (parseInt(salary_count_ap2_check) >= 20000 && parseInt(salary_count_ap2_check) < 40000) {
              twomore++;
            } else if (parseInt(salary_count_ap2_check) >= 40000 && parseInt(salary_count_ap2_check) < 60000) {
              fourmore++;
            } else if (parseInt(salary_count_ap2_check) >= 60000 && parseInt(salary_count_ap2_check) < 80000) {
              sixmore++;
            } else if (parseInt(salary_count_ap2_check) >= 80000 && parseInt(salary_count_ap2_check) < 100000) {
              eigmore++;
            } else if (parseInt(salary_count_ap2_check) >= 100000) {
              twnmore++;
            }
          }
          var xValuesskill = ["0-20,000", "20,001-40,000", "40,001-60,000", "60,001-80,000", "80,001-100,000",
            "100,001+",
          ];
          var yValuesskill = [twofive, twomore, fourmore, sixmore, eigmore, twnmore, ];
          var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#b91d47",
            "#00aba9",
            "#2b5797",
          ];

          new Chart("salary_ap_chart", {
            type: "doughnut",
            data: {
              labels: xValuesskill,
              datasets: [{
                backgroundColor: barColors,
                data: yValuesskill
              }]
            },
            options: {
              title: {
                display: true,
                text: "เงินเดือนที่คนหางานต้องการ"
              }
            }
          });
          </script>
        </div>
      </div>
      <!--position-->
      <div class="row justify-content-center">
        ตำแหน่งงาน
        <div class="col-4">
          <?php
            $querys = mysqli_query($conn,"set char set utf8");
            $sqls_position_en = "SELECT `*` FROM `job_posts` INNER JOIN positions ON `job_posts`.`job_post_position_id`=`positions`.`position_id`";
            $results = $conn->query($sqls_position_en);
            echo "<script>var edu = [];</script>";
            while($row = $results->fetch_assoc()):
              $applicant_edu = $row['applicant_edu_level'];
              echo "<script>edu.push('$applicant_edu');</script>";
            endwhile;
            ?>
          <canvas id="educhart" style="width:100%;"></canvas>
          <script>
          var degrees = [];
          var degrees2 = [];
          var strings = '';
          for (let i = 0; i < edu.length; i++) {
            var edu2 = edu[i];
            strings = strings + ',' + edu2;
          }
          degrees.push(strings.split(','));
          degrees2 = degrees[0];
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

          new Chart("educhart", {
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
        <div class="col-4">
          One of two columns
        </div>
      </div>
    </div>
  </div>



</body>


</html>
