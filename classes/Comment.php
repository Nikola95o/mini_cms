<?php

class Comment{
	private $id;
	private $text;
	private $date_posted;
	private $username;
	private $user_id;

	static function getComments($news){
	  $pdo = PDOHandler::conn();
	  $rez = $pdo->query("select CM.id,CM.text,CM.date_posted,U.username,U.id as user_id from Comment as CM join News N on CM.news_id = N.id join user U on CM.user_id = U.id where N.id = {$news}");
	  $rez = $rez->fetchAll(PDO::FETCH_CLASS, 'Comment');
	  return $rez;
	}
	static function is_comment_owner($user_id){
	  if(isset($_SESSION)){
		  if(isset($_SESSION['user_id'])){
			  if($_SESSION['user_id'] == $user_id){}
		  }
	  }
	}
	static function showComments($rez){
	  foreach($rez as $red){
		  echo "<div style='border:1px solid red;padding:10px;margin:4px;' class='commentBox'>";
		  if(User::is_admin() || User::is_superuser() || Comment::is_comment_owner($red->user_id)){
			  echo "<form class=\"removeForm\" action=\"removeComment.php\" method=\"post\">";
			  echo "<input type=text hidden name=\"commentId\" value=\"{$red->id}\"><input type=\"text\" hidden name=\"userId\" value=\"{$red->user_id}\">";
			  echo "<input type=\"submit\" value=\"Remove Comment\"></form>";
		  }
		  echo "<p>Commented on: {$red->date_posted}</p><p>Commented By: {$red->username}</p><p class='textBox'>{$red->text}</p></div>";
		  
	  }
	}
	static function addComment($text,$news_id,$user_id){
		$text = trim($text);
		$pdo = PDOHandler::conn("localhost","web_application","root");
		$pdo->exec("insert into comment values(null,'{$text}',now(),'{$news_id}','{$user_id}')");
	}
	static function removeComment($id,$user_id){
	  $pdo = PDOHandler::conn("localhost","web_application","root");
	  $sql = "select CM.id,CM.text,CM.date_posted,U.id as user_id from Comment as CM join user U on CM.user_id = U.id where CM.id = {$id}";
	  $rez = $pdo->query($sql);
	  $rez = $rez->fetchAll(PDO::FETCH_CLASS, 'Comment');
	  foreach($rez as $red){
		  if($red->user_id == $user_id || User::is_admin() || User::is_superuser()){
			  $pdo = PDOHandler::conn("localhost","web_application","root");
			  $rez = $pdo->exec("delete from comment where id='{$red->id}'");
		  }
	  }
	  
	}
}

 ?>
