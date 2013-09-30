<?php $t =& peTheme(); ?>
<?php $view =& $t->view; ?>
<?php $content =& $t->content; ?>
<?php add_filter("pe_theme_page_layout",array(&$view,"pe_theme_page_layout_filter")); ?>

<?php get_header(); ?>

<?php while ($content->looping() ) : ?>
<?php $t->get_template_part("common","layout-start"); ?>
<?php $view->output(); ?>
<?php $t->get_template_part("common","layout-end"); ?>
<?php endwhile; ?>

<?php get_footer(); ?>

