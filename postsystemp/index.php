<?php
session_start();
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>News</title>
	<?php require 'requires.php';?>
</head>

<body>
	<?php
$post = new Post();
?>
	<?php if (isset($_SESSION['userID'])): ?>
		<h2>You are logged in!</h2>
		<h2>Name, ID: <?php echo $_SESSION['username'] . ' ' . $_SESSION['userID']; ?></h2>
		<form action="/post-system/admin/logout.inc.php" method="post">
			<button type="submit" name="logout">Log out</button>
		</form>
		<?php else: ?>
			<form action="/post-system/signup.inc.php" method="post">
				<input type="text" name="mail" placeholder="E-mail">
				<input type="text" name="user" placeholder="Username">
				<input type="password" name="password" placeholder="Password">
				<input type="password" name="password-repeat" placeholder="Repeat Password">
				<button type="submit" name="signup-submit">Sign-up</button>
			</form>

			<form action="/post-system/admin/login.inc.php" method="post">
				<input type="text" name="mailuser" placeholder="E-mail">
				<input type="password" name="password" placeholder="Password">
				<button type="submit" name="login-submit">Login</button>
			</form>
			<h2>You are not logged in!</h2>
		<?php endif;?>
	<?php
if (isset($_SESSION['userID'])) {
    $uid  = $_SESSION['userID'];
    $user = new User($uid);

    if ($user->hasPermission('post_create')): ?>
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
}?>
<a href="news/index.php"><button type="link">Events</button></a>
	<div class="article">
		<div class="meta">
			<a href="/post-system/news/post.php?id=<?=$post->printColumn(0, 'id');?>"><h2 class="title">Title: <?php $post->printColumn(0, 'title');?></h2></a>
			<h4 class="category">Category: <?php $post->printColumn(0, 'category');?></h4>
		</div>
		<div class="text">
			<p class="content">Content: <?php $post->printColumn(0, 'content');?></p>
			<h4 class="date_created">Date created: <?php $post->printColumn(0, 'date_created');?></h4>
		</div>
	</div>

	<div class="article">
		<div class="meta">
			<a href="/post-system/news/post.php?id=<?=$post->printColumn(1, 'id');?>"><h2 class="title">Title: <?php $post->printColumn(1, 'title');?></h2></a>
			<h4 class="category">Category: <?php $post->printColumn(1, 'category');?></h4>
		</div>
		<div class="text">
			<p class="content">Content: <?php $post->printColumn(1, 'content');?></p>
			<h4 class="date_created">Date created: <?php $post->printColumn(1, 'date_created');?></h4>
		</div>
	</div>

	<div class="article">
		<div class="meta">
			<a href="/post-system/news/post.php?id=<?=$post->printColumn(2, 'id');?>"><h2 class="title">Title: <?php $post->printColumn(2, 'title');?></h2></a>
			<h4 class="category">Category: <?php $post->printColumn(2, 'category');?></h4>
		</div>
		<div class="text">
			<p class="content">Content: <?php $post->printColumn(2, 'content');?></p>
			<h4 class="date_created">Date created: <?php $post->printColumn(2, 'date_created');?></h4>
		</div>
	</div>

	<div class="article">
		<div class="meta">
			<a href="/post-system/news/post.php?id=<?=$post->printColumn(3, 'id');?>"><h2 class="title">Title: <?php $post->printColumn(3, 'title');?></h2></a>
			<h4 class="category">Category: <?php $post->printColumn(3, 'category');?></h4>
		</div>
		<div class="text">
			<p class="content">Content: <?php $post->printColumn(3, 'content');?></p>
			<h4 class="date_created">Date created: <?php $post->printColumn(3, 'date_created');?></h4>
		</div>
	</div>

	<div class="article">
		<div class="meta">
			<a href="/post-system/news/post.php?id=<?=$post->printColumn(4, 'id');?>"><h2 class="title">Title: <?php $post->printColumn(4, 'title');?></h2></a>
			<h4 class="category">Category: <?php $post->printColumn(4, 'category');?></h4>
		</div>
		<div class="text">
			<p class="content">Content: <?php $post->printColumn(4, 'content');?></p>
			<h4 class="date_created">Date created: <?php $post->printColumn(4, 'date_created');?></h4>
		</div>
	</div>
</body>
</html>