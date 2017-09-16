<table class="admin-table">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Alamat</th>	
						<th>Content</th>
						<th>rate</th>
						<th>image</th>
						<th>place</th>
						<th>control</th>
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
						<td class="max-width"><?= $row->hotel_address ?></td>
						<td class="min-width">
							<button class="btn-control relative">Load
								<div class="preview-float">
									<?= $row->hotel_content?>
								</div>
							</button>
						</td>
						<td class="min-width"><?= $row->hotel_rate?></td>
						<td class="min-width">
							<button class="btn-control relative">Preview
								<img class="preview-float" src="assets/img/<?= $row->hotel_image?>" alt="">
							</button>
						</td>
						<td class="max-width"><?= $row->place_name ?></td>
						<td>
							<a href="?page=admin&sort=<?= $_GET['sort'] ?>&control=<?= $_GET['control'] ?>&update=<?= $row->hotel_id ?>
							">
							<button class="btn-control btn-update">Edit</button>
							</a>
							<a href="?page=admin&sort=<?= $_GET['sort'] ?>&control=<?= $_GET['control'] ?>&delete=<?= $row->hotel_id ?>" 
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



