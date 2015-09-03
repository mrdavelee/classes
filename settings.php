<?php 

require_once 'includes/global.inc.php';

//check to see if they're logged in
if(!isset($_SESSION['logged_in'])) {
	header("Location: login.php");
}

//get the user object from the session
$user = unserialize($_SESSION['user']);

//initialize php variables used in the form
$email = $user->email;
$message = "";

//check to see that the form has been submitted
if(isset($_POST['submit-settings'])) { 

	//retrieve the $_POST variables
	$email = $_POST['email'];

	$user->email = $email;
	$user->save();

	$message = "Settings Saved<br/>";
}

//If the form wasn't submitted, or didn't validate
//then we show the registration form again
?>


<html>
<head>
	<title>Change Settings</title>

	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
	<?php echo $message; ?>

	<form action="settings.php" method="post">
	
	E-Mail: <input type="text" value="<?php echo $email; ?>" name="email" /><br/>
	<input type="submit" value="Update" name="submit-settings" />
	
	</form>
</body>
</html>