<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'inc/includes.php'; ?>
    <?php //include 'inc/connection.php' ?>
    <title>Mentor High School</title>
    <meta name="description" content="This is a description">
</head>

<body>
    <?php include 'inc/header.php' ?>
    <!-- This is your main container. -->
    <!-- This is the photo slideshow. -->
    <div class="container-fluid no-padding">
        <div class="row no-padding">
            <div class="col-12 no-padding">
                <div id="frontpage-carousel" class="carousel slide" data-ride="carousel" data-interval="10000">
                    <ol class="carousel-indicators">
                        <li data-target="#frontpage-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#frontpage-carousel" data-slide-to="1"></li>
                        <li data-target="#frontpage-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" style="height: 400px">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="https://d2v9y0dukr6mq2.cloudfront.net/video/thumbnail/GbbtDTW/new-york-city-nyc-sunset-night-skyline-view-brooklyn-bridge-water-4k-timelapse_41kywuhn__F0000.png" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="http://orig07.deviantart.net/bd5d/f/2014/334/d/c/new_york_skyline_wallpaper_by_neokeitaro-d8839i9.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="images/3.jpg" alt="Third slide">
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
    <!-- This is the news section of the main page. -->
    <div class="container-fluid no-padding news-container">
        <div class="container no-padding">
            <div class="row news-header">
                <div class="col-sm-12">
                    <h2 id="news-header-label">Mentor News</h2>
                    <p id="news-header-desc">See what's happening at Mentor</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4" style="padding-left: 0px; padding-right: 0px;">
                    <article>
                        <figure class="article-img">
                            <img src="https://d2v9y0dukr6mq2.cloudfront.net/video/thumbnail/GbbtDTW/new-york-city-nyc-sunset-night-skyline-view-brooklyn-bridge-water-4k-timelapse_41kywuhn__F0000.png" alt="test">
                        </figure>
                        <div class="content">
                            <div class="post-meta">
                                <p class="post-category">Category</p>
                            </div>
                            <h3>Corresponding category news title for one</h3>
                        </div>
                    </article>
                </div>
                <div class="col-sm-4" style="padding-left: 0px; padding-right: 0px;">
                    <article>
                        <figure class="article-img ">
                            <img src="https://d2v9y0dukr6mq2.cloudfront.net/video/thumbnail/GbbtDTW/new-york-city-nyc-sunset-night-skyline-view-brooklyn-bridge-water-4k-timelapse_41kywuhn__F0000.png" alt="test">
                        </figure>
                        <div class="content">
                            <div class="post-meta">
                                <p class="post-category">Category</p>
                            </div>
                            <h3>Corresponding category news title for two</h3>
                        </div>
                    </article>
                </div>
                <div class="col-sm-4" style="padding-left: 0px; padding-right: 0px;">
                    <article>
                        <figure class="article-img">
                            <img src="https://d2v9y0dukr6mq2.cloudfront.net/video/thumbnail/GbbtDTW/new-york-city-nyc-sunset-night-skyline-view-brooklyn-bridge-water-4k-timelapse_41kywuhn__F0000.png" alt="test">
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
                <div class="col-sm-8" style="padding-left: 0px; padding-right: 0px;">
                    <article class="article-long">
                        <figure class="article-img">
                            <img src="https://d2v9y0dukr6mq2.cloudfront.net/video/thumbnail/GbbtDTW/new-york-city-nyc-sunset-night-skyline-view-brooklyn-bridge-water-4k-timelapse_41kywuhn__F0000.png" alt="test">
                        </figure>
                        <div class="content">
                            <div class="post-meta">
                                <p class="post-category">Featured Category</p>
                            </div>
                            <h3>Corresponding category news title for featured</h3>
                        </div>
                    </article>
                </div>
                <div class="col-sm-4" style="padding-left: 0px; padding-right: 0px;">
                    <article>
                        <figure class="article-img">
                            <img src="https://d2v9y0dukr6mq2.cloudfront.net/video/thumbnail/GbbtDTW/new-york-city-nyc-sunset-night-skyline-view-brooklyn-bridge-water-4k-timelapse_41kywuhn__F0000.png" alt="test">
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
    <!-- This is the calendar of the main page. -->
    <div class="container-fluid no-padding events-container">
        <div class="container no-padding">
            <div class="row events-header">
                <div class="col-sm-12">
                    <h2 id="events-header-label">Mentor Events</h2>
                    <p id="events-header-desc">Upcoming events and meetings</p>
                </div>
            </div>
            <div class="row">
                <?php include 'inc/calendar.php'; 
                $calendar = new CalendarWidget;
                $calendar->generate(4);
                ?>
            </div>
        </div>  
        <div class="row">
            <div class="col-sm-12" style="text-align: center;">
                <div id="weather"></div>
                <a href="/events"><button type="button" class="btn btn-light" id="all-events-btn">View all events</button></a>
            </div>
        </div>
    </div>
    <!-- This is the social media section of the main page -->
    <div class="container no-padding">
        <div class="row social-header">
            <div class="col-sm-12">
                <h2 id="social-header-label">Connect with us</h2>
                <p id="social-header-desc">Stay updated with campus life</p>
            </div>
        </div>
        <div class="row social-media">
            <div class="col-sm-4 crowe-twitter">    
                <a href="https://twitter.com/PrincipalCrowe" alt="Official account of MHS principal">
                    <i class="fa fa-twitter"></i>
                    <h4 class="sm-title">@PrincipalCrowe</h4>
                </a>
                <p class="tweet-content">Homecoming Assembly kicks off with our Alma Mater <a href="https://twitter.com/mentorhigh">@MentorHigh</a></p>
                <h4 class="time-span">About 7 minutes ago</h4>
            </div>
            <div class="col-sm-4 instagram">
                <a href="https://instagram.com/rm.sorin" alt="I made this website">
                    <i class="fa fa-instagram"></i>
                    <h4 class="sm-title">rm.sorin</h4>
                    <a href="https://www.instagram.com/p/BmDycX-HLD-/?taken-by=rm.sorin" alt="test insta post"><img src="https://scontent-iad3-1.cdninstagram.com/vp/c2fbf259b3bb22bf664d9596d3f688e1/5C612A60/t51.2885-15/e35/38057971_512894979140557_5238749822009212928_n.jpg" alt="test photo" id="embed-ig"></a>
                </a>
            </div>
            <div class="col-sm-4 general-twitter">
                <a href="https://twitter.com/mentorhigh" alt="Official Mentor High School account">
                    <i class="fa fa-twitter"></i>
                    <h4 class="sm-title">@MentorHigh</h4>
                </a>
                <p class="tweet-content">RT <a href="https://twitter.com/mrglavanmhs">@MrGlavanMHS</a>: Thank you <a href="https://twitter.com/repdavejoyce">@RepDaveJoyce</a> for visiting the 2018 Lake County Think Manufacturing Expo and supporting our students and local businesses!</p>
                <h4 class="time-span">About 12 hours ago</h4>
            </div>
        </div>
    </div>
    <?php include 'inc/footer.php'; ?>
</body>

</html>
