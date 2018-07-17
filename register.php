<?php
include "classes.php";

Session::start();

if(isset($_POST)){
	if(isset($_POST['username']) && isset($_POST['password'])){
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		if($username != "" && $password != ""){
			$password = md5($password);
			User::register($username,$password);
		}else{
			echo "Enter both values";
		}
	}
}


if(isset($_SESSION)){
	if(isset($_SESSION['user_id'])){
		if(User::is_logged_in()){
			header('Location: index.php');
		}
	}
}

?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
	 <link href="css/start.css" type="text/css" rel="stylesheet">
     <title></title>
   </head>
   <body>
<div id="wrapper">
	<div id="header">
		REGISTER
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
			<a href="login.php">Log In</a>
			<input type="submit" value="Register">
		</div>
	</div>
	
</div>
   </body>
 </html>
