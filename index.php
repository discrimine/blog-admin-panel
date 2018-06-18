<?php
require_once 'article_list.php';
require_once 'config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Профессиональный ремонт шкатулок для автоподзавода часов!</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="../css/style.css" rel="stylesheet" type="text/css" />
		<link href="../css/resize.css" rel="stylesheet" type="text/css" />
		
		<script
		src="https://code.jquery.com/jquery-3.3.1.min.js"
		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
		crossorigin="anonymous"></script>
		<script src="https://leemark.github.io/better-simple-slideshow/demo/js/hammer.min.js"></script>
		
	</head>
	<body>
		<?php
			$get_articles = mysqli_query($connection, "SELECT * FROM `articles`");
			
		?>
		<div class="w-page">
			<!-- Header -->
			<?php require_once '../header.php';  ?>
			
			<div class="w-page_container">
				<main id="content" role="main" style="padding-top: 71px;">
	
	<?php	
		while ($articles = mysqli_fetch_assoc($get_articles)){
			$article_more = "article.php?id=" . $articles["id"];
?>
					<article class="wb2b-post">
						<div class="w-grid">
							<div class="w-row">
								<div class="wb2b-post_col">
									<a class="w-title __w-first" href="#"><?=$articles['name'];?></a>
									<div class="wb2b-post_meta w-body-item">
										<time class="wb2b-post_date" datetime="2018-02-08">08 February 2018</time>
										<span><?=$articles['author'];?></span>
									</div>
									<section class="wb2b-post_content w-body-item wb2b-raw">
										<p><img src="<?=$articles['img'];?>" alt=""></p>
										<p class="wb2b-post_content_p">Wheely в Лондоне обновился и стал ещё удобнее для вас. С момента запуска в 2012 году мы тестировали разные форматы. Тогда мы поняли, что у</p>
									</section>
									<div class="w-body-item">
										<a class="w-link" href="<?=$article_more;?>">Читать далее</a>
									</div>
								</div>
							</div>
						</div>
					</article>
			

<?php

		}

	?>


					
					<div class="w-section-hr"></div>
					<div class="wb2b-pagination">
						<div class="w-grid">
							<div class="w-row">
								<div class="wb2b-pagination_col" style="display: flex;">
									<span class="wb2b-pagination_current"><span class="__w-tablet __w-desktop">Страница&nbsp;</span>1&nbsp;из&nbsp;2</span>
									<a class="wb2b-pagination_next w-link" href="/blog/page/2/"><span class="__w-tablet __w-desktop">Страница&nbsp;</span>2&nbsp;→</a>
								</div>
							</div>
						</div>
					</div>
					
				</main>
				<!-- footer -->
				<?php require_once '../footer.php';  ?>

</div>
</div>
</body>
</html>