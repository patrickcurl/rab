<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php get_header(); ?>

<?php $t->get_template_part("common","layout-start"); ?>
<?php $t->get_template_part("loop","staff"); ?>
<?php $t->get_template_part("common","layout-end"); ?>

<?php get_footer(); ?>
