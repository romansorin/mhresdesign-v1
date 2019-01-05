<?php

/**
 * @author [Roman Sorin] <[<rmaximsorin@gmail.com>]>
 */

class User {
    private $userID;

    /**
     * [__construct: Default for use in systems or methods which need authorization]
     * @param [superglobal] $userID [userID is passed in as a $_SESSION integer]
     */
    public function __construct($userID) {
        $this->userID = $userID;
    }

    /**
     * [hasPermission: Check if a user is granted permission for a specific method or action.]
     * @param  [String]  $permission [Permission for a specific method or action is passed in by the calling function]
     * @return boolean               [Evaluates to true or false for authorization]
     */
    public function hasPermission($permission) {

        $conn    = new Connection();
        $userPDO = $conn->connectToDb('users', 'reader', 'readonly');
        $id      = $this->getID();

        /**
         * [$query: Query the user permissions table, passing in the userID and specified method permission]
         */
        $query = "SELECT * FROM user_permissions WHERE userid = {$id} AND permission_name = '" . $permission . "'";
        $stmt  = $userPDO->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();

        if ($result) {
            return true;
        } else {
            return false;
        }

    }

    /** [getID: Accessor method for validating permissions] */
    private function getID() {
        return $this->userID;
    }
}