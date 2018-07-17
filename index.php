<?php
require_once("classes.php");

Session::start();

if(!Session::exists(['user_id','username'])){
	
	header('Location: login.php');
	
}else{

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
		<div id="content">
			<?php
			if(isset($_GET)){
				if(isset($_GET['category'])){
					News::printNews(News::getNews($_GET['category']));
				}else{
					News::printNews(News::getNews());
				}
			}


			?>
		</div>
	</div>
	
</body>
</html>

<?php
}
?>