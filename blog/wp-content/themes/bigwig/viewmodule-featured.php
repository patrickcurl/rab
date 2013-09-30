<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php list($data) = $t->template->data(); ?>

<div class="featured-project pe-block nomargi">
	<div class="pe-container pe-block">
		<div class="row-fluid pe-block">

			<?php while ($content->looping()): ?>
			<?php $link = get_permalink(); ?>

			<div class="span12 media">
				<?php $h = $t->media->h(460); ?>
				<?php if ($content->media() === "image"): ?>
				<?php $content->img(940,460); ?>
				<?php endif; ?>
				<?php $h->restore(); ?>
			</div>

			<div class="row-fluid">
				<section class="span4 info">
					<div class="inner-spacer-right">
						<span class="new-tag"><?php e__pe("NEW"); ?></span>
						<h3><a href="<?php echo $link; ?>"><?php $content->title(); ?></a></h3>
						<div class="categories">
							<?php $content->tags(", ","prj-category"); ?>
						</div>				
					</div>
				</section>			
				<section class="span8 description">
					<div class="inner-spacer-left-lrg">
						<p class="intro"><?php echo $t->utils->truncateString(get_the_excerpt(),160); ?></p>
					</div>
				</section>
			</div>
			<?php endwhile; ?>

		</div>
	</div>
</div>
