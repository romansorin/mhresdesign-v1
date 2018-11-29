<?php

include '/srv/http/inc/math_captcha.php';
include '/srv/http/inc/connection.php';
include '/srv/http/inc/form_config.php';

$conn = new Connection();
$pdo  = $conn->connectToDb($db_dir, $user_dir, $pass_dir);

/* Initialize these variables as empty strings */
$firstname  = $lastname  = $email  = $fac_staff  = $dept  = $unit  = $subject  = $room  = $tel  = $fax  = $bio  = $success  = "";
$name_error = $email_error = $fs_error = $dept_error = $failure = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $room    = $_POST["room"];
    $unit    = $_POST["unit"];
    $subject = $_POST["subject"];
    $tel     = $_POST["tel"];
    $fax     = $_POST["fax"];
    $bio     = $_POST["bio"];

    /* These statements will check each field of the form for input and invalid characters */
    if (empty($_POST["firstname"])) {
        $name_error = "Name is required";
    } else {
        $firstname = test_input($_POST["firstname"]);
        // Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) {
            $name_error = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["lastname"])) {
        $name_error = "Name is required";
    } else {
        $lastname = test_input($_POST["lastname"]);
        // Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $lastname)) {
            $name_error = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $email_error = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // Check if e-mail address is the correct format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = "Invalid email format";
        }
    }

    if (empty($_POST["fac_staff"])) {
        $fs_error = "Input is required";
    } else {
        $fac_staff = test_input($_POST["fac_staff"]);
        // Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $fac_staff)) {
            $fs_error = "Only letters and white space allowed";
        }
        if (strlen($fac_staff) > 1) {
            $fs_error = "Only input a single character.";
        }
    }

    if (empty($_POST["dept"])) {
        $dept_error = "Department is required";
    } else {
        $dept = test_input($_POST["dept"]);
        // Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $dept)) {
            $dept_error = "Only letters and white space allowed";
        }
    }

    /* If no errors are present, set the content of the actual message */
    if ($name_error == "" and $email_error == "" and $fs_error == "" and $dept_error == "") {
        try {
            /* Insert form data into database */
            $query            = "INSERT INTO fac_staff (`first`, `last`, `department`, `room`, `unit`, `subject`, `email`, `type`,`telephone`, `fax`, `bio`, `img`, `id`) VALUES ('$firstname', '$lastname', '$dept', '$room', `$unit`, '$subject', '$email', '$fac_staff', '$tel', '$fax', '$bio', '', NULL)";
            $insert_statement = $pdo->prepare($query);
            $insert_statement->execute();

            $success = "Form submitted.";

            $firstname = $lastname = $email = $dept = $unit = $subject = $fac_staff = $room = $tel = $fax = $bio = ''; // Reset the fields of the form if submission is successful
        } catch (Exception $e) {
            $failure = 'Your form could not be submitted.';
        }

    }

}

/* Cleans up the data for security and parsing purposes */
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}{

}
