<?php
  session_start();
  require_once "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../styles/styles.css">
  <title>Profile</title>
  
</head>
<body class="bg-blue-fade">
  <header class="p-2 border-buttom header-bar">
    <div class="container-header">
        <div class="d-flex flex-wrap align-items-center justify-content-start">
            <a href="main.html" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto ms-4">
                <img src="../images/meIT2.png" alt="" width="170" height="auto" >
            </a>
            <div class="dropdown me-5" >
              <div class="border border-primary rounded-pill d-block link-light text-decoration-none dropdown-toggle p-1" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false" style="padding: .15rem;" >  
                <img src="../images/office-building.png" alt="pic" width="37" height="auto" class="rounded-circle">
              </div>
              <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Sign out</a></li>
              </ul>
              </div>
            </div>
        </div>
    </div>
  </header>
  <?php
    $query = mysqli_query($conn, "SELECT * FROM enterprises WHERE enterprise_id='2' ");
    $result = mysqli_fetch_array($query);
  ?>
  <div class="container">
    <div class="p-4 bg-white w-100 rounded-30 h-100 mt-5">
      <div class="row">
        <div class="col-3 text-center mt-4 ">
          <t class="text-dark fs-1 fw-bold">Profile บริษัท</t>
          <div class="justify-content-center my-4"><img src="../images/office-building.png" width="200" class="rounded-circle"></div>
          <a class="btn success rounded-25 text-white" href="edit_profile_enterprise.php">แก้ไขข้อมูล</a>
        </div>
        <div class="col-9 mt-4">
          <div class="row">
            <div class="col-12">
              <div class="p-4 bg-gray rounded-25" >
                  <div class="row g-3 align-items-center" style="font-size: 1.15rem;">
                    <div class="col-3">
                      <label for="input" class="fs-4">ชื่อบริษัท</label>
                    </div>
                    <div class="col-9 bg-white p-2 rounded-3">
                      <p class="text-uppercase"><?= $result['enterprise_name_th']?>&emsp;(<?= $result['enterprise_name_en']?>)</p>
                    </div>

                    <div class="col-3">
                      <label for="input" class="fs-4">เว็บไซต์บริษัท</label>
                    </div>
                    <div class="col-9 bg-white p-2 rounded-3">
                    <p class="text-uppercase"><?= $result['enterprise_website']?></p>
                    </div>
                    <div class="col-3">
                      <label for="input" class="fs-4">ที่อยู่บริษัท</label>
                    </div>
                    <div class="col-9 bg-white p-2 rounded-3" style="height: 100px;">
                      <p class="text-uppercase "><?= $result['enterprise_address']?>,&emsp;<?= $result['enterprise_province']?>,&emsp;<?= $result['enterprise_district']?>,&emsp;<?= $result['enterprise_sub_district']?></p>
                    </div>
                    <div class="col-3">
                      <label for="input" class="fs-4">อีเมลบริษัท</label>
                    </div>
                    <div class="col-9 bg-white p-2 rounded-3">
                      <p class="text-uppercase "><?= $result['enterprise_email']?></p>
                    </div>
                    <div class="col-3">
                      <label for="input" class="fs-4">เบอร์โทรศัพท์บริษัท</label>
                    </div>
                    <div class="col-9 bg-white p-2 rounded-3">
                    <p class="text-uppercase "><?= $result['enterprise_telephone_number']?></p>
                    </div>
                
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
