<!DOCTYPE html>
<html lang="en">

<head>
    <?php
require 'inc/includes.php';
include_once 'inc/connection/connection.php';
require 'inc/connection/configs.php';
require_once 'MainPage.php';
include 'C:\Users\Roman\Documents\sorin\news/calendar.php';
require_once 'news/post.php';
require_once 'inc/TwitterAPI/TwitterAPIExchange.php';
require_once 'inc/TwitterAPI/config.php';
?>
    <link rel="stylesheet" href="css/mainpage.css">
    <title>Mentor High School</title>
    <meta name="description" content="This is a description">
</head>

<body>

    <?php

$main     = new MainPage();
$newsPost = new Post();

$pdo = $conn->connectToDb($db_sections, $user_sections, $pass_sections);

?>

    <?php include 'inc/header.php';?>
      <div class="container-fluid no-padding">
        <div class="row no-padding">
            <div class="col-12 no-padding">
                <div id="frontpage-carousel" class="carousel slide" data-ride="carousel" data-interval="10000">
                    <!-- To change speed of slideshow, changing 'data-interval' value (parameter taken as milliseconds) -->
                    <ol class="carousel-indicators">
                        <li data-target="#frontpage-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#frontpage-carousel" data-slide-to="1"></li>
                        <li data-target="#frontpage-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <?php
$results_image = $main->fetchHeaderImage($pdo, 1);
foreach ($results_image as $header_image): ?>
                                <img class="d-block w-100" src="<?=$header_image->headerimg;?>" alt="First slide">
                            <?php endforeach;?>
                        </div>
                        <div class="carousel-item">
                         <?php
$results_image = $main->fetchHeaderImage($pdo, 2);
foreach ($results_image as $header_image): ?>
                            <img class="d-block w-100" src="<?=$header_image->headerimg;?>" alt="Second slide">
                        <?php endforeach;?>
                    </div>
                    <div class="carousel-item">
                        <?php
$results_image = $main->fetchHeaderImage($pdo, 3);
foreach ($results_image as $header_image): ?>
                            <img class="d-block w-100" src="<?=$header_image->headerimg;?>" alt="Third slide">
                        <?php endforeach;?>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#frontpage-carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#frontpage-carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- News section of the main page. -->
<div class="container-fluid no-padding news-container">
    <div class="container no-padding">
        <div class="row news-header">
            <div class="col-sm-12">
                <h2 id="news-header-label">Mentor News</h2>
                <p id="news-header-desc">See what's happening at Mentor</p>
            </div>
        </div>
        <div class="row">
            <!-- 'post-category' means guidance, athletic, certain clubs, etc. -->
                <div class="col-xl-4 no-padding">
                    <article>
                        <a href="news/post.php?id=<?=$newsPost->printColumn(0, 'id')?>">
                        <figure class="article-img">
                            <img class="img-fit" src="<?php $newsPost->printColumn(0, 'image');?>" alt="test">
                        </figure>
                        </a>
                        <div class="content">
                            <div class="post-meta">
                                <p class="post-category"><?php $newsPost->printColumn(0, 'category');?></p>
                            </div>
                            <a href="news/post.php?id=<?=$newsPost->printColumn(0, 'id')?>">
                                <h3><?php $newsPost->printColumn(0, 'title');?></h3>
                            </a>
                        </div>
                    </article>
                    </a>
                </div>
                <div class="col-xl-4 no-padding">
                    <article>
                        <a href="news/post.php?id=<?=$newsPost->printColumn(1, 'id')?>">
                        <figure class="article-img">
                            <img class="img-fit" src="<?php $newsPost->printColumn(1, 'image');?>" alt="test">
                        </figure>
                        </a>
                        <div class="content">
                            <div class="post-meta">
                                <p class="post-category"><?php $newsPost->printColumn(1, 'category');?></p>
                            </div>
                            <a href="news/post.php?id=<?=$newsPost->printColumn(1, 'id')?>">
                            <h3><?php $newsPost->printColumn(1, 'title');?></h3>
                            </a>
                        </div>
                    </article>
                </div>
                <div class="col-xl-4 no-padding">
                    <article>
                        <a href="news/post.php?id=<?=$newsPost->printColumn(2, 'id')?>">
                        <figure class="article-img">
                            <img class="img-fit" src="<?php $newsPost->printColumn(2, 'image');?>" alt="test">
                        </figure>
                        </a>
                        <div class="content">
                            <div class="post-meta">
                                <p class="post-category"><?php $newsPost->printColumn(2, 'category');?></p>
                            </div>
                            <a href="news/post.php?id=<?=$newsPost->printColumn(2, 'id')?>">
                            <h3><?php $newsPost->printColumn(2, 'title');?></h3>
                            </a>
                        </div>
                    </article>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-8 no-padding">
                    <article id="article-long">
                            <a href="news/post.php?id=<?=$newsPost->printColumn(3, 'id')?>">
                        <figure class="article-img">
                            <img class="img-fit" src="<?php $newsPost->printColumn(3, 'image');?>" alt="test">
                        </figure>
                    </a>
                        <div class="content">
                            <div class="post-meta">
                                <p class="post-category"><?php $newsPost->printColumn(3, 'category');?></p>
                            </div>
                            <a href="news/post.php?id=<?=$newsPost->printColumn(3, 'id')?>">

                            <h3><?php $newsPost->printColumn(3, 'title');?></h3>
                            </a>

                        </div>
                    </article>
                </div>
                <div class="col-xl-4 no-padding">
                    <article>
                            <a href="news/post.php?id=<?=$newsPost->printColumn(4, 'id')?>">

                        <figure class="article-img">
                            <img class="img-fit" src="<?php $newsPost->printColumn(4, 'image');?>" alt="test">
                        </figure>
                    </a>
                        <div class="content">
                            <div class="post-meta">
                                <p class="post-category"><?php $newsPost->printColumn(4, 'category');?></p>
                            </div>
                            <a href="news/post.php?id=<?=$newsPost->printColumn(4, 'id')?>">

                            <h3><?php $newsPost->printColumn(4, 'title');?></h3>
                        </a>
                        </div>
                    </article>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12" style="text-align: center;">
                    <a href="/news"><button type="button" class="btn btn-light" id="all-news-btn">View all news</button></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Calendar of the main page. -->
    <!-- This is the main container. -->
    <!-- This is the photo slideshow. -->

    <div class="container-fluid no-padding events-container">
        <div class="container no-padding">
            <div class="row events-header">
                <div class="col-sm-12">
    <?='debug';?>
                    <h2 id="events-header-label">Mentor Events</h2>
                    <p id="events-header-desc">Upcoming events and meetings</p>
                </div>
            </div>
            <div class="row">
                <?php

