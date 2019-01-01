<?php
session_start();
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>


<?php if (!isset($_SESSION['userID'])): ?>

<form action="signup.inc.php" method="post">
				<input type="text" name="mail" placeholder="E-mail">
				<input type="text" name="user" placeholder="Username">
				<input type="password" name="password" placeholder="Password">
				<input type="password" name="password-repeat" placeholder="Repeat Password">
				<button type="submit" name="signup-submit">Sign-up</button>
			</form>

			<form action="login.inc.php" method="post">
				<input type="text" name="mailuser" placeholder="E-mail">
				<input type="password" name="password" placeholder="Password">
				<button type="submit" name="login-submit">Login</button>
			</form>
<?php else:
	header("Location: ../admin");
	exit();
endif; ?>

	
</body>
</html>