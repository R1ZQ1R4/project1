<table class="admin-table">
				<thead>
					<tr>
						<th>No</th>
						<th>code</th>
						<th>checkin</th>	
						<th>checkout</th>
						<th>Reserved</th>
						<th>user</th>
						<th>hotel name</th>
						<th>room class</th>
						<th>pay</th>
						<th>status</th>
						<th>Control</th>
					</tr>
				</thead>
				<tbody>

				<?php

				$sort = $_GET['sort'];
				$no = 1 + (($sort - 1) * 10);
				while($row = $view['join']->fetch(PDO::FETCH_OBJ)){
							// die(print_r($row->transaction_code));
				?>
					<tr>
						<td class="min-width"><?php echo $no; $no++; ?></td>
						<td class="min-width"><?= $row->transaction_code ?></td>
						<td><?= $row->checkin ?></td>
						<td class="min-width"><?= $row->checkout ?></td>
						<td class="min-width"><?= $row->reserved ?></td>
						<td><?= $row->user_name ?></td>
						<td class="max-width"><?= $row->hotel_name ?></td>
						<td><?= $row->room_name ?></td>
						<td><?= $row->transaction_pay ?></td>
						<td>
						<?php 
							include('transaction_status.php');
						?>

						</td>
						<td>
							<a href="?page=admin&sort=<?= $_GET['sort'] ?>&control=<?= $_GET['control'] ?>&update=<?= $row->transaction_id ?>
							">
							<button class="btn-control btn-update">Edit</button>
							</a>
							<a href="?page=admin&sort=<?= $_GET['sort'] ?>&control=<?= $_GET['control'] ?>&delete=<?= $row->transaction_id ?>" 
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



