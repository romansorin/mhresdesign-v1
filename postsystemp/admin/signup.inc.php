<?php

require_once 'C:\Users\Roman\Documents\local\post-system\requires.php';

$conn    = new Connection();
$userPDO = $conn->connectToDb('users', 'reader', 'readonly');

if (isset($_POST['signup-submit'])) {
    $username       = $_POST['user'];
    $emil           = $_POST['mail'];
    $pasword        = $_POST['password'];
    $passwordRepeat = $_POST['password-repeat'];

    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: ../index.php?error=empty_fields");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../index.php?error=invalid_usermail");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../index.php?error=invalid_email");
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../index.php?error=invalid_username");
        exit();
    } else if ($password !== $passwordRepeat) {
        header("Location: ../index.php?error=password_confirm");
        exit();
    } else {
        $query      = "SELECT count(*) FROM users WHERE username='$username'";
        $usersCount = $userPDO->query($query)->fetchColumn();

        $query     = "SELECT count(*) FROM users WHERE email='$email'";
        $mailCount = $userPDO->query($query)->fetchColumn();

        if ($usersCount > 0) {
            header("Location: ../index.php?error=username_taken");
            exit();
        } else if ($mailCount > 0) {
            header("Location: ../index.php?error=email_taken");
            exit();
        } else {
            $hashedPassword    = password_hash($password, PASSWORD_DEFAULT);
            $registration_date = setDate();

            $query = "INSERT INTO users (username, email, password, reg_date) VALUES ('$username', '$email', '$hashedPassword', '$registration_date')";
            $stmt  = $userPDO->prepare($query);
            $stmt->execute();

            if ($stmt) {
                header("Location: ../index.php?signup=success");
                exit();
            } else {
                header("Location: ../index.php?signup=failure");
                exit();
            }
        }
    }
}

function setDate() {
    date_default_timezone_set('America/New_York');
    $date = new DateTime();
    return $date->format('Y-m-d H:i:s');
}