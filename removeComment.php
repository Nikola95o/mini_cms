<?php

include "classes.php";

if(!isset($_SESSION)){
	session_start();
}

/*if(!isset($_SESSION['user_id']) || !$_SESSION['logged_in']){
	
	header('Location: login.php');
	
}*/

if(isset($_POST)){
	if(isset($_POST['commentId']) && isset($_POST['userId'])){
		Comment::removeComment($_POST['commentId'],$_POST['userId']);
	}
}

header("Location: {$_SERVER['HTTP_REFERER']}");