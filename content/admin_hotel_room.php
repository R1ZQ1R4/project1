<table class="admin-table">
				<thead>
					<tr>
						<th>No</th>
						<th>Hotel Name</th>
						<th>Room Class</th>
						<th>Facility</th>
						<th>Picture</th>
						<th>Capacity</th>
						<th>Price</th>
						<th>Amount</th>
						<th>Control</th>
					</tr>
				</thead>
				<tbody>

				<?php

				$sort = $_GET['sort'];
				$no = 1 + (($sort - 1) * 10);
				while($row = $view['join']->fetch(PDO::FETCH_OBJ)){
				
				?>
					<tr>
						<td class="min-width"><?php echo $no; $no++; ?></td>
						<td class="max-width"><?= $row->hotel_name ?></td>
						<td><?= $row->room_name ?></td>
						<td class="min-width">
							<button class="btn-control relative">load
								<div class="preview-float">
									<?= $row->room_facility ?>
								</div>							
							</button>
						</td>
						<td class="min-width">
							<button class="btn-control relative">preview
								<img src="assets/img/<?= $row->room_image ?>" class="preview-float">
							</button>
						</td>
						<td class="min-width"><?= $row->room_capacity ?></td>
						<td class="min-width"><?= $row->room_price ?></td>
						<td class="min-width"><?= $row->room_amount ?></td>
						<td>
							<a href="?page=admin&sort=<?= $_GET['sort'] ?>&control=<?= $_GET['control'] ?>&update=<?= $row->hotel_room_id ?>
							">
							<button class="btn-control btn-update">Edit</button>
							</a>
							<a href="?page=admin&sort=<?= $_GET['sort'] ?>&control=<?= $_GET['control'] ?>&delete=<?= $row->hotel_room_id ?>" 
							class="callback">
							<button class="btn-control btn-update">Hapus</button>
							</a>
						</td>
					</tr>
					
				<?php

					}



				?>
				</tbody>

</table>

<?php include_once('pagination.php') ?>



