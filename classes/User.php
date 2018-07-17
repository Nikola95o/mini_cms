<?php

class User{
	private $id;
	private $username;
	private $rank;
	private $logged_in;
	
	private function __construct(){}
	
	static function searchUser($user){
		
		$pdo = PDOHandler::conn();
		var_dump($pdo);
		sleep(3);
		$rez = $pdo->query("select id,username,rank,logged_in from User where username='{$user}'");
		PDOHandler::CloseConn($pdo);
		
		$rez = $rez->fetchAll(PDO::FETCH_CLASS, 'User');
		if(count($rez) == 1){
			foreach($rez as $red){
				return $red;
			}
		}else{
			return false;
		}
	}
	
	static function is_valid($user,$pass){
		
		$pdo = PDOHandler::conn();
		$rez = $pdo->query("select * from user where username='{$user}' and password='{$pass}'");
		PDOHandler::CloseConn($pdo);
		$rez = $rez->fetchAll(PDO::FETCH_CLASS, 'User');
		if(count($rez) == 1){
			foreach($rez as $red){
				if($red->username && $red->password){
					return true;
				}else{
					return false;
				}
			}
		}
		
	}
	
	static function login($user,$pass){
		
		
		$pdo = PDOHandler::conn();
		if(User::is_valid($user,$pass)){
			
			$pdo->exec("update user set logged_in=1 where username='{$user}' and password='{$pass}'");
			PDOHandler::CloseConn($pdo);
			//$_SESSION['logged_in'] = true;
			$u = User::searchUser($user);
			Session::set('user_id',$u->id);
			Session::set('username',$u->username);
			//$_SESSION['user_id'] = $u->id;
			//$_SESSION['username'] = $u->username;
			//$_SESSION['rank'] = $u->rank;
			return true;
		}else{
			return false;
		}
		
	}
	
	static function is_logged_in(){
		if(Session::exists(['username'])){
			$user = User::searchUser($_SESSION['username']);
			if(count($user) == 1){
				if($user->logged_in == 1){
					return true;
				}
			}
		}
		return false;
	}
	
	static function logout(){
		$user_id = Session::get('user_id');
		$pdo = PDOHandler::conn();
		$pdo->exec("update user set logged_in=0 where id='{$user_id}'");
		session_destroy();
	}
	
	static function register($user,$pass){
		
		$pdo = PDOHandler::conn();
		if(!User::searchUser($user)){
			$pdo->exec("insert into user values(null,'{$user}','{$pass}',0,0)");
			PDOHandler::CloseConn($pdo);
			User::login($user,$pass);
			var_dump($_SESSION);
		}else{
			echo "username already exists";
		}
	}
	
	static function is_admin(){
		if(Session::exists(['username'])){
			$user = User::searchUser($_SESSION['username']);
			if($user->rank == 1){
				return true;
			}else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	
	static function is_superuser(){
		if(Session::exists(['username'])){
			$user = User::searchUser(Session::get('username'));
			if($user->rank == 2){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	static function addAdmin($user,$pass){
		if(User::is_superuser()){
			$pdo = PDOHandler::conn();
			$pdo->exec("insert into user values(null, '{$user}', '{$pass}', '1', '0')");
		}
	}
}

 ?>
