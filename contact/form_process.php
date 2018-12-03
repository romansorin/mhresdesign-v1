<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

/* Require statement will halt execution if the file cannot be found or used */
require '/srv/http/inc/PHPMailer/src/Exception.php';
require '/srv/http/inc/PHPMailer/src/PHPMailer.php';
require '/srv/http/inc/PHPMailer/src/SMTP.php';
require '/srv/http/inc/PHPMailer/config.php';

require '/srv/http/inc/math_captcha.php';
require '/srv/http/inc/connection/connection.php';
require '/srv/http/inc/connection/configs.php';

$conn = new Connection();
$pdo  = $conn->connectToDb($db_logs, $user_logs, $pass_logs);

/* Initialize these variables as empty strings */
$name       = $email       = $subject       = $message       = $success       = "";
$name_error = $email_error = $message_error = $failure = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /* These statements will check each field of the form for input and invalid characters */
    if (empty($_POST["name"])) {
        $name_error = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        // Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
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

    if (empty($_POST["subject"])) {
        $subject = "Contact form submission"; /* When the user doesn't provide a subject, automatically name the subject */
    } else {
        $subject = $_POST["subject"]; /* Otherwise, keep the subject as initially defined */
    }

    if (empty($_POST["message"])) {
        $message_error = "Message is required";
    } else {
        $message = $_POST["message"];
    }


    /* If no errors are present, set the content of the message */
    if ($name_error == "" and $email_error == "" and $message_error == "" and $_SESSION["answer_error"] = null) {
        $message_body = '';
        unset($_POST['submit']);
        foreach ($_POST as $key => $value) {
            $message_body .= "$key: $value" . "<br><br>\n";
        }

        $mail = new PHPMailer(true); // Passing `true` enables exceptions
        try {
            // Server settings
            $mail->SMTPDebug = 0; // Enable verbose debug output
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host       = 'smtp.gmail.com'; // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true; // Enable SMTP authentication
            $mail->Username   = SMTP_USER; // SMTP username
            $mail->Password   = SMTP_PASS; // SMTP password
            $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 587; // TCP port to connect to

            // Recipients
            $mail->setFrom('mentorwebteam@gmail.com', 'MHS Mail Client');
            $mail->addAddress('mentorwebteam@gmail.com'); // Add a recipient

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = "Contact form submission: " . $subject;
            $mail->Body    = $message_body;
            $mail->AltBody = strip_tags($message_body); // Converts message body into plain text if HTML cannot be used

            $mail->send();

            $success = "Message sent.";

            /* Insert form data into database */
            $query            = "INSERT INTO contact_form (name, email, subject, message, submission_time, submission_date, id) VALUES ('$name', '$email', '$subject', '$message', CURRENT_TIME, CURRENT_DATE, NULL)";
            $insert_statement = $pdo->prepare($query);
            $insert_statement->execute();

            $name = $email = $subject = $message = ''; // Reset the fields of the form if submission is successful
        } catch (Exception $e) {
            $failure = 'Message could not be sent. Error: ' . $mail->ErrorInfo;
        }

    }

}

/* Cleans up the data */
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}