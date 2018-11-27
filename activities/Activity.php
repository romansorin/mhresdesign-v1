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
	public static function fetchArticleTitle($pdo, $activity) {
		$query = "SELECT content FROM activities WHERE activity = '" . $activity . "'";
		$t = $pdo->prepare($query);

		$t->execute();

		return $t->fetchAll(PDO::FETCH_CLASS, 'Activity');
	}
	/*
	public static function fetchArticleContent($pdo, $activity, $articleNumber) {
		$content = $pdo->prepare("SELECT content FROM activities WHERE activity = '" . $activity "' and article_number = '" . $articleNumber . "'");

		$content->execute();

		return $content->fetchAll(PDO::FETCH_CLASS, 'Activity');
	}
	*/
}