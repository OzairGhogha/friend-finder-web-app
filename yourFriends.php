
<link href="css/my-style.css" rel="stylesheet" type="text/css">
<?php
$view = new stdClass();
$view->pageTitle = 'Your Friends';
require_once('Views/yourFriends.phtml');
require_once('Models/FriendshipDataSet.php');
require_once('Models/User.php');
require_once('Models/UsersDataSet.php');
$friendshipDataSet = new FriendshipDataSet();
$user = new User();
$usersDataSet= new UsersDataSet();

if(isset($_SESSION['id'])){
    //show all friends
    $view->friendshipDataSet = $friendshipDataSet->fetchAllUsersFriends($_SESSION['id']);

}
