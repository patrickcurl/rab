<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>

<div class="staff-member">
<?php while ($content->looping(3) ) : ?>
<?php $meta = $content->meta(); ?>
<?php $staff = empty($meta->info) ? false : $meta->info; ?>
<?php $content->beginRow('<div class="row-fluid">'); ?>
<section class="span4 small-profile">
	 <?php $content->img(420,372); ?>

	<h3><?php echo $content->title(); ?></h3>

	<?php if (!empty($staff->position)): ?>
	<span class="light"><?php echo $staff->position; ?></span>
	<?php endif; ?>

	<div class="pe-wp-default">
		<?php $content->content(); ?>
	</div>

	<div class="divider dotter"></div>

	<?php if (!empty($staff->social)): ?>
	<div class="staff-social">
		<?php $content->socialLinks($staff->social); ?>
	</div>
	<?php endif; ?>

</section>
<?php $content->endRow(); ?>
<?php endwhile; ?>
</div>