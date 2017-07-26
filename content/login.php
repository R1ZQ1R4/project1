<?php
    if ( isset($_SESSION['name'])) {
        header("Location: ?page=admin");
    }
?>

<?php
    if(isset($_POST['btn_login'])){

        $email = $_POST['email'];
        $pass = $_POST['password'];

        if ( !empty($email) AND !empty($pass)) {
            $email = $mysqli->real_escape_string($email);
            $pass = $mysqli->real_escape_string($pass);

            $query = "SELECT name FROM user WHERE (email='$email' AND password='$pass')";
            $result = mysqli_query($mysqli, $query);
            $row = $result->fetch_assoc();
            
            if ( mysqli_num_rows($result) == 0 ) {
                $alert_danger = "Email atau Password Salah !";
                
            }else{
                $_SESSION['name'] = $row['name'];          
                header('Location: ?page=admin');
            }

        }else{
                $alert_danger = "tidak boleh ada yang kosong !";
        }
        
    }
?>

<div class="wrap-modal">
        <div class="modal">
        <div class="modal-header">
        <h2>Login</h2>
        </div>
        
        <?php
            if(isset($alert_danger)){ 
        ?>
           <div class='alert danger'> <?= $alert_danger ?> </div>
        <?php
            }
        ?>
        <form class="modal-body" method="POST">
        
                <input type="email" name="email" placeholder="Email" minlength="8" maxlength="100"/>
                <input type="password" name="password" placeholder="Password" minlength="8" maxlength="100" />
                <button class="btn-submit" name="btn_login" role="submit">submit</button>
                <div class="clear"></div>
            </form>
        <div class="modal-footer">
            <a class="form-link" href="?page=register">buat akun !</a>
        </div>
        </div>
    </div>