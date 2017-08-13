<table class="admin-table">
				<thead>
					<tr>
						<th class="min-width">No</th>
						<th>Nama</th>
						<th class="min-width">Gambar</th>	
						<th>email</th>
						<th class="min-width">password</th>
						<th>level</th>
						<th>Control</th>
					</tr>
				</thead>
				<tbody>
				<?php

				$no = 1;
				while($result = $data[0]->fetch_assoc()){
				
				?>
					<tr>
						<td><?php echo $no; $no++; ?></td>
						<td><?= $result['name'] ?></td>
						<td class="min-width">
							<button class="btn-control relative">preview
							<img src=" assets/img/<?= $result['picture'] ?>" class="preview-float">
							</button>
						</td>
						<td>
							<?= $result['email'] ?>
						</td>
						<td class="">
							********
						</td>
						<td>
						<?php 
						if($result['level']==0){
							echo "user";
						} else{
							echo "admin";
						}
						?>
						</td>
						<td>
							<a href="?page=admin&sort=<?= $_GET['sort'] ?>&control=user&update=<?= $result['user_id'] ?>">
							<button class="btn-control btn-update">Edit</button></a>
							<a href="proses/delete.php?data=<?= $_GET['control'] ?>&id=<?= $result['user_id'] ?> " class="callback"><button class="btn-control btn-delete">hapus</button></a>
							</form>
						</td>
					</tr>
					
				<?php

					}



				?>
				</tbody>

</table>

<div class="pagination">
	<?php for($i=1; $i<=$data[1]; $i++){ ?>
		<a href="?page=admin&sort=<?= $i ?>&control=user"><?= $i ?></a>

	<?php } ?>
</div>



