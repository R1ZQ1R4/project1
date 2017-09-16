<div class="wrap-modal">
	<div class="modal-box ">
		<div class="container ">

	<main class="modal-admin" style=" width: 100%; padding-bottom: 100px">
			<div class="main-title">
				<h1> Transaction <?php
					switch ($status) {
							case 'all':
								echo "All";
								break;
							case 0:
								echo "canceled";
								break;
							case 1:
								echo "booked";
								break;
							case 2:
								echo "occupied";
								break;
							case 3:
								echo "pending";
								break;
							case 9:
								echo "completed";
								break;
							default:
								echo "error";
								break;
						}
				 ?>
				 </h1>
				<p> Date <?= $date1 ?>/<?= $date2 ?></p>
			</div>

			<table class="admin-table normal">
							<thead>
								<tr>
									<th>No</th>
									<th>Trasaction code</th>
									<th  style="width: 75px">checkin</th>
									<th>checkout</th>
									<th>hotel</th>
									<th>room</th>
									<th style="text-align: right;">pay</th>

								</tr>
							</thead>
							<tbody>

							<?php

							$sort = $_GET['sort'];
							$no = 1 + (($sort - 1) * 10);
							while($row = $view->fetch(PDO::FETCH_OBJ)){
							
							?>
							<tr>
								<td><?php echo $no; $no++; ?></td>
								<td><?= $row->transaction_code ?></td>
								<td><?= $row->checkin ?></td>
								<td><?= $row->checkout ?></td>
								<td class="max-width"><?= $row->hotel_name ?></td>
								<td><?= $row->room_name ?></td>
								<td style="text-align: right;"><?= $row->transaction_pay ?></td>
							</tr>

								
							<?php

								}



							?>
							<tr>
								<td></td>
								<td colspan="5"><h4>Total</h4></td>
								<td style="text-align: right;"><h4><?= $total ?></h4></td>
							</tr>
							</tbody>

			</table>

			<div class="main-title">
				<h1> Room Analysis</h1>
				<p> Date <?= $date1 ?>/<?= $date2 ?> From Transaction <?php
					switch ($status) {
							case 'all':
								echo "All";
								break;
							case 0:
								echo "canceled";
								break;
							case 1:
								echo "booked";
								break;
							case 2:
								echo "occupied";
								break;
							case 3:
								echo "pending";
								break;
							case 9:
								echo "completed";
								break;
							default:
								echo "error";
								break;
						}
				 ?></p>
			</div>

			<table class="admin-table normal">
							<thead>
								<tr>
									<th>No</th>
									<th>Hotel name</th>
									<th>Room name</th>
									<th style="text-align: center;">reserved total</th>
									<th style="text-align: center;">days total</th>
									<th style="text-align: right;">room income</th>
								</tr>
							</thead>
							<tbody>

							<?php

							$sort = $_GET['sort'];
							$no = 1 + (($sort - 1) * 10);
							while($row = $view2->fetch(PDO::FETCH_OBJ)){
							
							?>
							<tr>
								<td><?php echo $no; $no++; ?></td>
								<td><?= $row->hotel_name ?></td>
								<td><?= $row->room_name ?></td>
								<td style="text-align: center;"><?= $row->total_reserved ?></td>
								<td style="text-align: center;"><?= $row->days_total ?></td>
								<td style="text-align: right;"><?= $row->income ?></td>
							</tr>

								
							<?php

								}



							?>
							<tr>
								<td></td>
								<td colspan="4"><h4>Total</h4></td>
								<td style="text-align: right;"><h4><?= $total ?></h4></td>
							</tr>

							</tbody>

			</table>
	</main>
		</div>
	</div>
</div>