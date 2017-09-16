<?php

    if(isset($_POST['btn_register'])){

                $insert = $main->insert_transaction();
    }
?>

<?php
    include_once('alert.php');
?>

<div class="wrap-modal" id="insert">
<div class="modal-box-admin">
    <div class="modal-admin" id="stop">
    <div class="modal-header">
    <h2>Insert Transaction</h2>
    </div>
        <form class="modal-body" method="POST"">
                <label>Checkin
                <input type="date" name="checkin">
                </label>

                <label>Day booked
                <input type="number" name="checkout" value="0">
                </label>

                <label>Reserved room
                <input type="number" name="reserved" value="0">
                </label>

                <label>
                <select name="user">
                    <?php
                        $query = $main->model->selectAll('user');  
                        while($row = $query->fetch(PDO::FETCH_OBJ)){ 
                    ?>
                    <option value="<?= $row->user_id ?>"><?= $row->user_name?></option>
                    <?php
                        }
                    ?>
                </select>
                User</label>

                <label>
                <select name="hotel_room">
                    <?php
                        $tables = array('hotel');
                        $query = $main->model->selectAllJoin($tables, 'hotel_room');  
                        while($row = $query->fetch(PDO::FETCH_OBJ)){ 
                    ?>
                    <option value="<?= $row->hotel_room_id ?>"> <?php echo $row->hotel_name . ' : ' . $row->room_name?> </option>
                    <?php
                        }
                    ?>
                </select>
                Hotel room</label>

                <button class="btn btn-submit callback" name="btn_register">submit</button>
                <div class="clear"></div>
            </form>
    <div class="modal-footer">
    </div>
    </div>
</div>
</div>