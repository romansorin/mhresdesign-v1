<?php

include '../inc/connection/connection.php';
include '../inc/connection/configs.php';

$conn    = new Connection();
$userPDO = $conn->connectToDb($db_users, $user_users, $pass_users);

$mail_user_error = $pass_error = "";

if (isset($_POST['login-submit'])) {
    $mail_user = $_POST['mailuser-input-login'];
    $password  = $_POST['password-input-login'];


    if (empty($mail_user) || empty($password)) {
        if (empty($mail_user)) {
            $mail_user_error = "This field is required.";
        }
        if (empty($password)) {
            $pass_error = "This field is required.";
        }

    } else if (!filter_var($mail_user, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $mail_user)) {
        $mail_user_error = "This field is required.";
    } else {
        $query = "SELECT * FROM users WHERE username='$mail_user' OR email='$mail_user'";
        $stmt  = $userPDO->query($query);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {

            $password_check = password_verify($password, $row['password']);

            if ($password_check === false) {
                
                $pass_error = "Invalid email / password combination.";
               
            } else if ($password_check === true) {
                session_start();
                $_SESSION['userID']   = $row['id'];
                $_SESSION['username'] = $row['username'];

                header("Location: ../dashboard/index.php?login=success");
                exit();
            } else {
                header("Location: index.php?login=failure");
                exit();
            }
        } else {
           
            $pass_error = "Invalid email / password combination.";
           
        }
    }
}