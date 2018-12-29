<?php
session_start();

require_once 'C:\Users\Roman\Documents\local\post-system\connection.php';
require_once 'C:\Users\Roman\Documents\local\post-system\admin/user.php';
$conn     = new Connection();
$eventPDO = $conn->connectToDb('news', 'reader', 'readonly');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$eventPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$event = new Event();

$event->checkStatus();

class Event {
    private $uid;
    private $name;
    private $required_permissions = array();

    public function printColumn($index, $column) {
        $events_arr = $this->retrieveRows();

        if ($column == 'category') {
            echo $events_arr[$index]['category'];
        } else if ($column == 'description') {
            echo $events_arr[$index]['description'];
        } else if ($column == 'link') {
            echo $events_arr[$index]['link'];
        } else if ($column == 'id') {
            echo $events_arr[$index]['id'];
        } else if ($column == 'date_created') {
            $id = $events_arr[$index]['id'];
            echo $this->getDate($id);
        }
    }

    /**
     * [retrieveRows: Fetch the latest (5) rows from the table]
     * @return [Array] [Returns an associative array to use in other methods]
     */
    public function retrieveRows() {
        global $eventPDO;

        $query      = "(SELECT * FROM events ORDER BY id ASC) ORDER BY id DESC";
        $stmt       = $eventPDO->query($query);
        $events_arr = array();

        // Loop through the query 5 times and assign a row to variable $row
        // Assign the row to the posts array, defining the index by the
        // current iteration value of $i
        for ($i = 0; $i < 5; $i++) {
            $row            = $stmt->fetch(PDO::FETCH_ASSOC);
            $events_arr[$i] = $row;
        }

        return $events_arr;
    }

    /** [generatePost: Generates a post specified by the ID] */
    public function generateEvent() {
        global $eventPDO;

        $req  = $this->getRequiredPermission('modifyEvent');
        $user = new User($this->getID());

        $id     = $_GET['id'];
        $query  = 'SELECT * FROM events WHERE id = ' . $id . ' LIMIT 1';
        $stmt   = $eventPDO->query($query);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        /* Check that a row based off of the id actually exists, otherwise display an error */
        /* This is like the general idea of dynamically generating the page (html) */
        if ($result): ?>
            <h1><?=$result['category']?></h1>
            <h1><?=$result['description']?></h1>
            <h1><?=$result['link']?></h1>
            <?php if ($user->hasPermission($req)): ?><a href="event.php?id=<?=$result['id']?>&edit=true"><h6>Edit</h6></a> <?php endif;
        endif;
    }

    public function __construct() {
        if (isset($_SESSION['userID'])) {
            $this->uid = $_SESSION['userID'];
        }

        if (isset($_SESSION['username'])) {
            $this->name = $_SESSION['username'];
        }

        $this->setRequiredPermission('createEvent', 'event_create');
        $this->setRequiredPermission('deleteEvent', 'event_delete');
        $this->setRequiredPermission('modifyEvent', 'event_modify');
    }

