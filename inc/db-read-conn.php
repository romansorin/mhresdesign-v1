<?php //file for mysql database query (read only) 
$servername = "localhost";
$username = "iread";
$password = "ylnodaer";
$dbname = "sorin"; //dbname may have to be passed as a parameter in the actual statement where the query is called
$conn = new mysqli($servername, $username, $password, $dbname);
?>