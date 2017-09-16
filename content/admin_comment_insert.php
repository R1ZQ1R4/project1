<?php

    if(isset($_POST['btn_register'])){

                $insert = $main->insert_comment();
    }
?>

<?php
    include_once('alert.php');
?>

<div class="wrap-modal" id="insert">
<div class="modal-box-admin">
    <div class="modal-admin" id="stop">
    <div class="modal-header">
    <h2>Insert Comment</h2>
    </div>
        <form class="modal-body" method="POST"">

                <textarea name="content" placeholder="Comment Here"></textarea>
                <label>   
                <select name="article">
                    <?php
                        $query = $main->model->selectAll('article');
                        while($row = $query->fetch(PDO::FETCH_OBJ)){
                    ?>
                        <option value="<?= $row->article_id ?>"><?= $row->article_name ?></option>
                    <?php
                        }
                    ?>
                </select>
                Article</label>

                <label>   
                <select name="user">
                    <?php
                        $query = $main->model->selectAll('user');
                        while($row = $query->fetch(PDO::FETCH_OBJ)){
                    ?>
                        <option value="<?= $row->user_id ?>"><?= $row->user_name ?></option>
                    <?php
                        }
                    ?>
                </select>
                User</label>
                
                <button class="btn btn-submit callback" name="btn_register">submit</button>
                <div class="clear"></div>
            </form>
    <div class="modal-footer">
    </div>
    </div>
</div>
</div>