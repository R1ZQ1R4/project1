<?php

    if(isset($_POST['btn_insert'])){

                $insert = $main->insert_hotel_room();
    }
?>

<?php
    include_once('alert.php');
?>


<div class="wrap-modal" id="insert">
<div class="modal-box-admin">
    <div class="modal-admin" id="stop">
    <div class="modal-header">
    <h2>Insert Room Hotel</h2>
    </div>
        <form class="modal-body" method="POST" enctype="multipart/form-data">
                <input type="text" name="name" placeholder="Nama" maxlength="100"  />
                <textarea name="facility" placeholder="Room Facility"></textarea>
                <label>capacity
                <input type="number" name="capacity" placeholder="0" value="0" />       
                </label>
                <label>price         
                <input type="number" name="price" placeholder="0" value="0" />
                </label>
                <label>amount
                <input type="number" name="amount" placeholder="0" value="0" />
                </label>

                <label>
                <select name="hotel">
                    <?php
                        $query = $main->model->selectAll('hotel');
                        while($row = $query->fetch(PDO::FETCH_OBJ)){
                    ?>
                        <option value="<?= $row->hotel_id ?>"><?= $row->hotel_name ?></option>
                    <?php
                        }
                    ?>
                </select>
                Hotel</label>
                <input type="file" name="picture">
               <button class="btn btn-submit callback" name="btn_insert">submit</button>
                <div class="clear"></div>
            </form>
    <div class="modal-footer">
    </div>
    </div>
</div>
</div>