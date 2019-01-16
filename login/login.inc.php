<?php

include '../inc/connection/connection.php';
include '../inc/connection/configs.php';

$conn    = new Connection();
$userPDO = $conn->connectToDb($db_users, $user_users, $pass_users);

$mail_user_error = $pass_error = "";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

        if (empty($username)) { // this is empty,
            echo 'userEmpty';
        } else if (empty($password)) { // this is empty
            echo 'passEmpty';
        } else {
            $query = "SELECT * FROM users WHERE username='$username'";
            $stmt  = $userPDO->query($query);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {

                $password_check = password_verify($password, $row['password']);

                if ($password_check === false) {
// this is for if the password is false
                   // echo "<span class='input-error inline-error'>Invalid email / password combination.</span>";
                    echo 'passWrong';
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
// this is if the username does not exist
               // echo "<span class='input-error inline-error'>Invalid email / password combination.</span>";
                //echo "<span class='input-error inline-error'>User does not exist.</span>";
                echo 'userNull';
            }
        }
}
