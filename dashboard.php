
<?php
session_start();
if (! isset($_SESSION['user_id'])) {
	header('location: login.php', TRUE, 302);
	exit;
}

?>
<!DOCTYPE html>
<html lang="en">
	<title></title>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="font-awesome/css/font-awesome.css">

	</head>
	<body>
		<h1 class="text-center"><span>Welcome On Board Admin</span></h1>

		<div class="container col-md-offset-4">
			<button class="btn btn-default text-left"><a href="logout.php"><i class="fa fa-lock"> Logout</i></a></button>
			<button class="btn btn-warning text-center"><i class="fa fa-user"> Check for Update</i></button>
			<button class="btn btn-primary text-right"><i class="fa fa-heart"> Manage your account</i></button>
		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="/js/bootstrap.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>