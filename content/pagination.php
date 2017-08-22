<div class="pagination">
	<?php for($i=1; $i<=$view['page']; $i++){ ?>
		<a href="?page=admin&sort=<?= $i ?>&control=<?= $_GET['control'] ?> "><?= $i ?></a>

	<?php } ?>
</div>