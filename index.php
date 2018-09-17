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
		// background-color: #;
	}
	html {
		height: 100%;	
	}
	.mainPhotos {
	}
</style>
<?php
$servername = "localhost";
$username = "iread";
$password = "ylnodaer";
$dbname = "sorin";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>
<div class = "mainPhotos">
	<img src="#" alt="photos here">
</div>
<section class = "news">
	<div class = "container-fluid">
		<div class = "newsHeader">
			<div class = "col-sm-12">
				<h3 style="border: 2px solid #7A7878; padding: 15px; color: #000000;">News</h3>
			</div>
		</div>
	</div>
	<div class= "container-fluid">
		<div class = "row-top-index">
			<div class = "col-sm-4">
				<h3 style="color: #000000; border-bottom: 0px">Athletics</h3>
				<?php
				$sql = "SELECT id, title, content FROM mainpage WHERE id = '4'";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
   				// output data of each row
    				while($row = $result->fetch_assoc()) {
        			echo "id: " . $row["id"]. " - title: " . $row["title"]. " " . $row["content"]. "<br>";
    				}
				} else {
    				echo "0 results";
				}
					$conn->close();
				?>
			</div>
			<div class = "col-sm-4">
				<h3 style="color: #000000; border-bottom: 0px">Guidance</h3>
				<?php
				$sql = "SELECT id, title, content FROM mainpage WHERE id = '3'";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
   				// output data of each row
    				while($row = $result->fetch_assoc()) {
        			echo "id: " . $row["id"]. " - title: " . $row["title"]. " " . $row["content"]. "<br>";
    				}
				} else {
    				echo "0 results";
				}
					$conn->close();
				?>
			</div>
			<div class = "col-sm-4">
				<h3 style="color: #000000; border-bottom: 0px">Clubs</h3>
				<?php
				$sql = "SELECT id, title, content FROM mainpage WHERE id = '2'";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
   				// output data of each row
    				while($row = $result->fetch_assoc()) {
        			echo "id: " . $row["id"]. " - title: " . $row["title"]. " " . $row["content"]. "<br>";
    				}
				} else {
    				echo "0 results";
				}
					$conn->close();
				?>
			</div>
		</div>
		<div class = "row-bottom-index">
			<div class = "col-sm-12">
				<h3 style="color: #000000; border-bottom: 0px">Announcements</h3>
				<?php
				$sql = "SELECT id, title, content FROM mainpage WHERE id = '1'";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
   				// output data of each row
    				while($row = $result->fetch_assoc()) {
        			echo "id: " . $row["id"]. " - title: " . $row["title"]. " " . $row["content"]. "<br>";
    				}
				} else {
    				echo "0 results";
				}
					$conn->close();
				?>
				<h1> CONTENT TO SIMULATE EXPANSION </h1>
				<h1> CONTENT TO SIMULATE EXPANSION </h1>
				<h1> CONTENT TO SIMULATE EXPANSION </h1>
				<h1> CONTENT TO SIMULATE EXPANSION </h1>
				<h1> CONTENT TO SIMULATE EXPANSION </h1>
				<h1> CONTENT TO SIMULATE EXPANSION </h1>
				<h1> CONTENT TO SIMULATE EXPANSION </h1>
			</div>
		</div>
	</div>
</section>
<?php include 'inc/footer.php'; ?> 