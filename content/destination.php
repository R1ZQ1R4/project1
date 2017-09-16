<?php 
include_once('content/nav.php');
?>


<?php 
	$id = @$_GET['id'];
	if (isset($id)):
		$selectname = $main->model->select('place', $id);
		$selectname->execute();
		$name = $selectname->fetch(PDO::FETCH_OBJ);

		$query = $main->model->db->prepare("SELECT * FROM article WHERE article.place_id = $id AND article.category_id = 2");
		$query->execute();
		
?>
<header id="header" style="background-image: url(assets/img/<?= $name->place_picture ?>);">
	<div class="hero">
		<div class="big-title"><?= $name->place_name ?></div>
	</div>
</header>
<main>
		<div class="card-wrap container">
			<div class="main-title">
				<h1>Destination on <?= $name->place_name ?></h1>
			</div>
			<div class="card-row">
				<?php
					while( $row = $query->fetch(PDO::FETCH_OBJ) ){
				?>
				<div class="card-50">
			<a href="?page=article&id=<?= $row->article_id ?>" class="card-item">
				<div class="card-header">
					<img src="assets/img/<?= $row->article_picture ?>">
					<div class="card-overlay">
						<div class="overlay-title"><?= $row->article_name ?></div>
					</div>
				</div>
				
			</a>
		</div>

				<?php
					}
				?>

			</div>
		</div>
	</div>
</main>
<?php else: ?>
<header id="header">
	<div style="height: 60px;"></div>
</header>
<div class="card-wrap">
	<div class="main-title">
			<h1>intersting place</h1>
			<p>" Lorem ipsum dolor sit amet, consectetur adipiscing elit ata reigist "</p>
	</div>
	<div class="card-row">
		<?php
			$query = $main->model->db->prepare("SELECT * FROM place ORDER BY place.place_name");
			$query->execute();

			while( $row = $query->fetch(PDO::FETCH_OBJ) ){
		?>
		<div class="card">
			<a href="?page=destination&id=<?= $row->place_id ?>" class="card-item">
				<div class="card-header">
					<img src="assets/img/<?= $row->place_picture ?>">
					<div class="card-overlay">
						<div class="overlay-title"><?= $row->place_name ?></div>
					</div>
				</div>
				
			</a>
		</div>

		<?php
			}
		?>

	</div>
</div>
<?php endif; ?>

<?php include_once('content/footer.php'); ?>

<a href="#" class="scroll-top scroll" scroll="#header" id="scroll-top">up</a>