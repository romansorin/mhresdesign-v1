<?php
include 'inc/connection/connection.php';
require 'inc/connection/configs.php';
class CalendarWidget {
    // Generates a calendar widget on the page,
    public function generate($range = 7, $start_date = null) {
        date_default_timezone_set('America/New_York');
        // Accept a $start_date, otherwise set it to today's date (useful if you want
        // to start the calendar at a date in the past, for example.)
        if (is_null($start_date)) {
            $start_date = new DateTime();
            $start_date->modify("-1 day");
        } else {
            $start_date = new DateTime($start_date);
        }

        // Draw a calendar div for each day in $range
        for ($x = 0; $x < $range; $x++) {
            // Increment the current date as we loop
            $date = $start_date->modify("+1 day");

            // Get the string to display for the date
            $date_month = $this->formatDateMonth($date);

            // Get the int to display for the date

            $date_day = $this->formatDateDay($date);

            // MYSQL date() command returns 'YEAR-MONTH-DAY' like '2003-12-31'
            // so let's get a string of our date formatted this way, in order to
            // search the database
            $date_selector = $this->formatDateQueryable($date);

            // here is where you would pull in the calendar events you want from the database.
            // Right now I have a hardcoded array as an example.
            // I would use a query like:
            // SELECT description, link, date FROM events WHERE date = $date_selector

            $conn = new Connection();

            $pdo = $conn->connectToDb($db_sections, $user_sections, $pass_sections);

            $query = "SELECT category, description, link FROM events WHERE event_date = '$date_selector'";
            $stmt  = $pdo->query($query);
            $info  = $stmt->fetch(PDO::FETCH_ASSOC);

            // Check if each column of a row is null/empty
            if (is_null($info['category'])) {
                $info['category'] = "No events listed";
            }
            if (!(isset($info['description']))) {
                $info['description'] = null;
            }
            if (!(isset($info['link'])) || $info['link'] == "") {
                $info['link'] = null;
            }

            $events = array(
                array(
                    "category" => $info['category'],
                    "text"     => $info['description'],
                    "link"     => $info['link'],
                ),

            );

            // I pretend your database has the following rows:
            //
            // id | date | text | link | category
            //
            // You can customize this obviously, and then tweak the draw event below

            $this->render($date_month, $date_day, $events);

        }

    }

    // draws one "row" of your calendar. Accepts a date string to display in the header
    // and then an array of $events.
    private function render($date_month, $date_day, $events) {
        // Heredocs are used for the bigger HTML segments
        $html = <<<HTML
        <div class="col-sm-12">
            <div class="row calendar">
                <div class="col-sm-2">
                    <h3 class="date">
                        <span class="month">{$date_month}</span>
                        <br>
                        <span class="day">{$date_day}</span>
                    </h3>
                </div>
            <div class="col-sm-8">
HTML;
        echo $html;
        foreach ($events as $event) {
            $html = <<<HTML
            <div class="cal-meta">
                <div class="cal-category">
                    {$event["category"]}
                </div>
                <div class="cal-content">
                {$event["text"]}
                </div>
            </div>
        </div>
HTML;
            echo $html;
            // Check if the 'link' in the row is empty, and render the corresponding button (enabled vs. disabled)
            if (!(is_null($event['link']))) {
                $html = <<<HTML
                <br>
                <div class="col-sm-2 text-center">
                    <a href="{$event['link']}" class="event-link"><button type="button" class="btn btn-light event-link-btn">View</button></a>
HTML;
                echo $html;
            } else {
                $html = <<<HTML
                <br>
                <div class="col-sm-2 text-center">
                    <button type="button" class="btn event-link-btn-disabled disabled">View</button>
HTML;
                echo $html;
            }
            echo '</div>';
        }
        echo '</div></div>';
    }

    // Helpers to format our DateTime
    private function formatDateMonth($date) {
        // returns like 'Jan'
        return $date->format('M');
    }
    private function formatDateDay($date) {
        // returns like '4'
        return $date->format('j');
    }
    private function formatDateQueryable($date) {
        // returns like '1999-12-31'
        return $date->format('Y-m-d');
    }
}