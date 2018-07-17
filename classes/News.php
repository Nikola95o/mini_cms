<?php
//require_once("./classes.php");

class News{
	private $id;
	private $title;
	private $text;
	private $date_posted;
	private $User_id;
	private $username;
	private $Category_name;
	private $Category_id;

	static function getNews($cat=false){
	  $pdo = PDOHandler::conn();
	  $sql = "select N.id,N.title,N.text,N.date_posted,U.username,C.name as Category_name,N.Category_id,N.User_id from news N JOIN user U ON N.User_id = U.id JOIN category C ON N.Category_id = C.id";
	  if($cat){
		  $sql .= " where C.id = {$cat}";
	  }
	  $sql .= " order by date_posted desc";
	  $rez = $pdo->query($sql);
	  $rez = $rez->fetchAll(PDO::FETCH_CLASS, 'News');
	  return $rez;
	}
	static function printNews($arr){
	  foreach($arr as $row){
		  echo "<div class='newsBox'>";
		  echo "<div class='newsTitle cf'><h2>";
		  echo Category::getName($row->Category_id).":&nbsp;&nbsp;&nbsp;&nbsp;";
		  echo "{$row->title}</h2>";
		  if(User::is_admin() || User::is_superuser()){
			  echo "<form class=\"removeForm\" action=\"removeNews.php\" method=\"post\">";
			  echo "<input name=\"newsId\" type=\"text\" hidden value=\"{$row->id}\">";
			  echo "<input type=\"submit\" value=\"Remove News\"></form>";
		  }
		  echo "</div>";
		  echo "<p class='newsAuthor'>Posted by: {$row->username}</p>";
		  echo "<p>Date Posted: {$row->date_posted}</p>";
		  echo "<p>{$row->text}</p>";
		  Comment::showComments(Comment::getComments($row->id));
		  echo "<form action=\"addComment.php\" method=\"post\"><input name=\"newsId\" type=\"text\" hidden value=\"{$row->id}\"><textarea name=\"newComment\" class=\"newComment\" cols=\"70\" rows=\"2\"></textarea><br><input type=\"submit\" value=\"Comment\"></form>";
		  echo "</div>";
	  }
	}
	static function addNews($Category_id,$title,$text,$User_id){
		if(Category::is_in_category($Category_id)){
			$pdo = PDOHandler::conn();
			$rez = $pdo->exec("insert into news values(null,'{$title}','{$text}',NOW(),'{$User_id}','{$Category_id}')");
			PDOHandler::closeConn($pdo);
		}else{
			return false;
		}
		
	}
	static function removeNews($id){
	  $pdo = PDOHandler::conn();
	  $rez = $pdo->exec("delete from news where id = '{$id}'");
	  PDOHandler::CloseConn($pdo);
	}
}

 ?>
