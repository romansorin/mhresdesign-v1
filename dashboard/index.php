<?php
session_start();
?>

<!doctype html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Dashboard</title>
        <?php include '../users/user.php';include '../inc/connection/connection.php';?>
</head>

<body>
<?php
if (!isset($_SESSION['userID'])):
    header("Location: ../login");
    exit();
else: ?>
    	<h1>You are logged in!</h1>
    	<h1>Welcome, <?=$_SESSION['username']?>.</h1>
		<form action="../login/logout.inc.php" method="post">
			<button type="submit" name="logout">Log out</button>
		</form>

<?php
$uid  = $_SESSION['userID'];
$user = new User($uid);

if ($user->hasPermission('post_create')): ?>
		<h2>Create a new post</h2>
		<form action="../news/post.php?" method="post">
		<label for="title">Title:</label>
		<input type="text" name="title">
		<label for="category">Category:</label>
		<input type="text" name="category">
		<label for="content">Content:</label>
		<textarea name="content"></textarea>
		<input type="submit" name="createPostSubmit">
		</form>
<?php 
endif;
if ($user->hasPermission('event_create')): ?>
	<br>
	<h2>Create a new event</h2>
	<form action="../events/event.php" method="post">
			<input type="text" name="category" placeholder="category">
			<input type="text" name="description" placeholder="description">
			<input type="text" name="date" placeholder="date (yyyy-mm-dd)"> <!-- replace this and make it easier for a user to select a date -->
			<input type="submit" name="create" value="Create">
    </form>
<?php 
endif;
endif;?>
</body>

</html>