<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'inc/includes.php';
include 'inc/connection/connection.php';
require 'inc/connection/configs.php';
require 'MainPage.php';
require 'inc/calendar.php';
require_once 'inc/TwitterAPI/TwitterAPIExchange.php';
require_once 'inc/TwitterAPI/config.php';
?>
    <link rel="stylesheet" href="css/mainpage.css">
    <title>Mentor High School</title>
    <meta name="description" content="This is a description">
</head>

<body>

    <?php

$conn = new Connection();

$main = new MainPage();

$pdo = $conn->connectToDb($db_sections, $user_sections, $pass_sections);

?>

    <?php include 'inc/header.php';?>
    <!-- This is the main container. -->
    <!-- This is the photo slideshow. -->
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
            <!-- 'content <h3>' a brief/condensed version of the associated news -->
                <div class="col-xl-4" style="padding-left: 0px; padding-right: 0px;">
                    <article>
                        <figure class="article-img">
                            <img class="img-fit" src="https://gratisography.com/thumbnails/gratisography-subway-train-arrival-thumbnail.jpg" alt="test">
                        </figure>
                        <div class="content">
                            <div class="post-meta">
                                <p class="post-category">Category</p>
                            </div>
                            <h3>Corresponding category news title for one</h3>
                        </div>
                    </article>
                </div>
                <div class="col-xl-4" style="padding-left: 0px; padding-right: 0px;">
                    <article>
                        <figure class="article-img">
                            <img class="img-fit" src="https://images.unsplash.com/photo-1539934675566-f6889aa8f6a2?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=148236f5e96a5fc0076a4d13128751bd&auto=format&fit=crop&w=701&q=80" alt="test">
                        </figure>
                        <div class="content">
                            <div class="post-meta">
                                <p class="post-category">Category</p>
                            </div>
                            <h3>Corresponding category news title for two</h3>
                        </div>
                    </article>
                </div>
                <div class="col-xl-4" style="padding-left: 0px; padding-right: 0px;">
                    <article>
                        <figure class="article-img">
                            <img class="img-fit" src="https://images.unsplash.com/photo-1539895284193-9a389687ee95?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=909631c97e5f1b79bb7e9aea9a0344fc&auto=format&fit=crop&w=700&q=80" alt="test">
                        </figure>
                        <div class="content">
                            <div class="post-meta">
                                <p class="post-category">Category</p>
                            </div>
                            <h3>Corresponding category news title for three</h3>
                        </div>
                    </article>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-8" style="padding-left: 0px; padding-right: 0px;">
                    <article id="article-long">
                        <figure class="article-img">
                            <img class="img-fit" src="https://images.unsplash.com/photo-1539964452237-866f0522db8b?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=739184a0c7d9ae7e54d3516bf6eb76e5&auto=format&fit=crop&w=628&q=80" alt="test">
                        </figure>
                        <div class="content">
                            <div class="post-meta">
                                <p class="post-category">Featured Category</p>
                            </div>
                            <h3>Corresponding category news title for featured</h3>
                        </div>
                    </article>
                </div>
                <div class="col-xl-4" style="padding-left: 0px; padding-right: 0px;">
                    <article>
                        <figure class="article-img">
                            <img class="img-fit" src="https://images.unsplash.com/photo-1539959099596-e77a95e9c717?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=8ece5328b9e203558f4ec229adf09cff&auto=format&fit=crop&w=701&q=80" alt="test">
                        </figure>
                        <div class="content">
                            <div class="post-meta">
                                <p class="post-category">Category</p>
                            </div>
                            <h3>Corresponding category news title for four</h3>
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
    <div class="container-fluid no-padding events-container">
        <div class="container no-padding">
            <div class="row events-header">
                <div class="col-sm-12">
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
    if (array_key_exists("errors", $account0)) {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>" . $string[errors][0]["message"] . "</em></p>";exit();}

    echo "<pre>";
    echo "</pre>";

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
    if (array_key_exists("errors", $account1)) {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>" . $string[errors][0]["message"] . "</em></p>";exit();}

    echo "<pre>";
    echo "</pre>";

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
    if (array_key_exists("errors", $account2)) {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>" . $string[errors][0]["message"] . "</em></p>";exit();}

    echo "<pre>";
    echo "</pre>";

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