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
    <?php
      $idadmin = $_SESSION["admin_id"];
      $query = mysqli_query($conn, "SELECT * FROM admin WHERE admin_id = $idadmin ");
      $result = mysqli_fetch_array($query);
    ?>
    <header class="p-2 border-buttom admin-bar">
      <div class="container-header">
        <div class="d-flex flex-wrap align-items-center justify-content-start">
          <a href="admin.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto ms-4">
            <img src="../images/meIT2.png" alt="" width="170" height="auto" >
          </a>
          <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto" style="color: white;">
            <h3>ข้อมูลผู้ใช้งาน</h3>
          </div>
          <div class="dropdown me-5" >
            <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="../images/<?= $result['admin_img']?>" alt="mdo" width="40" height="40" class="rounded-circle bg-darkblue" style="border: #86b7fe solid; "> <?= $result['admin_name']?>
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

    <!--overview-->

  </body>

</html>
