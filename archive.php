<?php

remove_action( 'genesis_archive_title_descriptions', 'genesis_do_archive_headings_headline', 10, 3 );
add_action( 'genesis_archive_title_descriptions', 'sc_set_archive_title', 10, 3 );

function sc_set_archive_title( $heading = '', $intro_text = '', $context = '' ) {
	$heading = get_the_archive_title();
	$context = 'this-does-nothing';

	if ( $context && $heading ) {
		printf( '<h1 %s>%s</h1>', genesis_attr( 'archive-title' ), strip_tags( $heading ) );
	}
}

genesis();
