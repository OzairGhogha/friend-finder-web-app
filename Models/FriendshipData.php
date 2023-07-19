<?php

class FriendshipData {

    protected  $_friendshipID, $_fromUser, $_toUser, $_userStatus;

    public function __construct($dbRow) {
        $this->_friendshipID = $dbRow['friendshipID'];
        $this->_fromUser = $dbRow['fromUser'];
        $this->_toUser = $dbRow['toUser'];
        $this->_userStatus = $dbRow['userStatus'];

    }

    public function getFriendshipID() {
        return $this->_friendshipID;
    }
    public function getFromUser() {
        return $this->_fromUser;
    }
    public function getToUser() {
        return $this->_toUser;
    }
    public function getUserStatus() {
        return $this->_userStatus;
    }

}