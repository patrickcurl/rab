<?php
/*
Template Name: Content Builder
*/
?>
<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>

<?php get_header(); ?>

<?php if (post_password_required()): ?>
<?php $t->layout->content = "boxed"; ?>
<?php $t->layout->headerMargin = "yes"; ?>
<?php endif; ?>

<?php while ($content->looping() ) : ?>
<?php $t->get_template_part("common","layout-start"); ?>
<?php $content->builder(); ?>
<?php $t->get_template_part("common","layout-end"); ?>
<?php endwhile; ?>

<?php get_footer(); ?>