    public function checkStatus() {
        if (isset($_GET['id']) && !empty($_GET['id']) && !isset($_GET['edit'])) {
            $this->generateEvent();
        } else if (isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['edit']) && $_GET['edit'] == 'true') {
            /* will have to clean this up down the road
            but this is for testing purposes */
            $this->modifyEvent();
        } else if (isset($_POST['create'])) {
            $this->createEvent();
        }
    }

    public function createEvent() {
        global $eventPDO;
        // allow user to create and enter a new post with title, description, and link
        //
        $req  = $this->getRequiredPermission('createEvent');
        $user = new User($this->getID());

        $category    = $_POST['category'];
        $description = $_POST['description'];
        $link        = $_POST['link'];
        $event_date  = $_POST['date'];
        $name        = $this->getUsername();
        $mySQL_date  = $this->setDate();

        if ($user->hasPermission($req)) {
            if (empty($category) || empty($description)) {
                header("Location: index.php?error=missing_fields");
                exit();
            } else {

                $query = "INSERT INTO events (category, description, link, event_date, date_created, author) VALUES ('$category', '$description', '$link', '$event_date', '$mySQL_date', '$name')";
                $stmt  = $eventPDO->prepare($query);
                $stmt->execute();

                if ($stmt) {
                    echo 'Successfully created event';
                } else {
                    echo 'Could not create event';
                }
            }
        } else {
            header("Location: index.php?error=no_permissions");
            exit();
        }
    }

    // basically done
    public function deleteEvent($id) {
        global $eventPDO;
        // allow user to delete selected event
        //
        $req  = $this->getRequiredPermission('deleteEvent');
        $user = new User($this->getID());

        if ($user->hasPermission($req)) {
            $query = "DELETE FROM events WHERE id = {$id}";
            $stmt  = $eventPDO->prepare($query);
            $stmt->execute();

            if ($stmt) {
                echo 'Deleted event successfully';
            } else {
                echo 'Could not delete event';
            }
        } else {
            header("Location: index.php?error=no_permissions");
        }
    }

    private function modifyEvent() {
        global $eventPDO;
        // allow user to modify a pre-existing event

        $req  = $this->getRequiredPermission('modifyEvent');
        $user = new User($this->getID());

        $id     = $_GET['id'];
        $query  = 'SELECT * FROM events WHERE id = ' . $id . ' LIMIT 1';
        $stmt   = $eventPDO->query($query);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $arr = array(
            "category"    => $result['category'],
            "description" => $result['description'],
            "link"        => $result['link'],
            "id"          => $result['id'],
        );

        if ($user->hasPermission($req)): ?>
	            <form action="event.php?id=<?=$arr['id']?>&edit=true" method="post">
	                <label for="category">Category:</label>
	                <input type="text" name="category" value="<?=$arr['category']?>">
	                <br><br>
	                <label for="description">Description:</label>
	                <input type="text" name="description" value="<?=$arr['description']?>">
	                <br><br>
	                <label for="link">Link:</label>
	                <textarea name="link"><?=$arr['link']?></textarea>
	                <br><br>
	                <input value="Save changes" type="submit" name="modifySubmit">
	                <input value="Delete event" type="submit" name="deleteEventSubmit">
	            </form>
	            <?php

        // what if i nested all of the code inside of here?
        if (isset($_POST['modifySubmit'])) {
            // create a modal or some javascript function for confirmation
            $category    = $_POST['category'];
            $description = $_POST['description'];
            $link        = $_POST['link'];
            $mySQL_date  = $this->setDate();

            if (empty($category) || empty($description)) {
                header("Location: index.php?error=missing_fields");
                exit();
            } else {
                $this->updateEvent($id, $category, $description, $link, $mySQL_date);
            }

        } else if (isset($_POST['deleteEventSubmit'])) {
            $this->deleteEvent($id);
        }
        ?>
	            <?php else: ?>
	             <h1>You do not have the necessary permissions.</h1>
	         <?php endif;
    }

    private function updateEvent($id, $category, $description, $link, $date_modified) {
        global $eventPDO;

        $req  = $this->getRequiredPermission('modifyEvent');
        $user = new User($this->getID());

        if ($user->hasPermission($req)) {
            $query = "UPDATE events SET category = '$category', description = '$description', link = '$link', date_modified = '$date_modified' WHERE id = " . $id . "";
            $stmt  = $eventPDO->prepare($query);
            $stmt->execute();

            if ($stmt) {
                echo 'Successfully updated event';
            } else {
                echo 'Did not work';
            }
        } else {
            echo 'no permissions';
        }

    }

    /** [getID: Retrieve ID of user from session] */
    private function getID() {
        return $this->uid;
    }

    /** [getUsername: Retrieve username of user from session] */
    private function getUsername() {
        return $this->name;
    }

    /**
     * [setRequiredPermission: Define the necessary permissions for a user to use a method]
     * @param [String] $function   [Specify the desired function]
     * @param [String] $permission [Specify the permission that a user requires]
     */
    private function setRequiredPermission($function, $permission) {
        $this->required_permissions[$function] = $permission;
    }

    /** [getRequiredPermission: Retrieve permission for a specific method] */
    private function getRequiredPermission($function) {
        return $this->required_permissions[$function];
    }

    /** [getDate: Retrieve the date/time which a post was created] */
    public function getDate($id) {
        global $eventPDO;
        $query         = 'SELECT date_created FROM events WHERE id = ' . $id . ' LIMIT 1';
        $stmt          = $eventPDO->query($query);
        $date          = $stmt->fetch(PDO::FETCH_ASSOC);
        $mySQL_date    = new Datetime($date['date_created']);
        $dateFormatted = $mySQL_date->format('F d, Y \a\t g:i a');
        return $dateFormatted;
    }

/** [setDate: Helper function for createPost to format date/time into mySQL format] */
    public function setDate() {
        date_default_timezone_set('America/New_York');
        $date = new DateTime();
        return $date->format('Y-m-d H:i:s');
    }

}