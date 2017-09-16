<?php 
include_once('content/nav.php');
?>

<header id="header" style="	background-image: url(assets/img/the_lost_hindu_temple_in_the_jungle_mist___indonesia-wallpaper-2560x1600.jpg);
">
	<div class="hero">
			<button class="btn ghost scroll" scroll="#start" role="button">start journey</button>

	</div>
</header>

<main id="start">
	<div class="container">
		<div class="main-title">
			<h1>What is in Indonesia ?</h1>
			<p>" Lorem ipsum dolor sit amet, consectetur adipiscing elit ata reigist,</p>
			<p> sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. " </p>
		</div>
		<div class="main preview">
			<div class="preview-content">
				<h2>Indonesia govrement</h2>
				<p>
				The Indonesian government works within the framework of a presidential representative democratic republic where President is the head of both state and government. The President, in turn, chooses the Cabinet of Indonesia which forms the executive branch that maintain the day-to-day governance.
				</p>
			</div>
			<div class="preview-image">
				<img src="assets/img/dbf4044c317a172ba51968578f83229e2d4ac6de-87ca1.jpg" alt="preview">
			</div>
		</div>
		<div class="main preview">
			<div class="preview-image">
				<img src="assets/img/dbf4044c317a172ba51968578f83229e2d4ac6de-87ca1.jpg" alt="preview">
			</div>
			<div class="preview-content">
				<h2>Indonesia</h2>
				<p>
				The name Indonesia, meaning Indian Islands, was coined by an Englishman, J. R. Logan, in Malaya in 1850. Derived from the Greek, Indos (India) and nesos (island), it has parallels in Melanesia, "black islands"; Micronesia, "small islands"; and Polynesia, "many islands." A German geographer, Adolf Bastian, used it in the title of his book, Indonesien , in 1884, and in 1928 nationalists adopted it as the name of their hoped-for nation.
				</p>
			</div>
		</div>
		<div class="main preview">
			<div class="preview-content">
				<h2>Indonesia neighboor</h2>
				<p>
				Nearly all of Indonesia's three hundred to four hundred languages are subgroups of the Austronesian family that extends from Malaysia through the Philippines, north to several hill peoples of Vietnam and Taiwan, and to Polynesia, including Hawaiian and Maori (of New Zealand) peoples. Indonesia's languages are not mutually intelligible, though some subgroups are more similar than others (as Europe's Romance languages are closer to each other than to Germanic ones, though both are of the Indo-European family).
				</p>
			</div>
			<div class="preview-image">
				<img src="assets/img/dbf4044c317a172ba51968578f83229e2d4ac6de-87ca1.jpg" alt="preview">
			</div>
		</div>

		<a href="?page=culture" class="navbar-brand">
		<button class="btn global">Load more</button>
		</a>
	</div>

</main>

<div class="card-wrap">
	<div class="main-title">
			<h1>intersting place</h1>
			<p>" Lorem ipsum dolor sit amet, consectetur adipiscing elit ata reigist "</p>
	</div>
	<div class="card-row">
		<?php
			$query = $main->model->db->prepare("SELECT * FROM place ORDER BY place.place_name LIMIT 8");
			$query->execute();

			while( $row = $query->fetch(PDO::FETCH_OBJ) ){
		?>
		<div class="card-2">
			<a href="?page=destination&name=<?= $row->place_name ?>" class="card-item">
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
	<a href="?page=destination" class="navbar-brand">
		<button class="btn global">Load more</button>
		</a>
</div>

<div class="card-wrap">

	<div class="main-title">
		<h1>Find some Event</h1>
		<p>" Lorem ipsum dolor sit amet, consectetur adipiscing elit ata reigist "</p>
	</div>

	<div class="card-row">
		<?php 
			$query = $main->model->db->prepare("SELECT * FROM article WHERE article.category_id=5 OR article.category_id=4 ORDER BY article.article_id DESC LIMIT 6");
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
	<a href="?page=event" class="navbar-brand">
		<button class="btn global">Load more</button>
		</a>
</div>

<?php include_once('content/footer.php'); ?>

<a href="#" class="scroll-top scroll" scroll="#header" id="scroll-top">up</a>
