<?php
require_once("classes.php");

Session::start();

if(isset($_POST)){
	if(isset($_POST['newComment']) && isset($_POST['newsId']) && User::is_logged_in()){
		Comment::addComment($_POST['newComment'],$_POST['newsId'],$_SESSION['user_id']);
	}
}

header("Location: {$_SERVER['HTTP_REFERER']}");