<?php
  session_start();
  include('connection.php');
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

  <head>
    <meta charset="utf-8"> 
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>LOG IN</title>
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
  
  <body>
    <header class="p-2 border-buttom header-bar" style="position: sticky; top: 0; box-shadow: 7px 7px 7px rgba(0, 0, 0, 0.356); height: 65px;">
      <div class="container-header">
        <div class="d-flex flex-wrap align-items-center justify-content-start">
          <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto">
            <img src="../images/meIT2.png" alt="" width="170" height="auto" style="margin-left: 1.05rem ;">
          </a>
        </div>
      </div>
    </header>
    
    <form action="login_enterprises.php" method="post">
      <div class="container p-4 bg-white mt-100 rounded-30" style="width: 600px;">

        <div class="success text-center mb-3 rounded-25 p-2 shadow-sj">
          <img src="../images/meIT2.png" alt="" width="auto" height="130">
        </div>

        <div class="container ">
          <label for="enterprise_email" class="fs-4"><b>E-mail</b></label>
          <input class="rounded-25" type="text" placeholder="Enter Email" name="enterprise_email" required autofocus>

          <label for="enterprise_password" class="fs-4"><b>Password</b></label>
          <input class="rounded-25" type="password" placeholder="Enter Password" name="enterprise_password" required>

          <button class="btn btn-lg btn-primary rounded-pill mt-3 w-100 shadow-sj" type="submit" name="submit">LOG IN</button>

          <div class="text-end d-flex mt-4" style="font-size: 1.rem;">
            <label class="pr-5 font-weight-light">Don't have an account?</label>
            <a href="register_enterprises.php" class=" px-3" style="color: #bd0058">ลงทะเบียน</a>
          </div>
        </div>

      </div> 
    </form> 
    <?php
      if(isset($_POST['submit'])){
        include('connection.php');
        $enterprise_email    = $_POST['enterprise_email'];
        $enterprise_password = $_POST['enterprise_password'];
        $passwordenc    = md5($enterprise_password);
    
        $sql = "SELECT * FROM enterprises WHERE enterprise_email = '$enterprise_email' AND enterprise_password = '$passwordenc'";
        $query = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($query);

        if(is_array($row)){
          $_SESSION["enterprise_email"] = $row['enterprise_email'];
          $_SESSION["enterprise_password"] = $row['enterprise_password'];
          $_SESSION["enterprise_name_th"] = $row['enterprise_name_th'];
          $_SESSION["enterprise_profile_pic"] = $row['enterprise_profile_pic'];
          $_SESSION["enterprise_id"] = $row['enterprise_id'];
          

        }else{
          echo "<script type='text/javascript'>";
          echo "alert('อีเมลหรือรหัสผ่าน ไม่ถูกต้อง');";
          echo "window.location = 'login_enterprises.php'; ";
          echo "</script>";
        }
      }
      if(isset($_SESSION['enterprise_email'])){
        header("Location:dashboard_work.php");
      }
      
    ?>
  
  </body>

</html>

