<?php

class Session{
  private function __construct(){}
  
  static function start(){
	  if(!isset($_SESSION)){
		  session_start();
	  }
  }
  
  static function set($name,$value){
	  $_SESSION["{$name}"] = $value;
  }
  
  static function get($name){
	  if(Session::exists(["{$name}"])){
		  return $_SESSION["{$name}"];
	  }else{
		  return false;
	  }
  }
  
  static function exists(Array $arr = []){
	  if(isset($_SESSION)){
		  foreach($arr as $val){
			  if(!isset($_SESSION["{$val}"])){
				  return false;
			  }
		  }return true;
	  }else{
		  return false;
	  }
  }
}

 ?>
