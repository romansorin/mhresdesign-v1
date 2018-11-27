<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '/srv/http/inc/includes.php';?>
    <link rel="stylesheet" href="/css/activities.css">
    <title>Activity | Mentor High School</title>
    <meta name="description" content="#">
</head>

<body>
    <div class="push-down"></div>
    <?php include '/srv/http/inc/header.php'?> <!-- images -->
    <div class="container-fluid no-padding">
        <div class="row">
            <div class="col-md-12 no-padding img-top">
                <img class="d-block w-100 img-fit" src="#" alt="Photos will go here">
                <div class="img-text-overlay">
                    <a href="/activities"><h6>Activities</h6></a>
                    <h1>Activity</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid no-padding"> <!-- carousel -->
        <div class="row no-padding">
            <div class="col-12 no-padding">
                <div id="activity-carousel" class="carousel slide" data-ride="carousel" data-interval="10000">
                    <!-- To change speed of slideshow, changing 'data-interval' value (parameter taken as milliseconds) -->
                    <ol class="carousel-indicators">
                        <li data-target="#activity-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#activity-carousel" data-slide-to="1"></li>
                        <li data-target="#activity-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#activity-carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#activity-carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="activities-default"> <!-- This class is displayed for non-mobile devices -->
        <div class="container no-padding" id="local-nav-menu">
            <div id="local-nav-menu-wrapper">
                <div class="row"><h4 id="local-nav-menu-header">More Information</h4></div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="local-nav-menu-list">
                            <div class="dropdown">
                                <li class="local-nav-menu-item hvr-underline-from-center">Item 1</li> <!-- Example of an expanding dropdown for more content -->
                                <div class="dropdown-content">
                                    <a href="#">Content 1</a>
                                    <a href="#">Content 2</a>
                                    <a href="#">Content 3</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <li class="local-nav-menu-item hvr-underline-from-center">Item 2</li>
                                <div class="dropdown-content">
                                    <a href="#">Content 1</a>
                                    <a href="#">Content 2</a>
                                </div>
                            </div>
                            <a href="#"><li class="local-nav-menu-item hvr-underline-from-center">Item 3</li></a> <!-- Or, you can just have links -->
                            <a href="#"><li class="local-nav-menu-item hvr-underline-from-center">Item 4</li></a>
                            <a href="#"><li class="local-nav-menu-item hvr-underline-from-center">Item 5</li></a>
                            <!-- Adds "active" to dropdown when hovered, mainly a styling thing -->
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
                    <p>Information for the activity goes here</p>
                </div>
            </div>
        </div>
        <div class="container-fluid" id="article-container">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-md-6 no-padding">
                        <figure class="article-img" style="margin-left: 0px;">
                            <!-- You can have images or videos in these figure tags. -->
                            <!-- Video (youtube): <iframe class="img-fit" width="640" height="480" src="#" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> -->
                            <!-- Following is an image -->
                            <!-- The a href tag will link to an article, news, website, etc. -->
                            <a href="#"><img class="img-fit" src="#" alt="#"></a>
                        </figure>
                    </div>
                    <div class="col-md-6 no-padding">
                        <div class="content mr-left">
                            <h3 class="article-title">Title of an article</h3>
                            <p class="article-desc">Enter information or description for the article</p>
                            <p class="article-link"><a href="#">Article link, source</a></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 no-padding">
                        <div class="content">
                            <h3 class="article-title">Title of a second article</h3>
                            <p class="article-desc">Enter information or description for the other article</p>
                            <p class="article-link"><a href="#">Article link, source</a></p>
                        </div>
                    </div>
                    <div class="col-md-6 no-padding">
                        <figure class="article-img mr-left">
                            <a href="#"><img class="img-fit" src="#" alt="#"></a>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="activities-mobile"> <!-- This class is displayed for mobile devices -->
        <div class="container" id="local-nav-menu-mobile">
            <div id="local-nav-menu-wrapper">
                <div class="row content"><h4 id="local-nav-menu-header-mobile">More Information</h4></div>
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="mobileDropdownMenu" data-toggle="dropdown" aria-haspop="true" aria-expanded="false">
                        Dropdown
                    </button>
                    <div class="dropdown-menu" aria-labelledby="mobileDropdownMenu">
                        <a class="dropdown-item" href="#">Item 1</a>
                        <a class="dropdown-item" href="#">Item 2</a>
                        <a class="dropdown-item" href="#">Item 3</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated example</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row" id="activity-content">
                <div class="col-md-12" id="main-activity-content">
                    <h2>Information</h2>
                    <p>Information for the activity goes here</p>
                </div>
            </div>
        </div>
        <div class="container" id="article-container">
            <div class="container">
                <div class="row"><h3 class="article-title">Title of an article</h3></div>
                <div class="row">
                    <div class="col-md-12"><figure class="article-img">
                       <!-- You can have images or videos in these figure tags. -->
                       <!-- Video (youtube): <iframe class="img-fit" width="640" height="480" src="#" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> -->
                       <!-- Following is an image -->
                       <!-- The a href tag will link to an article, news, website, etc. -->
                       <a href="#"><img class="img-fit" src="#" alt="#"></a></figure>
                   </div>
               </div>
               <div class="col-md-12">
                <div class="content">
                    <p class="article-desc">Enter information or description for the article</p>
                    <p class="article-link"><a href="#">Article link, source</a></p>
                </div>
            </div>
            <div class="row"><h3 class="article-title">Title of a second article</h3></div>
            <div class="row">
                <div class="col-md-12">
                    <figure class="article-img">
                        <a href="#"><img class="img-fit" src="#" alt="#"></a>
                    </figure>
                </div>
            </div>
            <div class="col-md-12">
                <div class="content">
                    <p class="article-desc">Enter information or description for the other article</p>
                    <p class="article-link"><a href="#">Article link, source</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '/srv/http/inc/footer.php';?>
</body>

</html>