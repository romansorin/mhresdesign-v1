<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'inc/includes.php'; ?>
    <?php include 'inc/connection.php' ?>
    <title>Home | Mentor High School</title>
    <meta name="description" content="This is a description">
</head>

<body>
    <?php include 'inc/header.php' ?>
    <!-- This is your main container. -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-4 ml-auto mr-auto">
                <div id="frontpage-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#frontpage-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#frontpage-carousel" data-slide-to="1"></li>
                        <li data-target="#frontpage-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block" src="images/sample.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="images/sample.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="images/sample.jpg" alt="Third slide">
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
        <div class="container-fluid">
            <div class="newsHeader">
                <div class="row">
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-default btn-md btn-news">News</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="row-top-index">
                    <div class="col-sm-4">
                        <h3 class="headers">Athletics</h3>
                        <?php
                        $sql = "SELECT content FROM mainpage WHERE title = 'athletics'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo $row["content"]. "<br>";
                            }
                        } else {
                            echo "0 results from selected table";
                        }
                        ?>
                    </div>
                    <div class="col-sm-4">
                        <h3 class="headers" style="padding-right: 40px;">Guidance</h3>
                        <?php
                        $sql = "SELECT content FROM mainpage WHERE title = 'guidance'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo $row["content"]. "<br>";
                            }
                        } else {
                            echo "0 results from selected table";
                        }
                        ?>
                    </div>
                    <div class="col-sm-4">
                        <h3 class="headers">Clubs</h3>
                        <?php
                        $sql = "SELECT content FROM mainpage WHERE title = 'clubs'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo $row["content"]. "<br>";
                            }
                        } else {
                            echo "0 results from selected table";
                        }
                        ?>
                    </div>
                </div>
                <div class="row-bottom-index">
                    <div class="col-sm-12">
                        <h3 class="headers" style="padding-right: 40px;">Announcements</h3>
                        <?php
                        $sql = "SELECT content FROM mainpage WHERE title = 'announcements'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo $row["content"]. "<br>";
                            }
                        } else {
                            echo "0 results from selected table";
                        }
                        $conn->close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="calendar-widget">
                <?php include 'inc/calendar.php'; ?>
                <?php
                $calendar = new CalendarWidget;
                $calendar->generate(6);
                ?>
            </div>
        </div>
        <div class="row">
            <div class="twitter-feeds">
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
    </div>
    <?php include 'inc/footer.php'; ?>
</body>

</html>