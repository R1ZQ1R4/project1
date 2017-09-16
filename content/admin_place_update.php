<?php
    include_once('alert.php');
?>

<div class="wrap-modal" id="update">
<div class="modal-box-admin">
        <div class="modal-admin" id="stop">
        <div class="modal-header">
        <h2>Update place</h2>
        </div>
  
<?php
    $id = $_GET['update'];

    $query = $main->model->select($control, $id);
    $row = $query->fetch(PDO::FETCH_OBJ);

    if(isset($_POST['btn_update'])){

        $main->update_place();
    }

?>      
            <form class="modal-body" method="POST"" enctype="multipart/form-data">
                <input type="number" name="id" value="<?= $row->place_id ?>" readonly/>
                <input type="text" name="name" placeholder="Nama" maxlength="100" value="<?= $row->place_name ?>" />
                                <input type="file" name="picture">

                <button class="btn btn-submit callback" name="btn_update">submit</button>
                <div class="clear"></div>
            </form>
        <div class="modal-footer">
        </div>
        </div>
        </div>
    </div>