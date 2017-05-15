<div id="sidebar">
    <!--<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Main Sidebar') ) : ?>
    not
    <?php endif; ?>-->

    <?php
        if ( is_active_sidebar('sidebar-1') ) :
            dynamic_sidebar('sidebar-1');
        endif;
    ?>


    nos
    <?php do_action('foo'); ?>
</div>