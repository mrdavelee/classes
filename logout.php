<?php

require_once 'includes/global.inc.php';

$Tools = new Tools();
$Tools->logout();

header("Location: index.php");

?>