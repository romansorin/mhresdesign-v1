<?php //file for mysql database query (read and write) 
$servername = "localhost";
$username = "jason";
$password = "mhstnox";
$dbname = "sorin"; //dbname may have to be passed as a parameter in the actual statement where the query is called
$conn = new mysqli($servername, $username, $password, $dbname);
?>