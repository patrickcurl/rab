<?php $t =& peTheme(); ?>
<?php get_header(); ?>

<?php $t->layout->sidebar = false; ?>
<?php $t->get_template_part("common","layout-start"); ?>
<?php $t->content->loop("project") ?>
<?php $t->get_template_part("common","layout-end"); ?>

<?php get_footer(); ?>
