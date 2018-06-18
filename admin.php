<?php
	session_start();
	require_once 'config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Админ панель</title>
	<?php
		require_once'../lips.php';
	?>
		<script type="text/javascript">
			$(document).ready(function(){
				$("input[name='ds_submit']").click(function(event){
					if ($("input[name='ds_login']").val()==""){
						event.preventDefault();
						$(".ds_auth_error").text("Введите логин!");
					}else if (($("input[name='ds_pass']").val()=="")){
						event.preventDefault();
						$(".ds_auth_error").text("Введите пароль!");
					}		
				})
				$(".modal_mask").click(function(){
					$(this).hide();
					$(".new_article").hide();
					$(".big_editor").hide();
				});
				$(".new_article__close").click(function(){
					$(".new_article").hide();
					$(".modal_mask").hide();
				});
				$("input[name='ds_delete_submit']").click(function(e){
					if (confirm("Удалить статью?")) {
						    alert("Статья удалена");
						} else{
						    e.preventDefault();
						}
				});
				$("input[name='ds_change_submit']").click(function(e){
					e.preventDefault();
					var article_id = $(this).parent().parent().children("form").attr("name");
					location.replace("admin_edit.php?id=" + article_id);
				});
					$("input[name='ds_change_text']").replaceWith(function () {
						var convert_text = '<div class="'+this.className+'">'+this.value+'</div>';
						convert_text = convert_text.substr(0,50);
						convert_text = convert_text + "...";
					  return convert_text;
					});
			})
		</script>

		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
		<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
</head>
<body>
	<div class="w-page">

		<!-- Header -->
		<?php
			require_once '../header.php';
		?>
		<!-- Page -->
		<div class="w-page_container">
			<div class="wc-index">
				<div class="w-grid">
					<div class="w-row">

		<?php
		/* Авторизация */
		
			if (($_SESSION["admin"]) != "1"){ ?>
			<div class="ds_auth">
				<h1>Вход в админ панель</h1> <br>
				<form name="auth" action="config/admin_auth.php" method="POST">
					<div class="ds_auth_login">
						<label align="center">Введите логин</label> <br>
						<input type="text" name="ds_login">
					</div>
					<div class="ds_auth_pass">
						<label>Введите пароль</label> <br>
						<input type="password" name="ds_pass">
					</div>
					<div class="ds_auth_submit">
						<input type="submit" value="вход" name="ds_submit" class="ds_submit">
					</div>
					<div class="ds_auth_error"></div>
				</form>	
			</div>
		<?php
		 } else if ($_SESSION["admin"] == "1") { /* Пользователь авторизован */  ?>
				<!-- Новая статья -->
						<div class="modal_mask"></div>
						<div class="big_editor">
							<div class="big_editor__close">x</div>
							<textarea type="text" class="big_editor__textarea"></textarea>
							<div class="big_editor_add">add</div>
						</div>
						<div class="new_article">
							<div class="new_article_container">
								<div class="new_article__close">x</div>
								<div class="new_article_container__form">
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
								</div>
							</div>
						</div>
						<div class="ds_article_list">
							<button id=add_new><a href="admin_edit.php">Добавить новую статью</a></button>
							
							<!-- Редактирование статьи -->
							<table class="ds_article_list__table">
									<td>Название статьи</td>
									<td>Автор</td>
									<td>Дата</td>
									<td>Действие</td>	
							<?php
							$get_articles = mysqli_query($connection, "SELECT * FROM `articles`");
							while ($articles = mysqli_fetch_assoc($get_articles)){ ?>
							
								<tr>
									<form action="config/admin_edit.php?id=<?=$articles['id'];?>" method="POST" name="<?=$articles['id']?>">
									<td><input type="text" name="ds_change_name" value="<?=$articles['name'];?>"></td>
									<td><input type="text" name="ds_change_author" value="<?=$articles['author'];?>"></td>
									<td><input type="date" name="ds_change_date" value="<?=$articles['date'];?>"></td>
									<td><input type="submit" name="ds_change_submit" value="Изменить запись"><br><input type="submit" name="ds_delete_submit" value="Удалить запись"></td>
									</form>	
								</tr>	
									
							<?php  } ?>
							</table>
							<form action="config/logout.php" method="POST">
								<input type="submit" name="admin_logout" value="выход">
							</form> 
						<?php } ?>
						</div>


					</div>
				</div>
			</div>
		</div>
				<!-- footer -->
		<?php
			require_once'../footer.php';
		?>
	</div>
</body>
</html>