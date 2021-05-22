<?php
if(isset($errors) && count($errors) > 0)
{
    foreach($errors as $error_msg)
    {
        echo '<div class="alert alert-danger">'.$error_msg.'</div>';
    }
}

if(isset($success))
{

    echo '<div class="alert alert-success">'.$success.'</div>';
}
?>