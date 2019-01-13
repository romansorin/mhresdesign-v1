
<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<?php include '../inc/includes.php';?>
	<link rel="stylesheet" href="/css/login.css">
</head>
<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-7 no-padding bg-img-col">
				<img src="https://images.pexels.com/photos/160107/pexels-photo-160107.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="code background" id="bg-img">
			</div>
			<div class="col-md-5">
				<div class="content" id="login">
					<div class="heading-wrapper">
						<h1>Welcome</h1>
						<h2>Welcome back! Please login to your account.</h2>
					</div>
					<div class="form-wrapper">
						<form action="#" method="post" id="signin-form">
							<div class="form-group">
								<input type="text" class="form-inputs" id="mailuser" name="mailuser" placeholder="Username">
							</div>
							<div class="form-group">
								<input type="password" class="form-inputs" name="password" placeholder="Password">
								
							</div>
							<div class="form-group">
								<p style="display: none" id="forgotPassword">Forgot Password</p>
							</div>

							<button class="btn btn-dark" type="submit" name="login-submit" id="login-submit-btn">Login</button>

							<button type="button" class="btn btn-outline-dark" id="signup-redirect-ref">Sign-up</button>


						</form>

					</div>
				</div>

				<div class="content" id="signup">
					<div class="heading-wrapper">
						<h1>Welcome</h1>
						<h2>Please complete to create your account.</h2>
					</div>
					<div class="form-wrapper" id="signup-form">
						<form action="#" method="post">
							<div class="form-row">
								<div class="form-group col-md-6" id="firstNameInput">
									<input type="text" class="form-inputs" name="firstName" placeholder="First name">
								</div>
								<div class="form-group col-md-6" id="lastNameInput">
									<input type="text" class="form-inputs" name="lastName" placeholder="Last name">
								</div>
							</div>
							<div class="form-group">
								<input type="text" class="form-inputs" name="user" placeholder="Username">
							</div>
							<div class="form-group">
								<input type="text" class="form-inputs" name="email" placeholder="Email">
							</div>
							<div class="form-group">
								<input type="password" class="form-inputs" name="password" placeholder="Password">
							</div>
							<div class="form-group">
								<input type="password" class="form-inputs" name="password-repeat" placeholder="Confirm Password">
							</div>
							<button class="btn btn-dark" type="submit" name="signup-submit" id="signup-submit-btn">Sign-up</button>
							<div class="form-group">
								<p class="signin-redirect-ref">Already have an account? Sign in.</p>
							</div>
						</form>
					</div>
				</div>

				<div class="content" id="forgot-password">
					<div class="heading-wrapper">
						<h1>Reset password</h1>
						<h2>Enter your email and we will send a password reset link.</h2>
					</div>
					<div class="form-wrapper">
						<span id="info">
							<form action="#" method="post" id="reset-pass-form">
								<div class="form-group">
									<input type="text" class="form-inputs" name="emaii" placeholder="Email">
								</div>
								<button class="btn btn-dark" type="submit" name="forgot-password-submit" id="password-reset-submit">Send request</button>
								<div class="form-group">
									<p class="signin-redirect-ref">Cancel</p>
								</div>
							</form>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

<script src="main.js"></script>
</body>
</html>