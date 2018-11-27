<?php

class Connection {

	/**
	 * [Function to connect to a database]
	 * @param  [String] $nameofdb   [Database]
	 * @param  [String] $dbusername [Username]
	 * @param  [String] $dbpassword [Password]
	 * @return [Object]             [PDO Object]
	 */
	public static function connectToDb($nameofdb, $dbusername, $dbpassword) {
		try {
			// PDO object for connecting to database
			return new PDO("mysql:host=127.0.0.1;dbname=$nameofdb", $dbusername, $dbpassword);
		} catch (PDOException $e) {
			die('Could not connect.' . $e->getMessage());
		}

	}
}