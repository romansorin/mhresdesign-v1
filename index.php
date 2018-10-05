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
                            <img class="d-block w-100" src="images/1.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="images/2.jpg" alt="Second slide">
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
    <div class="container-fluid no-padding">
        <div class="row news-header">
            <div class="col-sm-12">
                <h2 id="news-header-label">Mentor News</h2>
                <p id="news-header-desc">See what's happening at Mentor</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <article>
                    <figure class="article-img"></figure>
                    <div class="content">
                        <div class="post-meta">
                            <p class="post-category">Clubs</p>
                        </div>
                        <h3>Main title of Clubs news</h3>
                    </div>
                </article>
            </div>
            <div class="col-sm-4">
                <article>
                    <figure class="article-img"></figure>
                    <div class="content">
                        <div class="post-meta">
                            <p class="post-category">Sports</p>
                        </div>
                        <h3>Main title of Sports news</h3>
                    </div>
                </article>
            </div>
            <div class="col-sm-4">
                <article>
                    <figure class="article-img"></figure>
                    <div class="content">
                        <div class="post-meta">
                            <p class="post-category">Guidance</p>
                        </div>
                        <h3>Main title of Guidance news</h3>
                    </div>
                </article>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <article>
                    <figure class="article-img"></figure>
                    <div class="content">
                        <div class="post-meta">
                            <p class="post-category">Miscellaneous</p>
                        </div>
                        <h3>Main title of Misc. news</h3>
                    </div>
                </article>
            </div>
            <div class="col-sm-4">
                <article>
                    <figure class="article-img"></figure>
                    <div class="content">
                        <div class="post-meta">
                            <p class="post-category">Important Announcements</p>
                        </div>
                        <h3>Main title of Important Announcements</h3>
                    </div>
                </article>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12" style="text-align: center;">
                <a href="/news"><button type="button" class="btn btn-light" id="all-news-btn">All Mentor News</button></a>
            </div>
        </div>
    </div>
    <!-- This is the calendar of the main page. -->
    <div class="container no-padding">
        <div class="row calendar">
            <?php include 'inc/calendar.php'; 
            $calendar = new CalendarWidget;
            $calendar->generate(4);
            ?>
        </div>
    </div>
    <!-- This is the social media section of the main page -->
    <div class="container-fluid no-padding">
        <div class="row twitter-feeds">
           <!-- twitters -->
        </div>
    </div>
<?php include 'inc/footer.php'; ?>
</body>

</html>
