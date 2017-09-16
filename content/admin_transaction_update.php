<?php
    include_once('alert.php');
?>

<div class="wrap-modal" id="update">
<div class="modal-box-admin">
        <div class="modal-admin" id="stop">
        <div class="modal-header">
        <h2>Update Transaction</h2>
        </div>
  
<?php
    $id = $_GET['update'];

    $query = $main->model->select($control, $id);
    $row = $query->fetch(PDO::FETCH_OBJ);

    if(isset($_POST['btn_update'])){

        $main->update_transaction();
    }

?>      
           <form class="modal-body" method="POST"">
                <input type="text" name='id' value="<?= $row->transaction_id ?>" readonly>
                <input type="text" name='code' value="<?= $row->transaction_code ?>" readonly>
                <!-- <label>Checkin
                <input type="date" name="checkin" value="<?= $row->checkin ?>">
                </label>

                <label>Day booked
                <input type="number" name="checkout" value="<?= $row->checkout ?>">
                </label>

                <label>Reserved room
                <input type="number" name="reserved" value="<?= $row->reserved ?>">
                </label> -->

<!--                 <label>
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
 -->
                <label>
                <select name="status">
                    <option value="0">Canceled</option>
                    <option value="1">Booked</option>
                    <option value="2">Occupied</option>
                    <option value="3">Pending</option>
                    <option value="9">Completed</option>

                </select>
                Status</label>

                <button class="btn btn-submit callback" name="btn_update">submit</button>
                <div class="clear"></div>
            </form>
        <div class="modal-footer">
        </div>
        </div>
        </div>
    </div>