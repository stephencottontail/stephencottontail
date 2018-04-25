<?php

// Force full width content layout
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

// We use custom loops on the front page, so we don't need this stuff
remove_action( 'genesis_loop', 'genesis_do_loop' );
remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );

// We use custom post displays on the fron page too, so we don't need this either
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
remove_action( 'genesis_after_post_content', 'genesis_post_meta' );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

function sc_front_loop() {
	?>
	<div class="front-page-posts-section recent-posts-section">
		<h2 class="section-title">Recent Work</h2>
		<?php
		$projects_args = array(
			'post_type'           => 'jetpack-portfolio',
			'posts_per_page'      => 2,
			'ignore_sticky_posts' => true
		);
		
		genesis_custom_loop( $projects_args );
		?>
		<a href="<?php esc_url( get_post_type_archive_link( 'jetpack-portfolio' ) ); ?>">See More&hellip;</a>
	</div>
	
	<div class="front-page-posts-section recent-projects-section">
		<h2 class="section-title">Recent Posts</h2>
		<?php
		$blog_args = array(
			'posts_per_page'      => 2,
			'ignore_sticky_posts' => true
		);
		
		genesis_custom_loop( $blog_args );
		?>
		<a href="<?php esc_url( get_option( 'page_for_posts' ) ); ?>">See More&hellip;</a>
	</div>
<?php
}
add_action( 'genesis_loop', 'sc_front_loop' );

function sc_front_page_post_content() {
	if ( has_post_thumbnail() ) {
		genesis_do_post_image();
	} else {
		genesis_do_post_content();
	}
}
add_action( 'genesis_entry_content', 'sc_front_page_post_content' );

function sc_post_date() {
	echo apply_filters( 'genesis_post_info', '[post_date]' );
}
add_action( 'genesis_entry_footer', 'sc_post_date' );

genesis();
