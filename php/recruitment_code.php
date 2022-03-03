<?php
  session_start();
  require_once('connection.php');

  $job_post_position_id = $_POST['job_post_position_id'];
  $job_post_skill_id = $_POST['job_post_skill_id'];
  $job_post_employment_type_id = $_POST['job_post_employment_type_id'];
  $job_post_enterprise_id = $_POST['job_post_enterprise_id'];
  $job_post_open_rate = $_POST['job_post_open_rate'];
  $job_post_income = $_POST['job_post_income'];
  $job_post_details = $_POST['job_post_details'];
  $skills = implode(',',$job_post_skill_id);

  $sql = "INSERT INTO job_posts (job_post_position_id,job_post_skill_id,job_post_employment_type_id,job_post_enterprise_id,job_post_open_rate,job_post_income,job_post_details)
  VALUES('$job_post_position_id','$skills','$job_post_employment_type_id','2','$job_post_open_rate','$job_post_income','$job_post_details')";

  if (mysqli_query($conn, $sql)) {
    echo "<script type='text/javascript'>";
    echo "alert('success');";
    echo "window.location = 'dashboard_work.php'; ";
    echo "</script>";
  }
  else{
    echo "<script type='text/javascript'>";
    echo "alert('error');";
    echo "window.location = 'recruitment_page.php'; ";
    echo "</script>";
  }
?>
