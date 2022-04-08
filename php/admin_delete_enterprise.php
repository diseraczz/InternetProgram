<?php
  require_once('connection.php');

  if($_GET['enterprise_id'] && !empty($_GET['enterprise_id'])){
    $enterprise_id = $_GET['enterprise_id'];
    $sql = "DELETE FROM enterprises WHERE enterprise_id = '$enterprise_id' ";
    $result = mysqli_query($conn, $sql);


    if ($result) {
      $_SESSION['success'] = "Insert user successfully";
      echo "<script type='text/javascript'>";
      echo "alert('ลบข้อมูลบริษัทสำเร็จ');";
      echo "window.location = 'enterprise.php'; ";
      echo "</script>";
    }
    else{
      $_SESSION['error'] = "Something went wrong";
      echo "<script type='text/javascript'>";
      echo "alert('เกิดข้อผิดพลาด');";
      echo "window.location = 'enterprise.php'; ";
      echo "</script>";
    }
  }  
?>
