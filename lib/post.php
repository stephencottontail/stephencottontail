<?php

/* Let's brute-force this shit instead of using Genesis' Customizer options */
function sc_set_excerpt_length() {
	if ( is_front_page() ) {
		return 15;
	} else {
		return 30;
	}
}
add_filter( 'excerpt_length', 'sc_set_excerpt_length' );
