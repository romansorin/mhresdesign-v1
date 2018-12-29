<?php
session_start();

/**
 * @author [Roman Sorin] <[<rmaximsorin@gmail.com>]>
 */

require_once 'C:\Users\Roman\Documents\local\post-system\connection.php';
require_once 'C:\Users\Roman\Documents\local\post-system\admin/user.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$conn    = new Connection();
$newsPDO = $conn->connectToDb('news', 'reader', 'readonly');
$newsPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$postObj = new Post();
$postObj->checkStatus();

class Post {
    private $uid;
    private $name;
    private $required_permissions = array();

    //////////////////////
    // Public functions //
    //////////////////////

    public function __construct() {
        if (isset($_SESSION['userID'])) {
            $this->uid = $_SESSION['userID'];
        }

        if (isset($_SESSION['username'])) {
            $this->name = $_SESSION['username'];
        }

        $this->setRequiredPermission('createPost', 'post_create');
        $this->setRequiredPermission('modifyPost', 'post_modify');
        $this->setRequiredPermission('deletePost', 'post_delete');
    }

    /* To solve the previous generatePost() problem with ID, I created a new function
     * redirect which solves the issue. Basically, check the URL parameter for the presence of ?id=
     * and if it is not null, call the actual generatePost() function
     * Otherwise, do nothing
     */
    public function checkStatus() {
        if (isset($_GET['id']) && !empty($_GET['id']) && !isset($_GET['edit'])) {
            $this->generatePost();
        } else if (isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['edit']) && $_GET['edit'] == 'true') {
            /* will have to clean this up down the road
            but this is for testing purposes */
            $this->modifyPost();
        } else if (isset($_POST['createPostSubmit'])) {
            $this->createPost();
        }
    }

/**
 * [printColumn: Used to print a specific part of a post (e.g. title, category, body)]
 * @param  [Integer] $index  [Define a specific index to fetch results from (0, 1, ...)]
 * @param  [String] $column  [Define the desired column (title, category, ...)]
 * @return [String]          [Print the result of the conditional as text]
 */
    public function printColumn($index, $column) {
        $posts_arr = $this->retrieveRows();

        if ($column == 'title') {
            echo $posts_arr[$index]['title'];
        } else if ($column == 'category') {
            echo $posts_arr[$index]['category'];
        } else if ($column == 'content') {
            echo $posts_arr[$index]['content'];
        } else if ($column == 'id') {
            echo $posts_arr[$index]['id'];
        } else if ($column == 'date_created') {
            $id = $posts_arr[$index]['id'];
            echo $this->getDate($id);
        }
    }

///////////////////////
    // Private functions //
    ///////////////////////

/**
 * [createPost: Allow a user to create a post without needing to access the database directly (mimics a CMS)]
 * @return [String] [Responds with status (success, failure)]
 */
    public function createPost() {
        global $newsPDO;

        $req  = $this->getRequiredPermission('createPost');
        $user = new User($this->getID());

        $title      = $_POST['title'];
        $category   = $_POST['category'];
        $content    = $_POST['content'];
        $name       = $this->getUsername();
        $mySQL_date = $this->setDate();

        if ($user->hasPermission($req)) {
            if (empty($title) || empty($category) || empty($content)) {
                header("Location: ../index.php?error=missing_fields");
                exit();
            } else {
                $query = "INSERT INTO news (`title`, `content`, `category`, `date_created`, `author`) VALUES ('$title', '$content', '$category', '$mySQL_date', '$name')";

                $insert_statement = $newsPDO->prepare($query);
                $insert_statement->execute();

                if ($insert_statement) {
                    echo 'Successful';
                    header('Location: ../index.php?status=successful');
                    exit();
                } else {
                    echo 'Not successful';
                }
            }
        } else {
            header("Location: ../index.php?error=no_permissions");
            exit();
        }
    }

/**
 * [modifyPost: Allow a user to modify the content of a post.]
 * @return [String] [Responds with status (success, failure)]
 */
    public function modifyPost() {
        global $newsPDO;
        // add in a date modified display
        $req  = $this->getRequiredPermission('modifyPost');
        $user = new User($this->getID());

        $id     = $_GET['id'];
        $query  = 'SELECT * FROM news WHERE id = ' . $id . ' LIMIT 1';
        $stmt   = $newsPDO->query($query);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $arr = array(
            "title"    => $result['title'],
            "category" => $result['category'],
            "content"  => $result['content'],
            "id"       => $result['id'],
        );

        // later set these privileges
        if ($user->hasPermission($req)): ?>
            <form action="post.php?id=<?=$arr['id']?>&edit=true" method="post">
                <label for="title">Title:</label>
                <input type="text" name="title" value="<?=$arr['title']?>">
                <br><br>
                <label for="category">Category:</label>
                <input type="text" name="category" value="<?=$arr['category']?>">
                <br><br>
                <label for="content">Post:</label>
                <textarea name="content"><?=$arr['content']?></textarea>
                <br><br>
                <input value="Save changes" type="submit" name="modifySubmit">
                <input value="Delete post" type="submit" name="deletePostSubmit">
            </form>
            <?php

        // what if i nested all of the code inside of here?
        if (isset($_POST['modifySubmit'])) {
            // create a modal or some javascript function for confirmation
            $title      = $_POST['title'];
            $category   = $_POST['category'];
            $content    = $_POST['content'];
            $mySQL_date = $this->setDate();

            if (empty($title) || empty($category) || empty($content)) {
                header("Location: index.php?error=missing_fields");
                exit();
            } else {
                $this->updatePost($id, $title, $category, $content, $mySQL_date);
            }

        } else if (isset($_POST['deletePostSubmit'])) {
            $this->deletePost($id);
        }
        ?>
            <?php else: ?>
             <h1>You do not have the necessary permissions.</h1>
         <?php endif;
    }

