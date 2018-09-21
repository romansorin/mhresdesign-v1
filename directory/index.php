<?php include '../inc/header.php'; ?>
<head>
	<title>Directory & Index | Mentor High School</title>
	<style>
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
</style>
<?php
$servername = "localhost";
$username = "iread";
$password = "ylnodaer";
$dbname = "sorin";
// connection for reading news from database
$conn = new mysqli($servername, $username, $password, $dbname);
?>

	<h1>contact us</h1>


<?php include '../inc/footer.php'; ?>