<!doctype html>
<html>
<head>
	<meta charset=utf-8>
	<meta name=description content="">
	<meta name=viewport content=width=device-width, initial-scale=1>
	<title>CalendarWidget</title>
</head>

<body>
	<div class="col-sm-12">
		<div class="row calendar">
			<div class="col-sm-2">
				<h3 class="date">
					<span class="month"><?=$date_month?></span>
					<br>
					<span class="day"><?=$date_day?></span>
				</h3>
			</div>
			<div class="col-sm-8">
			<?php foreach ($events as $event): ?>
				<div class="cal-meta">
					<div class="cal-category">
						<?=$event['category'];?>
					</div>
					<div class="cal-content">
						<?=$event['text'];?>
					</div>
				</div>
			</div>
			<?php if (!(is_null($event['id']))): ?>
				<br>
				<div class="col-sm-2 text-center no-padding">
					<a href="/events/event.php?id=<?=$event['id']?>" class="event-link">
						<button type="button" class="btn btn-light event-link-btn">View</button>
					</a>
				</div>
			<?php else: ?>
				<br>
				<div class="col-sm-2 text-center no-padding">
					<button type="button" class="btn event-link-btn-disabled" disabled>View</button>
				</div>
			<?php endif;
			endforeach;?>
		</div>
	</div>
</body>

</html>