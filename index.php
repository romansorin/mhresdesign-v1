<?php include 'inc/header.php'; ?>
<style>
.newsHeader {
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
}
.news {
	/* background-color: #; */
}
html {
	height: 100%;	
}
.btn-default {
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
</style>
<?php
$servername = "localhost";
$username = "iread";
$password = "ylnodaer";
$dbname = "sorin";

$conn = new mysqli($servername, $username, $password, $dbname);
?>
<div class = "mainPhotos">
	<img class="img-responsive" src="" alt="photos here">
</div>
<section class = "news">
	<div class = "container-fluid">
		<div class = "newsHeader">
			<div class="row">
				<div class = "col-sm-12">
					<button type="button" class="btn btn-default btn-md">News</button>
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
<div class = container-fluid>
	<div class = "calendar-widget">
	</div>
</div>
<div class = "container">
	<div class = "twitter-feeds">
		<div class = "col-sm-6">
			<a class="twitter-timeline" data-chrome="nofooter, noheader" data-lang="en" data-theme="light" data-link-color="#711717" data-height="800" data-width="500" href="https://twitter.com/PrincipalCrowe?ref_src=twsrc%5Etfw">Tweets by @PrincipalCrowe</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
		</div>
		<div class = "col-sm-6">
			<a class="twitter-timeline" data-chrome="nofooter, noheader" data-lang="en" data-theme="light" data-link-color="#711717" data-height="800" data-width="500" href="https://twitter.com/MentorHigh?ref_src=twsrc%5Etfw">Tweets by @MentorHigh</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
		</div>
	</div>
</div>
<?php include 'inc/footer.php'; ?> 