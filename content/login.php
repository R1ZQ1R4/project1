<?php

    // if(isset($_POST['btn_login'])){
    if(isset($_POST['btn_login'])){

        $email = $mysqli->real_escape_string($_POST['email']);
        $pass = $mysqli->real_escape_string($_POST['password']);

        if ( !empty($email) AND !empty($pass)) {

            //procedural mysqli
            // $email = $mysqli->real_escape_string($email);
            // $pass = $mysqli->real_escape_string($pass);

            // $query = "SELECT name FROM user WHERE (email='$email' AND password='$pass')";
            // $result = mysqli_query($mysqli, $query);
            // $row = $result->fetch_assoc();

            // //prepared statement OOP
            // // membuat prepared statement
            // $stmt = $mysqli->prepare("SELECT name FROM user WHERE (email=? AND password=?)");
            // //bind parameter
            // // s = string, i = integer, d = double, b = blob (binary)
            // $stmt->bind_param("ss", $email, $pass);
            // //eksekusi
            // $stmt->execute();

            //versi 2 code OOP version
            $query = $mysqli->query("SELECT * FROM user WHERE email='$email' AND password='$pass'");
            $result = $query->fetch_assoc();
            $row = $query->num_rows;
            
            if ( $row == 0 ) {
                $alert_danger = "Email atau Password Salah !";
                
            }else{
                $_SESSION['id'] = $result['user_id'];
                $_SESSION['level'] = $result['level'];  
                $_SESSION['name'] = $result['user_name']; 
                $_SESSION['picture'] = $result['picture'];      
                header('Location: ?page=admin');
            }

        }else{
                $alert_danger = "tidak boleh ada yang kosong !";
        }
        
    }else{
        // $alert_danger = "error !";
    }
?>

<div class="wrap-modal none" id="login-modal">
    <div class="modal-box">
        <div class="modal" id="stop">
        <div class="modal-header">
        <h2>Login</h2>
        </div>
        
        <?php
            if(isset($alert_danger)):
        ?>
           <div class='alert danger'> <?= $alert_danger ?> </div>
        <?php
            endif;
        ?>
        <form class="modal-body" method="POST" id="login_form">
        
                <input type="email" name="email" id="email" placeholder="Email" minlength="8" maxlength="100" autofocus/>
                <input type="password" name="password" id="password" placeholder="Password" minlength="8" maxlength="100" />
                <button type="submit" class="btn btn-submit" name="btn_login" id="btn_login">submit</button>
                <div class="clear"></div>
            </form>
        <div class="modal-footer">
            <a class="form-link register-btn" href="?page=register">buat akun !</a>
        </div>
        </div>
    </div>
</div>