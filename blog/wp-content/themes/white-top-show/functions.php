<?php
/***************************************
work for search form start, adding filter
***************************************/
function whitetopshow_my_search_form( $form ) {
    $form = '
	<form class="form-search navbar-form pull-right" role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <div class="input-append">
    <input class="span2 search-query" type="text" value="' . get_search_query() . '" name="s" id="s" />
	<button type="submit" class="btn" id="searchsubmit">'. esc_attr__( 'Search' ) .'</button>
    </div>
    </form>';

    return $form;
}
add_filter( 'get_search_form', 'whitetopshow_my_search_form' );
/***********************
work for search form end
************************/


/************************
work For navegation start
*************************/
require_once('wp_bootstrap_navwalker.php');
function whitetopshow_register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' , 'whitetopshow'),
      'footer-menu' => __( 'Footer Menu' , 'whitetopshow')
    )
  );
 }
add_action( 'after_setup_theme', 'whitetopshow_register_my_menus' );

/************************
work For navegation start
*************************/

/**************************************************
 * Register our sidebars and widgetized areas.*****
***************************************************/
function whitetopshow_left_widgets_init() {

	register_sidebar( array(
		'name' => 'Home left sidebar',
		'id' => 'home_left_1',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'whitetopshow_left_widgets_init' );

/******************************************************
 * Register our sidebars and widgetized areas end.*****
*******************************************************/


/**********************************
 * Work for post image start.******
***********************************/
function whitetopshow_them_image_setup() {
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
set_post_thumbnail_size( 140, 140, true ); // default Post Thumbnail dimensions (cropped)

// additional image sizes
// delete the next line if you do not need additional image sizes
add_image_size( 'the_small', 64, 64 ); //300 pixels wide (and unlimited height)
}
add_action( 'after_setup_theme', 'whitetopshow_them_image_setup' );
/*******************************
 * Work for post image End.*****
*******************************/


/**********************************
 * Work for post image start.******
***********************************/
function whitetopshow_my_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'after_setup_theme', 'whitetopshow_my_theme_add_editor_styles' );

/*******************************
 * Work for post image End.*****
*******************************/

if ( ! isset( $content_width ) ) $content_width = 900;
/*************************************************
 * Work for script ans stylesheet start.**********
**************************************************/
function whitetopshow_my_scripts_method() {
	global $wp_scripts;
	wp_enqueue_script('custom-script',get_stylesheet_directory_uri() . '/js/bootstrap.min.js',array( 'jquery' ),false,true);
	wp_enqueue_script('custom-script-one',get_stylesheet_directory_uri() . '/js/respond.min.js',array( 'jquery' ),false,true);
	$wp_scripts->add_data('custom-script-one', 'conditional', 'lt IE 9');
	wp_enqueue_script('custom-script-two',get_stylesheet_directory_uri() . '/js/sidd.js',array( 'jquery' ),null,true);
	
}
add_action( 'wp_enqueue_scripts', 'whitetopshow_my_scripts_method' ); 


function whitetopshow_theme_styles()  
{ 
  wp_register_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all' );
  wp_register_style( 'responsive-style', get_template_directory_uri() . '/css/bootstrap-responsive.min.css', array(), false, 'all');
  wp_register_style( 'custom-style', get_template_directory_uri() . '/css/sidd.css', array(), false, 'all' );

  // enqueing:
  wp_enqueue_style( 'bootstrap-style' );
   wp_enqueue_style( 'responsive-style' );
    wp_enqueue_style( 'custom-style' );
}
add_action('wp_enqueue_scripts', 'whitetopshow_theme_styles');

/*************************************************
 * Work for script ans stylesheet End.************
**************************************************/
?>

