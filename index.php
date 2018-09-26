<!DOCTYPE html>

<html lang="en">
<head>
<?php include 'inc/includes.php'; ?>
<?php include 'inc/connection.php' ?>
    <title>Home | Mentor High School</title>
    <meta name="description" content="This is a description">
</head>
<body>
<!-- This is the main container for your page. -->
<div class="container-fluid">
<?php include 'inc/header.php' ?>

    <div class = "mainPhotos">
        <img class="img-responsive" src="#" alt="photos here">
    </div>
    <section class = "news">
        <div class = "container-fluid">
            <div class = "newsHeader">
                <div class="row">
                    <div class = "col-sm-12">
                        <button type="button" class="btn btn-default btn-md btn-news">News</button>
                    </div>
                </div>  
            </div>
        </div>
        <div class= "container-fluid">
            <div class="row">
                <div class = "row-top-index">
                    <div class = "col-sm-4">
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
                    <div class = "col-sm-4">
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
                    <div class = "col-sm-4">
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
                <div class = "row-bottom-index">
                    <div class = "col-sm-12">
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
    </section>
    <section class = "calendar">
        <div class = "container-fluid">
            <div class = "calendar-widget">
                <?php include 'inc/calendar.php'; ?>
                <?php
                $calendar = new CalendarWidget;
                $calendar->generate(6);
                ?>
            </div>
        </div>
    </section>
    <div class = "container">
        <div class = "twitter-feeds">
            <div class = "col-sm-6">
                <a href="https://www.twitter.com/PrincipalCrowe" class="btn btn-default btn-twitterl">Mr. Crowe</a>
                <a class="twitter-timeline" data-chrome="nofooter, noheader" data-lang="en" data-theme="light" data-link-color="#711717" data-height="800" data-width="500" href="https://twitter.com/PrincipalCrowe?ref_src=twsrc%5Etfw"></a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
            <div class = "col-sm-6">
                <a href="https://www.twitter.com/MentorHigh" class="btn btn-default btn-twitterr">Mentor High</a>
                <a class="twitter-timeline" data-chrome="nofooter, noheader" data-lang="en" data-theme="light" data-link-color="#711717" data-height="800" data-width="500" href="https://twitter.com/MentorHigh?ref_src=twsrc%5Etfw"></a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </div>
    </div>
<?php include 'inc/footer.php'; ?> 
</div>
</body>
</html>
