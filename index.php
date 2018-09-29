<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'inc/includes.php'; ?>
    <?php //include 'inc/connection.php' ?>
    <title>Home | Mentor High School</title>
    <meta name="description" content="This is a description">
</head>

<body>
    <?php include 'inc/header.php' ?>
    <!-- This is your main container. -->
    <div class="container-fluid">
            <div class="col-12">
                <div id="frontpage-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#frontpage-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#frontpage-carousel" data-slide-to="1"></li>
                        <li data-target="#frontpage-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" style="height:400px">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="images/1.jpg" alt="First slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="images/2.jpg" alt="Second slide">
			</div>
			<div class="carousel-item w-100">
				<img class="d-block" src="images/3.jpg" alt="Third slide">
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
        <div class="row">
            <div class="col-12">
                <h2 class="section-header text-center">News</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <h3 class="headers">Athletics</h3>
                <h4>Kick for the Cure:</h4>
                <p>The Girls and Boys Soccer teams will be hosting our 8th annual Kick for the Cure events to support local families battling cancer Saturday, September 29th 11am, 1pm & 3pm girls games vs Mayfield and Parma and October 13th 1pm & 3pm boys games vs Riverside. Kick for the Cure t-shirts are being sold for $10 during lunch mods September 17th-28th. Wear your purchased t-shirt to the game and receive free admission to both the girls and boys Kick for the Cure games. So, buy a t-shirt and come to the games to support our teams and our cause!</p>
            </div>
            <div class="col-sm-4">
                <h3 class="headers" style="padding-right: 40px;">Guidance</h3>
                <div class="row">
                    <div col="col-12">
                        <h4>College Visits this Week:</h4>
                        <p>Representatives from the following colleges will be visiting MHS this week: Ohio University, University of Dayton Mt. Union, Ohio State, Thiel, Univ. of Rochester, Univ. at Buffalo, Allegheny and Loyola. Sign up on Naviance</p>
                    </div>
                    <div col="col-12">
                        <h4>Wings of Women Conference</h4>
                        <p>Female students are invited to attend the Wings of Women Conference at Burke Airport on Nov. 10 from 9-2. This is for girls who are interested in a STEM career. Meet women mentors in STEM careers. More information in Guidance Office, room A114.</p>
                    </div>
                    <div col="col-12">
                        Voter Registration
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <h3 class="headers">Clubs</h3>
                <div class="row">
                    <div col="col-12">
                       <h4> Science Olympiad News: </h4>
<p>Science Olympiad News: The Event Fair is this Sunday Sept 30 from 1-3 PM in B 203. Meet your coaches, learn more about the 23 events, but most importantly help figure out when your study and/or building event will meet every week. We also discuss the MIT trip</p>
                    </div>
                    <div class="col-12">
                        <h4>HOMECOMING DANCE: </h4>
<p>Mentor High Schools Homecoming Dance will be held on Saturday, October 6, 2018 from 8:00 p.m. to 11:00 p.m. Tickets will be on sale starting Monday, October 1st through Friday, October 5th. Tickets will be sold before school and during all lunch mods in the Student Center. Tickets are $13/single and $25/couple. Cash or Check (payable to MHS PTSA). If you are bringing a guest that does not attend MHS, please have your guest complete a Guest Form which can be picked up in all of the Unit Offices. This Guest Form must be completed before Homecoming tickets can be purchased for a guest.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h3 class="headers" style="padding-right: 40px;">Announcements</h3>
            </div>
        </div>
        <div class="row">

            <?php 
                include 'inc/calendar.php'; 
                $calendar = new CalendarWidget;
                $calendar->generate(6);
            ?>
        </div>
        <div class="row twitter-feeds">
            <div class="col-sm-6">
                <a href="https://www.twitter.com/PrincipalCrowe" class="btn btn-default btn-twitterl">Mr. Crowe</a>
                <a class="twitter-timeline" data-chrome="nofooter, noheader" data-lang="en" data-theme="light" data-link-color="#711717" data-height="800" data-width="500" href="https://twitter.com/PrincipalCrowe?ref_src=twsrc%5Etfw"></a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
            <div class="col-sm-6">
                <a href="https://www.twitter.com/MentorHigh" class="btn btn-default btn-twitterr">Mentor High</a>
                <a class="twitter-timeline" data-chrome="nofooter, noheader" data-lang="en" data-theme="light" data-link-color="#711717" data-height="800" data-width="500" href="https://twitter.com/MentorHigh?ref_src=twsrc%5Etfw"></a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </div>
    </div>
    <?php include 'inc/footer.php'; ?>
</body>

</html>
