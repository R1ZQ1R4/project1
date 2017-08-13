<?php include_once('content/nav.php'); ?>

<main class="normalize" id="start">
	<div class="container">
		<div class="main-title">
			<h1><?= $title ?></h1>
		</div>
			<div class="main-static">

			<?php 

			if( $title == 'contact' ):

			?>
				<div class="side-img">
					
				</div>
				<div class="side-content">
					        
					        <form class="modal-body" method="POST" id="login_form">
					        
					                <input type="email" name="email" id="email" placeholder="Email" minlength="8" maxlength="100"/>
					                <input type="password" name="password" id="password" placeholder="Password" minlength="8" maxlength="100" />
					                <button type="submit" class="btn btn-submit" name="btn_login" id="btn_login">submit</button>
					                <div class="clear"></div>
					            </form>
					        <div class="modal-footer">
					            <a class="form-link" href="?page=register">buat akun !</a>
					        </div>
					        </div>
					</div>

				<?php

				endif;

				?>
				</div>
			</div>
		</div>
	</div>

</main>

<?php include_once('content/footer.php'); ?>