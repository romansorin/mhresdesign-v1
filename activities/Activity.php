<?php

class Activity {
	public $information, $title, $content, $link, $article_image, $header_image;

	/**
	 * [Get an activity's information from the database]
	 * @param  [Object] $pdo      [PDO object]
	 * @param  [String] $activity [Specifies the desired activity]
	 * @return [String]           [Returns activity information to the caller of the method]
	 */
	
	public static function fetchActivityInformation($pdo, $activity) {
		$query = "SELECT information FROM activities WHERE activity = '" . $activity . "'";

		$info = $pdo->prepare($query);
		$info->execute();

		return $info->fetchAll(PDO::FETCH_CLASS, 'Activity');
	}

	public static function fetchHeaderImage($pdo, $activity) {
		$query = "SELECT headerimg FROM activity_images WHERE activity = '" . $activity . "'";

		$img = $pdo->prepare($query);
		$img->execute();
		
		return $img->fetchAll(PDO::FETCH_CLASS, 'Activity');
	}
	
	/**
	 * [Get the title of an article]
	 * @param  [Object] $pdo           [PDO object]
	 * @param  [String] $activity      [Specifies the desired activity]
	 * @param  [Int] 	$articleNumber [Specifies the particular article]
	 * @return [String]                [Returns the article title to the caller of the method]
	 */
	
	public static function fetchArticleTitle($pdo, $activity, $articleNumber) {
		$query = "SELECT title FROM activities WHERE activity = '" . $activity . "' AND articlenum = '$articleNumber'";

		$name = $pdo->prepare($query);
		$name->execute();

		return $name->fetchAll(PDO::FETCH_CLASS, 'Activity');
	}

	/**
	 * [Get the content of an article]
	 * @param  [Object] $pdo           [PDO object]
	 * @param  [String] $activity      [Specifies the desired activity]
	 * @param  [Int] 	$articleNumber [Specifies the particular article]
	 * @return [String]                [Returns the article content to the caller of the method]
	 */
	
	public static function fetchArticleContent($pdo, $activity, $articleNumber) {
		$query = "SELECT content FROM activities WHERE activity = '" . $activity . "' AND articlenum = '$articleNumber'";

		$text = $pdo->prepare($query);
		$text->execute();

		return $text->fetchAll(PDO::FETCH_CLASS, 'Activity');
	}

	/**
	 * [Get the link of an article]
	 * @param  [Object] $pdo           [PDO Object]
	 * @param  [String] $activity      [Specifies the desired activity]
	 * @param  [Int] 	$articleNumber [Specifies the particular article]
	 * @return [String]                [Returns the article link to the caller of the method]
	 */
	
	public static function fetchArticleLink($pdo, $activity, $articleNumber) {
		$query = "SELECT link FROM activities WHERE activity = '" . $activity . "' AND articlenum = '$articleNumber'";

		$ref = $pdo->prepare($query);
		$ref->execute();

		return $ref->fetchAll(PDO::FETCH_CLASS, 'Activity');
	}

	/**
	 * [Get the image link of an article. Useful for embedding photos/videos in <img> or <iframe> tags]
	 * @param  [Object] $pdo           [PDO Object]
	 * @param  [String] $activity      [Specifies the desired activity]
	 * @param  [Int] 	$articleNumber [Specifies the particular article]
	 * @return [String]                [Returns the image/video link to the caller of the method]
	 */
	
	public static function fetchArticleImage($pdo, $activity, $articleNumber) {
		$query = "SELECT articleimg FROM activity_images WHERE activity = '" . $activity . "' AND articlenum = '$articleNumber'";

		$img = $pdo->prepare($query);
		$img->execute();

		return $img->fetchAll(PDO::FETCH_CLASS, 'Activity');
	}
}