/**
 * [updatePost: Not directly accessed by the user, but used as a helper method for @modifyPost. Inserts updated information into the database.]
 * @param  [Integer] $id       [References the specific ID of the post.]
 * @param  [String]  $title    [Initial/modified title]
 * @param  [String]  $category [Initial/modified category]
 * @param  [String]  $content  [Initial/modified body or content of post]
 * @return [String]            [Responds with status (success, failure)]
 */
    public function updatePost($id, $title, $category, $content, $date_modified) {
        global $newsPDO;

        $req  = $this->getRequiredPermission('modifyPost');
        $user = new User($this->getID());

        if ($user->hasPermission($req)) {
            $query = "UPDATE news SET title = '$title', content = '$content', category = '$category', date_modified = '$date_modified' WHERE id = " . $id . "";
            $stmt  = $newsPDO->prepare($query);
            $stmt->execute();

            if ($stmt) {
                echo 'Successfully updated post';
            } else {
                echo 'Did not work';
            }
        } else {
            echo 'no permissions';
        }
    }

/**
 * [deletePost: Allows a user to delete a specified post.]
 * @param  [Integer] $id [References the specific ID of the post.]
 * @return [String]      [Responds with status (success, failure)]
 */
    public function deletePost($id) {
        global $newsPDO;

        $req  = $this->getRequiredPermission('deletePost');
        $user = new User($this->getID());

        if ($user->hasPermission($req)) {
            $query = "DELETE FROM news WHERE id = $id";
            $stmt  = $newsPDO->prepare($query);
            $stmt->execute();

            if ($stmt) {
                header("Location: index.php?post_delete=success");
                exit();
            } else {
                header("Location: index.php?post_delete=failure");
                exit();
            }
        } else {
            header("Location: index.php?error=no_permissions");
        }
    }

/** [generatePost: Generates a post specified by the ID] */
    public function generatePost() {
        global $newsPDO;

        $req  = $this->getRequiredPermission('modifyPost');
        $user = new User($this->getID());

        $id     = $_GET['id'];
        $query  = 'SELECT * FROM news WHERE id = ' . $id . ' LIMIT 1';
        $stmt   = $newsPDO->query($query);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        /* Check that a row based off of the id actually exists, otherwise display an error */
        /* This is like the general idea of dynamically generating the page (html) */
        if ($result): ?>
            <h1><?=$result['title']?></h1>
            <h1><?=$result['content']?></h1>
            <h1><?=$result['category']?></h1>
            <?php if ($user->hasPermission($req)): ?><a href="post.php?id=<?=$result['id']?>&edit=true"><h6>Edit</h6></a> <?php endif;
        endif;
    }

/**
 * [retrieveRows: Fetch the latest (5) rows from the table]
 * @return [Array] [Returns an associative array to use in other methods]
 */
    public function retrieveRows() {
        global $newsPDO;

        $query     = "(SELECT * FROM news ORDER BY id ASC) ORDER BY id DESC";
        $stmt      = $newsPDO->query($query);
        $posts_arr = array();

        // Loop through the query 5 times and assign a row to variable $row
        // Assign the row to the posts array, defining the index by the
        // current iteration value of $i
        for ($i = 0; $i < 5; $i++) {
            $row           = $stmt->fetch(PDO::FETCH_ASSOC);
            $posts_arr[$i] = $row;
        }

        return $posts_arr;
    }

/////////////////////////
    // Getters and Setters //
    /////////////////////////

/** [getID: Retrieve ID of user from session] */
    public function getID() {
        return $this->uid;
    }

/** [getUsername: Retrieve username of user from session] */
    public function getUsername() {
        return $this->name;
    }

/**
 * [setRequiredPermission: Define the necessary permissions for a user to use a method]
 * @param [String] $function   [Specify the desired function]
 * @param [String] $permission [Specify the permission that a user requires]
 */
    public function setRequiredPermission($function, $permission) {
        $this->required_permissions[$function] = $permission;
    }

/** [getRequiredPermission: Retrieve permission for a specific method] */
    public function getRequiredPermission($function) {
        return $this->required_permissions[$function];
    }

/** [getDate: Retrieve the date/time which a post was created] */
    public function getDate($id) {
        global $newsPDO;
        $query         = 'SELECT date_created FROM news WHERE id = ' . $id . ' LIMIT 1';
        $stmt          = $newsPDO->query($query);
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