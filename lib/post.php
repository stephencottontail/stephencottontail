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

remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_before_post_content', 'genesis_post_info' );
add_action( 'genesis_entry_header', 'sc_post_info', 12 );

function sc_post_info() {
	if ( ! is_front_page() ) {
		echo apply_filters( 'genesis_post_info', '[post_date]' );
	}
}

remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
add_action( 'genesis_entry_footer', 'sc_post_meta' );

function sc_post_meta() {
	if ( ! is_front_page() ) {
		echo apply_filters( 'genesis_post_info', '[post_categories] [post_tags] [post_edit]' );
	}
}


