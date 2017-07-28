<?php

?>

<nav class="navbar">
	<div class="navbar main">
	<a class="navbar-brand" href="index.php">SMKN 1 Bangil</a>
	</div>

	<div class="navbar sub">

		<a href="#">Home</a>
		<a href="#">News</a>
		<a href="#">Destination</a>
		<?php if (isset($_SESSION['name'])): ?>
		<a href="?page=admin">Dashboard</a>
		<a href="?page=profil"><?= $_SESSION['name'] ?></a>
		<a href="?page=logout">Logout</a>
		<?php else: ?>
		<a href="?page=login">Login</a>
		<?php endif ?>

	
	</div>
</nav>
<header></header>