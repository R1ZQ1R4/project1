<?php include_once('content/nav.php'); ?>

<?php
	if (isset($_POST['write'])):
?>
		<div class="wrap-modal" id="insert">
		<div class="modal-box-admin">
		    <div class="modal-admin" id="stop">
		    <div class="modal-header">
		    <h2>Write Comment</h2>
		    </div>
		        <form class="modal-body" method="POST"">
		                <textarea name="content" placeholder="Comment Here"></textarea>
		                <label>   
		                <input type="hidden" name="article" value="<?= $_GET['id'] ?>">
		                <input type="hidden" name="user" value="<?= $_SESSION['id'] ?>">
		                <button class="btn btn-submit callback" name="input_comment">submit</button>
		                <div class="clear"></div>
		            </form>
		    <div class="modal-footer">
		    </div>
		    </div>
		</div>
		</div>
<?php
	elseif (isset($_POST['input_comment'])):
		$insert = $main->insert_comment();
	endif;

?>

<?php
	$id = $_GET['id'];
	$main->model->article($id);
	$query = $main->model->db->prepare("SELECT * FROM article WHERE article_id=? ");
	$query->execute(array($id));

	$row = $query->fetch(PDO::FETCH_OBJ);
?>

<header id="header" style="background-image: url(assets/img/<?= $row->article_picture ?>);">
	<div class="hero">
	</div>
</header>

<main id="start">
	<div class="container">
		<div class="main-title">
			<h1><?= $row->article_name ?></h1>
		</div>
		<div class="main-article">
			<img src="assets/img/<?= $row->article_picture ?>" alt="picture"/>
			<p>
			<?= $row->article_content ?>
			</p>
		</div>
		<div class="main-comment">
		<div class="main-title" style="padding-bottom: 30px">
			<h1>Comment</h1>
		</div>
			<?php
				$query = $main->model->db->prepare("SELECT * FROM comment LEFT JOIN user ON comment.user_id=user.user_id WHERE comment.article_id=? ");
				$query->execute(array($id));

				while ( $row = $query->fetch(PDO::FETCH_OBJ)) {
				
			?>
			<div class="comment-box">

				<h3><?= $row->user_name ?></h3>
				<div class="comment-content">
					<p><?= $row->comment_content ?></p>
				</div>
			</div>
			<?php
				}
			?>
			<form action="" method="post">
			<button class="btn global" name="write">Write Comment</button>
			</form>
		</div>
		</div>
	</div>

</main>

<div class="card-wrap">
	<div class="main-title">
			<h1>intersting place</h1>
	</div>
	<div class="card-row">
		<?php
			$query = $main->model->db->prepare("SELECT * FROM article WHERE article.category_id=2 ORDER BY RAND() DESC LIMIT 3");
			$query->execute();

			while( $row = $query->fetch(PDO::FETCH_OBJ) ){
		?>
		<div class="card">
		<a class="card-item" href="?page=article&id=<?= $row->article_id ?>">
			<div class="card-header">
				<img src="assets/img/<?= $row->article_picture ?>">
			</div>
			<div class="card-body">
				<div class="card-title">
					<h4><?= $row->article_name?></h4>
				</div>
			</div>

		</a>
		</div>

		<?php
			}
		?>

	</div>

</div>

<div class="card-wrap">

	<div class="main-title">
		<h1>Culture</h1>
	</div>

	<div class="card-row">
		<?php 
			$query = $main->model->db->prepare("SELECT * FROM article WHERE article.category_id=1 OR article.category_id=3 ORDER BY RAND() LIMIT 3");
			$query->execute();

			while( $row = $query->fetch(PDO::FETCH_OBJ) ){
		?>
		<div class="card">
		<a class="card-item" href="?page=article&id=<?= $row->article_id ?>">
			<div class="card-header">
				<img src="assets/img/<?= $row->article_picture ?>">
			</div>
			<div class="card-body">
				<div class="card-title">
					<h4><?= $row->article_name?></h4>
				</div>
			</div>

		</a>
		</div>
		<?php
			}
		?>
	</div>

</div>

<div class="card-wrap">

	<div class="main-title">
		<h1>Other Event</h1>
	</div>

	<div class="card-row">
		<?php 
			$query = $main->model->db->prepare("SELECT * FROM article WHERE article.category_id=5 OR article.category_id=4 ORDER BY RAND() DESC LIMIT 3");
			$query->execute();

			while( $row = $query->fetch(PDO::FETCH_OBJ) ){
		?>
		<div class="card">
		<a class="card-item" href="?page=article&id=<?= $row->article_id ?>">
			<div class="card-header">
				<img src="assets/img/<?= $row->article_picture ?>">
			</div>
			<div class="card-body">
				<div class="card-title">
					<h4><?= $row->article_name?></h4>
				</div>
			</div>

		</a>
		</div>
		<?php
			}
		?>
	</div>
</div>



<?php include_once('content/footer.php'); ?>

<a href="#" class="scroll-top scroll" scroll="#header" id="scroll-top">up</a>
