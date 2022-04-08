<?php 
  session_start();
  require_once ('connection.php');
  $query = mysqli_query($conn,"set char set utf8");
  $sql = "SELECT * FROM applicants INNER JOIN positions ON applicants.applicant_position_id = positions.position_id";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc()
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
            <h1 class="text-dark fs-2">Applicant Profile Settings</h1>
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
          <div class="col-8">

            <div class="col-12 mt-5 success rounded-25">
              <h4 class="fs-3 mt-2 text-white ps-3">ประวัติส่วนตัว</h4>
            </div>
            <div class="col-6 mt-3">
              <label class="form-label">ชื่อ</label>
              <input type="text" name="applicant_name" class="form-control"
                value="<?php echo $row['applicant_name']; ?>">
            </div>
            <div class="col-6 mt-3">
              <label class="form-label">นามสกุล</label>
              <input type="text" name="applicant_lastname" class="form-control"
                value="<?php echo $row['applicant_lastname']; ?>">
            </div>
            <div class="col-4 mt-3">
              <label class="form-label">วันเกิด</label>
              <input type="text" name="applicant_brithday" class="form-control"
                value="<?php echo $row['applicant_brithday']; ?>">
            </div>
            <div class="col-4 mt-3">
              <label class="form-label">เบอร์โทรศัพท์</label>
              <input type="tel" name="applicant_telephone_number" class="form-control"
                pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="000-000-0000"
                value="<?php echo $row['applicant_telephone_number']; ?>">
            </div>
            <div class="col-4 mt-3">
              <label class="form-label">E-mail</label>
              <input type="email" name="applicant_email" class="form-control"
                value="<?php echo $row['applicant_brithday']; ?>">
            </div>
            <div class="col-12 mt-3">
              <label class="form-label">ที่อยู่</label>
              <input type="text" name="applicant_addess" class="form-control"
                value="<?php echo $row['applicant_brithday']; ?>">
            </div>
            <div class="col-4 mt-3">
              <!--ไม่ได้ใส่ Nameให้พวกจังหวัด อำเภอ ตำบล วุติ ทักษะ-->
              <div class="col-12 mt-3">
                <label class="form-label">จังหวัด</label>
                <input type="text" name="applicant_addess" class="form-control"
                  value="<?php echo $row['applicant_brithday']; ?>">
              </div>
            </div>
            <div class="col-4 mt-3">
              <label class="form-label">อำเภอ</label>
              <select class="form-select">
                <option selected>เลือกอำเภอ</option>
                <option>-----------</option>
              </select>
            </div>
            <div class="col-4 mt-3">
              <label class="form-label">ตำบล</label>
              <select class="form-select">
                <option selected>เลือกตำบล</option>
                <option>-----------</option>
              </select>
            </div>
            <div class="col-12 mt-3 success rounded-25">
              <h4 class="fs-3 mt-2 text-white ps-3">การศึกษา</h4>
            </div>
            <div class="col-6 mt-3">
              <label class="form-label">มหาวิทยาลัย</label>
              <input type="text" name="applicant_edu_university" class="form-control" value="" required="">
            </div>
            <div class="col-3 mt-3">
              <label class="form-label">จังหวัด</label>
              <input type="text" class="form-control" value="" required="">
            </div>
            <div class="col-3 mt-3">
              <label class="form-label">วุฒิการศึกษา</label>
              <select class="form-select">
                <option selected>วุฒิการศึกษา</option>
                <option>ปริญญาตรี</option>
                <option>ปริญญาโท</option>
                <option>ปริญญาเอก</option>
              </select>
            </div>
            <div class="col-5 mt-3">
              <label class="form-label">คณะ</label>
              <input type="text" name="applicant_edu_faculty" class="form-control" value="" required="">
            </div>
            <div class="col-5 mt-3">
              <label class="form-label">สาขา</label>
              <input type="text" name="applicant_edu_major" class="form-control" value="" required="">
            </div>
            <div class="col-2 mt-3">
              <label class="form-label">GPAX</label>
              <input type="text" name="applicant_edu_gpax" class="form-control" value="" required="">
            </div>
            <div class="col-12 mt-3 success rounded-25">
              <h4 class="fs-3 mt-2 text-white ps-3">ทักษะ</h4>
            </div>
            <div class="col-4 mt-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox">
                <label class="form-check-label">
                  HTML
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox">
                <label class="form-check-label">
                  CSS
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox">
                <label class="form-check-label">
                  JavaScript
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox">
                <label class="form-check-label">
                  SQL
                </label>
              </div>
            </div>
            <div class="col-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox">
                <label class="form-check-label">
                  PHP
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox">
                <label class="form-check-label">
                  Python
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox">
                <label class="form-check-label">
                  Java
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox">
                <label class="form-check-label">
                  Back End
                </label>
              </div>
            </div>
            <div class="col-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox">
                <label class="form-check-label">
                  Web page Design
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox">
                <label class="form-check-label">
                  MS.Office
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox">
                <label class="form-check-label">
                  OS
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox">
                <label class="form-check-label">
                  Network
                </label>
              </div>
            </div>
          </div>
          <br>
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-danger" type="reset">รีเซ็ต</button>
            <button class="btn btn-success" type="submit">บันทึก</button>
          </div>

        </div>
      </div>
    </div>
    </div>
  </form>
</body>

</html>
