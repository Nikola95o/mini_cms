<div id="mainNav">
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="">Category</a>
				<?php
				
				Category::printCategory();
				
				?>
		</li>
		<?php
			if(User::is_admin() || User::is_superuser()){
				echo '<li><a href="addNews.php">Add News</a></li>';
			}
			if(User::is_superuser()){
				echo '<li><a href="addAdmin.php">Add Admin</a></li>';
			}
		?>
		<li><a href="logout.php">Log Out</a></li>
	</ul>
</div>