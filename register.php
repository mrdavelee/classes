<?php 

require_once 'includes/global.inc.php';

//initialize php variables
$username = "";
$password = "";
$password_confirm = "";
$email = "";
$error = "";

//check to see that the form has been submitted
if(isset($_POST['submit-form'])) { 

	//retrieve the $_POST variables
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password_confirm = $_POST['password-confirm'];
	$email = $_POST['email'];

	//initialize variables for form validation
	$success = true;
	$Tools = new Tools();
	
	//validate that the form was filled out correctly
	//check to see if user name already exists
	if($Tools->checkUsernameExists($username))
	{
	    $error .= "That username is already taken.<br/> \n\r";
	    $success = false;
	}

	//check to see if passwords match
	if($password != $password_confirm) {
	    $error .= "Passwords do not match.<br/> \n\r";
	    $success = false;
	}

	if($success)
	{
	    //prep the data for saving in a new user object
	    $data['username'] = $username;
	    $data['password'] = md5($password); //encrypt the password for storage
	    $data['email'] = $email;
	
	    //create the new user object
	    $newUser = new User($data);
	
	    //save the new user to the database
	    $newUser->save(true);
	
	    //log them in
	    $Tools->login($username, $password);
	
	    //redirect them to a welcome page
	    header("Location: welcome.php");
	    
	}

}

?>


<html>
<head>
	<title>Registration</title>

	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
	<?php echo ($error != "") ? $error : ""; ?>

	<div class="container form">

      <form action="register.php" method="post" class="form-signin">
        <h2 class="form-signin-heading">Lets register</h2>
        <label for="inputUsername" class="sr-only">Username</label>
        <input type="text" name="username" value="<?php echo $username; ?>" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
        
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" value="<?php echo $password; ?>" class="form-control" placeholder="Password" required>
        
        <label for="inputPassword" class="sr-only">Password again</label>
        <input type="password" id="inputPassword" name="password-confirm" value="<?php echo $password_confirm; ?>" class="form-control" placeholder="Password again" required>
        
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="Email address" required>
        

        <input class="btn btn-lg btn-primary btn-block" value="Register" name="submit-form" type="submit">
      </form>

    </div>






	
</body>
</html>