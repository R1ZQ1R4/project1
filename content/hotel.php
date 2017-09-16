<?php 
include_once('content/nav.php');
?>

<?php
	if (isset($_POST['select_room'])):
?>

<div class="wrap-modal">
<div class="modal-box-admin">
    <div class="modal-admin">
    <div class="modal-header">
    <h2>Verification Room</h2>
    </div>
        <form class="modal-body" method="POST"">
                <label>Checkin
                <input type="date" name="checkin">
                </label>

                <label>Duration
                <input type="number" name="checkout" value="1">
                </label>

                <label>Reserved room
                <input type="number" name="reserved" value="1">
                </label>

				<input type="hidden" name="user" value="<?= $_SESSION['id'] ?>" readonly>
				
                <label>User
                <input type="text" value="<?= $_SESSION['name'] ?>" readonly>
                </label>

                <label>Hotel room
                <input type="text" value="<?= $_POST['room_name'] ?>" readonly>
                </label>

                <label>Room price
                <input type="text" value="<?= $_POST['room_price'] ?>" readonly>
                </label>

                <input type="hidden" name="hotel_room" value="<?= $_POST['room'] ?>">

                <button class="btn btn-submit callback" name="btn_transaction">submit</button>
                <div class="clear"></div>
            </form>
    <div class="modal-footer">
    </div>
    </div>
</div>
</div>
<?php
	elseif(isset($_POST['btn_transaction'])):
		$insert = $main->insert_transaction();
	endif;
?>


<?php 
	$id = @$_GET['id'];
	if (isset($id)):
		$selectname = $main->model->select('hotel', $id);
		$selectname->execute();
		$name = $selectname->fetch(PDO::FETCH_OBJ);

		$query = $main->model->db->prepare("SELECT * FROM hotel_room WHERE hotel_room.hotel_id = $name->hotel_id");
		$query->execute();
		
?>
<header id="header" style="background-image: url(assets/img/<?= $name->hotel_image ?>);">
	<div class="hero">
		<div class="big-title"></div>
	</div>
</header>
<main>
		<div class="container">
			<div class="main-title">
				<h1><?= $name->hotel_name ?></h1>
				<p><?= $name->hotel_address ?></p>
			</div>
			<div class="main-article">
				<img src="assets/img/<?= $name->hotel_image ?>" alt="picture"/>
				<p>
				<?= $name->hotel_content ?>
				</p>
			</div>

			<div class="main-title">
				<h1>Order Hotel</h1>
			</div>
			<?php while($row = $query->fetch(PDO::FETCH_OBJ)){ ?>
			<div class="main preview">
				<div class="preview-image">
					<img src="assets/img/<?= $row->room_image ?>" alt="preview">
				</div>
				<div class="preview-content">
					<h2>Class <?= $row->room_name?></h2>
					<h3><span>Price</span> : Rp.<?= $row->room_price?>,00</h3>
					<h3><span>Capacity</span> : <?= $row->room_capacity?></h3>
					<h3><span>Room Available</span> : 
					<?php 
						if ( $row->room_amount = 0) {
							echo "NO";
						}else{
							echo "YES";
						}
					?>		
					</h3>
					<h3><span>Facility</span> : 
					<span class="value">
						<ul>
					<?php
						$result = explode(',' , $row->room_facility); 

						foreach ($result as $key => $value) {
					?>
						<li><?= $value ?> </li>												
					<?php
	
						}
					?>
						</ul>
					</span>
					</h3>
					<form action="" method="POST">
						<input type="hidden" name="room_price" value="<?= $row->room_price?>">
						<input type="hidden" name="room_name" value="<?= $row->room_name?>">
						<input type="hidden" name="room" value="<?= $row->hotel_room_id?>">
						<button type="submit" name="select_room" class="btn global" style="margin: -40px 0 0 auto">Pesan</button>
					</form>
					</a>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</main>

<?php else: ?>
<header id="header">
	<div style="height: 60px;"></div>
</header>

<div class="card-wrap">
	<div class="main-title">
			<h1>Hotel</h1>
			<p>" Lorem ipsum dolor sit amet, consectetur adipiscing elit ata reigist "</p>
	</div>
	<div class="card-row">
		<?php
			$query = $main->model->db->prepare("SELECT * FROM hotel ORDER BY hotel.hotel_name");
			$query->execute();

			while( $row = $query->fetch(PDO::FETCH_OBJ) ){
		?>
		<div class="card-50">
			<a href="?page=hotel&id=<?= $row->hotel_id ?>" class="card-item">
				<div class="card-header">

					<img src="assets/img/<?= $row->hotel_image ?>">
					<div class="card-overlay">
						<div class="overlay-title"><?= $row->hotel_name ?></div>
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