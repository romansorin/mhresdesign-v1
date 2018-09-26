<!DOCTYPE html>

<html lang="en">
<head>
<?php include 'inc/includes.php'; ?>
<?php include 'inc/connection.php' ?>
	<title>Home | Mentor High School</title>
</head>
<style>
.newsHeader {
	margin-top: 20px;
	text-align: center;
}
.row-top-index {
	text-align: center;
	border-top: 1px solid #7A7878;
}
.row-bottom-index {
	text-align: center;
	border-bottom: 50px transparent;
}
body {
	font-family: 'Noto Serif JP', sans-serif;
	height: 100%;
	display: inline-block;
	min-height: 100%;
	min-width: 100%;
	margin: 0px;
	padding: 0px;
}
html {
	height: 100%;	
}
.btn-news {
	margin-bottom: 20px;
	border-radius: 0 !important;
	border: 2px solid #444D56;
	text-transform: uppercase;
	letter-spacing: 2px;
	font-weight: bold;
	width: 200px;
	font-family: 'Open Sans', sans-serif;
	padding: 5px;
	font-size: 18px;
}
.btn-news:focus {
	outline-color: #570000 !important;
}
.btn-twitterl, .btn-twitterr {
	border-radius: 0 !important;
	border: 2px solid #444D56;
	text-transform: uppercase;
	letter-spacing: 2px;
	font-weight: bold;
	font-family: 'Open Sans', sans-serif;
	font-size: 14px;
	margin-bottom: 5px;
}
.headers {
	color: #000000; 
	border-bottom: 0px; 
	text-align: center;
	text-transform: uppercase;
	font-family: 'Open Sans', sans-serif;
	letter-spacing: 1px;
}
.twitter-feeds {
	margin-top: 50px;
}
.calendar {
	background-color: #f2f2f2 !important;
	border-top: 1px solid #444D56;
	border-bottom: 1px solid #444D56;
	padding-bottom: 30px;
	padding-top: 25px;
	margin-top: 50px;
}
</style>
<?php
$servername = "localhost";
$username = "iread";
$password = "ylnodaer";
$dbname = "sorin";
// connection for reading news from database
$conn = new mysqli($servername, $username, $password, $dbname);
?>
<div class = "mainPhotos">
	<img class="img-responsive" src="#" alt="photos here">
</div>
<section class = "news">
	<div class = "container-fluid">
		<div class = "newsHeader">
			<div class="row">
				<div class = "col-sm-12">
					<button type="button" class="btn btn-default btn-md btn-news">News</button>
				</div>
			</div>	
		</div>
	</div>
	<div class= "container-fluid">
		<div class="row">
			<div class = "row-top-index">
				<div class = "col-sm-4">
					<h3 class="headers">Athletics</h3>
					<?php
					$sql = "SELECT content FROM mainpage WHERE title = 'athletics'";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							echo $row["content"]. "<br>";
						}
					} else {
						echo "0 results from selected table";
					}
					?>
				</div>
				<div class = "col-sm-4">
					<h3 class="headers" style="padding-right: 40px;">Guidance</h3>
					<?php
					$sql = "SELECT content FROM mainpage WHERE title = 'guidance'";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							echo $row["content"]. "<br>";
						}
					} else {
						echo "0 results from selected table";
					}
					?>
				</div>
				<div class = "col-sm-4">
					<h3 class="headers">Clubs</h3>
					<?php
					$sql = "SELECT content FROM mainpage WHERE title = 'clubs'";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							echo $row["content"]. "<br>";
						}
					} else {
						echo "0 results from selected table";
					}
					?>
				</div>
			</div>
			<div class = "row-bottom-index">
				<div class = "col-sm-12">
					<h3 class="headers" style="padding-right: 40px;">Announcements</h3>
					<?php
					$sql = "SELECT content FROM mainpage WHERE title = 'announcements'";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							echo $row["content"]. "<br>";
						}
					} else {
						echo "0 results from selected table";
					}
					$conn->close();
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<section class = "calendar">
	<div class = "container-fluid">
		<div class = "calendar-widget">
			<?php include 'inc/calendar.php'; ?>
			<?php
			$calendar = new CalendarWidget;
			$calendar->generate(6);
			?>
		</div>
	</div>
</section>
<div class = "container">
	<div class = "twitter-feeds">
		<div class = "col-sm-6">
			<a href="https://www.twitter.com/PrincipalCrowe" class="btn btn-default btn-twitterl">Mr. Crowe</a>
			<a class="twitter-timeline" data-chrome="nofooter, noheader" data-lang="en" data-theme="light" data-link-color="#711717" data-height="800" data-width="500" href="https://twitter.com/PrincipalCrowe?ref_src=twsrc%5Etfw"></a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
		</div>
		<div class = "col-sm-6">
			<a href="https://www.twitter.com/MentorHigh" class="btn btn-default btn-twitterr">Mentor High</a>
			<a class="twitter-timeline" data-chrome="nofooter, noheader" data-lang="en" data-theme="light" data-link-color="#711717" data-height="800" data-width="500" href="https://twitter.com/MentorHigh?ref_src=twsrc%5Etfw"></a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
		</div>
	</div>
</div>
<?php include 'inc/footer.php'; ?> 