$calendar = new CalendarWidget;
$calendar->generate(4);

?>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-12" style="text-align: center;">
                <a href="/events"><button type="button" class="btn btn-light" id="all-events-btn">View all events</button></a>
            </div>
        </div>
    </div>
    <!-- Social media section of the main page -->
    <div class="container no-padding social-media-container">
        <div class="row social-header">
            <div class="col-sm-12">
                <h2 id="social-header-label">Connect with us</h2>
                <p id="social-header-desc">Stay updated with campus life</p>
            </div>
        </div>
<?php

$url           = "https://api.twitter.com/1.1/statuses/user_timeline.json";
$requestMethod = "GET";
$getfield      = array('?screen_name=PrincipalCrowe&count=1&exclude_replies=true&include_replies=false', '?screen_name=MentorAthletics&count=1&exclude_replies=true&include_replies=false', '?screen_name=mentorhigh&count=1&exclude_replies=true&include_replies=false');
$twitter       = new TwitterAPIExchange($settings);
$account0      = json_decode($twitter->setGetfield($getfield[0])
        ->buildOauth($url, $requestMethod)
        ->performRequest(), $assoc = TRUE);
$account1 = json_decode($twitter->setGetfield($getfield[1])
        ->buildOauth($url, $requestMethod)
        ->performRequest(), $assoc = TRUE);
$account2 = json_decode($twitter->setGetfield($getfield[2])
        ->buildOauth($url, $requestMethod)
        ->performRequest(), $assoc = TRUE);

date_default_timezone_set('America/New_York');

?>

        <div class="row social-media">
            <!-- Twitter left -->
<?php foreach ($account0 as $items) {
    if (array_key_exists("errors", $account0)) {
        echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>" . $string[errors][0]["message"] . "</em></p>";
        exit();
    }

    $dateInUTC = $items["created_at"];
    $time      = strtotime($dateInUTC . " UTC");
    $localTime = date("M d, Y " . "|" . " g:i a", $time);

    $html = <<<HTML
                        <div class="col-sm-4 twitter">
                            <a href="https://twitter.com/PrincipalCrowe">
                                <i class="fa fa-twitter"></i>
                                <h4 class="sm-title">@PrincipalCrowe</h4>
                            </a>
                            <p class="tweet-content">{$items["text"]}</a></p>
                            <h4 class="time-span">{$localTime}</h4>
                        </div>
HTML;
    echo $html;
}?>
            <!-- Twitter center -->
<?php foreach ($account1 as $items) {
    if (array_key_exists("errors", $account1)) {
        echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>" . $string[errors][0]["message"] . "</em></p>";
        exit();
    }

    $dateInUTC = $items["created_at"];
    $time      = strtotime($dateInUTC . " UTC");
    $localTime = date("M d, Y " . "|" . " g:i a", $time);

    $html = <<<HTML
                        <div class="col-sm-4 twitter">
                            <a href="https://twitter.com/MentorAthletics">
                                <i class="fa fa-twitter"></i>
                                <h4 class="sm-title">@MentorAthletics</h4>
                            </a>
                            <p class="tweet-content">{$items["text"]}</a></p>
                            <h4 class="time-span">{$localTime}</h4>
                        </div>
HTML;
    echo $html;
}?>
            <!-- Twitter right -->
<?php foreach ($account2 as $items) {
    if (array_key_exists("errors", $account2)) {
        echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>" . $string[errors][0]["message"] . "</em></p>";
        exit();
    }

    $dateInUTC = $items["created_at"];
    $time      = strtotime($dateInUTC . " UTC");
    $localTime = date("M d, Y " . "|" . " g:i a", $time);

    $html = <<<HTML
                        <div class="col-sm-4 twitter">
                            <a href="https://twitter.com/mentorhigh">
                                <i class="fa fa-twitter"></i>
                                <h4 class="sm-title">@mentorhigh</h4>
                            </a>
                            <p class="tweet-content">{$items["text"]}</p>
                            <h4 class="time-span">{$localTime}</h4>
                        </div>
HTML;
    echo $html;
}?>
        </div>
    </div>
    <?php include 'inc/footer.php';?>
</body>

</html>