<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Добавить новую запись</title>
</head>
<body>
	<?php
	var_dump($_SESSION);
		if(!isset($_SESSION["admin"])){
			echo 'СНАЧАЛА ВВОЙДИТЕ НА САЙТ';
		}else{
			?>
			<form name="add" action="config/new_article.php" method="POST" enctype="multipart/form-data">
				<div class="add_article__form">
					<label for="article_name">Название статьи </label>
					<input type="text" name="article_name">
					<label for="article_name"> Автор </label>
					<input type="text" name="article_author">
					<label for="article_name"> Дата </label>
					<input type="date" name="article_date">
					<label for="article_name"> Изображение </label>
					<input type="file" name="article_img">
					<label for="article_name"> Основной материал </label>
					<input type="text" name="article_text">
					<input type="submit" name="article_submit">
				</div>				
			</form>
			<form action="config/logout.php" method="POST">
				<input type="submit" name="admin_logout" value="выход">
			</form> 
			<?php
		}
	?>	
</body>
</html>