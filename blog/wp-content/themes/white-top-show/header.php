<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title> 
      <?php 
	  if ( ! isset( $content_width ) ) $content_width = 900;
	  wp_title('|',true,'right'); ?><?php bloginfo('name'); ?>
    </title>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
       <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    <a class="brand" href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a>
      <div class="nav-collapse collapse">
      <?php    
	  wp_nav_menu(array('theme_location'  => 'header-menu','menu_class' => 'nav','menu'=>'dropdown-menu','depth' => 3,'walker' => new wp_bootstrap_navwalker(),'fallback_cb' => false));
	  ?>
       <?php get_search_form(); ?>
      </div>
      <!--/.nav-collapse --> 
    </div>
  </div>
</div>