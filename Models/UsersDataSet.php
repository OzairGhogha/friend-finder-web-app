<?php

require_once ('Models/Database.php');
require_once ('Models/UsersData.php');

class UsersDataSet {
    private $db;

    public function __construct(){
        $this->db = new Database;
        $this->db = $this->db->getdbConnection();
    }
    //fetches all user data from the table
    public function fetchAllUserInfo()
    {
        $sqlQuery = ('SELECT * FROM usertable');
        $statement = $this->db->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        //creating an array to store the results
        $dataSet = [];
        //looping through results and storing them using an object
        while ($row = $statement->fetch()) {
            $dataSet[] = new UsersData($row);
        }
        return $dataSet;
    }

    // used for search function to return values similar to users input
    public function fetchSomeUserInfo($searchText) {
        //filters by firstname or lastname or user id or username
        $sqlQuery = ("SELECT * FROM usertable WHERE firstName LIKE '%". $searchText . "' OR lastName LIKE '%". $searchText . "' or id LIKE '". $searchText . "%' or username LIKE '%". $searchText . "'");
	    $statement = $this->db->prepare($sqlQuery);// prepare a PDO statement
        $statement->execute();// execute the PDO statement
        //creating an array to store the results
        $dataSet = [];
        //looping through results and storing them using an object
        while ($row = $statement->fetch()) {
            $dataSet[] = new UsersData($row);
        }
            return $dataSet;
    }
}
