<?php
/* Simple math captcha to stop basic spam */

$answer_error = "";
$answer       = "";

$intA = random_int(0, 9);
$intB = random_int(0, 9);

$equation = $intA . ' + ' . $intB; /* This is used solely for display purposes */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $expected_answer = $_POST["intA"] . $_POST["intB"]; /* Store the correct answer to the math problem in $_POST variables */

    if (isset($_POST["answer"])) {
        if ($_POST["answer"] == $expected_answer) {
            $answer_error = "";
        } elseif (empty($_POST["answer"])) {
            $answer_error = "Answer is required";
        } else {
            $answer_error = "The answer you entered was incorrect.";
        }
    }
}

?>