<?php
require_once('connect.php');

//validating input whether it contains malicious strings or not
if (isset($_POST['submit'])){

    $fullname= filter_var($_POST['fullname'], FILTER_SANITIZE_STRING);
    $username; filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $confirm_password = filter_var ($_POST['confirm_password'], FILTER_SANITIZE_STRING);

    if ($name == '') {
      echo '<div class= "alert alert-danger">You Must Add Your Name</div>';
    } elseif ($email == '') {
      echo '<div class= "alert alert-danger">You Must Add Your email</div>';
    } elseif ($username == '') {
      echo '<div class= "alert alert-danger">You Must Add Your username</div>';
    } elseif ($password == '') {
      echo '<div class= "alert alert-danger">You Must Add Your password</div>';
    } elseif ($confirm_password == '') {
     echo '<div class= "alert alert-danger">You Must Add Your confirm your password</div>';
    }elseif ($password != $confirm_password) {
       echo '<div class= "alert alert-danger">Your password do not match.</div>';
    }elseif (! filter_var($_POST('email'), FILTER_VALIDATE_EMAIL)) {
       echo '<div class= "alert alert-danger">Your email address is not valid</div>';
    }

     else{
          $hash_password = password_hash($password, PASSWORD_DEFAULT);
          $sql = "INSERT INTO users ('id','name','username','email','password') VALUES ('NULL', '$fullname', '$username', '$email', '$hash_password')";
          $result = mysqli_query($conn, $sql);

          if ($result) {
        
            session_start();
            $_SESSION['user_id'] = mysqli_insert_id($conn);
            header('location:dashboard.php', TRUE, 302);
            exit;
          }
        else{
          echo '<div class="alert alert-warning"><b>Login Failed 1</b>'.$name. mysqli_error($conn).' <b></div>';
        }
    }
}


?>





<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.css">

  
      <!-- <link rel="stylesheet" href="mystyle.css"> -->

  
</head>
<style>
	body{
		color: #oooooo;
		/* background: #aaa; */
	}
	div .container-fluid{
		background: #ccc;
		border-radius: 8px;
		border:1px solid #000;
	}
	form{
		color: orange;
		border: 2px solid #000;
	}
	input{
		box-shadow: 10px solid;
	}
</style>
<!-- style stops here -->

<body>




<form action="<?php $_SERVER[$_SELF] ?>" method="POST" role="form">
<div class="container-fluid col-md-offset-3 col-md-6">
  <legend class="center">Sign Up</legend>

  <div class="form-group">
    <label for="fullname">Fullname</label>
    <input type="text" class="form-control" id="" name="fullname"required value="<?php if(isset($_POST['password'])) ?>" placeholder="fullname">
  </div>

  <div class="form-group">
    <label for="username">username</label>
    <input type="text" class="form-control" id="" name="username"required value="<?php if (isset($_POST['password'])) ?>" placeholder="username">
  </div>
    <div class="form-group">
    <label for="email">email</label>
    <input type="email" class="form-control" id="" name="email"required value="<?php if (isset($_POST['password'])) ?>" placeholder="email">
  </div>
  <div class="form-group">
    <label for="password">password</label>
    <input type="password" class="form-control" id="" name="password"required value="<?php if (isset($_POST['password'])) ?>" placeholder="password">
  </div>

  <div class="form-group">
    <label for="confirm_password">confirm password</label>
    <input type="password" class="form-control" id="" name="password"required placeholder="confirm_password">
  </div>
  <div>
  <button type="submit" name="submit" class="btn btn-default"><a href="dashboard.php">Submit</a></button>
  </div>
  <br />

   <div class="container">
    <a href="#">Forgot Password?</a>
   
  </div>
  </div>
</form>  
</body>
</html>
