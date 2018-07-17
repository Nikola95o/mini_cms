<?php
require_once "classes.php";

Session::start();



if(isset($_POST)){
	if(isset($_POST['username']) && isset($_POST['password'])){
		if(!User::Login(trim($_POST['username']),md5(trim($_POST['password'])))){
			echo "Wrong username or password!";
		}
	}
}

if(isset($_SESSION['user_id']) && User::is_logged_in()){
	
	header('Location: index.php');
	
}

?>

<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="css/start.css" type="text/css" rel="stylesheet">
</head>
<body>
<div id="wrapper">
	<div id="header">
		LOGIN
	</div>
	<div id="content">
		<form action="" method="post">
		<div class="formControl cf">
			<label for="username">Username:</label>
			<input type="text" name="username">
		</div>
		<div class="formControl cf">
			<label for="password">Password:</label>
			<input type="password" name="password">
		</div>
		<div class="formControl cf">
			<a href="register">Register</a>
			<input type="submit" value="Log In">
		</div>
	</div>
	
</div>
	
</body>
</html>