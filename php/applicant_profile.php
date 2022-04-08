<?php
  session_start();
  include('connection.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" type="image/x-icon" href="../images/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>

<body>
  <?php
    $id = $_SESSION["applicant_id"];
    $query = mysqli_query($conn, "SELECT * FROM applicants WHERE applicant_id = $id ");
    $result = mysqli_fetch_array($query);

    $sql1 = mysqli_query($conn, "SELECT * FROM applicants INNER JOIN provinces ON applicants.applicant_province = provinces.id WHERE applicant_id = $id");
    $result1 = mysqli_fetch_array($sql1);
    $sql2 = mysqli_query($conn, "SELECT * FROM applicants INNER JOIN amphures ON applicants.applicant_district = amphures.id WHERE applicant_id = $id");
    $result2 = mysqli_fetch_array($sql2);
    $sql3 = mysqli_query($conn, "SELECT * FROM applicants INNER JOIN districts ON applicants.applicant_sub_district = districts.id WHERE applicant_id = $id");
    $result3 = mysqli_fetch_array($sql3);
  ?>

  <header class="p-2 border-buttom header-bar">
    <div class="container-header">
      <div class="d-flex flex-wrap align-items-center justify-content-start">
        <a href="main.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto ms-4">
            <img src="../images/meIT2.png" alt="" width="170" height="auto" >
        </a>
        <div class="dropdown me-5" >
          <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="../images/<?= $_SESSION['applicant_profile_pic']?>" alt="mdo" width="40" height="40" class="rounded-circle" style="border: #86b7fe solid; ">&nbsp;&nbsp; <?= $_SESSION['applicant_firstname']?>
          </a>
          <ul class="dropdown-menu " aria-labelledby="dropdownUser1" >
            <li><a class="dropdown-item" href="#">My work</a></li>
            <li><a class="dropdown-item" href="applicant_profile.php">Profile</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="logout.php">Sign Out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <br>

  <main class="container">
      
      <div class="p-4 bg-white rounded-25 shadow" >
        <div class="row">
          <div class="col-3 text-center">
            <t class="text-dark fs-1 fw-bold mb-">Profile</t>
            <img class="rounded-circle success my-4" src="../images/<?= $result['applicant_profile_pic']?>" alt="pic" width="200" height="200">
            <a class="btn success rounded-25 text-white" href="applicant_edit_profile.php?applicant_id=<?= $result['applicant_id']?>">แก้ไขข้อมูล</a>
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
        </div>
    </main>
</body>

</html>
