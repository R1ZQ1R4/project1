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