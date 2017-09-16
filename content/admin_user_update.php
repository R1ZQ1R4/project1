<?php
    include_once('alert.php');
?>

<div class="wrap-modal" id="update">
<div class="modal-box-admin">
        <div class="modal-admin" id="stop">
        <div class="modal-header">
        <h2>Update User</h2>
        </div>
  
<?php
    $id = $_GET['update'];

    $query = $main->model->select($control, $id);
    $row = $query->fetch(PDO::FETCH_OBJ);

    if(isset($_POST['btn_update'])){

        $main->update_user();
    }

?>      
            <form class="modal-body" method="POST"" enctype="multipart/form-data">
                <input type="number" name="id" value="<?= $row->user_id ?>" readonly/>
                <input type="text" name="name" placeholder="Nama" minlength="8" maxlength="100" value="<?= $row->user_name ?>" />
                <input type="email" name="email" placeholder="Email" minlength="8" maxlength="100" value="<?= $row->email ?>" />
                <input type="password" name="password" placeholder="Password" minlength="8" maxlength="100" value="<?= $row->password ?>" />
                <input type="password" name="re_password" placeholder="Re-Password" minlength="8" maxlength="100" value="<?= $row->password ?>"/>
                <label>
                <select name="level">
                    <option value="0" selected>user</option>
                    <option value="1">admin</option>
                    <option value="2">operator</option>

                </select>
                User</label>
                <input type="file" name="picture" value="<?= $row->picture ?>"/>
                <button class="btn btn-submit callback" name="btn_update">submit</button>
                <div class="clear"></div>
            </form>
        <div class="modal-footer">
        </div>
        </div>
        </div>
    </div>