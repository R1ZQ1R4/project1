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
        <form class="modal-body" method="POST"" enctype="multipart/form-data">
                <input type="text" name="name" placeholder="Nama" minlength="8" maxlength="100"  />
                <textarea name="content" placeholder="Content Here"></textarea>

                <label>
                <select name="place">
                    <?php
                        $query = $main->model->selectAll('place');  
                        while($row = $query->fetch(PDO::FETCH_OBJ)){ 
                    ?>
                    <option value="<?= $row->place_id ?>"><?= $row->place_name?></option>
                    <?php
                        }
                    ?>
                </select>
                Place</label>

                <label>
                <select name="category">
                    <?php
                        $query = $main->model->selectAll('category');  
                        while($row = $query->fetch(PDO::FETCH_OBJ)){ 
                    ?>
                    <option value="<?= $row->category_id ?>"><?= $row->category_name?></option>
                    <?php
                        }
                    ?>
                </select>
                Category</label>

                <input type="file" name="picture" value=""/>
                <button class="btn btn-submit callback" name="btn_register">submit</button>
                <div class="clear"></div>
            </form>
    <div class="modal-footer">
    </div>
    </div>
</div>
</div>