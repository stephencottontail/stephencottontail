<?php

remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'sc_do_footer' );

function sc_do_footer() {
	?>
	<p class="site-info">Proudly powered by <a href="https://wordpress.org/" rel="generator">WordPress</a> and the <a href="https://my.studiopress.com/themes/genesis/">Genesis framework</a></p>
	<p class="copyright">Copyright &copy; 2018 Stephen Dickinson</p>
<?php
}
