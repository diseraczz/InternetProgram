<?php
$conn = mysqli_connect("localhost", "root", "0930911845", "IP");
if (!$conn) {
  die("Failed to connect to database" . mysqli_error($conn));
}
