<?php

// We need to show featured images on single posts so here we go
remove_action( 'genesis_entry_content', 'genesis_do_post_image' );

function sc_show_post_image() {
	$img = genesis_get_image( array(
		'format'  => 'html',
		'size'    => genesis_get_option( 'image_size' ),
		'context' => 'archive',
		'attr'    => genesis_parse_attr( 'entry-image', array(
			'alt' => get_the_title(),
		) ),
	) );

	if ( ! empty( $img ) ) {
		genesis_markup( array(
			'open'    => '<a %s>',
			'close'   => '</a>',
			'content' => wp_make_content_images_responsive( $img ),
			'context' => 'entry-image-link',
		) );
	}
}
add_action( 'genesis_entry_header', 'sc_show_post_image', 1 );

genesis();
