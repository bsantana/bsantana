<div id="footer">
    <div class="container">
    	<div class="col-three">
    		<?php
		        if ( is_active_sidebar('footer-1') ) :
		            dynamic_sidebar('footer-1');
		        endif;
		    ?>
    	</div>
    	<div class="col-three">
    		<?php
		        if ( is_active_sidebar('footer-2') ) :
		            dynamic_sidebar('footer-2');
		        endif;
		    ?>
    	</div><div class="col-three">
    		<?php
		        if ( is_active_sidebar('footer-3') ) :
		            dynamic_sidebar('footer-3');
		        endif;
		    ?>
    	</div>
    </div>
    <?php wp_footer(); ?>
</div>

</body>
</html>