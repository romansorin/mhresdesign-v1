<?php

include '../inc/connection/connection.php';
include '../inc/connection/configs.php';

$conn = new Connection();
$userPDO = $conn->connectToDb($db_users, $user_users, $pass_users);

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];

    if (empty($username) || empty($email) || empty($password) || empty($passwordConfirm)) {
        exit();
    }
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        echo "invalidUserCharsError";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email)) {
        echo "invalidEmailCharsError";
    } else if ($password !== $passwordConfirm && !empty($password) && !empty($passwordConfirm)) {
        echo "passConfirmError";
    } else if (strcasecmp($username, $password) == 0 && !empty($username) && !empty($password)) {
        echo "passMatchError";
    } else {
        $query = "SELECT count(*) FROM users WHERE username='$username'";
        $usersCount = $userPDO->query($query)->fetchColumn();

        $query = "SELECT count(*) FROM users WHERE email='$email'";
        $mailCount = $userPDO->query($query)->fetchColumn();

        if ($usersCount > 0) {
            echo "userExistsError";
        } else if ($mailCount > 0) {
            echo "emailExistsError";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $registration_date = setDate();

            // add 'default' permissions to user?
            $query = "INSERT INTO users (username, email, password, reg_date) VALUES ('$username', '$email', '$hashedPassword', '$registration_date')";
            $stmt = $userPDO->prepare($query);
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

function setDate()
{
    date_default_timezone_set('America/New_York');
    $date = new DateTime();
    return $date->format('Y-m-d H:i:s');
}