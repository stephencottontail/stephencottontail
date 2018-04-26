<?php
/**
 * stephencottontail.com
 *
 * This is the custom theme for my own site
 *
 * @package stephencottontail
 * @author Stephen Dickinson
 * @license GPL-2.0+
 */

// Start the engine
include_once( get_theme_file_path( '/lib/init.php' ) );

// Load some other stuff
include_once( get_stylesheet_directory() . '/lib/header.php' );
include_once( get_stylesheet_directory() . '/lib/post.php' );

// Child theme defines
define( 'CHILD_THEME_NAME', 'stephencottontail.com' );
define( 'CHILD_THEME_URL', 'http://stephencottontail.com/' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

// Add HTML5 support
add_theme_support( 'html5', array(
		'caption',
		'comment-form',
		'comment-list',
		'gallery',
		'search-form'
) );

// Use genesis' built-in a11y support
add_theme_support( 'genesis-accessibility', array(
	'404-page',
	'drop-down-menu',
	'headings',
	'rems',
	'search-form',
	'skip-links'
) );

// Add viewport meta tage for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

function sc_enqueue_crap() {
	wp_enqueue_style( 'normalize', get_theme_file_uri( '/assets/css/normalize.css' ) );
	wp_enqueue_style( 'sc-google-fonts', '//fonts.googleapis.com/css?family=Trirong:400,400i,900,900i|Rubik' );

	wp_enqueue_script( 'sc-menus', get_theme_file_uri( '/assets/js/mobile-navigation.js' ), array( 'jquery' ), null, true );
}
add_action( 'genesis_meta', 'sc_enqueue_crap' );
