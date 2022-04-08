<?php
  session_start(); 
  include('connection.php');
  $sql = "SELECT * FROM provinces";
  $query = mysqli_query($conn,$sql);

  if($_GET['applicant_id'] && !empty($_GET['applicant_id'])){
    $applicant_id = $_GET['applicant_id'];
    $sql = "SELECT * FROM applicants  WHERE applicant_id = '$applicant_id' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
  }

  if(isset($_POST) && !empty($_POST)){
    $applicant_firstname = $_POST['applicant_firstname'];
    $applicant_lastname = $_POST['applicant_lastname'];
    $applicant_brithday = $_POST['applicant_brithday'];
    $applicant_telephone_number = $_POST['applicant_telephone_number'];
    $applicant_email = $_POST['applicant_email'];
    $applicant_addess = $_POST['applicant_addess'];
    $applicant_province = $_POST['applicant_province'];
    $applicant_district = $_POST['applicant_district'];
    $applicant_sub_district = $_POST['applicant_sub_district'];
    $applicant_edu_university = $_POST['applicant_edu_university'];
    $applicant_edu_faculty = $_POST['applicant_edu_faculty'];
    $applicant_edu_major = $_POST['applicant_edu_major'];
    $applicant_edu_gpax = $_POST['applicant_edu_gpax'];
    $applicant_edu_province = $_POST['applicant_edu_province'];
    $applicant_edu_level = $_POST['applicant_edu_level'];
    $applicant_profile_pic = $_POST['applicant_profile_pic'];
    $applicant_resume_img = $_POST['applicant_resume_img'];
    $applicant_expected_salary= $_POST['applicant_expected_salary'];
    $applicant_introduc = $_POST['applicant_introduc'];
    $applicant_position_id = $_POST['applicant_position_id'];
    $oldimage = $_POST['oldimage'];

    if(isset($_FILES['applicant_profile_pic']['name']) && !empty($_FILES['applicant_profile_pic']['name'])){
      $extension = array("jpeg","jpg","png");
      $target = "../images/";
      $filename = $_FILES['applicant_profile_pic']['name'];
      $filetmp = $_FILES['applicant_profile_pic']['tmp_name'];
      $ext = pathinfo($filename,PATHINFO_EXTENSION); //เช็คประเภทของไฟล์

      if(in_array($ext,$extension)){
        if (!file_exists($target.$filename)){ //ไฟล์ไม่ซ้ำ
          if(move_uploaded_file($filetmp,$target.$filename)){ //เข้าสู่โฟลเดอร์ สำเร็จหรือไม่
            $filename = $filename; //สำเร็จ
          }else{
            echo 'เพิ่มไฟล์เข้าโฟลเดอร์ไม่สำเร็จ';
          }
        }else{ //ไฟล์ซ้ำ
          $neafilename = time().$filename; //แปลงชื่อไฟล์ โดยเพิ่เวลาเข้ามา
          if(move_uploaded_file($filetmp,$target.$neafilename)){ //เข้าสู่โฟลเดอร์ สำเร็จหรือไม่
            $filename = $neafilename; //สำเร็จ
          }else{
            echo 'เพิ่มไฟล์เข้าโฟลเดอร์ไม่สำเร็จ';
          }
        }
      }else{
        echo 'ประเภทไฟล์ไม่ถูกต้อง';
      }
    }else{
      $filename = $oldimage;
    }

    $sql = "UPDATE applicants SET
              applicant_firstname = '$applicant_firstname',
              applicant_lastname = '$applicant_lastname',
              applicant_brithday = '$applicant_brithday',
              applicant_telephone_number = '$applicant_telephone_number',
              applicant_email = '$applicant_email',
              applicant_addess = '$applicant_addess',
              applicant_province = '$applicant_province',
              applicant_district = '$applicant_district',
              applicant_sub_district = '$applicant_sub_district',
              applicant_edu_university = '$applicant_edu_university',
              applicant_edu_faculty = '$applicant_edu_faculty',
              applicant_edu_major = '$applicant_edu_major',
              applicant_edu_gpax = '$applicant_edu_gpax',
              applicant_edu_province = '$applicant_edu_province',
              applicant_edu_level = '$applicant_edu_level',
              applicant_profile_pic = '$filename',
              applicant_resume_img = '$applicant_resume_img',
              applicant_expected_salary= '$applicant_expected_salary',
              applicant_introduc = '$applicant_introduc',
              applicant_position_id = '$applicant_position_id'
              WHERE applicant_id = '$applicant_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $_SESSION['success'] = "Insert user successfully";
      echo "<script type='text/javascript'>";
      echo "alert('แก้ไขข้อมูลสำเร็จ');";
      echo "window.location = 'applicant_profile.php'; ";
      echo "</script>";
    }
    else{
      $_SESSION['error'] = "Something went wrong";
      echo "<script type='text/javascript'>";
      echo "alert('เกิดข้อผิดพลาด กรุณากรอกใหม่อีกครั้ง');";
      echo "window.location = 'applicant_edit_profile.php'; ";
      echo "</script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Profile</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../styles/styles.css">
</head>

<body>
  <header class="p-2 border-buttom header-bar">
    <div class="container-header">
        <div class="d-flex flex-wrap align-items-center justify-content-start">
          <a href="main.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto ms-4">
              <img src="../images/meIT2.png" alt="" width="170" height="auto" >
          </a>
        </div>
    </div>
  </header>
    <main class="container pt-5">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="p-5 bg-white rounded-30">
            <div class="row text-black">
              <div class="align-items-center p-2 ps-4 mb-4 text-white gradient shadow-sj bg-bluesky rounded-25" >
                <t class="fs-1 fw-bold align-items-center" role="button">Profile Settings.</t>
              </div>
                <div class="col-4">
                    <br>
                    <div class="text-center mb-3">
                        <img src="../images/<?php echo $row['applicant_profile_pic']?>" alt="pic" width="250" height="250" class="rounded-circle success" style="border: .5rem solid;border-color: #434394;">
                        <div class="pt-5 p-3">
                          <label class="form-label fs-5 success p-1 px-5 text-white rounded-pill" for="enterprise_profile_pic">อัปโหลดรูปภาพ</label>
                          <input type="file" class="form-control" name="applicant_profile_pic"  ">
                          <input type="hidden" class="w-100 rounded-pill p-2" name="oldimage" value="<?php echo $row['applicant_profile_pic']; ?>">
                        </div>
                    </div>
                
                   
                    <div class="col mt-3">
                      <label class="form-label">ตำแหน่งที่สนใจ</label>
                            <select class="form-select" name="applicant_position_id" id="applicant_position_id">
                              <option selected disabled>เลือกตำแหน่งที่สนใจ</option>
                              <option value="<?= $value['position_id']?>"><?= $value['position_name']?></option>
                            </select>
                  </div>
                    <div class="col mt-3">
                        <label class="form-label" for="applicant_expected_salary">เงินเดือนที่ต้องการ</label>
                        <input type="text" class="form-control" name="applicant_expected_salary" value="<?php echo $row['applicant_expected_salary']; ?>">
                    </div>
                    <div class="col mt-3">
                        <label class="form-label" for="applicant_introduc">แนะนำตัวเอง</label>
                        <textarea class="form-control" name="applicant_introduc"><?php echo $row['applicant_introduc']; ?></textarea>
                    </div>
                </div>
                <div class="col-8">
                    <div class="row g-3">
                        <div class="col-12 mt-5 success rounded-25">
                            <h4 class="fs-3 mt-2 text-white ps-3">ประวัติส่วนตัว</h4>
                        </div>
                        <div class="col-6 mt-3">
                            <label class="form-label" for="applicant_firstname">ชื่อ</label>
                            <input type="text" class="form-control" name="applicant_firstname" value="<?php echo $row['applicant_firstname']; ?>" required>
                        </div>
                        <div class="col-6 mt-3">
                            <label class="form-label" for="applicant_lastname">นามสกุล</label>
                            <input type="text" class="form-control" name="applicant_lastname" value="<?php echo $row['applicant_lastname']; ?>" required>
                        </div>
                        <div class="col-4 mt-3">
                            <label class="form-label" for="applicant_brithday">วันเกิด</label>
                            <input type="date" class="form-control" name="applicant_brithday" value="<?php echo $row['applicant_brithday']; ?>" required>
                        </div>
                        <div class="col-4 mt-3">
                            <label class="form-label" for="applicant_telephone_number">เบอร์โทรศัพท์</label>
                            <input type="tel" class="form-control" name="applicant_telephone_number"  pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="000-000-0000"value="<?php echo $row['applicant_telephone_number']; ?>" required>
                        </div>
                        <div class="col-4 mt-3">
                            <label class="form-label" for="applicant_email">E-mail</label>
                            <input type="email" class="form-control" name="applicant_email" value="<?php echo $row['applicant_email']; ?>" required>
                        </div>
                        <div class="col-12 mt-3">
                            <label class="form-label" for="applicant_addess">ที่อยู่</label>
                            <input type="text" class="form-control" name="applicant_addess" value="<?php echo $row['applicant_addess']; ?>" required>
                        </div>
                        <div class="col-4 mt-3">
                            <label class="form-label" for="applicant_province">จังหวัด</label>
                            <select class="form-select" name="applicant_province" id="applicant_province">
                              <option selected disabled>เลือกจังหวัด</option>
                              <?php 
                                foreach($query as $value){
                              ?>
                              <option value="<?= $value['id']?>"><?= $value['name_th']?></option>
                              <?php }?>
                            </select>
                        </div>
                        <div class="col-4 mt-3">
                            <label class="form-label" for="applicant_district">อำเภอ</label>
                            <select class="form-select" name="applicant_district" id="applicant_district">
                            <!--<option selected disabled>เลือกอำเภอ</option>-->
                            </select>
                        </div>
                        <div class="col-4 mt-3">
                            <label class="form-label" for="applicant_sub_district">ตำบล</label>
                            <select class="form-select" name="applicant_sub_district" id="applicant_sub_district">
                            <!--<option selected>เลือกตำบล</option>-->
                            </select>
                        </div>
                        <div class="col-12 mt-3 success rounded-25">
                            <h4 class="fs-3 mt-2 text-white ps-3">การศึกษา</h4>
                        </div>
                        <div class="col-6 mt-3">
                            <label class="form-label" for="applicant_edu_university">มหาวิทยาลัย</label>
                            <input type="text" class="form-control" name="applicant_edu_university" value="<?php echo $row['applicant_edu_university']; ?>" required>
                        </div>
                        <div class="col-3 mt-3">
                            <label class="form-label" for="applicant_edu_province">จังหวัด</label>
                            <input type="text" class="form-control" name="applicant_edu_province" value="<?php echo $row['applicant_edu_province']; ?>" required>
                        </div>
                        <div class="col-3 mt-3">
                          <label class="form-label" for="applicant_edu_level">วุฒิการศึกษา</label>
                          <select class="form-select" name="applicant_edu_level" value="<?php echo $row['applicant_edu_level']; ?>" >
                            <option selected>วุฒิการศึกษา</option>
                            <option>ปริญญาตรี</option>
                            <option>ปริญญาโท</option>
                            <option>ปริญญาเอก</option>
                          </select>
                        </div>
                        <div class="col-5 mt-3">
                            <label class="form-label" for="applicant_edu_faculty">คณะ</label>
                            <input type="text" class="form-control" name="applicant_edu_faculty" value="<?php echo $row['applicant_edu_faculty']; ?>" required>
                        </div>
                        <div class="col-5 mt-3">
                            <label class="form-label" for="applicant_edu_major">สาขา</label>
                            <input type="text" class="form-control" name="applicant_edu_major" value="<?php echo $row['applicant_edu_major']; ?>" required>
                        </div>
                        <div class="col-2 mt-3">
                            <label class="form-label" for="applicant_edu_gpax">GPAX</label>
                            <input type="text" class="form-control" name="applicant_edu_gpax" value="<?php echo $row['applicant_edu_gpax']; ?>" required>
                        </div>
                        <div class="col-12 mt-3 success rounded-25">
                            <h4 class="fs-3 mt-2 text-white ps-3" >ทักษะ</h4>
                        </div>
                        <div class="col-4 mt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox">
                                <label class="form-check-label">HTML</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox">
                                <label class="form-check-label">CSS</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox">
                                <label class="form-check-label">JavaScript</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox">
                                <label class="form-check-label">SQL</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox">
                                <label class="form-check-label">PHP</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox">
                                <label class="form-check-label">Python</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox">
                                <label class="form-check-label">Java</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox">
                                <label class="form-check-label">Back End</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox">
                                <label class="form-check-label">Web page Design</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox">
                                <label class="form-check-label">MS.Office</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox">
                                <label class="form-check-label">OS</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox">
                                <label class="form-check-label">Network</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-warning" onclick="window.history.back()">ย้อนกลับ</a>
                        <button class="btn btn-success" type="submit">บันทึกข้อมูล</button>
                    </div>
                </div>
            </div>
        </div>
      </form>
    </main>

    <script type="text/javascript">
      $('#applicant_province').change(function(){
        var id_province = $(this).val();
        $.ajax({
          type: "post",
          url: "ajax_address.php",
          data: {id:id_province,function:'province'},
          success: function(data){
            $('#applicant_district').html(data);
            $('#applicant_sub_district').html(' ');
          }
        });
      });
      $('#applicant_district').change(function(){
        var id_district = $(this).val();
        $.ajax({
          type: "post",
          url: "ajax_address.php",
          data: {id:id_district,function:'sub_district'},
          success: function(data){
            $('#applicant_sub_district').html(data);
          }
        });
      });
    </script>
</body>

</html>
