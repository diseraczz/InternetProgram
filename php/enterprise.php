<?php
  session_start();
  include('connection.php');
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
        $id = $_SESSION["enterprises_id"];
        $query = mysqli_query($conn, "SELECT * FROM admin WHERE enterprise_id = $id ");
        $result = mysqli_fetch_array($query);
      ?>
    <header class="p-2 border-buttom admin-bar">
      <div class="container-header">
        <div class="d-flex flex-wrap align-items-center justify-content-start">
          <a href="admin.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto ms-4">
            <img src="../images/meIT2.png" alt="" width="170" height="auto" >
          </a>
          <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto" style="color: white;">
            <h3>บริษัท</h3>
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

    <main class="container pt-5" >
      <form method="GET" enctype="multipart/form-data">
        <div class="p-5 bg-white rounded-30">
          <div class="row text-black">
            <div class="col-10">
              <h4>ตารางบริษัท</h4>
            </div>
            <br><br>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Profile</th>
                  <th scope="col">Name</th>
                  <th scope="col">Wed</th>
                  <th scope="col">Email</th>
                  <th scope="col">Tel</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $query = mysqli_query($conn, "SELECT * FROM enterprises ORDER BY enterprise_id ASC");
                while ($result = mysqli_fetch_array($query)) {
              ?>
                <tr>
                  <td><?= $result['enterprise_id'] ?></td>
                  <td><img src="../images/<?= $result['enterprise_profile_pic'] ?>" width="100" height="auto"></td>
                  <td><?= $result['enterprise_name_th'] ?></td>
                  <td><?= $result['enterprise_website'] ?></td>
                  <td><?= $result['enterprise_email'] ?></td>
                  <td><?= $result['enterprise_telephone_number'] ?></td>
                  <td><a href="enterprise_edit.php?enterprise_id=<?php echo $result["enterprise_id"]?>" class="btn btn-editp rounded-pill px-3 ">ตรวจสอบ</a></td>
                  <td><a href="enterprise_delete.php?enterprise_id=<?= $result['enterprise_id']?>" class="btn btn-cancelg rounded-pill px-4 text-white" onclick="return confirm('คุณต้องการลบชื่อ <?= $result['enterprise_name'] ?> หรือไม่')">ลบ</a></td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </form>
    </main>

  </body>

</html>
