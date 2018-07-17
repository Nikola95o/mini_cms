<?php

if(!isset($_SESSION)){
	session_start();
}
require_once("classes.php");

User::logout();

header('Location: login.php');