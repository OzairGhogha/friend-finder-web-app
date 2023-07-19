<?php
require('Views/template/header.phtml');
require_once('Models/UsersDataSet.php');


$view = new stdClass();
$view->pageTitle = 'Friends List';


$usersDataSet= new UsersDataSet();
//$user = new Users();


//if search button is clicked
if (isset($_POST['search']))
{
    $searchTerm = $_POST["search"];
    // only show records that match the entered search term
    $view->usersDataSet=$usersDataSet->fetchSomeUserInfo($searchTerm);}
//elseif(isset($_SESSION['id']))
//{
//    $view->usersDataset = $usersDataSet->fetchALlUsersFriends($user);
//}
else
{
    // show the default of all records
    $view->usersDataSet = $usersDataSet->fetchAllUserInfo();}


require_once('Views/friendsList.phtml');
require('Views/template/footer.phtml');
