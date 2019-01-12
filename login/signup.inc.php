<?php

include '../inc/connection/connection.php';
include '../inc/connection/configs.php';

$conn    = new Connection();
$userPDO = $conn->connectToDb($db_users, $user_users, $pass_users);

if (isset($_POST['signup-submit'])) {
    $first          = $_POST['firstName'];
    $last           = $_POST['lastName'];
    $username       = $_POST['user'];
    $email          = $_POST['email'];
    $password       = $_POST['password'];
    $passwordRepeat = $_POST['password-repeat'];

    if (empty($first) || empty($last) || empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: index.php?error=empty_fields");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: index.php?error=invalid_email");
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: index.php?error=invalid_username");
        exit();
    } else if ($password !== $passwordRepeat) {
        header("Location: index.php?error=invalid_confirm_password");
        exit();
    } else if (strlen($password) < 5) {
        header("Location: index.php?error=min_password_chars");
        exit();
    } else {
        $query      = "SELECT count(*) FROM users WHERE username='$username'";
        $usersCount = $userPDO->query($query)->fetchColumn();

        $query     = "SELECT count(*) FROM users WHERE email='$email'";
        $mailCount = $userPDO->query($query)->fetchColumn();

        if ($usersCount > 0) {
            header("Location: index.php?error=username_taken");
            exit();
        } else if ($mailCount > 0) {
            header("Location: index.php?error=email_taken");
            exit();
        } else {
            $hashedPassword    = password_hash($password, PASSWORD_DEFAULT);
            $registration_date = setDate();

            $query = "INSERT INTO users (firstName, lastName, username, email, password, reg_date) VALUES ('$first', '$last', '$username', '$email', '$hashedPassword', '$registration_date')";
            $stmt  = $userPDO->prepare($query);
            $stmt->execute();

            if ($stmt) {
                header("Location: index.php?signup=success");
                exit();
            } else {
                header("Location: index.php?signup=failure");
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