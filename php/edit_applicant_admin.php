<?php 
  session_start();
  require_once ('connection.php');
  $id = $_GET['id'];
  $query = mysqli_query($conn, "SELECT * FROM enterprises WHERE enterprise_id='$id' ");
    $result = mysqli_fetch_array($query);
?>


<!DOCTYPE html>

<html lang="en">
<!-- action here -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- icon -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <link rel="shortcut icon" type="image/x-icon" href="../images/logo.png">

  <title>edit_enterprise</title>
  <!-- bootstrap 5.1.3 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>

  <!-- CSS here -->
  <link rel="stylesheet" href="../styles/styles_admin.css">
  <link rel="stylesheet" href="../styles/styles.css">
</head>
<script>
function searchjob() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("sawasdy");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>

<body>
  <!--Top menu -->
  <header class="section">
    <div class="top_navbar align-items-center header-bar">
      <div class="hamburger" id="bottonbar">
        <img src="../images/meIT2.png" alt="" width="150" height="auto" onclick="w3_open()">
      </div>
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-start">
          <div class="d-flex align-items-center me-md-auto"></div>
          <div class="context">
            <h1 class="text-dark fs-2">Enterprise Profile Settings</h1>
          </div>
        </div>
      </div>
      <div class="dropdown" style="margin-right: 2.5rem;">
        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1"
          data-bs-toggle="dropdown" aria-expanded="false">
          <img src="../images/man (2).png" alt="" width="40" height="auto" class="rounded-circle success"
            style="border: #000000 solid; ">
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownUser1" style="font-size: 1.35rem;">
          <li><a class="dropdown-item" href="#">Profile</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
      </div>
    </div>
    <div class="sidebar" id="mySidebar" style="display:none">
      <!--menu item-->
      <div class="btn-group-vertical">
        <ul>
          <button onclick="w3_close()" class="btn btn-danger">Close &times;</button>
          <li>
            <div class="d-grid gap-2 d-md-block">
            <a class="btn btn-primary" href="../php/admin.php" role="button">กลับหน้าแรก</a>
              <h6 class="dropdown-header">Users</h6>
              <a class="btn btn-primary" href="../php/enterprises.php" role="button">บริษัท</a>
              <a class="btn btn-primary" href="../php/applicant.php" role="button">คนหางาน</a>
            </div>
          </li>
          <li>
          </li>

        </ul>

        <!--<a>
          <button class="btn btn-success" type="submit" value="Submit"
            onclick="alert('Button was clicked!');">Success</button>
          <button class="btn btn-danger" type="reset" value="Reset">Reset</button>
        </a>-->
      </div>
    </div>
  </header>
  <!-- body web -->
  <form action="edit_profile_enterprise_code_admin.php?id=<?php echo $id ?>" method="post">
    <div class="container center">
      <div class="p-5 bg-white rounded-30 ">
        <div class="domino">
          <div class="col-3">
            <br>
            <div class="text-center">
              <img src="../images/office-building.png" alt="pic" width="250" height="250" class="rounded-circle success"
                style="border: .5rem solid;border-color: rgba(84.00000259280205, 84.00000259280205, 197.0000034570694, 1);">
            </div>
            <br>
          </div>
          <div class="col-9">
            <div class="domino g-3">
              <div class="col-12">
                <br>
                <h3>ข้อมูลบริษัท</h3>
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
