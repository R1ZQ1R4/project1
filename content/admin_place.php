<table class="admin-table">
				<thead>
					<tr>
						<th class="min-width">No</th>
						<th>Gambar</th>
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
						<td class="min-width">
							<button class="btn-control relative">Preview
								<img src="assets/img/<?= $row->place_picture ?>" class="preview-float">
							</button>
						</td>
						<td class="max-width"><?= $row->place_name ?></td>
						<td>
							<a href="?page=admin&sort=<?= $_GET['sort'] ?>&control=<?= $_GET['control'] ?>&update=<?= $row->place_id ?>
							">
							<button class="btn-control btn-update">Edit</button>
							</a>
							<a href="?page=admin&sort=<?= $_GET['sort'] ?>&control=<?= $_GET['control'] ?>&delete=<?= $row->place_id ?>" 
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



