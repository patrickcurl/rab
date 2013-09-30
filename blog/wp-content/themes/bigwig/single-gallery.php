<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>

<?php get_header(); ?>

<?php if (!post_password_required()): ?>
<?php $t->layout->content = "fullwidth"; ?>
<?php $t->layout->headerMargin = "no"; ?>
<?php $t->layout->footerMargin = "no"; ?>
<?php endif; ?>

<?php while ($content->looping() ) : ?>
<?php $t->get_template_part("common","layout-start"); ?>
<?php if (post_password_required()): ?>
<?php $content->content(); ?>
<?php else: ?>
<?php $t->gallery->output(); ?>
<?php endif; ?>
<?php $t->get_template_part("common","layout-end"); ?>
<?php endwhile; ?>

<?php get_footer(); ?>