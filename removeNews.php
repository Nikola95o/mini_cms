<?php

include "classes.php";

if(!isset($_SESSION)){
	session_start();
}

/*if(!isset($_SESSION['user_id']) || !$_SESSION['logged_in']){
	
	header('Location: login.php');
	
}*/

if(isset($_POST)){
	if(isset($_POST['newsId']) && (User::is_admin() || User::is_superuser())){
		News::removeNews($_POST['newsId']);
	}
}

header("Location: {$_SERVER['HTTP_REFERER']}");

