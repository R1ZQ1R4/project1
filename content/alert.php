<?php
    if(isset($alert_danger)): 
?>
   <div class='wrap-modal'> 
        <div class="modal-admin alert danger">
                <?= $alert_danger ?> 

        </div>
    </div>
<?php
    elseif(isset($alert_succes)):
?>
    <div class='wrap-modal'> 
        <div class="modal-admin alert success">
                <?= $alert_succes ?>
                    
        </div>
    </div> 
<?php
    endif;
?>