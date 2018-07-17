<?php

require_once("classes.php");

Session::start();

if(!isset($_SESSION['logged_in']) && !User::is_superuser()){
	
	header('Location: login.php');
	
}else{
	
	if($_POST){
		if(isset($_POST['username']) && isset($_POST['password'])){
			$username = trim($_POST['username']);
			$password = md5(trim($_POST['password']));
			User::addAdmin($username,$password);
		}
	}
	
	?>
	
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<?php 
		require_once("includes.php");
	?>
</head>
<body>
<div id="wrapper">
	<div id="mainHeader" class="cf">
		<?php 
			require_once("header.php");
		?>
	</div>
	<div id="mainNav">
		<?php 
		require_once("navigation.php");
		?>
	</div>
	<form action="" method="post">
		<label for="username">Username: </label>
		<input type="text" name="username"><br>
		<label for="password">Password: </label>
		<input type="password" name="password"><br>
		<input type="submit" value="Create admin">
	</form>
</div>
</body>
</html>
	<?php
}