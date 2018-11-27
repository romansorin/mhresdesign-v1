<?php

class Activity {
	public $information;
	public $title;
	public $content;

	public static function fetchActivityInformation($pdo, $activity) {
		$query = "SELECT information FROM activities WHERE activity = '" . $activity . "'";
		$info = $pdo->prepare($query);

		$info->execute();

		return $info->fetchAll(PDO::FETCH_CLASS, 'Activity');
	}
	
	public static function fetchArticleTitle($pdo, $activity, $articleNumber) {
		$query = "SELECT title FROM activities WHERE activity = '" . $activity . "' AND articlenum = '$articleNumber'";
		$name = $pdo->prepare($query);

		$name->execute();

		return $name->fetchAll(PDO::FETCH_CLASS, 'Activity');
	}

	public static function fetchArticleContent($pdo, $activity, $articleNumber) {
		$query = "SELECT content FROM activities WHERE activity = '" . $activity . "' AND articlenum = '$articleNumber'";
		$text = $pdo->prepare($query);

		$text->execute();

		return $text->fetchAll(PDO::FETCH_CLASS, 'Activity');
	}
}