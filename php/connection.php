<?php
$conn = mysqli_connect("localhost", "root", "12345678", "smart_jobs");
if (!$conn) {
  die("Failed to connect to database" . mysqli_error($conn));
}

