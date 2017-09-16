<table class="admin-table">
				<thead>
					<tr>
						<th>Date</th>
						<th>Process</th>	
					</tr>
				</thead>
				<tbody>

				<?php

				$sort = $_GET['sort'];
				while($row = $view['result']->fetch(PDO::FETCH_OBJ)){
				
				?>
					<tr>
						<td><?= $row->transaction_history_date ?></td>
						<td style="width: auto;">

						<?php
							switch ($row->transaction_history_process) {
								case 'new':
									echo "New transaction with code <b>" . $row->transaction_history_code . "</b>";
									break;
								case 0:
									echo "Transaction with code <b>" . $row->transaction_history_code . "</b> has been canceled";
									break;
								case 1:
									echo "Transaction with code <b>" . $row->transaction_history_code . "</b> booked the room";
									break;
								case 2:
									echo "Transaction with code <b>" . $row->transaction_history_code . "</b> occupied the room";
									break;
								case 3:
									echo "Transaction with code <b>" . $row->transaction_history_code . "</b> not pay compeletedly";
									break;
								case 9:
									echo "Transaction with code <b>" . $row->transaction_history_code . "</b> completed";
									break;
								case 'delete':
									echo "Transaction with code <b>" . $row->transaction_history_code . "</b> has deleted";
									break;
								
								default:
									echo "error code" . $row->transaction_history_code;
									break;
							}
						?>

						</td>
					</tr>
					
				<?php

					}



				?>
				</tbody>

</table>

<?php include_once('pagination.php') ?>



