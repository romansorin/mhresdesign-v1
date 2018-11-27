<?php

class Connection {
	public static function connectToDb($nameofdb, $dbusername, $dbpassword) {
		try {

			return new PDO("mysql:host=127.0.0.1;dbname=$nameofdb", $dbusername, $dbpassword);

		} catch (PDOException $e) {

			die('Could not connect.' . $e->getMessage());

		}

	}
}
