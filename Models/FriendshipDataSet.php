<?php
require_once ('Models/Database.php');
require_once ('Models/FriendshipData.php');
class FriendshipDataSet
{

//    public function get_all_friends($my_id, $send_data){
//        try{
//            $sql = "SELECT * FROM `friendship` WHERE fromUser = :my_id OR toUser = :my_id";
//            $stmt = $this->db->prepare($sql);
//            $stmt->bindValue(':my_id',$my_id, PDO::PARAM_INT);
//            $stmt->execute();
//
//            if($send_data){
//
//                $return_data = [];
//                $all_users = $stmt->fetchAll(PDO::FETCH_OBJ);
//
//                foreach($all_users as $row){
//                    if($row->user_one == $my_id){
//                        $get_user = "SELECT id, username, photoname FROM `usertable` WHERE id = ?";
//                        $get_user_stmt = $this->db->prepare($get_user);
//                        $get_user_stmt->execute([$row->user_two]);
//                        array_push($return_data, $get_user_stmt->fetch(PDO::FETCH_OBJ));
//                    }else{
//                        $get_user = "SELECT id, username, photoname FROM `usertable` WHERE id = ?";
//                        $get_user_stmt = $this->db->prepare($get_user);
//                        $get_user_stmt->execute([$row->user_one]);
//                        array_push($return_data, $get_user_stmt->fetch(PDO::FETCH_OBJ));
//                    }
//                }
//
//                return $return_data;
//
//            }
//            else{
//                return $stmt->rowCount();
//            }
//        }
//        catch (PDOException $e) {
//            die($e->getMessage());
//        }
//    }


    private $db;

    public function __construct()
    {
        $this->db = new Database;
        $this->db = $this->db->getdbConnection();
    }

    public function fetchAllUsersFriends($user)
    {
//        $sqlQuery = ('SELECT * FROM(SELECT * FROM usertable WHERE usertable.id in ( SELECT fromUser AS friend FROM friendship WHERE (friendship.fromUser = $user OR friendship.toUser = $user) UNION SELECT toUser AS friend FROM friendship WHERE(friendship.fromUser = $user OR friendship.toUser = $user) AND usertable.id != $user))
//        ping INNER JOIN friendship WHERE (fromUser=ping.id AND toUser=$user) OR (fromUser=$user AND toUser=ping.id)');
        $sqlQuery = ('SELECT * FROM friendship');

        $statement = $this->db->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new FriendshipData($row);
        }
        return $dataSet;
    }

    public function sendFriendRequest($fromUserID, $toUserID)
    {
        $sqlQuery = ('INSERT INTO friendship (fromUser, toUser) VALUES ($fromUserID, $toUserID)');
        $statement = $this->db->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute();
        return $statement;

    }

    public function acceptFriendRequest($fromUserID)
    {
        $sqlQuery = ('UPDATE friendship SET userStatus = 2 WHERE friendshipID=$fromUserID ');
        $statement = $this->db->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute();
        return $statement;

    }

    public function removeFriendRequest($fromUserID)
    {
        $sqlQuery = ('DELETE FROM friendship WHERE friendshipID=$fromUserID ');
        $statement = $this->db->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute();
        return $statement;

    }
}