<?php

require_once 'classes/User.class.php';
require_once 'classes/Tools.class.php';
require_once 'classes/DB.class.php';

//connect to the database
$db = new DB();
$db->connect();

//instantiate Tools object
$Tools = new Tools();

//start the session
session_start();

if(isset($_SESSION['logged_in'])) {
	$user = unserialize($_SESSION['user']);
	$_SESSION['user'] = serialize($Tools->get($user->id));
}
?>