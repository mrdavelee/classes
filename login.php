<?php

require_once 'includes/global.inc.php';

$error = "";
$username = "";
$password = "";

//check to see if they've submitted the login form
if(isset($_POST['submit-login'])) { 

	$username = $_POST['username'];
	$password = $_POST['password'];

	$Tools = new Tools();
	if($Tools->login($username, $password)){ 

		header("Location: index.php");
	}else{
		$error = "Incorrect username or password. Please try again.";
	}
}
?>

<html>
<head>
	<title>Login</title>

	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>

<?php

if($error != "")
{
    echo $error."<br/>";
}
?>
<div class="container form">

      <form action="login.php" method="post" class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" name="username" value="<?php echo $username; ?>" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" value="<?php echo $password; ?>" class="form-control" placeholder="Password" required>
        
        <input class="btn btn-lg btn-primary btn-block" value="Login" name="submit-login" type="submit">
      </form>

    </div>



	    <div id="alt-reg">Or <a href="register.php">register</a></div>

</body>
</html>