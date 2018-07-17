<?php

class PDOHandler{
	private function __construct(){}
	
	static function conn($host="localhost",$db="id6518677_web_application",$user="id6518677_webapp",$pass = "webapp"){
		return new PDO("mysql:host={$host};dbname={$db}", "{$user}", "{$pass}");
	}
	
	static function closeConn(PDO $pdo){
		unset($pdo);
	}
}