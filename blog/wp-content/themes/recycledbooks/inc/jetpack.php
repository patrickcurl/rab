<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package recycledbooks
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function recycledbooks_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'recycledbooks_jetpack_setup' );
