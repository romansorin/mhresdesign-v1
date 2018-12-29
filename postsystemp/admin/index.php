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
        <?php require 'C:\Users\Roman\Documents\local\post-system\requires.php';?>
    </head>
    <body>
<?php 
if (isset($_SESSION['userID'])): ?>
    		<h1>You are logged in!</h1>
    		<h1>Welcome, <?=$_SESSION['username']?>.</h1>
			<form action="/post-system/admin/logout.inc.php" method="post">
				<button type="submit" name="logout">Log out</button>
			</form>

			<?php $uid = $_SESSION['userID'];
$user         = new User($uid);

if ($user->hasPermission('post_create')): ?>
		<h2>Create a new post</h2>
		<form action="/post-system/news/post.php?" method="post">
		<label for="title">Title:</label>
		<input type="text" name="title">
		<label for="category">Category:</label>
		<input type="text" name="category">
		<label for="content">Content:</label>
		<textarea name="content"></textarea>
		<input type="submit" name="createPostSubmit">
		</form>
	<?php endif;
if ($user->hasPermission('event_create')): ?>
	<br>
	<h2>Create a new event</h2>
	<form action="/post-system/news/event.php" method="post">
			<input type="text" name="category" placeholder="category">
			<input type="text" name="description" placeholder="description">
			<input type="text" name="link" placeholder="link">
			<input type="text" name="date" placeholder="date (yyyy-mm-dd)">
			<input type="submit" name="create" value="Create">
    	</form>
	<?php endif;
else: ?>
	<h1>Please log in to access the admin dashboard.</h1>
	<?php
endif;?>
    </body>
</html>