<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php get_header(); ?>

<?php while ($content->looping()): ?>
<?php $t->get_template_part("common","layout-start"); ?>
<?php $content->img($t->media->w,$t->media->h); ?>
<?php $t->get_template_part("common","layout-end"); ?>
<?php endwhile; ?>

<?php get_footer(); ?>
