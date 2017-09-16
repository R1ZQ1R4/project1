<?php 
include_once('content/nav.php');
?>
<header id="header">
	<div style="height: 60px;"></div>
</header>
<div class="card-wrap">

	<div class="main-title">
		<h1>Find some Event</h1>
		<p>" Lorem ipsum dolor sit amet, consectetur adipiscing elit ata reigist "</p>
	</div>

	<div class="card-row">
		<?php 
			$query = $main->model->db->prepare("SELECT * FROM article WHERE article.category_id=5 OR article.category_id=4 ORDER BY article.article_id");
			$query->execute();

			while( $row = $query->fetch(PDO::FETCH_OBJ) ){
		?>
		<div class="card">
		<a class="card-item" href="?page=article&id=<?= $row->article_id ?>">
			<div class="card-header">
				<img src="assets/img/<?= $row->article_picture ?>">
			</div>
			<div class="card-body">
				<div class="card-title">
					<h4><?= $row->article_name?></h4>
				</div>
			</div>

		</a>
		</div>
		<?php
			}
		?>
	</div>
</div>

<?php include_once('content/footer.php'); ?>

<a href="#" class="scroll-top scroll" scroll="#header" id="scroll-top">up</a>