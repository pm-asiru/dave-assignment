<?php

//This is to start the session if not previously started
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
}

//set the session array to an empty array
$_SESSION = array();

//defining and setting cookies
if (ini_get("session.use_cookies")) {
	$params = session_get_cookie_params();
	setcookie(session_name(), '', time() - 42000,
		$params["path"], $params["domain"],
		$params["secure"], $params["httponly"]
		);
}

// Destroy sessions
session_destroy();


//Redirect to login
header('location: login.php', TRUE, 302);

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	</head>
	<body>
	<div class="container-fluid center">
		<legend>Are You Sure You Want TO Log Out?</legend>
	</div>
	<div class="container-fluid col-md-offset-6">
		<button type="button" class="btn btn-primary center"><i class="fa fa-heart"><a href="login.php">yes</a></i></button>
		<button type="button" class="btn btn-primary center"><i class="fa fa-lock float-md-left"><a href="dashboard.php"> no</a></i></button>
	</div>



		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="js/bootstrap.min.js""></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>