<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '/srv/http/inc/includes.php'; 
    require '/srv/http/inc/connection.php';
    require '/srv/http/activities/Activity.php'; ?>
    <link rel="stylesheet" href="/css/activities.css">
    <title>Science Olympiad | Mentor High School</title>
    <meta name="description" content="#">
</head>

<body>
    <?php

    /** @var Connection [Create a connection object] */
    $conn = new Connection();

    /** @var Activity [Create a new activity object] */
    $activity = new Activity();

    /** @var [Object] [Create a PDO object and connect to the database] */
    $pdo = $conn->connectToDb('sections', 'reader', 'readonly');

    include '/srv/http/inc/header.php';

    ?>
    <div class="container-fluid no-padding">
        <div class="row">
            <div class="col-md-12 no-padding img-top">
                <img class="d-block w-100 img-fit" src="https://wallpapercave.com/wp/W884Eoi.jpg" alt="Science Olympiad header photo">
                <div class="img-text-overlay">
                    <a href="/activities"><h6>Activities</h6></a>
                    <h1>Science Olympiad</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="activities-default">
        <div class="container no-padding" id="local-nav-menu">
            <div id="local-nav-menu-wrapper">
                <div class="row"><h4 id="local-nav-menu-header">More Information</h4></div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="local-nav-menu-list">
                            <div class="dropdown">
                                <li class="local-nav-menu-item hvr-underline-from-center">General</li>
                                <div class="dropdown-content">
                                    <a href="https://www.soinc.org/">National Site</a>
                                    <a href="https://ohso.osu.edu/">State Site</a>
                                    <a href="http://example.com">Regional Site</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <li class="local-nav-menu-item hvr-underline-from-center">About</li>
                                <div class="dropdown-content">
                                    <a href="https://www.soinc.org/sites/default/files/uploaded_files/2019_SO_Events.pdf">2019 Events</a>
                                    <a href="https://www.soinc.org/sites/default/files/uploaded_files/2019_SO_Alumni.pdf">Alumni Involvement</a>
                                </div>
                            </div>
                            <a href="https://goo.gl/forms/2UZSs54yBig7dVgv1"><li class="local-nav-menu-item hvr-underline-from-center">Invitational</li></a>
                            <a href="https://example.com"><li class="local-nav-menu-item hvr-underline-from-center">Booster</li></a>
                            <a href="https://twitter.com/sciolycpts?lang=en&lang=en"><li class="local-nav-menu-item hvr-underline-from-center">Twitter</li></a>
                            <script>
                                jQuery('div.dropdown').hover(function() {
                                    jQuery(this).find('.local-nav-menu-item').addClass('active');
                                    jQuery(this).find('.dropdown-content').stop(true, true).delay(200).fadeIn(500);
                                }, function() {
                                    jQuery(this).find('.local-nav-menu-item').removeClass('active');
                                    jQuery(this).find('.dropdown-content').stop(true, true).delay(200).fadeOut(500);
                                });
                            </script>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container no-padding">
            <div class="row no-padding" id="activity-content">
                <div class="col-md-12 no-padding" id="main-activity-content">
                    <h2>Information</h2>
                    <?php
                    $results_info = $activity->fetchActivityInformation($pdo, 'science olympiad');
                    foreach ($results_info as $information) : ?>
                        <p>
                            <?= $information->information; ?>
                        </p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="container-fluid" id="article-container">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-md-6 no-padding">
                        <figure class="article-img" style="margin-left: 0px;">
                            <iframe class="img-fit" width="640" height="480" src="https://www.youtube.com/embed/OPndj0iynI4?wmode=opaque&controls=&modestbranding=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </figure>
                    </div>
                    <div class="col-md-6 no-padding">
                        <div class="content mr-left">
                            <?php 
                            $results_title = $activity->fetchArticleTitle($pdo, 'science olympiad', 1);
                            foreach ($results_title as $title) : ?>
                                <h3 class="article-title">
                                    <?= $title->title; ?>
                                </h3>
                            <?php endforeach; ?>

                            <?php 
                            $results_content = $activity->fetchArticleContent($pdo, 'science olympiad', 1);
                            foreach ($results_content as $content) : ?>
                                <p class="article-desc">
                                    <?= $content->content; ?>
                                </p>
                            <?php endforeach; ?>
                            
                            <?php
                            $results_link = $activity->fetchArticleLink($pdo, 'science olympiad', 1);
                            foreach ($results_link as $link) : ?>
                                <p class="article-link">
                                    <a href="<?= $link->link; ?>">Article link</a>
                                </p>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 no-padding">
                        <div class="content">
                            <?php 
                            $results_title = $activity->fetchArticleTitle($pdo, 'science olympiad', 2);
                            foreach ($results_title as $title) : ?>
                                <h3 class="article-title">
                                    <?= $title->title; ?>
                                </h3>
                            <?php endforeach; ?>

                            <?php 
                            $results_content = $activity->fetchArticleContent($pdo, 'science olympiad', 2);
                            foreach ($results_content as $content) : ?>
                                <p class="article-desc">
                                    <?= $content->content; ?>
                                </p>
                            <?php endforeach; ?>
                            
                            <?php
                            $results_link = $activity->fetchArticleLink($pdo, 'science olympiad', 2);
                            foreach ($results_link as $link) : ?>
                                <p class="article-link">
                                    <a href="<?= $link->link; ?>">Article link</a>
                                </p>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="col-md-6 no-padding">
                        <figure class="article-img mr-left">
                            <?php
                            $results_link = $activity->fetchArticleLink($pdo, 'science olympiad', 2);
                            foreach ($results_link as $link) : ?>
                                <a href="<?= $link->link; ?>"><img class="img-fit" src="https://pbs.twimg.com/media/Db6dHFRWkAAOUtg.jpg:large" alt="test"></a>
                            <?php endforeach; ?>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="activities-mobile">
        <div class="container" id="local-nav-menu-mobile">
            <div id="local-nav-menu-wrapper">
                <div class="row content"><h4 id="local-nav-menu-header-mobile">More Information</h4></div>
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="mobileDropdownMenu" data-toggle="dropdown" aria-haspop="true" aria-expanded="false">
                        Select...
                    </button>
                    <div class="dropdown-menu dropright" aria-labelledby="mobileDropdownMenu">
                        <button class="btn dropdown-item-btn dropdown-toggle" type="button" id="mobileDropdownSubmenu" data-toggle="dropdown" aria-haspop="true" aria-expanded="false">General</button>
                        <div class="dropdown-menu" aria-labelledby="mobileDropdownSubmenu">
                            <a class="dropdown-item" href="https://example.com">Item one</a>
                        </div>
                        <button class="btn dropdown-item-btn dropdown-toggle" type="button" id="mobileDropdownSubmenu" data-toggle="dropdown" aria-haspop="true" aria-expanded="false">About</button>
                        <div class="dropdown-menu" aria-labelledby="mobileDropdownSubmenu">
                            <a class="dropdown-item" href="https://example.com">Item two</a>
                        </div>
                        <a class="dropdown-item" href="https://example.com">Invitational</a>
                        <a class="dropdown-item" href="https://example.com">Booster</a>
                        <a class="dropdown-item" href="https://example.com">Twitter</a>
                        <!-- <div class="dropdown-divider"></div> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="container content-padding">
            <div class="row" id="activity-content">
                <div class="col-md-12 no-padding" id="main-activity-content">
                    <h2>Information</h2>
                    <?php
                    $results_info = $activity->fetchActivityInformation($pdo, 'science olympiad');
                    foreach ($results_info as $information) : ?>
                        <p>
                            <?= $information->information; ?>
                        </p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="container content-padding" id="article-container">
            <div class="container no-padding">
                <div class="row">
                    <?php 
                    $results_title = $activity->fetchArticleTitle($pdo, 'science olympiad', 1);
                    foreach ($results_title as $title) : ?>
                        <h3 class="article-title">
                            <?= $title->title; ?>
                        </h3>
                    <?php endforeach; ?>
                </div>
                <div class="row">
                    <div class="col-md-12 no-padding">
                        <figure class="article-img">
                            <iframe class="img-fit" width="640" height="480" src="https://www.youtube.com/embed/OPndj0iynI4?wmode=opaque&controls=&modestbranding=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </figure>
                    </div>
                </div>
                <div class="col-md-12 no-padding">
                    <div class="content">
                        <?php 
                        $results_content = $activity->fetchArticleContent($pdo, 'science olympiad', 1);
                        foreach ($results_content as $content) : ?>
                            <p class="article-desc">
                                <?= $content->content; ?>
                            </p>
                        <?php endforeach; ?>
                        <p class="article-link"><a href="https://ohso.osu.edu/news/2017/12/19/winning-feeling-mentor-high-students-share-their-ohio-science-olympiad-experience">Article link</a></p>
                    </div>
                </div>
                <div class="row">
                    <?php 
                    $results_title = $activity->fetchArticleTitle($pdo, 'science olympiad', 2);
                    foreach ($results_title as $title) : ?>
                        <h3 class="article-title">
                            <?= $title->title; ?>
                        </h3>
                    <?php endforeach; ?>
                </div>
                <div class="row">
                    <div class="col-md-12 no-padding">
                        <figure class="article-img">
                            <a href="https://ohso.osu.edu/news/2018/06/04/former-mentor-student-continues-science-olympiad-mission-beyond-high-school"><img class="img-fit" src="https://pbs.twimg.com/media/Db6dHFRWkAAOUtg.jpg:large" alt="test"></a>
                        </figure>
                    </div>
                </div>
                <div class="col-md-12 no-padding">
                    <div class="content">
                        <?php 
                        $results_content = $activity->fetchArticleContent($pdo, 'science olympiad', 2);
                        foreach ($results_content as $content) : ?>
                            <p class="article-desc">
                                <?= $content->content; ?>
                            </p>
                        <?php endforeach; ?>
                        <p class="article-link"><a href="https://ohso.osu.edu/news/2018/06/04/former-mentor-student-continues-science-olympiad-mission-beyond-high-school">Article link</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '/srv/http/inc/footer.php'; ?>
</body>

</html>