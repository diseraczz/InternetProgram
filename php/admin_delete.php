<?php
  require_once('connection.php');

  if($_GET['admin_id'] && !empty($_GET['admin_id'])){
    $admin_id = $_GET['admin_id'];
    $sql = "DELETE FROM admin WHERE admin_id = '$admin_id' ";
    $result = mysqli_query($conn, $sql);


    if ($result) {
      $_SESSION['success'] = "Insert user successfully";
      echo "<script type='text/javascript'>";
      echo "alert('ลบข้อมูลผู้ดูแลระบบสำเร็จ');";
      echo "window.location = 'admin_information.php'; ";
      echo "</script>";
    }
    else{
      $_SESSION['error'] = "Something went wrong";
      echo "<script type='text/javascript'>";
      echo "alert('เกิดข้อผิดพลาด');";
      echo "window.location = 'admin_information.php'; ";
      echo "</script>";
    }
  }  
?>
