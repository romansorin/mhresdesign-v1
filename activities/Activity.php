<?php

class Activity {
	public $information;

	function fetchActivityInformation($pdo, $activity) {
		$info = $pdo->prepare("SELECT information FROM activities WHERE activity= '" . $activity . "'");

		$info->execute();

		return $info->fetchAll(PDO::FETCH_CLASS, 'Activity');
	}
}