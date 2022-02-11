<?php
    session_start();
    include('connect.php');

    $errors = array();

    if (isset($_POST['log_user'])) {
      $email = $_POST['email'];
      $password = $_POST['psw'];


      $query = "SELCT * FROM register WHERE email = '$email' AND password = '$password'";
      
      $result = mysqli_query($connect, $query);

      if (mysqli_num_rows($result) == 1) {

          $row = mysqli_fetch_array($result);

          $_SESSION['emailid'] = $row['id'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['status'] = $row['status'];

          if ($_SESSION['status'] == 'n') {
              header("Location: ../profile.html");
              exit;
          }

          if ($_SESSION['status'] == 'm') {
              header("Location: ../user-profile.html");
              exit;
        }
      } //else {
      //       echo "<script>alert('Email or Password is wrong!');</scsript>";
      //       header("Location: ../login.html");
      //       exit;
      // }
    }
    header("Location: ../main.html");
    exit;
?>
