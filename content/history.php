<?php include_once('content/nav.php'); ?>

<header id="header">
	<div style="height: 60px;"></div>
</header>

<main style="margin-top: 30px;">
	<div class="container">
		<div class="main-title">
			<h1>History of reservation</h1>
		</div>
			<div class="main-static">
				<table class="admin-table">
				<thead>
					<tr>
						<th>no</th>
						<th>code</th>
						<th>checkin</th>	
						<th>checkout</th>
						<th>Reserved</th>
						<th>hotel name</th>
						<th>room class</th>
						<th>pay</th>
						<th>status</th>

					</tr>
				</thead>
				<tbody>

				<?php
				$user_id = $_SESSION['id'];
				$no = 1;

				$query = $main->model->db->prepare(" SELECT transaction.*, hotel_room.*, hotel.hotel_name
													 FROM transaction
													 LEFT JOIN hotel_room ON transaction.hotel_room_id = hotel_room.hotel_room_id 
													 LEFT JOIN hotel ON hotel_room.hotel_id = hotel.hotel_id
													 WHERE transaction.user_id = $user_id
													");
				$query->execute();

				while($row = $query->fetch(PDO::FETCH_OBJ)){
				
				?>
					<tr>
						<td class="min-width"><?php echo $no++; ?></td>
						<td class="min-width"><?= $row->transaction_code ?></td>
						<td><?= $row->checkin ?></td>
						<td class="min-width"><?= $row->checkout ?></td>
						<td class="min-width"><?= $row->reserved ?></td>
						<td class="max-width"><?= $row->hotel_name ?></td>
						<td><?= $row->room_name ?></td>
						<td><?= $row->transaction_pay ?></td>
						<td>
						<?php 
							include('transaction_status.php');
						?>
						</td>
						
					</tr>
					
				<?php

					}



				?>
				</tbody>

</table>
			</div>
	</div>

</main>

<?php include_once('content/footer.php'); ?>

<a href="#" class="scroll-top scroll" scroll="#header" id="scroll-top">up</a>