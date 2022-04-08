<?php
  include('connection.php');

  if(isset($_POST['function']) && $_POST['function'] == 'province'){
    $id = $_POST['id'];
    $sql = "SELECT * FROM amphures WHERE province_id = '$id'";
    $query = mysqli_query($conn,$sql);
    echo '<option selected disabled>เลือกอำเภอ</option>';
    foreach($query as $value){
      echo '<option value="'.$value['id'].'">'.$value['name_th'].'</option>';
    }
    exit();
  }
  
  if(isset($_POST['function']) && $_POST['function'] == 'sub_district'){
    $id = $_POST['id'];
    $sql = "SELECT * FROM districts WHERE amphure_id = '$id'";
    $query = mysqli_query($conn,$sql);
    echo '<option selected disabled>เลือกตำบล</option>';
    foreach($query as $value){
      echo '<option value="'.$value['id'].'">'.$value['name_th'].'</option>';
    }
    exit();
  }
?>
