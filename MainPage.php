<?php

class MainPage {
	public $header_img;

	public static function fetchHeaderImage($pdo, $slide) {
		$query = "SELECT headerimg FROM images WHERE slide = '$slide'";

		$img = $pdo->prepare($query);
		$img = execute();

		return $img->fetchAll(PDO::FETCH_CLASS, 'MainPage');
	}


}