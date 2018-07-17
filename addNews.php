<?php
require_once("classes.php");

if(!isset($_SESSION)){
	session_start();
}

if(isset($_SESSION['user_id']) && (User::is_admin() || User::is_superuser())){
	if(isset($_POST)){
		if(isset($_POST['category']) && isset($_POST['title']) && isset($_POST['text'])){
			News::addNews($_POST['category'],$_POST['title'],$_POST['text'],$_SESSION['user_id']);
		}
	}
	?>
	
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<?php 
		require_once("includes.php");
	?>
</head>
<body>
<div id="wrapper">
	<div id="mainHeader" class="cf">
		<?php 
			require_once("header.php");
		?>
	</div>
	<div id="mainNav">
		<?php 
		require_once("navigation.php");
		?>
	</div>
	<form action="" method="post" class="addNews">
		<div class="formControl">
			<label for="category">Select category: </label><br>
			<?php
			Category::selectCategory();
			?>
		</div>
		<div class="formControl">
			<label for="title">Title: </label><br>
			<input type="text" name="title"><br>
		</div>
		<div class="formControl">
			<label for="text">Text: </label><br>
			<textarea name="text" id="" cols="125" rows="20"></textarea><br>
		</div>
		
		
		<input type="submit" value="Post">
	</form>
</div>
</body>
</html>
	
	<?php
	
}else{
	header('Location: login.php');
}

?>
