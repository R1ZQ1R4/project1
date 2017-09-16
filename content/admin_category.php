<table class="admin-table">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Control</th>
					</tr>
				</thead>
				<tbody>

				<?php

				$sort = $_GET['sort'];
				$no = 1 + (($sort - 1) * 10);
				while($row = $view['result']->fetch(PDO::FETCH_OBJ)){
				
				?>
					<tr>
						<td class="min-width"><?php echo $no; $no++; ?></td>
						<td class="max-width"><?= $row->category_name ?></td>
						
						<td>
							<a href="?page=admin&sort=<?= $_GET['sort'] ?>&control=<?= $_GET['control'] ?>&update=<?= $row->category_id ?>
							">
							<button class="btn-control btn-update">Edit</button>
							</a>
							<a href="?page=admin&sort=<?= $_GET['sort'] ?>&control=<?= $_GET['control'] ?>&delete=<?= $row->category_id ?>" 
							class="callback">
							<button class="btn-control btn-delete">hapus</button>
							</a>
						</td>
					</tr>
					
				<?php

					}



				?>
				</tbody>

</table>

<?php include_once('pagination.php') ?>



