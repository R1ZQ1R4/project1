<?php
    if(isset($_POST['btn_register'])){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $re_pass = $_POST['re_password'];
        $level = 'user';

        if ( !empty($name) AND !empty($email) AND !empty($pass) AND !empty($re_pass)) {
            
        
            if ( $pass == $re_pass) {
                // $name = $mysqli->real_escape_string($name);
                // $email = $mysqli->real_escape_string($email);
                // $pass = $mysqli->real_escape_string($pass);
                    $insert = $mysqli->prepare("INSERT INTO user (name, email, password) VALUES (?, ?, ?");
                    $insert->bind_param("sss", $name, $email, $pass);
                    $insert->execute();
                    $insert ? $alert_succes = "sukses mendaftar!" : '';
                

            }else{
                $alert_danger = "password tidak sama !";
            }
        }else{
            $alert_danger = "tidak boleh ada yang kosong !";
        }
        
    }
?>

<div class="wrap-modal">
        <div class="modal">
        <div class="modal-header">
        <h2>Register</h2>
        </div>
        <?php
            if(isset($alert_danger)): 
        ?>
           <div class='alert danger'> <?= $alert_danger ?> </div>
        <?php
            elseif(isset($alert_succes)):
        ?>
            <div class="alert success"> <?= $alert_succes ?> </div>
        <?php
            endif;
        ?>
        
            <form class="modal-body" method="POST"">
                <input type="text" name="name" placeholder="Nama" minlength="8" maxlength="100"/>
                <input type="email" name="email" placeholder="Email" minlength="8" maxlength="100"/>
                <input type="password" name="password" placeholder="Password" minlength="8" maxlength="100" />
                <input type="password" name="re_password" placeholder="Re-Password" minlength="8" maxlength="100"/>
                <button class="btn btn-submit" name="btn_register" role="submit">submit</button>
                <div class="clear"></div>
            </form>
        <div class="modal-footer">
            <a class="form-link" href="?page=login">Sudah punya akun !</a>
        </div>
        </div>
    </div>