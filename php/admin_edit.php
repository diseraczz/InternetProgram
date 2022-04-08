<?php
  session_start();
  require_once('connection.php');

  if($_GET['admin_id'] && !empty($_GET['admin_id'])){
    $admin_id = $_GET['admin_id'];
    $sql = "SELECT * FROM admin  WHERE admin_id = '$admin_id' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
  }  

  if(isset($_POST) && !empty($_POST)){
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    $admin_confirm_password = $_POST['admin_confirm_password'];
    $admin_img = $_POST['admin_img'];
    $oldimage = $_POST['oldimage'];

    if(isset($_FILES['admin_img']['name']) && !empty($_FILES['admin_img']['name'])){
      $extension = array("jpeg","jpg","png");
      $target = "../images/";
      $filename = $_FILES['admin_img']['name'];
      $filetmp = $_FILES['admin_img']['tmp_name'];
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

    if($_POST['admin_password'] !== $_POST['admin_confirm_password']){
      echo "<script>alert('รหัสผ่านไม่ตรงกัน');</script>";
    }else{
      $passwordenc = md5($admin_password);
      $confirm_passwordenc = md5($admin_confirm_password);
      $sql = "UPDATE admin SET
              admin_name = '$admin_name',
              admin_email = '$admin_email',
              admin_password = '$admin_password',
              admin_confirm_password = '$admin_confirm_password',
              admin_img = '$filename'
              WHERE admin_id = '$admin_id'";
      $result = mysqli_query($conn, $sql);
    }

    if ($result) {
      $_SESSION['success'] = "Insert user successfully";
      echo "<script type='text/javascript'>";
      echo "alert('แก้ไขข้อมูลผู้ดูแลระบบสำเร็จ');";
      echo "window.location = 'admin_information.php'; ";
      echo "</script>";
    }
    else{
      $_SESSION['error'] = "Something went wrong";
      echo "<script type='text/javascript'>";
      echo "alert('เกิดข้อผิดพลาด กรุณากรอกใหม่อีกครั้ง');";
      echo "window.location = 'admin_add_admin.php'; ";
      echo "</script>";
    }
  }

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
            <h3>แก้ไขผู้ดูแลระบบ</h3>
          </div>
        </div>
      </div>
    </header>

    <!--edit admin-->
    <form action="" method="post" enctype="multipart/form-data">
      <div class="container mt-100 w-50">
        <diV class="p-3 bg-bluesky rounded-25">
          <div class="row px-3">
            <div class="col">
              <div class="p-5 bg-light align-items-center text-end shadow fs-5" style="border-radius: 2rem; ">
                <div class="row g-3 align-items-center">
                  <div class="col-5">
                    <label for="admin_name" class="col-form-label ">Name</label>
                  </div>
                  <div class="col-7">
                    <input type="text" class="w-100 rounded-pill p-2" placeholder="Enter Name" name="admin_name" value="<?php echo $row['admin_name']; ?>" required>
                  </div>
                  <br>
                  <div class="col-5">
                    <label for="admin_email" class="col-form-label ">E-Mail</label>
                  </div>
                  <div class="col-7">
                    <input type="text" class="w-100 rounded-pill p-2" placeholder="Enter E-Mail" name="admin_email" value="<?php echo $row['admin_email']; ?>" required>
                  </div>
                  <br>
                  <div class="col-5">
                    <label for="admin_password" class="col-form-label">Password</label>
                  </div>
                  <div class="col-7">
                    <input type="password" class="w-100 rounded-pill p-2" placeholder="Enter Password" name="admin_password" value="<?php echo $row['admin_password']; ?>" required>
                  </div>
                  <br>
                  <div class="col-5">
                    <label for="admin_confirm_password" class="col-form-label">Confirm Password</label>
                  </div>
                  <div class="col-7">
                    <input type="password" class="w-100 rounded-pill p-2" placeholder="Confirm Password" name="admin_confirm_password" value="<?php echo $row['admin_confirm_password']; ?>" required>
                  </div>
                  <br>
                  <div class="col-5">
                    <label for="admin_img" class="col-form-label">Profile</label>
                  </div>
                  <div class="col-7">
                    <input type="file" class="w-100 rounded-pill p-2" name="admin_img" id="admin_img">
                    <input type="hidden" class="w-100 rounded-pill p-2" name="oldimage" value="<?php echo $row['admin_img']; ?>">
                  </div>
                  <br>
                 
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-warning" onclick="window.history.back()">ย้อนกลับ</a>
                    <button class="btn btn-success" type="submit" >แก้ไขข้อมูล</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </diV>
      </div>
    </form>
  </body>

</html>
