<?php
    include_once('alert.php');
?>

<div class="wrap-modal" id="update">
<div class="modal-box-admin">
        <div class="modal-admin" id="stop">
        <div class="modal-header">
        <h2>Update Hotel Room</h2>
        </div>
  
<?php
    $id = $_GET['update'];

    $query = $main->model->select($control, $id);
    $row = $query->fetch(PDO::FETCH_OBJ);

    if(isset($_POST['btn_update'])){

        $main->update_hotel_room();
    }

?>      
        <form class="modal-body" method="POST" enctype="multipart/form-data">
                <input type="text" name="id" value="<?= $row->hotel_room_id ?>" readonly>
                <input type="text" name="name" placeholder="Nama" maxlength="100"  value="<?= $row->room_name ?>"/>
                <textarea name="facility" placeholder="Room Facility"><?= $row->room_facility ?></textarea>
                <label>capacity
                <input type="number" name="capacity" placeholder="0" value="<?= $row->room_capacity ?>" />       
                </label>
                <label>price         
                <input type="number" name="price" placeholder="0" value="<?= $row->room_price ?>" />
                </label>
                <label>amount
                <input type="number" name="amount" placeholder="0" value="<?= $row->room_amount ?>" />
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
               <button class="btn btn-submit callback" name="btn_update">submit</button>
                <div class="clear"></div>
            </form>
        <div class="modal-footer">
        </div>
        </div>
        </div>
    </div>