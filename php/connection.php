<?php
$conn = mysqli_connect("localhost", "root", "sirinda2000", "smart_jobs");
if (!$conn) {
  die("Failed to connect to database" . mysqli_error($conn));
}
