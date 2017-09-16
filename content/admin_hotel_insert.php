<?php

    if(isset($_POST['btn_insert'])){

                $insert = $main->insert_hotel();
    }
?>

<?php
    include_once('alert.php');
?>

<div class="wrap-modal" id="insert">
<div class="modal-box-admin">
    <div class="modal-admin" id="stop">
    <div class="modal-header">
    <h2>Insert hotel</h2>
    </div>
        <form class="modal-body" method="POST" enctype="multipart/form-data">
                <input type="text" name="name" placeholder="Nama" minlength="8" maxlength="100"  />
                <input type="text" name="address" placeholder="Address" minlength="8" maxlength="100" />
                <textarea name="content"></textarea>
                <label>
                <select name="place">
                    <?php
                        $query = $main->model->selectAll('place');
                        while($row = $query->fetch(PDO::FETCH_OBJ)){
                    ?>
                        <option value="<?= $row->place_id ?>"><?= $row->place_name ?></option>
                    <?php
                        }
                    ?>
                </select>
                Place</label>
                <input type="file" name="picture"/>
                <button class="btn btn-submit callback" name="btn_insert">submit</button>
                <div class="clear"></div>
            </form>
    <div class="modal-footer">
    </div>
    </div>
</div>
</div>