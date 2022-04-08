<?php 
  session_start();
  require_once ('connection.php');
  $query = mysqli_query($conn,"set char set utf8");
  $id = $_SESSION["enterprise_id"];

  if($_GET['job_post_id'] && !empty($_GET['job_post_id'])){
    $job_post_id = $_GET['job_post_id'];
    $sql = "SELECT * FROM job_posts  WHERE job_post_id = '$job_post_id' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
  }

  if(isset($_POST) && !empty($_POST)){
    $job_post_position_id = $_POST['job_post_position_id'];
    $job_post_skill_id = $_POST['job_post_skill_id'];
    $job_post_employment_type_id = $_POST['job_post_employment_type_id'];
    $job_post_open_rate = $_POST['job_post_open_rate'];
    $job_post_enterprise_id = $_POST['job_post_enterprise_id'];
    $job_post_income = $_POST['job_post_income'];
    $job_post_details = $_POST['job_post_details'];
    $skills = implode(',',$job_post_skill_id);

    $sql = "UPDATE job_posts SET
            `job_post_open_rate`= '$_POST[job_post_open_rate]',
            `job_post_income`='$_POST[job_post_income]' ,
            `job_post_details`='$_POST[job_post_details]'
            WHERE job_post_id = '$job_post_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
      echo "<script type='text/javascript'>";
      echo "alert('โพสต์งาน เรียบร้อย');";
      echo "window.location = 'dashboard_work.php'; ";
      echo "</script>";
    }
    else{
      echo "<script type='text/javascript'>";
      echo "alert('error');";
      echo "window.location = 'recruitment_page.php'; ";
      echo "</script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruitment</title> 
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <script async src='/cdn-cgi/bm/cv/669835187/api.js'></script>
  </head>
  <body style="background-color: #101214b6;">
  <?php
    $id = $_SESSION["enterprise_id"];
    $query = mysqli_query($conn, "SELECT * FROM enterprises WHERE enterprise_id = $id");
    $result = mysqli_fetch_array($query);
  ?>
    <header class="p-2 border-buttom header-bar">
      <div class="container-header">
          <div class="d-flex flex-wrap align-items-center justify-content-start">
              <a href="dashboard_work.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto ms-4">
                  <img src="../images/meIT2.png" alt="" width="170" height="auto" >
              </a>
              <div class="dropdown me-5" >
              <div class="border border-primary rounded-pill d-block link-light text-decoration-none dropdown-toggle p-1" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false" style="padding: .15rem;" >  
                <img src="../images/<?= $_SESSION['enterprise_profile_pic']?>" alt="pic" width="37" height="37" class="rounded-circle">&nbsp;&nbsp;<?= $_SESSION['enterprise_name_th']?>
              </div>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                  <li><a class="dropdown-item" href="enterprise_profile.php">Profile</a></li>
                  <li><a class="dropdown-item" href="#">Response</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
                </ul>
                </div>
              </div>
          </div>
      </div>
    </header>
    

    <div class="container">
      <div class="p-4 w-100 rounded-30 bg-white justify-content-center mt-5">
          <div class="row">
            <div class="col">
              <div class="work bg-admin rounded-pill">
                <label class="form-label fs-1" >&nbsp;แก้ไขรับสมัครงาน</label>
              </div>
            </div>
          </div>
          
          <form action="" method="post">
            <div class="row mt-2">
              <div class="col">
                <label for="job_post_position_id" class="form-label">ตำแหน่งงาน</label>
                <select name="job_post_position_id"  class="form-select">
                  <option selected value="<?php echo $row['job_post_position_id']; ?>"></option>
                  <option value="1">Application Network</option>
                  <option value="2">Business Analyst (BA)</option>
                  <option value="3">Data Analysis</option>
                  <option value="4">Data Engineer</option>
                  <option value="5">Hardware</option>
                  <option value="6">IT Audit</option>
                  <option value="7">IT Manager/Senior Programmer</option>
                  <option value="8">IT Project Manager</option>
                  <option value="9">IT Security</option>
                  <option value="10">IT Support Help Desk</option>
                  <option value="11">MIS</option>
                  <option value="12">Programmer</option>
                  <option value="13">Software Engineer</option>
                  <option value="14">Software Tester</option>
                  <option value="15">System Admin</option>
                  <option value="16">System Analyst</option>
                  <option value="17">System Engineer and Architect</option>
                  <option value="18">งาน Mobile Wireless</option>
                  <option value="19">ดูแลเว็บไซต์ และ SEO</option>
                  <option value="20">ดูแลระบบ Network</option>
                  <option value="21">ที่ปรึกษาไอที</option>
                  <option value="22">นักออกแบบ UX/UI</option>
                </select>
              </div>
              <div class="col">
                <label for="job_post_employment_type_id" class="form-label">ประเภทการจ้าง</label>
                <select name="job_post_employment_type_id"  class="form-select">
                  <option selected value="<?php echo $row['job_post_employment_type_id']; ?>"></option>
                  <option value="1">งานประจำ</option>
                  <option value="2">งานพาร์ทไทม์</option>
                  <option value="3">ฝึกงาน</option>
                </select>
              </div>
              <div class="row mt-2">
                <div class="col">
                  <label for="job_post_open_rate" class="form-label">อัตราที่เปิดรับ</label>
                  <input type="text" name="job_post_open_rate" class="form-control" value="<?php echo $row['job_post_open_rate']; ?>">
                </div>
                <div class="col">
                    <label for="job_post_income" class="form-label">รายได้</label>
                    <input type="text" name="job_post_income" class="form-control" value="<?php echo $row['job_post_income']; ?>">
                    </div>
                </div>
              </div> 
              <div class="row mt-2">
                <div class="col">
                  <label for="job_post_details" class="form-label">รายละเอียดงาน</label>
                  <textarea class="form-control" rows="4" name="job_post_details"><?php echo $row['job_post_details']; ?></textarea>
                </div>
              </div>
              <br>
              <div class="row">
                <label for="job_post_skill_id" class="form-label">ทักษะ</label>
                <div class="col-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="job_post_skill_id[]" value="1">HTML
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="job_post_skill_id[]" value="2">CSS
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="job_post_skill_id[]" value="3">JavaScript
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="job_post_skill_id[]" value="4">SQL
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="job_post_skill_id[]" value="5">PHP
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="job_post_skill_id[]" value="6">Python
                    </div>
                    <div class="form-check">                    
                        <input class="form-check-input" type="checkbox" name="job_post_skill_id[]" value="7">Java
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="job_post_skill_id[]" value="8">Back End
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="job_post_skill_id[]" value="9">Web page Design
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="job_post_skill_id[]" value="10">MS.Office
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="job_post_skill_id[]" value="11">OS
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="job_post_skill_id[]" value="12">Network
                    </div>
                </div>
              </div>
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-warning" onclick="window.history.back()">ย้อนกลับ</a>
                <button class="btn btn-success" type="submit" >แก้ไขข้อมูล</button>
              </div> 
            </div>
          </form>
      </div>
    </div>
  </body>
</html>

