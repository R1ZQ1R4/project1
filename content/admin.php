<?php
	
	// Null coalescing operator *PHP 7*
	// pengganti if, dan else NULL
	// $_SESSION['nama'] ?? header('Location: ?page=login');

	//ternary operator (?:) ? sebagai pengganti if dan : sebagai else
	!isset($_SESSION['name']) ? header('Location: ?page=login') : '';
	$_SESSION['level']==0 ? header('Location: ?page=home') : '';

	$control = $_GET['control'];
	!$control ? header('Location:?page=admin&control=article') : '';

	!isset($_GET['sort']) ? $_GET['sort']=1 : '';
?>
	
<div class="" id="tampilan">
<?php
	include('content/alert.php');
	
	if (isset($_GET['update'])) {
		include_once('content/admin_' . $control . '_update.php');
	} else if (isset($_GET['insert'])){
		include_once('content/admin_' . $control . '_insert.php');
	}

	else if (isset($_GET['delete'])){
		$main->delete();
	}
?>
</div>

<nav class="navbar inverse">
	<div class="navbar-main">
	<a class="navbar-toggle default" id="slide-left" role="button">menu</a>
	<a class="navbar-brand" href="?page=home">Home</a>
	</div>

	<div class="navbar-sub">

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

<div class="admin">
	<aside>
		<div class="aside-container">
			<ul class="menu-list">
				<li><a href="?page=admin&control=article">article</a></li>	
				<li><a href="?page=admin&control=category">category</a></li>	
				<li><a href="?page=admin&control=comment">comment</a></li>	
				<li><a href="?page=admin&control=hotel">hotel</a></li>	
				<li><a href="?page=admin&control=hotel_room">room</a></li>	
				<li><a href="?page=admin&control=place">place</a></li>	
				<li><a href="?page=admin&control=user">user</a></li>
				<hr>
				<li><a href="?page=admin&control=report">report</a></li>	
				<li><a href="?page=admin&control=transaction">transaction</a></li>
				<li><a href="?page=admin&control=transaction_history">transaction history</a></li>	
	
			</ul>
		</div>
	</aside>
</div>

<div class="admin-main">
		<div class="admin-container">
			<div class="admin-title">
				<div>
					<h1><?= $control ?></h1>
				</div>
				<?php
					if( $control == "transaction_history" || $control == "report"){
				?>
						
				<?php
					}else{

				?>
						<a href="?page=admin&sort=<?= $_GET['sort'] ?>&control=<?= $control ?>&insert=true">
						<button class="btn-plus" id="btn-plus" name="btn-plus" role="submit">Tambah</button>
						</a>
				<?php
					}
				?>
			</div>

			<div class="admin-content">
				<?php
					switch ($control) {
						case 'user':
							$main->user();
							break;
						case 'category':
							$main->category();
							break;
						case 'comment':
							$main->comment();
							break;
						case 'hotel':
							$main->hotel();
							break;
						case 'hotel_room':
							$main->room();
							break;
						case 'place':
							$main->place();
							break;
						case 'transaction':
							$main->transaction();
							break;
						case 'article':
							$main->article();
							break;
						case 'report':
							$main->report();
							break;
						case 'transaction_history':
							$main->transaction_history();
							break;

						default:
							$main->article();
							break;
					}
				?>
			</div>

		</div>
		
</div>
<div class="admin-footer">
			&copy 2017 SMKN 1 Bangil
</div>