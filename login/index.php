<?php
session_start();
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="checkbox.css">

	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<title>Login</title>
	<?php include '../inc/includes.php';?>
	<?php include 'login.inc.php';?>
	<link rel="stylesheet" href="../css/login.css">
	<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

</head>
<body>
	<?php
if (isset($_SESSION['userID'])):
    header("Location: ../dashboard");
    exit();
else:
?>
		<div class="container-fluid">
			<div class="full-background login row">
				<div class="col-md-6 no-padding d-none d-lg-block login-bg">
					<!-- TODO: Some kind of button or link for hiding the particles if requested -->
					<!--<button class="btn btn-light" id="hide-particles-btn">Hide</button>-->
					<div id="particles-js"></div>
				</div>
				<div class="col-lg-6 col-md-12 no-padding form-content">
					<div id="login" class="content">
						<form action="login.inc.php" method="post" id="login-form">
							<div class="login-header"><h2>Login</h2></div>
							<div class="form-group">
								<input type="text" class="form-input" name="mailuser-input-login" id="mailuser-input-login" placeholder="Username" autocomplete="off">
							</div>
							<div class="form-group">
								<!-- class="input-error -->
								<input type="password"  class="form-input" name="password-input-login" id="password-input-login" placeholder="Password" autocomplete="off">
								<span id="view-pass"><i class="far fa-eye-slash"></i></span>
							</div>
							<div class="form-row">
								<div class="col">
									<div id="form-login-remember" class="form-group">
										<label>
											<input type="checkbox"  />
											<span id="remember-me-checkbox">Remember me</span>
										</label>
									</div>
								</div>
								<div class="col">
									<a id="forgot-password-anchor" href="#forgot-password"><span>Forgot Password</span></a>
								</div>
							</div>

							<button type="submit" class="btn btn-dark" name="login-submit" id="login-btn">Login</button>
							<a href="#signup"><span>Create an account</span></a>
							<p id="form-message"></p>
						</form>
					</div>
					<div id="signup" class="content">
						<form action="signup.inc.php" method="post" id="signup-form">
							<div class="login-header"><h2>Sign Up</h2></div>
							<div class="form-group">
								<input type="text" class="form-input" name="user-input-signup" id="user-input-signup" placeholder="Username" autocomplete="off">
							</div>
							<div class="form-group">
								<input type="email" class="form-input" name="email-input-signup" id="email-input-signup" placeholder="Email" autocomplete="off">
							</div>
							<div class="form-group">
								<input type="password" class="form-input" name="password-input-signup" id="password-input-signup" placeholder="Password" autocomplete="off">
							</div>
							<div class="form-group">
								<input type="password" class="form-input" name="password-confirm-input-signup" id="password-confirm-input-signup" placeholder="Confirm Password" autocomplete="off">
							</div>
							<button type="submit" class="btn btn-dark" name="signup-submit" id="signup-btn">Sign Up</button>
							<a href="#login"><span>Already have an account?</span></a>
						</form>
					</div>
					<div id="forgot-password" class="content">
						<form action="pass-reset.inc.php" method="post" id="forgot-password-form">
							<div class="login-header"><h2>Forgot Password</h2></div>
							<div class="form-group">
								<input type="email" class="form-input" name="mail-input-forgot" id="mail-input-forgot" placeholder="Email" autocomplete="off">
							</div>
							<button type="submit" class="btn btn-dark" name="forgot-password-submit" id="forgotpass-btn">Send request</button>

						</form>
					</div>
				</div>
			</div>
		</div>
		<script src="main.js"></script>
		<script src="app.js"></script>
    <script src="ajax.js"></script>
	<?php endif;?>
</body>
</html>