<?php
/**
 * @package WordPress
 * @subpackage Paint Style
 */
?>
    <div class="one-third column omega" id="side">
        <div class="sidebar"> <!--  the Sidebar -->
            <?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?> <?php dynamic_sidebar( 'right-sidebar' ); ?>
	        <?php endif; ?>
       </div>
    </div>
