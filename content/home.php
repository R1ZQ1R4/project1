<?php

?>

<nav>
	<div class="navbar">
		<div class="navbar main">
		<a class="navbar-brand" href="index.php">SMKN 1 Bangil</a>
		</div>

		<div class="navbar sub">

			<a href="?page=culture">Culture</a>
			<a href="?page=destination">Destination</a>
			<a href="?page=event">Event</a>
			<a href="?page=hotel">Hotel</a>
			<?php if (isset($_SESSION['name'])): ?>
				<?php 
				$level = $_SESSION['level'];
				if ($level>=1): ?>
				<a href="?page=admin">Dashboard</a>
				<?php else: ?>
				<a href="?page=travel">Travel</a>
				<?php endif; ?>
			<a href="?page=profil"><?= $_SESSION['name'] ?></a>
			<a href="?page=logout">Logout</a>
			<?php else: ?>
			<a href="?page=login">Login</a>
			<a href="?page=register">Register</a>
			<?php endif ?>
		</div>
	</div>
</nav>

<header>
	<div class="hero">
		<div class="hero-content"></div>

	</div>
</header>

<main>
	<div class="container">
		<div class="main title">
			<h1>What is in Indonesia ?</h1>
			<p>" Lorem ipsum dolor sit amet, consectetur adipiscing elit ata reigist,</p>
			<p> sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. " </p>
		</div>
		<div class="main preview">
			<div class="preview-content">
				<h2>Judul dari preview</h2>
				<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet, consectetur adipiscing e.
				</p>
			</div>
			<div class="preview-image">
				<img src="assets/img/803103.jpg" alt="preview">
			</div>
		</div>
		<div class="main preview">
			<div class="preview-image">
				<img src="assets/img/39273473-indonesia-wallpapers.jpg" alt="preview">
			</div>
			<div class="preview-content">
				<h2>Judul dari preview</h2>
				<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet, consectetur adipiscing e
				</p>
			</div>
		</div>
		<div class="main preview">
			<div class="preview-content">
				<h2>Judul dari preview</h2>
				<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lorem ipsum dolor sit amet, consectetur adipiscing e
				</p>
			</div>
			<div class="preview-image">
				<img src="assets/img/27182897-indonesia-wallpapers.jpg" alt="preview">
			</div>
		</div>

		<button class="btn btn-submit">Load more</button>
	</div>

</main>

<div class="card-wrap">
	<div class="card">
	<div class="card-item">
		<div class="card header">
			<img src="assets/img/Indonesia-HD-Wallpaper-Desktop-Wide.jpg">
		</div>
		<div class="card body">
			<div class="card title">
				
			</div>
			<div class="card content">
				
			</div>
		</div>
		<div class="card footer">
			<div class="card info">
				
			</div>
		</div>
	</div>
	</div>



	<div class="card">
	<div class="card-item">
		<div class="card header">
			<img src="assets/img/Indonesia-HD-Wallpaper-Desktop-Wide.jpg">
		</div>
		<div class="card body">
			<div class="card title">
				
			</div>
			<div class="card content">
				
			</div>
		</div>
		<div class="card footer">
			<div class="card info">
				
			</div>
		</div>
	</div>
	</div>



	<div class="card">
	<div class="card-item">
		<div class="card header">
			<img src="assets/img/Indonesia-HD-Wallpaper-Desktop-Wide.jpg">
		</div>
		<div class="card body">
			<div class="card title">
				
			</div>
			<div class="card content">
				
			</div>
		</div>
		<div class="card footer">
			<div class="card info">
				
			</div>
		</div>
	</div>
	</div>
</div>


