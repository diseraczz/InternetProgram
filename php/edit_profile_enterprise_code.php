<?php
session_start();
require_once "connection.php";

$enterprise_email = $_POST["enterprise_email"];
$enterprise_name_th = $_POST["enterprise_name_th"];
$enterprise_name_en = $_POST["enterprise_name_en"];
$enterprise_telephone_number = $_POST["enterprise_telephone_number"];
$enterprise_website = $_POST["enterprise_website"];
$enterprise_address = $_POST["enterprise_address"];
$enterprise_province = $_POST["enterprise_province"];
$enterprise_district = $_POST["enterprise_district"];
$enterprise_sub_district = $_POST["enterprise_sub_district"];

$sql = "UPDATE enterprises SET
		enterprise_email = '$enterprise_email' ,
		enterprise_name_th = '$enterprise_name_th' ,
		enterprise_name_en = '$enterprise_name_en' ,
		enterprise_telephone_number = '$enterprise_telephone_number',
    enterprise_website = '$enterprise_website',
    enterprise_address = '$enterprise_address',
    enterprise_province = '$enterprise_province',
    enterprise_district = '$enterprise_district'
    enterprise_sub_district = '$enterprise_sub_district' 
    WHERE enterprise_id = '2'";

$result = mysqli_query($conn, $sql);
mysqli_close($conn);


if ($result) {
  echo "<script type='text/javascript'>";
  echo "alert('Update Succesfuly');";
  echo "window.location = 'enterprise_profile.php'; ";
  echo "</script>";
} else {
  echo "<script type='text/javascript'>";
  echo "alert('Error back to Update again');";
  echo "window.location = 'edit_profile_enterprise.php'; ";
  echo "</script>";
}
?>
