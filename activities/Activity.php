<?php

class Activity {
	public $information;
	public $title;
	public $content;

	// 'titles' are considered the article titles below information paragraph
	public $title2;

	// 'content' for each article
	public $content1;
	public $content2;

	public static function fetchActivityInformation($pdo, $activity) {
		$query = "SELECT information FROM activities WHERE activity = '" . $activity . "'";
		$info = $pdo->prepare($query);

		$info->execute();

		return $info->fetchAll(PDO::FETCH_CLASS, 'Activity');
	}

	public static function fetchArticleTitle($pdo, $activity, $articleNumber) {
		$query = "SELECT title FROM activities WHERE activity = '$activity' AND articlenum = $articleNumber ";
		echo $query;

		$title = $pdo->prepare($query);

		$title->execute();

		return $title->fetchAll(PDO::FETCH_CLASS, 'Activity');
	}
	/*
	public static function fetchArticleContent($pdo, $activity, $articleNumber) {
		$content = $pdo->prepare("SELECT content FROM activities WHERE activity = '" . $activity "' and article_number = '" . $articleNumber . "'");

		$content->execute();

		return $content->fetchAll(PDO::FETCH_CLASS, 'Activity');
	}
	*/
}