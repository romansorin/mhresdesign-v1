<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'inc/includes.php'; ?>
    <?php //include 'inc/connection.php' ?>
    <title>Mentor High</title>
    <meta name="description" content="This is a description">
</head>

<body>
    <?php include 'inc/header.php' ?>
    <!-- This is your main container. -->
    <div class="container-fluid no-padding">
        <div class="row no-padding">
            <div class="col-12 no-padding">
                <div id="frontpage-carousel" class="carousel slide" data-ride="carousel">
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
    <div class="container-fluid no-padding">
        <div class="row">
            <div class="col-sm-12">
                <h1>Mentor Events</h1>
                <h5>See what's happening at Mentor High</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4"></div>
            <div class="col-sm-4"></div>
        </div>
        <div class="row">
            <div class="col-sm-8"></div>
            <div class="col-sm-4"></div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h1>All Mentor News</h1>
            </div>
        </div>
    </div>
    <div class="container no-padding">
        <div class="row calendar">
            <?php include 'inc/calendar.php'; 
            $calendar = new CalendarWidget;
            $calendar->generate(4);
            ?>
        </div>
    </div>
    <div class="container-fluid no-padding">
        <div class="row twitter-feeds">
           <!-- twitters -->
        </div>
    </div>
<?php include 'inc/footer.php'; ?>
</body>

</html>
