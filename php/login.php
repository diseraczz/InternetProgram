<?php
  session_start();

  if(isset($_POST['email'])){
    include('connection.php');
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordenc = md5($password);

    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$passwordenc' ";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) == 1){
      $row = mysqli_fetch_array($result);

      $_SESSION['email'] = $row['email'];
      $_SESSION['role'] = $row['role'];

      if($_SESSION['role'] == 'user'){
        header('Location: main.php');
      }
      if($_SESSION['role'] == 'employer'){
        header('Location: dashboard_work.php');
      }
      if($_SESSION['role'] == 'admin'){
        header('Location: admin.php');
      }
    }else{
      echo "<script>alert('email and password ไม่ถูกต้อง');window.location='signin.php';</script>";
    }
  }else{
    header("Location:signin.php");
  }

?>
