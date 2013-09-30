<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>

<?php while ($content->looping(2) ) : ?>
<?php $meta = $content->meta(); ?>
<?php $content->beginRow('<div class="row-fluid">'); ?>
<div class="span5-5">
	<div class="feature">
		<?php if (!empty($meta->info->icon)): ?>
		<span class="featureIcon">
			<i class="<?php echo $meta->info->icon; ?>"></i>
		</span>
		<?php endif; ?>
		<div class="feature-title">
			<h3><?php $content->title(); ?></h3>
			<?php if (!empty($meta->info->features)): ?>
			<h6><?php echo implode(",",$meta->info->features) ?></h6>
			<?php endif; ?>
		</div>
		<div class="featureContent pe-wp-default">
			<?php $content->content(); ?>
		</div>
	</div>
</div>
<?php $content->endRow(); ?>
<?php endwhile; ?>