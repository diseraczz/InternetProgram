<?php
  require_once('connection.php');

  if($_GET['applicant_id'] && !empty($_GET['applicant_id'])){
    $applicant_id = $_GET['applicant_id'];
    $sql = "DELETE FROM applicants WHERE applicant_id = '$applicant_id' ";
    $result = mysqli_query($conn, $sql);


    if ($result) {
      $_SESSION['success'] = "Insert user successfully";
      echo "<script type='text/javascript'>";
      echo "alert('ลบข้อมูลคนหางานสำเร็จ');";
      echo "window.location = 'applicant.php'; ";
      echo "</script>";
    }
    else{
      $_SESSION['error'] = "Something went wrong";
      echo "<script type='text/javascript'>";
      echo "alert('เกิดข้อผิดพลาด');";
      echo "window.location = 'applicant.php'; ";
      echo "</script>";
    }
  }  
?>
