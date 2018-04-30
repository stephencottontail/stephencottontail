<?php

remove_action( 'genesis_list_comments', 'genesis_default_list_comments' );
add_action( 'genesis_list_comments', 'sc_default_list_comments' );

function sc_default_list_comments() {
	$args = array(
		'type'        => 'comment',
			'avatar_size' => 96,
			'callback'    => 'sc_show_comment'
	);

	$args = apply_filters( 'genesis_comment_list_args', $args );

	wp_list_comments( $args );
}

function sc_show_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<?php do_action( 'genesis_before_comment' ); ?>
		<article class="comment-body">
			<div class="comment-avatar">
				<?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
			</div>

			<div class="comment-content">
				<header class="comment-header">
					<cite class="fn"><?php echo get_comment_author_link(); ?></cite>
					<p class="comment-time"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><?php echo get_comment_date() . ', ' . get_comment_time(); ?></a>
				</header><!-- .comment-header -->

				<div class="comment-text">
					<?php if ( '0' !== $comment->comment_approved ) : ?>
						<p class="awaiting-moderation">Your comment is awaiting moderation.</p>
					<?php
					endif;

					if ( '0' !== $comment->comment_parent ) : ?>
						<p class="comment-parent">In reply to <a href="<?php echo esc_url( get_comment_link( $comment->comment_parent ) ); ?>"><?php echo esc_url( get_comment_author_link( $comment->comment_parent ) ); ?></a>
					<?php
					endif;

					comment_text();
					?>

					<div class="comment-actions">
						<?php
						comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
						edit_comment_link( 'Edit' );
						?>
					</div><!-- .comment-actions -->
				</div><!-- .comment-body -->
			</div><!-- .comment-content -->
		</article>
<?php
}
