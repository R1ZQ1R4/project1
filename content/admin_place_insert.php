<?php

    if(isset($_POST['btn_register'])){

                $insert = $main->insert_place();
    }
?>

<?php
    include_once('alert.php');
?>

<div class="wrap-modal" id="insert">
<div class="modal-box-admin">
    <div class="modal-admin" id="stop">
    <div class="modal-header">
    <h2>Insert place</h2>
    </div>
        <form class="modal-body" method="POST" enctype="multipart/form-data">
                <input type="text" name="name" placeholder="Nama" maxlength="100"  />
                <input type="file" name="picture">
                <button class="btn btn-submit callback" name="btn_register">submit</button>
                <div class="clear"></div>
            </form>
    <div class="modal-footer">
    </div>
    </div>
</div>
</div>