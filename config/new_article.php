<?php
header('Location: ../admin.php');
require_once 'db.php';
	if( $_POST['article_name'] != "" && $_POST['article_author'] != "" && $_POST['article_date'] != "" && $_POST['article_text'] != "" ) 
	{

		/* Загрузка изображения */
		if ($_FILES["article_img"]["size"] > 10240 * 3 * 10240){
			echo ("sry, img too big");
			exit;
		} else
		if (is_uploaded_file($_FILES["article_img"]["tmp_name"]))
		{
			move_uploaded_file($_FILES["article_img"]["tmp_name"], "../img/blog/".$_FILES["article_img"]["name"]);
		} else {
			echo "error to upload file";
		}

		/* Загрузка данных в бд */
		$new_article_name = $_POST['article_name'];
		$new_article_author = $_POST['article_author'];
		$new_article_date = $_POST['article_date'];
		$new_article_img = "img/blog/".$_FILES["article_img"]["name"];
		$new_article_text = $_POST['article_text'];
		$new_article = mysqli_query($connection, "INSERT INTO `articles` (name, author, date, img, text) VALUES ('$new_article_name','$new_article_author','$new_article_date','$new_article_img','$new_article_text')");
		
	} else{
		echo 'some fields are empty';
	}
?>
