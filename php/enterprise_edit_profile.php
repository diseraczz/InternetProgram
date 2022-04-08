<?php
  session_start(); 
  include('connection.php');
  $sql = "SELECT * FROM provinces";

  $query = mysqli_query($conn,$sql);

  if($_GET['enterprise_id'] && !empty($_GET['enterprise_id'])){
    $enterprise_id = $_GET['enterprise_id'];
    $sql = "SELECT * FROM enterprises  WHERE enterprise_id = '$enterprise_id' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
  }

  if(isset($_POST) && !empty($_POST)){

    $image = $_FILES["photo"]['tmp_name'];
    $photo_content = file_get_contents($photo);
    $image = base64_encode(file_get_contents(addslashes($image)));

    $enterprise_email = $_POST['enterprise_email'];
    $enterprise_name_th = $_POST['enterprise_name_th'];
    $enterprise_name_en = $_POST['enterprise_name_en'];
    $enterprise_telephone_number = $_POST['enterprise_telephone_number'];
    $enterprise_website = $_POST['enterprise_website'];
    $enterprise_address = $_POST['enterprise_address'];
    $enterprise_province = $_POST['enterprise_province'];
    $enterprise_district = $_POST['enterprise_district'];
    $enterprise_sub_district = $_POST['enterprise_sub_district'];
    $enterprise_profile_pic = $_POST['enterprise_profile_pic'];
    $enterprise_type_id = $_POST['enterprise_type_id'];
    $oldimage = $_POST['oldimage'];

    if(isset($_FILES['enterprise_profile_pic']['name']) && !empty($_FILES['enterprise_profile_pic']['name'])){
      $extension = array("jpeg","jpg","png");
      $target = "../images/";
      $filename = $_FILES['enterprise_profile_pic']['name'];
      $filetmp = $_FILES['enterprise_profile_pic']['tmp_name'];
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

    $sql = "UPDATE enterprises SET
                  enterprise_email = '$enterprise_email',
                  enterprise_name_th = '$enterprise_name_th',
                  enterprise_name_en = '$enterprise_name_en',
                  enterprise_telephone_number = '$enterprise_telephone_number',
                  enterprise_website = '$enterprise_website',
                  enterprise_address = '$enterprise_address',
                  enterprise_province = '$enterprise_province',
                  enterprise_district = '$enterprise_district',
                  enterprise_sub_district = '$enterprise_sub_district',
                  enterprise_profile_pic = '$filename',
                  enterprise_type_id = '$enterprise_type_id'
              WHERE enterprise_id = '$enterprise_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $_SESSION['success'] = "Insert user successfully";
      echo "<script type='text/javascript'>";
      echo "alert('แก้ไขข้อมูลสำเร็จ');";
      echo "window.location = 'enterprise_profile.php'; ";
      echo "</script>";
    }
    else{
      $_SESSION['error'] = "Something went wrong";
      echo "<script type='text/javascript'>";
      echo "alert('เกิดข้อผิดพลาด กรุณากรอกใหม่อีกครั้ง');";
      echo "window.location = 'enterprise_edit_profile.php'; ";
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
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../styles/styles.css">
</head>

<body>
  <header class="p-2 border-buttom header-bar">
    <div class="container-header">
        <div class="d-flex flex-wrap align-items-center justify-content-start">
          <a href="dashboard_work.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto ms-4">
              <img src="../images/meIT2.png" alt="" width="170" height="auto" >
          </a>
        </div>
    </div>
  </header>
    <main class="container pt-5">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="p-5 bg-white rounded-30">
            <div class="row text-black">
              <div class="align-items-center p-2 ps-4 mb-4 gradient shadow bg-bluesky rounded-25" >
                <t class="fs-1 fw-bold align-items-center" role="button">Enterprise Profile Settings</t>
              </div>
                <div class="col-4">
                    <br>
                    <div class="text-center mb-5">
                        <img src="../images/<?php echo $row['enterprise_profile_pic']?>" alt="pic" width="250" height="250" class="rounded-circle bg-darkblue" style="border: .5rem solid;border-color: #434394;">
                        <div class="pt-5 p-3">
                          <label class="form-label fs-5 success p-1 px-5 text-white rounded-pill" for="enterprise_profile_pic">อัปโหลดรูปภาพ</label>
                          <input type="file" class="form-control " name="enterprise_profile_pic">
                          <input type="hidden" class="w-100 rounded-pill p-2" name="photo" value="<?php echo $row['enterprise_profile_pic']; ?>">
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="row g-3">
                        <div class="col-12 mt-5 success rounded-25">
                            <h4 class="fs-3 mt-2 text-white ps-3">ข้อมูลบริษัท</h4>
                        </div>
                        <div class="col-6">
                          <label class="form-label" for="enterprise_name_th">ชื่อบริษัทภาษาไทย</label>
                          <input type="text" name="enterprise_name_th" class="form-control" placeholder="" value="<?php echo $row['enterprise_name_th']; ?>" >
                        </div>
                        <div class="col-6" >
                          <label class="form-label" for="enterprise_name_en">ชื่อบริษัทภาษาอังกฤษ</label>
                          <input type="text" name="enterprise_name_en" class="form-control" value="<?php echo $row['enterprise_name_en']; ?>" >
                        </div>
                        <div class="col-4">
                          <label class="form-label" for="enterprise_telephone_number">เบอร์โทรศัพท์บริษัท</label>
                          <input type="tel" name="enterprise_telephone_number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="000-000-0000" class="form-control" value="<?php echo $row['enterprise_telephone_number']; ?>">
                        </div>
                        <div class="col-4">
                          <label class="form-label" for="enterprise_email">E-mail บริษัท</label>
                          <input type="email" name="enterprise_email" class="form-control" value="<?php echo $row['enterprise_email']; ?>">
                        </div>
                        <div class="col-4">
                          <label class="form-label" for="enterprise_website">เว็บไซต์บริษัท</label>
                          <input type="text" name="enterprise_website" class="form-control" value="<?php echo $row['enterprise_website']; ?>" >
                        </div>
                        <div class="col-12">
                          <label class="form-label" for="enterprise_address">ที่อยู่บริษัท</label>
                          <input type="text" name="enterprise_address" class="form-control" value="<?php echo $row['enterprise_address']; ?>">
                        </div>
                        <div class="col-4 mt-3">
                            <label class="form-label" for="enterprise_province">จังหวัด</label>
                            <select class="form-select" name="enterprise_province" id="enterprise_province">
                              <option selected disabled>เลือกจังหวัด</option>
                              <?php 
                                foreach($query as $value){
                              ?>
                              <option value="<?= $value['id']?>"><?= $value['name_th']?></option>
                              <?php }?>
                            </select>
                        </div>
                        <div class="col-4 mt-3">
                            <label class="form-label" for="enterprise_district">อำเภอ</label>
                            <select class="form-select" name="enterprise_district" id="enterprise_district">
                            <!--<option selected disabled>เลือกอำเภอ</option>-->
                            </select>
                        </div>
                        <div class="col-4 mt-3">
                            <label class="form-label" for="enterprise_sub_district">ตำบล</label>
                            <select class="form-select" name="enterprise_sub_district" id="enterprise_sub_district">
                            <!--<option selected>เลือกตำบล</option>-->
                            </select>
                        </div>
                        <br>
                        <label class="form-label" for="enterprise_type_id">ประเภทบริษัท</label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="enterprise_type_id" value="" checked>
                          <label class="form-check-label" for="enterprise_type_id">นิติบุคล</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="enterprise_type_id" value="">
                          <label class="form-check-label" for="enterprise_type_id">บุคคลธรรมดา</label>
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
      $('#enterprise_province').change(function(){
        var id_province = $(this).val();
        $.ajax({
          type: "post",
          url: "ajax_address.php",
          data: {id:id_province,function:'province'},
          success: function(data){
            $('#enterprise_district').html(data);
            $('#enterprise_sub_district').html(' ');
          }
        });
      });
      $('#enterprise_district').change(function(){
        var id_district = $(this).val();
        $.ajax({
          type: "post",
          url: "ajax_address.php",
          data: {id:id_district,function:'sub_district'},
          success: function(data){
            $('#enterprise_sub_district').html(data);
          }
        });
      });
    </script>
</body>

</html>
