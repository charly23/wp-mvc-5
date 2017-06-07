<?php
    $userdata = get_userdata( get_current_user_id() );
?>

<div id="wp-mvc__wrap">

    <?php
        $user_role = user_control::get_role();
    ?>
    
    <h2 class="wp-mvc_title wp-mvc_help-title">
    
        <?php 
             _e( form::page_title() );
        ?>

    </h2>
    
    <div class="ajaxs-results"></div>
    
    <div class='wp-mvc__help_wrap'>
        
        <?php
            _e( form::help_inner(), 'wp-mvc' );
        ?>

    </div>


</div>

