<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" description="">
        <meta name="viewport" description="width=device-width, initial-scale=1">
        <title>Events</title>
        <?php require 'C:\Users\Roman\Documents\local\post-system\requires.php';?>
    </head>
    <body>
    	<?php
$event = new Event();
?>
	<h1> Events </h1>
    	<form action="/post-system/news/event.php" method="post">
			<input type="text" name="category" placeholder="category">
			<input type="text" name="description" placeholder="description">
			<input type="text" name="link" placeholder="link">
			<input type="text" name="date" placeholder="date (yyyy-mm-dd)">
			<input type="submit" name="create" value="Create">
    	</form>
   	<a href="../index.php"><button role="link">Back</button></a>

    <div class="article">
		<div class="meta">
			<a href="/post-system/news/event.php?id=<?=$event->printColumn(0, 'id');?>"><h2 class="category">category: <?php $event->printColumn(0, 'category');?></h2></a>
			<h4 class="category">Category: <?php $event->printColumn(0, 'category');?></h4>
		</div>
		<div class="text">
			<p class="description">description: <?php $event->printColumn(0, 'description');?></p>
			<h4 class="date_created">Date created: <?php $event->printColumn(0, 'date_created');?></h4>
		</div>
	</div>

	<div class="article">
		<div class="meta">
			<a href="/post-system/news/event.php?id=<?=$event->printColumn(1, 'id');?>"><h2 class="category">category: <?php $event->printColumn(1, 'category');?></h2></a>
			<h4 class="category">Category: <?php $event->printColumn(1, 'category');?></h4>
		</div>
		<div class="text">
			<p class="description">description: <?php $event->printColumn(1, 'description');?></p>
			<h4 class="date_created">Date created: <?php $event->printColumn(1, 'date_created');?></h4>
		</div>
	</div>

	<div class="article">
		<div class="meta">
			<a href="/post-system/news/event.php?id=<?=$event->printColumn(2, 'id');?>"><h2 class="category">category: <?php $event->printColumn(2, 'category');?></h2></a>
			<h4 class="category">Category: <?php $event->printColumn(2, 'category');?></h4>
		</div>
		<div class="text">
			<p class="description">description: <?php $event->printColumn(2, 'description');?></p>
			<h4 class="date_created">Date created: <?php $event->printColumn(2, 'date_created');?></h4>
		</div>
	</div>

	<div class="article">
		<div class="meta">
			<a href="/post-system/news/event.php?id=<?=$event->printColumn(3, 'id');?>"><h2 class="category">category: <?php $event->printColumn(3, 'category');?></h2></a>
			<h4 class="category">Category: <?php $event->printColumn(3, 'category');?></h4>
		</div>
		<div class="text">
			<p class="description">description: <?php $event->printColumn(3, 'description');?></p>
			<h4 class="date_created">Date created: <?php $event->printColumn(3, 'date_created');?></h4>
		</div>
	</div>

	<div class="article">
		<div class="meta">
			<a href="/post-system/news/event.php?id=<?=$event->printColumn(4, 'id');?>"><h2 class="category">category: <?php $event->printColumn(4, 'category');?></h2></a>
			<h4 class="category">Category: <?php $event->printColumn(4, 'category');?></h4>
		</div>
		<div class="text">
			<p class="description">description: <?php $event->printColumn(4, 'description');?></p>
			<h4 class="date_created">Date created: <?php $event->printColumn(4, 'date_created');?></h4>
		</div>
	</div>

    </body>
</html>