<?php

include '../inc/connection/connection.php';

// TODO: 
// external login page?

$conn    = new Connection();
$userPDO = $conn->connectToDb('users', 'reader', 'readonly');

if (isset($_POST['login-submit'])) {
    $mail_user = $_POST['mailuser'];
    $password  = $_POST['password'];

    if (empty($mail_user) || empty($password)) {
        header("Location: ../index.php?error=empty_fields");
        exit();
    } else if (!filter_var($mail_user, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $mail_user)) {
        header("Location: ../index.php?error=invalid_user_mail");
        exit();
    } else {
        $query = "SELECT * FROM users WHERE username='$mail_user' OR email='$mail_user'";
        $stmt  = $userPDO->query($query);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {

            $password_check = password_verify($password, $row['password']);

            if ($password_check === false) {
                header("Location: ../index.php?error=wrong_password");
                exit();
            } else if ($password_check === true) {
                session_start();
                $_SESSION['userID']   = $row['id'];
                $_SESSION['username'] = $row['username'];

                header("Location: ../index.php?login=success");
                exit();
            } else {
                header("Location: ../index.php?login=failure");
                exit();
            }
        } else {
            header("Location: ../index.php?error=no_records_found");
            exit();
        }
    }
}