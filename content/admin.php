<?php
	if ( !isset($_SESSION['name'])) {
		header("Location: ?page=login");
	}
?>

<nav class="navbar">
	<div class="navbar main">
	<a class="navbar-toggle" role="button">menu</a>
	<a class="navbar-brand" href="index.php">Dashboard</a>
	</div>

	<div class="navbar sub">

		<a class="dropdown" role="button"><?= $_SESSION['name'] ?>
			<!-- <div class="dropdown collapse">
				<ul class="dropdown list">
					<li><a href="?page=profil">profil</a></li>
					<li><a href="?page=logout">keluar</a></li>
				</ul>
				
			</div> -->
		</a>

		<a href="?page=logout">logout</a>
	
	</div>
</nav>