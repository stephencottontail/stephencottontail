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

// Let's do something different for the post date
function sc_post_date() {
	echo apply_filters( 'genesis_post_info', sprintf( '<a href="%s" rel="bookmark">[post_date]</a>', esc_url( get_permalink() ) ) );
}
