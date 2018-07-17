<?php

class Category{
	private $id;
	private $name;


	static function getCategory($cat = false){
		$sql = "select id,name from Category";
		if($cat){
			$sql .= " where id='{$cat}'";
		}
		$pdo = PDOHandler::conn();
		$rez = $pdo->query($sql);
		PDOHandler::CloseConn($pdo);
		$rez = $rez->fetchAll(PDO::FETCH_CLASS, 'Category');
		return $rez;
	}
	static function getName($id){
		$rez = Category::getCategory($id);
		foreach($rez as $red){
			return $red->name;
		}
	}

	static function printCategory(){
		$arr = Category::getCategory();
		echo "<ul>";
		foreach($arr as $red){
		  echo "<li><a href=\"index.php?category={$red->id}\">{$red->name}</a></li>";
		}
		echo "</ul>";
	}

	static function selectCategory(){
		$arr = Category::getCategory();
		echo "<select name=\"category\">";
		foreach($arr as $red){
		  echo "<option value=\"{$red->id}\">{$red->name}</option>";
		}
		echo "</select>";
	}
	static function is_in_category($category){
		$cats = Category::getCategory();
		foreach($cats as $cat){
			if($cat->id == $category){
				return true;
			}
		}return false;
	}
}

 ?>
