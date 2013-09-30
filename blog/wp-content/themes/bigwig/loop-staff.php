<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>

<?php while ($content->looping() ) : ?>
<?php $meta = $content->meta(); ?>
<?php $staff = empty($meta->info) ? false : $meta->info; ?>
<div class="row-fluid staff-member pe-block">

	<section class="span4 mugshot">
		<div class="inner-spacer-right-lrg">
			<?php $content->img(420,372); ?>
		</div>
	</section>

	<section class="span8">
		<div class="row-fluid">
			<div class="span5-5">
				<h3><?php echo $content->title(); ?></h3>
				<?php if (!empty($staff->position)): ?>
				<span class="light"><?php echo $staff->position; ?></span>
				<?php endif; ?>
			</div>
			<div class="span5-5 staff-social">
				<?php if (!empty($staff->social)): ?>
				<?php $content->socialLinks($staff->social); ?>
				<?php endif; ?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span12 intro pe-wp-default">
				<?php $content->content(); ?>
			</div>
		</div>

		<div class="row-fluid">
			<div class="divider dotter"></div>
		</div>

	</section>
</div>
<?php endwhile; ?>
