<table class="admin-table">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>konten</th>	
						<th>tanggal</th>
						<th>gambar</th>
						<th>tempat</th>
						<th>penulis</th>
						<th>category</th>
						<th>view</th>
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
						<td class="max-width"><?= $row->article_name ?></td>
						<td class="min-width">
							<button class="btn-control relative">load
								<div class="preview-float">
									<?= $row->article_content ?>
								</div>							
							</button>
						</td>
						<td>
							<?= $row->article_date ?>
						</td>
						
						<td class="min-width">
							<button class="btn-control relative">preview
								<img src="assets/img/<?= $row->article_picture ?>" class="preview-float">
							</button>
						</td>
						<td class="max-width">
							<?= $row->place_name ?>
						</td>
						<td class="max-width">
							<?= $row->user_name ?>
						</td>
						<td class="max-width">
							<?= $row->category_name ?>
						</td>
						<td class="min-width">
							<?= $row->article_view ?>
						</td>
						<td class="min-width">
							<a href="?page=admin&sort=<?= $_GET['sort'] ?>&control=<?= $_GET['control'] ?>&update=<?= $row->article_id ?>
							">
							<button class="btn-control btn-update">Edit</button>
							</a>
							<a href="?page=admin&sort=<?= $_GET['sort'] ?>&control=<?= $_GET['control'] ?>&delete=<?= $row->article_id ?>" 
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



