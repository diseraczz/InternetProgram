<?php
  require_once('connection.php');
  if(isset($_POST['submit'])){
    $enterprise_name_th          = $_POST['enterprise_name_th'];
    $enterprise_name_en          = $_POST['enterprise_name_en'];
    $enterprise_email            = $_POST['enterprise_email'];
    $enterprise_password         = $_POST['enterprise_password'];
    $enterprise_confirm_password = $_POST['enterprise_confirm_password'];

    if($_POST['enterprise_password'] !== $_POST['enterprise_confirm_password']){
      echo "<script>alert('password not match');</script>";
    }
    else{
      $email_check = "SELECT * FROM enterprises WHERE enterprise_email = '$enterprise_email' LIMIT 1 ";
      $result = mysqli_query($conn, $email_check);
      $enterprises = mysqli_fetch_assoc($result);

      if($enterprises['enterprise_email'] === $enterprise_email){
        echo "<script>alert('Email already exists');</script>";
      }
      else{
        $passwordenc = md5($enterprise_password);
        $confirm_passwordenc = md5($enterprise_confirm_password);
        $query = "INSERT INTO enterprises (enterprise_name_th,enterprise_name_en,enterprise_email,enterprise_password,enterprise_confirm_password) 
                  VALUES ('$enterprise_name_th','$enterprise_name_en','$enterprise_email','$passwordenc','$confirm_passwordenc')";
        $result = mysqli_query($conn, $query);

        if ($result) {
          $_SESSION['success'] = "Insert user successfully";
          echo "<script type='text/javascript'>";
          echo "alert('Update Succesfuly');";
          echo "window.location = 'index.php'; ";
          echo "</script>";
        }
        else{
        $_SESSION['error'] = "Something went wrong";
        echo "<script type='text/javascript'>";
        echo "alert('Error back to Update again');";
        echo "window.location = 'register_enterprises.php'; ";
        echo "</script>";
        }
      }
    } 
      
  }
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Register</title>
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

  <body >

    <header class="p-2 border-buttom header-bar">
      <div class="container-header">
          <div class="d-flex flex-wrap align-items-center justify-content-start">
              <a href="main.html" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto ms-4">
                  <img src="../images/meIT2.png" alt="" width="170" height="auto" >
              </a>
          </div>
      </div>
    </header>

    <form action="register_enterprises.php" method="post">
      <div class="container mt-100 w-50">
        <diV class="p-3 bg-bluesky rounded-25">
          <div class="row px-3">
            <div class="col-12 text-center rounded-pill shadow mb-3 bg-blue-fade">
              <p class="fs-1"><strong>Register</strong></p>
            </div>
            <div class="col">
              <div class="p-5 bg-light align-items-center text-end shadow fs-5" style="border-radius: 2rem; ">
                <div class="row g-3 align-items-center">
                  <div class="col-5">
                    <label for="enterprise_name_th" class="col-form-label ">ชื่อบริษัท (ภาษาไทย)</label>
                  </div>
                  <div class="col-7">
                    <input type="text" class="w-100 rounded-pill p-2" placeholder="Enter Name" name="enterprise_name_th" required>
                  </div>
                  <br>
                  <div class="col-5">
                    <label for="enterprise_name_en" class="col-form-label ">ชื่อบริษัท (ภาษาอังกฤษ)</label>
                  </div>
                  <div class="col-7">
                    <input type="text" class="w-100 rounded-pill p-2" placeholder="Enter Last Name" name="enterprise_name_en" required>
                  </div>
                  <br>
                  <div class="col-5">
                    <label for="enterprise_email" class="col-form-label ">E-Mail</label>
                  </div>
                  <div class="col-7">
                    <input type="text" class="w-100 rounded-pill p-2" placeholder="Enter E-Mail" name="enterprise_email" required>
                  </div>
                  <br>
                  <div class="col-5">
                    <label for="enterprise_password" class="col-form-label">Password</label>
                  </div>
                  <div class="col-7">
                    <input type="password" class="w-100 rounded-pill p-2" placeholder="Enter Password" name="enterprise_password" required>
                  </div>
                  <br>
                  <div class="col-5">
                    <label for="enterprise_confirm_password" class="col-form-label">Confirm Password</label>
                  </div>
                  <div class="col-7">
                    <input type="password" class="w-100 rounded-pill p-2" placeholder="Confirm Password" name="enterprise_confirm_password" required>
                  </div>
                  <br>
                 
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-danger" type="reset">ยกเลิก</button>
                    <button class="btn btn-success" type="submit" name="submit">ลงทะเบียน</button>
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
