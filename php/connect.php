<?php
  $connect = mysqli_connect('localhost','root','12345678','smartjob');
  if(mysqli_connect_error($connect)){
    echo 'Failed to connect';
  }
?>

