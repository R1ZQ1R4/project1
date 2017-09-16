<table class="admin-table">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Gambar</th>	
						<th>email</th>
						<th>password</th>
						<th>level</th>
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
						<td><?= $row->user_name ?></td>
						<td class="min-width">
							<button class="btn-control relative">preview
							<img src=" assets/img/<?= $row->picture ?>" class="preview-float">
							</button>
						</td>
						<td>
							<?= $row->email ?>
						</td>
						<td class="min-width">
							********
						</td>
						<td>
						<?php
						$level = $row->level; 
						switch ($level){
							case 0:
								echo "user";
								break;
							case 1:
								echo "admin";
								break;
							case 2:
								echo "operator";
								break;
						}
						?>
						</td>
						<td>
							<a href="?page=admin&sort=<?= $_GET['sort'] ?>&control=<?= $_GET['control'] ?>&update=<?= $row->user_id ?>
							">
							<button class="btn-control btn-update">Edit</button>
							</a>
							<a href="?page=admin&sort=<?= $_GET['sort'] ?>&control=<?= $_GET['control'] ?>&delete=<?= $row->user_id ?>" 
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



