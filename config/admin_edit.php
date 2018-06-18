<?php
	require_once 'db.php';
	$change_id = $_GET["id"];

		if (!isset($_SESSION['admin'])){
		/* Загрузка изображения */
				if ($_FILES["article_img"]["size"] > 1024 * 3 * 1024){
					exit;
				} else
				if (is_uploaded_file($_FILES["article_img"]["tmp_name"]))
				{
					move_uploaded_file($_FILES["article_img"]["tmp_name"], "../img/blog/".$_FILES["article_img"]["name"]);
					$new_article_img = "img/blog/".$_FILES["article_img"]["name"];
					mysqli_query($connection, "UPDATE `articles` SET `img` = '$new_article_img' WHERE `id` = '$change_id' ");
				}
		if(($_GET['id'])!=""){
				/* Изменение данных в бд */

					$header = "Location: ../admin_edit.php?id=" . $_GET['id'];
					if(isset($_POST["name"])){
						$new_article_name = $_POST['name'];
						mysqli_query($connection, "UPDATE `articles` SET `name` = '$new_article_name' WHERE `id` = '$change_id' ");

					}
					if(isset($_POST["author"])){
						$new_article_author = $_POST['author'];
						mysqli_query($connection, "UPDATE `articles` SET `author` = '$new_article_author' WHERE `id` = '$change_id' ");

					}
					if(isset($_POST["date"])){
						$new_article_date = $_POST['date'];
						mysqli_query($connection, "UPDATE `articles` SET `date` = '$new_article_date' WHERE `id` = '$change_id' ");
					}
					if(isset($_POST["textareaBox"])){
						$new_article_text = $_POST['textareaBox'];
						mysqli_query($connection, "UPDATE `articles` SET `text` = '$new_article_text' WHERE `id` = '$change_id' ");
					}
					
				/* Удаление из бд */
				if (isset($_POST['ds_delete_submit'])){
						mysqli_query($connection, "DELETE FROM `articles` WHERE `id` = '$change_id' ");
						$header = "Location: ../admin.php";

				}
		}else{
			/* Новая запись в БД */
			$new_article_name = $_POST['name'];
			$new_article_author = $_POST['author'];
			$new_article_date = $_POST['date'];
			$new_article_text = $_POST['textareaBox'];
			mysqli_query($connection, "INSERT INTO `articles` (name, author, date, img, text) VALUES ('$new_article_name','$new_article_author','$new_article_date','$new_article_img','$new_article_text')");
			$header = "Location: ../admin.php";

	}
	}else{
		
	}
	header($header);

?>