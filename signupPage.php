<link href="css/my-style.css" rel="stylesheet" type="text/css">
<?php
$view = new stdClass();
$view->pageTitle = 'signupPage';
require_once('Views/signupPage.phtml');
require_once('Models/User.php');


