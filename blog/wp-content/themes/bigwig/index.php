<?php $t =& peTheme(); ?>
<?php get_header(); ?>

<?php $t->get_template_part("common","layout-start"); ?>
<?php $t->content->loop(is_search() ? "search" : "") ?>
<?php $t->get_template_part("common","layout-end"); ?>

<?php get_footer(); ?>