<?php
    session_start();
    include('connect.php');

    $errors = array();

    if (isset($_POST['reg_user'])) {
        $email = $_POST['email'];
        $password_1 = $_POST['psw1'];
        $password_2 = $_POST['psw2'];
        $status = $_POST['conncet'];

       if ($password_1 != $password_2) {
            array_push($errors, "The password not match"); //มีปัญหาตรงที่ถ้าใส่ไม่ตรงกันจะไม่ insert ข้อมูลไปที่ db และไม่ยอมขึ้นแจ้งเตือน errors
            //echo "<script>alert('Password not match');</script>"; //ต้องการให้ขึ้นเตือนแบบนี้ แต่พอมันเตือนแล้วมันไม่เด้งกลับหน้าเดิม
            header('Location: ../register.html'); //ทำให้มันขึ้น errors ว่า password ไม่ตรงกันไม่ได้ เลยแก้ปัญหาด้วยการให้มันลูปหน้า register ไปก่อน จนกว่า password จะตรงกัน
        }

        $email_check = "SELECT * FROM register WHERE email = '$email' ";
        $query = mysqli_query($connect, $email_check);
        $reslt = mysqli_fetch_assoc($query);

        if ($reslt) {

            if ($reslt['email' === $email]) {
              array_push($errors, "Email has using!");
            }
        }

        if (count($errors) == 0) {
            $password = md5($password_1);

            $sql = "INSERT INTO register (email, password, status)
                    VALUES ('$email', '$password', 'm')"; //ตรง status ยังไม่สามารถให้มันกำหนดค่าตาม radio ที่เลือกได้ เลยแก้ปัญหาโดยการบังคับแล้วไปเปลี่ยนใน db
            mysqli_query($connect, $sql);

            $_SESSION['email'] = $email;
            $_SESSION['success'] = "You are login now";
        }
    }

    if ($password_1 == $password_2) {
        header('Location: ../login.html');
        exit;
    }
?>
