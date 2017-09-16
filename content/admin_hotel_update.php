<?php
    include_once('alert.php');
?>

<div class="wrap-modal" id="update">
<div class="modal-box-admin">
        <div class="modal-admin" id="stop">
        <div class="modal-header">
        <h2>Update Hotel</h2>
        </div>
  
<?php
    $tables = array('place');
    $id = $_GET['update'];

    $query = $main->model->selectJoin($tables, $control, $id);
    $row = $query->fetch(PDO::FETCH_OBJ);

    if(isset($_POST['btn_update'])){

        $main->update_hotel();
    }

?>      
            <form class="modal-body" method="POST"" enctype="multipart/form-data">
                <input type="number" name="id" value="<?= $row->hotel_id ?>">
                <input type="text" name="name" placeholder="Nama" minlength="8" maxlength="100"  value="<?= $row->hotel_name ?>"/>
                <input type="text" name="address" placeholder="Address" minlength="8" maxlength="100"  value="<?= $row->hotel_address ?>" />
                <textarea name="content"><?= $row->hotel_content ?></textarea>
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
                <input type="number" name="rate" placeholder="0" value="<?= $row->hotel_rate ?>">
                <input type="file" name="picture"/>
                <button class="btn btn-submit callback" name="btn_update">submit</button>
                <div class="clear"></div>
            </form>
        <div class="modal-footer">
        </div>
        </div>
        </div>
    </div>