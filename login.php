<?php
require_once('connect.php');


if (isset($_SESSION['user_id'])) {
	header('location: dashboard.php', TRUE, 302);
	exit;
}

if (isset($_GET['login'])) {
	if ($_GET['login'] == 'required') {
		echo '<div class="alert alert-danger col-md-offset-4 col-md-4">You </div>';
	}
}
//validating input whether it contains malicious strings or not
if (isset($_POST['submit'])){

    // $fullname= filter_var($_POST['fullname'], FILTER_SANITIZE_STRING);
    $username; filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    // $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    // $confirm_password = filter_var ($_POST['confirm_password'], FILTER_SANITIZE_STRING);

    // if ($name == ''){
    //   echo '<div class= "alert alert-danger">You Must Add Your Name</div>';
    // } elseif ($email == '') {
    //   echo '<div class= "alert alert-danger">You Must Add Your email</div>';
    if ($username =='') {
      echo '<div class= "alert alert-danger">You Must Add Your username</div>';
    } elseif ($password == '') {
      echo '<div class= "alert alert-danger">You Must Add Your password</div>';
    // } elseif ($confirm_password == '') {
    //  echo '<div class= "alert alert-danger">You Must Add Your confirm your password</div>';
    // }elseif ($password != $confirm_password) {
    //    echo '<div class= "alert alert-danger">Your password do not match.</div>';
    // }elseif (! filter_var($_POST('email'), FILTER_VALIDATE_EMAIL)) {
       echo '<div class= "alert alert-danger">Your email address is not valid</div>';
    }

     }else{
          $hash_password = password_hash($password, PASSWORD_DEFAULT);
          $sql = "SELECT id,username,password FROM users WHERE username = '@username'";
          $result = mysqli_query($conn, $sql);
          var_dump($result);

          if ($result->num_rows >0) {
          	$row = mysqli_fetch_assoc($result);
          	if (password_verify($password, $row['password'])) {

          	session_start();
            $_SESSION['user_id'] =$row['id'];
            header('location:dashboard.php', TRUE, 302);
            exit;	
        } 
        else{
        	echo '<div class="alert alert-warning"><b>Login Failed 1</b></div>';
        }
    		// echo '<div class= "alert alert-warning"><b>Login Failed 2</b></div>';
    }
   }


?>


<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<title>login</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<!-- <link rel="stylesheet" href="mystyle.css"> -->
		<!-- <link rel="stylesheet" href="dashboard.html"> -->
</head>
<body>
	<div class="container-fluid">
					<!--   <div class="form">
					 
					    <form class="form-vertical">
					      <input type="text" placeholder="username"/>
					      <input type="password" placeholder="password"/>
					      <button>login</button>
					      <p class="message">Not registered? <a href="register.html">Create an account</a></p>
					    </form>
					  </div>
					</div> -->
	<div class="container col-md-offset-3 col-md-6">
		<form action="" method="POST" role="form">
		<legend>Form title</legend>

		<div class="form-group width = 50%">
			<label for="username">username</label>
			<input type="text" class="form-control" name="username" id="" placeholder="">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="text" class="form-control" name="password" id="" placeholder="">
		</div>

		<div class="container">
			 <p class="message">Not registered? <a href="register.php">Register</a></p>
		</div>
		<div>
		<button type="submit" name="submit" class="btn btn-default"><a href="dashboard.php">Login</a></button>
		</div>
		</form>
	</div>
	</div>
</body>
</html>