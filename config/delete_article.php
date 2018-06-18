<?php
	header("Location: ../admin.php");
	require_once '../config/db.php';

	/* Загрузка изображения */
		if ($_FILES["article_img"]["size"] > 10240 * 3 * 10240){
			echo ("sry, img too big");
			exit;
		} else
		if (is_uploaded_file($_FILES["article_img"]["tmp_name"]))
		{
			move_uploaded_file($_FILES["article_img"]["tmp_name"], "../img/blog/".$_FILES["article_img"]["name"]);
			$new_article_img = "img/blog/".$_FILES["article_img"]["name"];
		} else {
			echo "error to upload file";
			$new_article_img = $_POST["ds_change_img"];
		}

		/* Изменение данных в бд */
		if (isset($_POST['ds_change_submit'])){
			$change_id = $_GET["id"];
			mysqli_query($connection, "UPDATE `articles` SET `name` = '$new_article_name', `author` = '$new_article_author', `date` = '$new_article_date', `img` = '$new_article_img', `text` = '$new_article_text' WHERE `id` = '$change_id' ");
		}	

?>