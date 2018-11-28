<?php
/* Require statement will halt execution if the file cannot be found or used */
require '/srv/http/inc/math_captcha.php'; 
include '/srv/http/inc/connection.php';

$conn = new Connection();
$pdo = $conn->connectToDb('logs_submissions', 'writer', 'readandwrite');

/* Initialize these variables as empty strings */
$name = $email = $subject = $message = $success = "";
$name_error = $email_error = $message_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	/* These statements will check each field of the form for input and invalid characters */
	if (empty($_POST["name"])) {
		$name_error = "Name is required";
	} else {
		$name = test_input($_POST["name"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
			$name_error = "Only letters and white space allowed";
		}
	}

	if (empty($_POST["email"])) {
		$email_error = "Email is required";
	} else {
		$email = test_input($_POST["email"]);
		// check if e-mail address is the correct format
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
	}

	/* If no errors are present, set the content of the actual message */
	if ($name_error == "" and $email_error == "" and $message_error == "" and $answer_error == "") {
		$message_body = '';
		unset($_POST['submit']);
		foreach ($_POST as $key => $value) {
			$message_body .= "$key: $value\n";
		}

		$to = "rmaximsorin@gmail.com"; /* Recipient of the e-mails */

		$query = "INSERT INTO contact_form (name, email, subject, message, submission_time, submission_date) VALUES ('roman', $email, $subject, $message, CURRENT_TIME, CURRENT_DATE)";
		$insert_statement = $pdo->prepare($query);
		$insert_statement->execute();
		echo 'form submit to db';

		/* If the parameters are valid, send the message */
		/*if (mail($to, $subject, $message)) {
			$success = "Message sent.";

			
			/* in the future, send to another page instead */
			$name = $email = $subject = $message = ''; /* Reset the values of the form */
		/*}*/
	}
}

/* Cleans up the data for security and parsing purposes */
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>