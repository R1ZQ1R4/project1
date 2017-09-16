<?php
    if(isset($_POST['btn_register'])){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $re_pass = $_POST['re_password'];
        $level = 0;

        if ( !empty($name) AND !empty($email) AND !empty($pass) AND !empty($re_pass)) {
            
        
            if ( $pass == $re_pass) {
                // $name = $mysqli->real_escape_string($name);
                // $email = $mysqli->real_escape_string($email);
                // $pass = $mysqli->real_escape_string($pass);

                $stmt = $mysqli->prepare("INSERT INTO user (user_name, email, password, level) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $name, $email, $pass, $level);
                // $result = mysqli_query($mysqli, $insert);
                $stmt->execute();
                $stmt ? $alert_succes = "sukses mendaftar!" : '';

            }else{
                $alert_danger = "password tidak sama !";
            }
        }else{
            $alert_danger = "tidak boleh ada yang kosong !";
        }
        
    }
?>

<div class="wrap-modal none" id="register-modal">
    <div class="modal-box">
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
            <a class="form-link login-btn" href="?page=login" class="switcher">Sudah punya akun !</a>
        </div>
        </div>
    </div>
</div>