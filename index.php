<?php

require_once 'includes/global.inc.php';
?>

<html>
<head>
	<title>Homepage</title>

	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>

<?php if(isset($_SESSION['logged_in'])) : ?>
	<?php $user = unserialize($_SESSION['user']); ?>
	Hello, <?php echo $user->username; ?>. You are logged in. <a href="logout.php">Logout</a> | <a href="settings.php">Change Email</a>
<?php else : ?>
	You are not logged in. <a href="login.php">Log In</a> | <a href="register.php">Register</a>
<?php endif; ?>

</body>
</html>