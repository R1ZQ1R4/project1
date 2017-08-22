<?php

    if(isset($_POST['btn_register'])){

                $insert = $main->insert_article();
    }
?>

<?php
    include_once('alert.php');
?>

<div class="wrap-modal" id="insert">
<div class="modal-box-admin">
    <div class="modal-admin" id="stop">
    <div class="modal-header">
    <h2>Insert Article</h2>
    </div>
        <form class="modal-body" method="POST"">
                <input type="text" name="name" placeholder="Nama" minlength="8" maxlength="100"  />
                <input type="email" name="email" placeholder="Email" minlength="8" maxlength="100" />
                <input type="password" name="password" placeholder="Password" minlength="8" maxlength="100" />
                <input type="password" name="re_password" placeholder="Re-Password" minlength="8" maxlength="100"/>
                <!-- <select name="level">
                    <option value="0" selected>user</option>
                    <option value="1">admin</option>
                </select>
                <input type="file" name="picture"/> -->
                <button class="btn btn-submit callback" name="btn_register">submit</button>
                <div class="clear"></div>
            </form>
    <div class="modal-footer">
    </div>
    </div>
</div>
</div>