<?php

include '../inc/connection/connection.php';
include '../inc/connection/configs.php';

$conn = new Connection();
$userPDO = $conn->connectToDb($db_users, $user_users, $pass_users);
// @TODO: Remember me cookie
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username'";
    $stmt = $userPDO->query($query);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {

        $password_check = password_verify($password, $row['password']);

        if ($password_check === false) {
            echo 'invalidCredentialsError';
        } else if ($password_check === true) {
            session_start();
            $_SESSION['userID'] = $row['id'];
            $_SESSION['username'] = $row['username'];

            header("Location: ../dashboard/index.php?login=success");
            exit();
        } else {
            header("Location: index.php?login=failure");
            exit();
        }
    } else {
        echo 'userNullError';
    }
}
