<?php
  session_start();
  require_once "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <title>Edit Profile</title>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="../styles/styles.css">

  </head>

  <body>
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
    </header>
    <br>
    <?php
      //$enterprise_id = mysqli_real_escape_string($conn,$_GET['enterprise_id']);
      $sql = "SELECT * FROM enterprises WHERE enterprise_id ='2' ";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result);
      extract($row);
    ?>
    <form action="edit_profile_enterprise_code.php" method="post">
      <div class="container">
        <div class="p-5 bg-white rounded-30 ">
          <div class="row">
            <div class="align-items-center p-2 ps-4 mb-4 gradient shadow bg-bluesky rounded-25" >
              <p class="fs-1 fw-bold align-items-center" role="button">Enterprise Profile Settings</p>
            </div>
            <div class="col-3">
              <br>
              <div class="text-center">
                <img src="../images/office-building.png" alt="pic" width="250" height="250" class="rounded-circle success" style="border: .5rem solid;border-color: rgba(84.00000259280205, 84.00000259280205, 197.0000034570694, 1);">
              </div>
              <br>
              <!--<div class="col text-center">
                <label for="upload-photo" class=" rounded-pill p-2 align-items-center w-75 text-center bg-blue-fade mt-4 shadow" style="cursor: pointer;">อัปโหลดโปรไฟล์บริษัท</label>
                <input type="file" class="form-control" name="photo" id="upload-photo" accept="image/png, image/jpeg" style="display: none;">
              </div>-->
            </div>
            <div class="col-9">
              <div class="row g-3">
                <div class="col-12">
                  <br>
                  <h3>ข้อมูลบริษัท</h3>
                </div>
                <div class="col-6">
                  <label class="form-label" for="enterprise_name_th">ชื่อบริษัทภาษาไทย</label>
                  <input type="text" class="form-control" placeholder="" value="<?php echo $row['enterprise_name_th']; ?>" >
                </div>
                <div class="col-6" for="enterprise_name_en">
                  <label class="form-label">ชื่อบริษัทภาษาอังกฤษ</label>
                  <input type="text" class="form-control" value="<?php echo $row['enterprise_name_en']; ?>" >
                </div>
                <div class="col-4">
                  <label class="form-label" for="enterprise_telephone_number">เบอร์โทรศัพท์บริษัท</label>
                  <input type="tel" class="form-control" value="<?php echo $row['enterprise_telephone_number']; ?>">
                </div>
                <div class="col-4">
                  <label class="form-label" for="enterprise_email">E-mail บริษัท</label>
                  <input type="email" class="form-control" value="<?php echo $row['enterprise_email']; ?>">
                </div>
                <div class="col-4">
                  <label class="form-label" for="enterprise_website">เว็บไซต์บริษัท</label>
                  <input type="text" class="form-control" value="<?php echo $row['enterprise_website']; ?>" >
                </div>
                <div class="col-12">
                  <label class="form-label" for="enterprise_address">ที่อยู่บริษัท</label>
                  <input type="text" class="form-control" value="<?php echo $row['enterprise_address']; ?>">
                </div>
                <div class="col-4">
                  <label class="form-label" for="enterprise_province">จังหวัด</label>
                  <input type="text" class="form-control" value="<?php echo $row['enterprise_province']; ?>">
                </div> 
                <div class="col-4">
                  <label class="form-label" for="enterprise_district">อำเภอ</label>
                  <input type="text" class="form-control" value="<?php echo $row['enterprise_district']; ?>">
                </div> 
                <div class="col-4">
                  <label class="form-label" for="enterprise_sub_district">ตำบล</label>
                  <input type="text" class="form-control" value="<?php echo $row['enterprise_sub_district']; ?>">
                </div>  
                <br>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <button class="btn btn-danger" type="reset" name="reset">รีเซ็ต</button>
                  <button class="btn btn-success" type="submit" name="submit">บันทึก</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </body>
</html>
