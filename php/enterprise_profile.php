<?php
  session_start();
  require_once "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Profile</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  
  <link rel="stylesheet" href="../styles/styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<?php
    $id = $_SESSION["enterprise_id"];
    $query = mysqli_query($conn, "SELECT * FROM enterprises WHERE enterprise_id = $id ");
    $result = mysqli_fetch_array($query);

    $sql1 = mysqli_query($conn, "SELECT * FROM enterprises INNER JOIN provinces ON enterprises.enterprise_province = provinces.id WHERE enterprise_id = $id");
    $result1 = mysqli_fetch_array($sql1);
    $sql2 = mysqli_query($conn, "SELECT * FROM enterprises INNER JOIN amphures ON enterprises.enterprise_district = amphures.id WHERE enterprise_id = $id");
    $result2 = mysqli_fetch_array($sql2);
    $sql3 = mysqli_query($conn, "SELECT * FROM enterprises INNER JOIN districts ON enterprises.enterprise_sub_district = districts.id WHERE enterprise_id = $id");
    $result3 = mysqli_fetch_array($sql3);
  ?>
<body class="">
  <header class="p-2 border-buttom header-bar">
    <div class="container-header">
        <div class="d-flex flex-wrap align-items-center justify-content-start">
            <a href="dashboard_work.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto ms-4">
                <img src="../images/meIT2.png" alt="" width="170" height="auto" >
            </a>
            <div class="dropdown me-5" >
              <div class="border border-primary rounded-pill d-block link-light text-decoration-none dropdown-toggle p-1" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false" style="padding: .15rem;" >  
                <img src="../images/<?= $result['enterprise_profile_pic']?>" alt="pic" width="37" height="37" class="rounded-circle">&nbsp;&nbsp;<?= $result['enterprise_name_th']?>
              </div>
              <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">Response</a></li>
                <li><a class="dropdown-item" href="enterprise_profile.php">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
              </ul>
              </div>
            </div>
        </div>
    </div>
  </header>
  
  <main class="container">
  
    <div class="p-4 bg-white w-100 rounded-30 h-100 mt-5">
      <div class="row">
        <div class="col-3 text-center mt-4 ">
          <t class="text-dark fs-1 fw-bold">Profile บริษัท</t>
          <div class="justify-content-center my-4"><img src="../images/<?= $result['enterprise_profile_pic']?>" width="200" height="200"class="rounded-circle bg-darkblue"></div>
          <a class="btn success rounded-25 text-white" href="enterprise_edit_profile.php?enterprise_id=<?=$result['enterprise_id']?>">แก้ไขข้อมูล</a>
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
                      <label class="text-uppercase"><?= $result['enterprise_name_th']?> &nbsp; (<?= $result['enterprise_name_en']?>)</label>
                    </div>

                    <div class="col-3">
                      <label for="input" class="fs-4">เว็บไซต์บริษัท</label>
                    </div>
                    <div class="col-9 bg-white p-2 rounded-3">
                      <label class="text-uppercase"><?= $result['enterprise_website']?></label>
                    </div>
                    <div class="col-3">
                      <label for="input" class="fs-4">ที่อยู่บริษัท</label>
                    </div>
                    <div class="col-9 bg-white p-2 rounded-3" style="height: 100px;">
                      <label class="text-uppercase "><?= $result['enterprise_address']?>&nbsp; <?= $result3['name_th']?>,<?= $result2['name_th']?>,<?= $result1['name_th']?></label>
                    </div>
                    <div class="col-3">
                      <label for="input" class="fs-4">อีเมลบริษัท</label>
                    </div>
                    <div class="col-9 bg-white p-2 rounded-3">
                      <label class="text-uppercase "><?= $result['enterprise_email']?></label>
                    </div>
                    <div class="col-3">
                      <label for="input" class="fs-4">เบอร์โทรศัพท์บริษัท</label>
                    </div>
                    <div class="col-9 bg-white p-2 rounded-3">
                      <label class="text-uppercase "><?= $result['enterprise_telephone_number']?></label>
                    </div>
                
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
