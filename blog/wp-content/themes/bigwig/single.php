<?php $t =& peTheme(); ?>
<?php get_header(); ?>

<?php $t->layout->sidebar = "right"; ?>
<?php $t->get_template_part("common","layout-start"); ?>
<?php $t->content->loop(); ?>
<?php $t->get_template_part("common","layout-end"); ?>

<?php get_footer(); ?>