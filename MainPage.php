<?php

class MainPage {
	public $header_image;

	public static function fetchHeaderImage($pdo, $slide) {
		$query = "SELECT headerimg FROM mainpage_images WHERE id = '$slide'";

		$img = $pdo->prepare($query);
        $img->execute();

		return $img->fetchAll(PDO::FETCH_CLASS, 'MainPage');
	}


}