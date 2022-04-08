<?php
  session_start();
  require_once('connection.php');
  $id = $_GET["applicant_id"];
  $query = mysqli_query($conn, "SELECT * FROM applicants WHERE applicant_id = $id ");
  $result = mysqli_fetch_array($query);

  $sql1 = mysqli_query($conn, "SELECT * FROM applicants INNER JOIN provinces ON applicants.applicant_province = provinces.id WHERE applicant_id = $id");
  $result1 = mysqli_fetch_array($sql1);
  $sql2 = mysqli_query($conn, "SELECT * FROM applicants INNER JOIN amphures ON applicants.applicant_district = amphures.id WHERE applicant_id = $id");
  $result2 = mysqli_fetch_array($sql2);
  $sql3 = mysqli_query($conn, "SELECT * FROM applicants INNER JOIN districts ON applicants.applicant_sub_district = districts.id WHERE applicant_id = $id");
  $result3 = mysqli_fetch_array($sql3);
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="../styles/styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  </head>

  <body>

    <header class="p-2 border-buttom admin-bar">
      <div class="container-header">
        <div class="d-flex flex-wrap align-items-center justify-content-start">
          <a href="admin.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto ms-4">
            <img src="../images/meIT2.png" alt="" width="170" height="auto" >
          </a>
          <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto" style="color: white;">
            <h3>ข้อมูลคนหางาน</h3>
          </div>
          <div class="dropdown me-5" >
            <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="../images/<?= $result['admin_img']?>" alt="mdo" width="40" height="40" class="rounded-circle bg-darkblue" style="border: #86b7fe solid;  "> <?= $result['admin_name']?>
            </a>
            <ul class="dropdown-menu " aria-labelledby="dropdownUser1" >
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

    <!--edit admin-->
    <main class="container pt-5" >
      <form method="GET" enctype="multipart/form-data">
        <div class="p-5 bg-white rounded-30">
          <div class="row text-black">
            <table class="table">
              <tbody>
              <div class="row">
          <div class="col-3 text-center">
            <t class="text-dark fs-1 fw-bold mb-">Profile</t>
            <img class="rounded-circle success my-4" src="../images/<?= $result['applicant_profile_pic']?>" alt="pic" width="200" height="200">
          </div>
            <div class="col-9">
              <div class="p-5 bg-gray rounded-25 shadow-sj" >
                <div class="row g-3 align-items-center" style="font-size: 1.15rem;">
                  <div class="col-3">
                    <label for="input" class="col-form-label">ชื่อ-นามสกุล</label>
                  </div>
                  <div class="col-9">
                    <div class="p-2 rounded-3 bg-white"><?= $result['applicant_firstname']?> &nbsp; <?= $result['applicant_lastname']?></div>
                  </div>
                  <br>
                  <div class="col-3">
                    <label for="input" class="col-form-label">ประวัติ</label>
                  </div>
                  <div class="col-9">
                    <div class="p-2 rounded-3 bg-white" style="height: 200px;">
                   
                    <label class="bi bi-person-lines-fill" > เกิดวันที่ : &emsp; <?= $result['applicant_brithday']?> </label><br>
                    <label class="bi bi-telephone-fill" > เบอร์โทรศัพท์ : &emsp; <?= $result['applicant_telephone_number']?> </label><br>
                    <label class="bi bi-envelope" > อีเมล :&emsp;  <?= $result['applicant_email']?> </label><br>
                    <label class="bi bi-geo-alt-fill" > ที่อยู่ :&emsp; <?= $result['applicant_addess']?> </label><br>
                
                    <label class="" >&emsp; <?= $result1['name_th']?>, &nbsp; <?= $result2['name_th']?>, &nbsp; <?= $result3['name_th']?></label><br>
                    <label class="bi bi-calendar" > วุฒิการศึกษา : &emsp; <?= $result['applicant_edu_level']?> </label>
                    </div>
                  </div>
                  <br>
                  <div class="col-3">
                    <label for="input" class="col-form-label">ความสามารถ</label>
                  </div>
                  <div class="col-9">
                    <div class="p-2 rounded-3 bg-white " ><button class="btn rounded-pill success text-white ">Back End</button></div>
                  </div>
                  <br>
                  <div class="col-3">
                    <label for="input" class="col-form-label">เงินเดือนที่ต้องการ</label>
                  </div>
                  <div class="col-9">
                  <div class="p-2 rounded-3 bg-white"><?= $result['applicant_expected_salary']?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
              </tbody>
            </table>
          </div>
        </div>
      </form>
    </main>
  </body>

</html>
