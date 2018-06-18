<?php
	require_once 'config/db.php';
	$article_id = $_GET["id"];
	$get_article = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM `articles` WHERE `id` = '$article_id' "));
?>
<!DOCTYPE html>
<html lang="en">

<head>
	
	<title><?=$get_article["name"];?></title>

	<?php
		require_once'../lips.php';
	?>

</head>

<body>
	<div class="w-page">
		<!-- Header -->
		<?php
			require_once'../header.php';
		?>
				


		<!-- Page -->
		<div class="w-page_container blog_page">
			<div class="wc-index">
				<div class="w-grid">
					<div class="w-row">
						<div class="wb2b-article_col">
						<article class="post wb2b-article">
							<div class="back-to-all">
								<a href="index.php">
									<img src="../img/mobile_arrow.svg" alt="вернуться к списку статей"><span> Вернуться к списку статей</span>
								</a>
							</div>
							<div class="w-page-title"><?=$get_article["name"]?></div>
								<section class="wb2b-article_meta">
									<time class="wb2b-article_date" datetime="2018-02-12"><?=$get_article["date"]?></time>
									<span><?=$get_article["author"];?></span>
								</section>
							<section class="wb2b-article_content wb2b-raw">
							<p><img src="<?=$get_article['img']?>" alt=""></p>

								<?= $get_article["text"]; ?>
			
							</section>							
							</div>
						</article>
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
	<script src="js/slider.js"></script>
</body>

</html>