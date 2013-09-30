<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>

<?php get_header(); ?>

<?php while ($content->looping() ) : ?>
<?php $t->get_template_part("common","layout-start"); ?>
<div class="pe-wp-default">
	<?php $content->content(); ?>
	<?php $content->linkPages(); ?>
</div>
<?php $t->get_template_part("common","layout-end"); ?>
<?php endwhile; ?>

<?php get_footer(); ?>

