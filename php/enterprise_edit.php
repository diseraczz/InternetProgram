<?php 
  session_start();
  require_once ('connection.php');
  $id = $_GET['enterprise_id'];
  $query = mysqli_query($conn, "SELECT * FROM enterprises WHERE enterprise_id='$id' ");
    $result = mysqli_fetch_array($query);
    $sql1 = mysqli_query($conn, "SELECT * FROM enterprises INNER JOIN provinces ON enterprises.enterprise_province = provinces.id WHERE enterprise_id = $id");
    $result1 = mysqli_fetch_array($sql1);
    $sql2 = mysqli_query($conn, "SELECT * FROM enterprises INNER JOIN amphures ON enterprises.enterprise_district = amphures.id WHERE enterprise_id = $id");
    $result2 = mysqli_fetch_array($sql2);
    $sql3 = mysqli_query($conn, "SELECT * FROM enterprises INNER JOIN districts ON enterprises.enterprise_sub_district = districts.id WHERE enterprise_id = $id");
    $result3 = mysqli_fetch_array($sql3);
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>

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
          <img src="../images/meIT2.png" alt="" width="170" height="auto">
        </a>
        <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto" style="color: white;">
          <h3>แก้ไขบริษัท</h3>
        </div>
      </div>
    </div>
  </header>

  <!--edit admin-->
  <form action="edit_profile_enterprise_code_admin.php?id=<?php echo $id ?>" method="post">
    <div class="container center">
      <div class="p-5 bg-white rounded-30 ">
        <div class="col-12">
          <br>
          <div class="row text-black">
            <div class="align-items-center p-2 ps-4 mb-4 gradient shadow bg-bluesky rounded-25">
              <t class="fs-1 fw-bold align-items-center" role="button">ข้อมูลบริษัท</t>
            </div>
            <div class="col-6">
              <label class="form-label" for="enterprise_name_th">ชื่อบริษัทภาษาไทย</label>
              <input name="enterprise_name_th" type="text" class="form-control" placeholder=""
                value="<?php echo $result['enterprise_name_th']; ?>">
            </div>
            <div class="col-6" for="enterprise_name_en">
              <label class="form-label">ชื่อบริษัทภาษาอังกฤษ</label>
              <input name="enterprise_name_en" type="text" class="form-control"
                value="<?php echo $result['enterprise_name_en']; ?>">
            </div>
            <div class="col-4">
              <label class="form-label" for="enterprise_telephone_number">เบอร์โทรศัพท์บริษัท</label>
              <input name="enterprise_telephone_number" type="tel" class="form-control"
                value="<?php echo $result['enterprise_telephone_number']; ?>">
            </div>
            <div class="col-4">
              <label class="form-label" for="enterprise_email">E-mail บริษัท</label>
              <input name="enterprise_email" type="email" class="form-control"
                value="<?php echo $result['enterprise_email']; ?>">
            </div>
            <div class="col-4">
              <label class="form-label" for="enterprise_website">เว็บไซต์บริษัท</label>
              <input name="enterprise_website" type="text" class="form-control"
                value="<?php echo $result['enterprise_website']; ?>">
            </div>
            <div class="col-12">
              <label class="form-label" for="enterprise_address">ที่อยู่บริษัท</label>
              <input name="enterprise_address" type="text" class="form-control"
                value="<?php echo $result['enterprise_address']; ?>">
            </div>
            <div class="col-4">
              <label class="form-label" for="enterprise_province">จังหวัด</label>
              <input name="enterprise_province" type="text" class="form-control"
                value="<?php echo $result['enterprise_province']; ?>">
            </div>
            <div class="col-4">
              <label class="form-label" for="enterprise_district">อำเภอ</label>
              <input name="enterprise_district" type="text" class="form-control"
                value="<?php echo $result['enterprise_district']; ?>">
            </div>
            <div class="col-4">
              <label class="form-label" for="enterprise_sub_district">ตำบล</label>
              <input name="enterprise_sub_district" type="text" class="form-control"
                value="<?php echo $result['enterprise_sub_district']; ?>">
            </div>
            <br>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <a class="btn btn-warning" onclick="window.history.back()">ย้อนกลับ</a>
              <button class="btn btn-cancelg rounded-pill px-4 text-white" type="submit" name="submit">ลบ</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </form>
</body>
</body>

</html>
