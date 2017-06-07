
<?php
    $userdata = get_userdata( get_current_user_id() );
?>

<div id="wp-mvc__wrap">

    <?php
        $user_role = user_control::get_role();
    ?>

    <div class="wp-mvc_option">
        <?php
            _e( form::page_option_field( 'add_new' ), 'option' );
        ?>
    </div>
    
    <h2 class="wp-mvc_title wp-mvc_add_new-title">
    
        <?php 
             _e( form::page_title(), 'title' );
        ?>

    </h2>
    
    <div class="ajaxs-results"></div>
    
    <div class='wp-mvc__add_new_wrap'>
        
        <?php
            _e( form::add_new_inner(), 'wp-mvc' );
        ?>

    </div>


</div>

