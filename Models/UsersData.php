<?php

class UsersData {

    protected $_id, $_username, $_password, $_firstname, $_lastname, $_photoname, $_longitude, $_latitude;
    //setting database fields for use
    public function __construct($dbRow) {
        $this->_id = $dbRow['id'];
        $this->_username = $dbRow['username'];
        $this->_password = $dbRow['password'];
        $this->_firstname = $dbRow['firstname'];
        $this->_lastname = $dbRow['lastname'];
        $this->_photoname = $dbRow['photoname'];
        $this->_longitude = $dbRow['longitude'];
        $this->_latitude = $dbRow['latitude'];
    }
    //accessor methods
    public function getUserID() {
        return $this->_id;
    }

    public function getUsername() {
        return $this->_username;
    }

    public function getPassword() {
        return $this->_password;
    }

    public function getFirstName() {
        return $this->_firstname;
    }

    public function getLastName() {
        return $this->_lastname;
    }

    public function getPhotoName() {
        return $this->_photoname;
    }

    public function getLongitude() {
        return $this->_longitude;
    }

    public function getLatitude() {
        return $this->_latitude;
    }
}

