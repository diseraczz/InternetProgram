<?php 
  session_start();
  require_once ('connection.php');
  $query = mysqli_query($conn,"set char set utf8");
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

  <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Smart JOB</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
      </script>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="../styles/styles.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

  </head>

  <body>
  <?php
    $id = $_SESSION["enterprise_id"];
    $query = mysqli_query($conn, "SELECT * FROM enterprises WHERE enterprise_id = $id");
    $result = mysqli_fetch_array($query);
  ?>
    <header class="p-2 border-buttom header-bar">
      <div class="container-header">
        <div class="d-flex flex-wrap align-items-center justify-content-start">
          <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto ms-4">
            <img src="../images/meIT2.png" alt="" width="170" height="auto" >
          </a>
          <div class="dropdown me-5 " >
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
    </header>

      <div class="container-xxl mt-5" >
        <div class="row align-items-center p-2 m-2 gradient shadow-lg rounded-25 text-white" >
          <div class="col-10 " >
            <label class="fs-1 fw-bold align-items-center pt-2">บริษัท | &nbsp; <?= $result['enterprise_name_th']?></label>
          </div>
          <div class="col-2 d-flex justify-content-end">
            <a class="btn btn-SmartJob p-2 text-dark bg-sun rounded-pill fs-5 shadow-sj" style="font-size: 1rem;" href="enterprise_recruitment.php" role="button">สร้างโพสงาน</a>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row pt-4 ">
          <div class="col-6 " aria-disabled="flase" tabindex="0">
            <a class="btn w-100 col-heading text-center fs-2 bg-white" href="dashboard_work.php" role="button" data-bs-toggle="button" aria-pressed="true">งาน</a>
          </div>
          <div class="col-6 ">
            <a class="btn w-100 col-heading text-center fs-2 bg-white" style="opacity: .7;" href="#" role="button"  aria-pressed="false">ใบสมัครทั้งหมด</a>
          </div>
        </div>
      </div>

      <div class="container" >
        <div class="align-items-center content-boxWhite2 p-4 pt-4 " >
          <div class="search-work mb-4 ">    
            <div class="col" style="display: flex;  ">
            </div>   
          </div>
          <?php
            $id = $_SESSION["enterprise_id"];
            $query = mysqli_query($conn, "SELECT*FROM job_posts 
                                          INNER JOIN positions AS positions ON (job_posts.job_post_position_id=positions.position_id) 
                                          INNER JOIN enterprises AS enterprises ON (job_posts.job_post_enterprise_id  = enterprises.enterprise_id)
                                          WHERE job_post_enterprise_id = $id ");
            while ($result = mysqli_fetch_array($query)){
          ?>
        
            <div class=" bg-gray p-2 mb-3 cursor rounded-pill shadow-sj" data-bs-toggle="modal" data-bs-target="#workermodal<?= $result['job_post_id'] ?>" >
              <p class="fs-4 ps-3" style="margin-bottom: 0rem;">รับสมัครงาน ตำแหน่ง <?= $result['position_name'] ?></p>
            </div>
            
            
          <?php } ?>
        </div>
      </div>

      <section>
        <?php
          $query2 = mysqli_query($conn,"SELECT*FROM job_posts AS job_posts
          INNER JOIN positions AS positions ON (job_posts.job_post_position_id=positions.position_id)
          INNER JOIN enterprises AS enterprises ON (job_posts.job_post_enterprise_id  = enterprises.enterprise_id)");
          while($result = mysqli_fetch_array($query2)){
        ?>
        <div style=""class="modal fade" id="workermodal<?= $result['job_post_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
          <div style="" class="modal-dialog modal-dialog-centered  ">
            <div class="modal-content ">
              <div class="modal-header">
                <h5 class="modal-title fs-2" id="exampleModalLabel" >รายละเอียดงาน</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class= "px-5">
              <p class="bi bi-person-workspace">&emsp;&emsp; ตำแหน่งงาน <?= $result['position_name'] ?></p>
              <p class="bi bi-people-fill">&emsp;&emsp; รับสมัคร <?= $result['job_post_open_rate']?> คน</p>
              <p class="bi bi-building">&emsp;&emsp; บริษัท <?= $result['enterprise_name_en']?></p>
              </div>
              <div class= "px-4">
                <p class= fs-3>ช่องทางการติดต่อ</p>
                <p>&emsp;&emsp; โทร <?= $result['enterprise_telephone_number']?></p>
                <p>&emsp;&emsp; เว็บไซต์ <?= $result['enterprise_website']?></p>
              </div>
              <div class= px-4>
                <p class= fs-3>รายละเอียดงาน</p>
                <p class= "bg-white rounded-3" style="height: 80px;">&emsp;<?= $result['job_post_details']?></p>
              </div>
              <div class="modal-footer">
                <a class="btn btn-danger rounded-25" href="enterprise_delete_recruitment.php?job_post_id=<?=$result['job_post_id']?>">ลบข้อมูล</a>
                <a class="btn btn-warning rounded-25" href="enterprise_edit_recruitment.php?job_post_id=<?=$result['job_post_id']?>">แก้ไขข้อมูล</a>
              </div>
              
            </div>
          </div>
        </div>
        <?php } ?>
      </section>     
  </body>
</html>
