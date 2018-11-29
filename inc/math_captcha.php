<?php
/* Simple math captcha to stop basic spam */

<link rel="stylesheet" href="/css/math_captcha.css" type="text/css">

class MathCaptcha{
    $answer_error = "";
    $answer       = "";

    $intA = random_int(0, 9);
    $intB = random_int(0, 9);

    $equation = $intA . ' + ' . $intB; /* This is used solely for display purposes */

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $expected_answer = $_POST['intA'] + $_POST['intB']; /* Store the correct answer to the math problem in $_POST variables */

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

    function generateCaptcha() {
        ?>
        <div id="captcha">
            <h4>CAPTCHA</h4>
            <p>Please answer this simple math question to ensure that your submission was made by a human, and not automated.</p>
            <div class="form-group form-inline">
                <label class="form-label" for="answer">Math question: <?=$equation?> *</label>
                <input type="hidden" name="intA" value="<?=$intA?>">
                <input type="hidden" name="intB" value="<?=$intB?>">
                <input type="text" class="form-control" id="answer" name="answer" value="<?=$answer?>" tabindex="5">
                <span class="error" id="answer-error-inline"><?=$answer_error?></span>
            </div>
            <p id="math-example">Enter the answer to the problem. E.g. for 2 + 5, enter 7.</p>
        </div>
        <?php
}
}