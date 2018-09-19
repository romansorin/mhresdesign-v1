<?php 
class CalendarWidget {
    // Generates a calendar widget on the page, 
    public function generate($range = 7, $start_date = null)
    {
	date_default_timezone_set('America/New_York');
        // Accept a $start_date, otherwise set it to today's date (useful if you want
        // to start the calendar at a date in the past, for example.)
        if (is_null($start_date)){
            $start_date = new DateTime();
        }
        else{
            $start_date = new DateTime($start_date);
        }

        // Draw a calendar div for each day in $range
        for ($x = 0; $x<$range; $x++){
            // Increment the current date as we loop
            $date = $start_date->modify("+1 day");

            // Get the string to display for the date
            $date_string = $this->formatDateReadable($date);
            
            // MYSQL date() command returns 'YEAR-MONTH-DAY' like '2003-12-31'
            // so let's get a string of our date formatted this way, in order to
            // search the database
            $date_selector = $this->formatDateQueryable($date);

            // here is where you would pull in the calendar events you want from the database.
            // Right now I have a hardcoded array as an example.
            // I would use a query like:
            // SELECT text, link, date FROM events WHERE date = $date_selector
            $events = array(
                array(
                    "text" => "This is some text",
                    "link" => "http://example.com"
                ),
                array(
                    "text" => "This is another post"
                )

            );

            // I pretend your database has the following rows:
            // 
            // id | date | text | link 
            //
            // You can customize this obviously, and then tweak the draw event below


            $this->render($date_string, $events);


        }
        
    }

    // draws one "row" of your calendar. Accepts a date string to display in the header
    // and then an array of $events.
    private function render($date_string, $events){
        echo "<div class=\"col-sm-2\">";
        echo "<h3>{$date_string}</h3>";

        echo "<div class=\"row\">";
        foreach ($events as $event){
            echo "<div class=\"col-sm-12\" >";
            echo $event['text'];
            if (array_key_exists('link', $event)){
                echo "<br>";
                echo "<a href=\"{$event['link']}\"> Link </a>";
            }
            echo "</div>";

        }
        echo "</div></div>";
    }

    // Helpers to format our DateTime
    private function formatDateReadable($date){
        // returns like 'Monday, January 4, 2012'
        return $date->format('l, F j, Y'); 
    }

    private function formatDateQueryable($date){
        // returns like '1999-12-31' 
        return $date->format('Y-m-d');
    }
}

?>
