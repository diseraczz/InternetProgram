<!DOCTYPE html>
<html class="no-js" lang="zxx">

  <head>
    <meta charset="utf-8"> 
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>LOG IN</title>
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


    <style>
      input[type=text], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
      }
    </style>
  </head>

  <body style="background-color: #86b7fe;">
    <header class="p-2 border-buttom header-bar" style="position: sticky; top: 0; box-shadow: 7px 7px 7px rgba(0, 0, 0, 0.356); height: 65px;">
      <div class="container-header">
        <div class="d-flex flex-wrap align-items-center justify-content-start">
          <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto">
            <img src="../images/meIT2.png" alt="" width="170" height="auto" style="margin-left: 1.05rem ;">
          </a>
        </div>
      </div>
    </header>    

    <div class="container p-4 bg-white mt-100 rounded-30 shadow-sj" style="width: 600px; ">

      <div class="success text-center mb-3 rounded-25 p-2 shadow-sj">
        <img src="../images/meIT2.png" alt="" width="auto" height="130">
      </div>
      <br>
      <div class="container ">
        <div class="row" style="text-align: center;">
          <div class="col-4" >
            <label class="fs-4"><b>ผู้สมัคร</b></label>
            <a class="btn btn-lg btn-primary rounded-pill mt-3 w-100 shadow-sj" href="login_applicants.php" role="button">LOG IN</a>
          </div>
          <div class="col-4">
            <label class="fs-4"><b>บริษัท</b></label>
            <a class="btn btn-lg btn-primary rounded-pill mt-3 w-100 shadow-sj" href="login_enterprises.php" role="button">LOG IN</a>
          </div><div class="col-4">
            <label class="fs-4"><b>เจ้าของระบบ</b></label>
            <a class="btn btn-lg btn-primary rounded-pill mt-3 w-100 shadow-sj" href="login_admin.php" role="button">LOG IN</a>
          </div>
        </div> 
        <br>
        <div class="text-end d-flex mt-3" style="font-size: 1.rem;">
          <label class="pr-5 font-weight-light">Don't have an account?</ส></label>  
          <a class=" px-3" type="button" style="color: #bd0058" data-bs-toggle="modal" data-bs-target="#exampleModal">ลงทะเบียน</a>
        </div>
      </div>

    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h2>เลือกสถานะ</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <br>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-3"></div>
                <div class="col-3">
                  <h3>ผู้สมัครงาน</h3>
                  <a href="register_applicants.php" role="button" class="btn btn-success">register applicants</a>
                </div>
                <div class="col-3">
                  <h3>บริษัท</h3>
                  <a href="register_enterprises.php" role="button" class="btn btn-danger">register enterprises</a>
                </div>
                <div class="col-3"></div>
              </div>
            </div>
          </div>
          <br>
        </div>
      </div>
    </div>
  </body>
</html>
