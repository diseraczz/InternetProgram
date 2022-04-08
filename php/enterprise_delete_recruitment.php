<?php
  require_once('connection.php');

  if($_GET['job_post_id'] && !empty($_GET['job_post_id'])){
    $job_post_id = $_GET['job_post_id'];
    $sql = "DELETE FROM job_posts WHERE job_post_id = '$job_post_id' ";
    $result = mysqli_query($conn, $sql);


    if ($result) {
      $_SESSION['success'] = "Insert user successfully";
      echo "<script type='text/javascript'>";
      echo "alert('ลบข้อมูลงานระบบสำเร็จ');";
      echo "window.location = 'dashboard_work.php'; ";
      echo "</script>";
    }
    else{
      $_SESSION['error'] = "Something went wrong";
      echo "<script type='text/javascript'>";
      echo "alert('เกิดข้อผิดพลาด');";
      echo "window.location = 'dashboard_work.php'; ";
      echo "</script>";
    }
  }  
?>
