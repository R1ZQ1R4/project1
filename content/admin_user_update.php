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

    $query = $main->model->select($id, $control);
    $result = $query->get_result();
    $row = $result->fetch_assoc();

    if(isset($_POST['btn_update'])){

        $main->update();
    }

?>      
            <form class="modal-body" method="POST"" enctype="multipart/form-data">
                <input type="number" name="id" value="<?= $row['user_id'] ?>" readonly/>
                <input type="text" name="name" placeholder="Nama" minlength="8" maxlength="100" value="<?= $row['name'] ?>" />
                <input type="email" name="email" placeholder="Email" minlength="8" maxlength="100" value="<?= $row['email'] ?>" />
                <input type="password" name="password" placeholder="Password" minlength="8" maxlength="100" value="<?= $row['password'] ?>" />
                <input type="password" name="re_password" placeholder="Re-Password" minlength="8" maxlength="100" value="<?= $row['password'] ?>"/>
                <select name="level">
                    <option value="0" selected>user</option>
                    <option value="1">admin</option>
                </select>
                <input type="file" name="picture" value="<?= $row['picture'] ?>"/>
                <button class="btn btn-submit callback" name="btn_update">submit</button>
                <div class="clear"></div>
            </form>
        <div class="modal-footer">
        </div>
        </div>
        </div>
    </div>