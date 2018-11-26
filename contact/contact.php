<!DOCTYPE html>
<html lang="en">

<head>
	<?php include '/srv/http/inc/includes.php'; ?>
	<?php include 'form_process.php'; ?>
	<?php include '/srv/http/inc/math_captcha.php' ?>
	<link rel="stylesheet" href="contact.css">
	<title>Contact Us | Mentor High School</title>
	<meta name="description" content="This is a description">
</head>

<body>
	<?php include '/srv/http/inc/header.php'; ?>
	<div class="container">
		<div class="contact-header"><h1>Contact</h1></div>
		<div class="row">
			<div class="col-sm-12" id="form-info">
				<p>Please fill out this form to submit feedback or contact the web administrators.</p>
				<br>
				<p>If you are looking for a specific section or webpage, view <a href="/directory" class="link">our A-Z index</a>. For general contact information, visit our <a class="link" href="/contact">Contact Mentor</a> page. All messages will be read and responded to within a timely manner. Thank you.</p>
				<br>
				<p>Required fields are marked with an asterisk (*).</p>
				<br>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<form id="contact" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
					<div class="form-group">
						<label class="form-label" for="name">Name *</label>
						<input type="text" class="form-control" id="name" name="name" value="<?= $name ?>" tabindex="1">
						<span class="error"><?= $name_error ?></span>
					</div>
					<div class="form-group">
						<label class="form-label" for="email">Email *</label>
						<input type="text" class="form-control" id="email" name="email" value="<?= $email ?>" tabindex="2">
						<span class="error"><?= $email_error ?></span>
					</div>
					<div class="form-group">
						<label class="form-label" for="subject">Subject</label>
						<input type="text" class="form-control" id="subject" name="subject" value="<?= $subject ?>" tabindex="3">
					</div>
					<div class="form-group">
						<label class="form-label" for="message">Message *</label>
						<textarea class="form-control" id="message" name="message" rows="4" cols="50" value="<?= $message ?>" tabindex="4"></textarea>
						<span class="error"><?= $message_error ?></span>
					</div>
					<div id="captcha">
						<h4>CAPTCHA</h4>
						<p>Please answer this simple math question to ensure that your submission was made by a human, and not automated.</p>
						<div class="form-group form-inline">
							<label class="form-label" for="answer">Math question: <?= $equation ?> *</label>
							<input type="hidden" name="intA" value="<?= $intA ?>">
							<input type="hidden" name="intB" value="<?= $intB ?>">
							<input type="text" class="form-control" id="answer" name="answer" value="<?= $answer ?>" tabindex="5">
							<span class="error" id="answer-error-inline"><?= $answer_error ?></span>
						</div>
						<p id="math-example">Enter the answer to the problem. E.g. for 2 + 5, enter 7.</p>
					</div>
					<button type="submit" class="btn contact-btn">Submit</button>
					<div id="success"><?= $success ?></div>
				</form>
			</div>
		</div>
	</div>
	<?php include '/srv/http/inc/footer.php'; ?>
</body>

</html>