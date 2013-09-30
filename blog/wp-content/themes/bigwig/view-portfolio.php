<?php $t =& peTheme(); ?>
<?php list($conf) = $t->template->data(); ?>
<?php $settings =& $conf->settings; ?>

<?php $content =& $t->content; ?>
<?php $project =& $t->project; ?>
<?php $cols = $settings->layout; ?>

<?php $mainClass = array("span6","span4","span3","span2","span2"); ?>
<?php $mainClass = $mainClass[$cols-2]; ?>
<?php $filterable = $settings->filterable && $cols > 1; ?>
<?php $flareGallery = "portfolioGallery".$conf->id; ?>

<div class="<?php echo $filterable ? 'peIsotope' : "" ?>">

	<?php if ($filterable): ?>
	<div class="pe-container filter">
		<div class="row-fluid">
			<section class="span12 project-filter">
				<ul class="filter-keywords peIsotopeFilter">
					<?php $content->filter($settings->filterable,"","","<li>%s</li>"); ?>
				</ul>									
			</section>
		</div>
	</div>
	<?php endif; ?>

	<!-- Project Feed -->
	<div class="peIsotopeContainer">
		<div class="row-fluid">
			<div class="span12">


				<?php while ($content->looping($cols)): ?>
				<?php $meta =& $content->meta(); ?>
				<?php $link = $content->getLink(); ?>
				
				<?php $content->beginRow('<div class="row-fluid">'); ?>
				<div class="project-item <?php echo $mainClass ?> peIsotopeItem <?php $content->filterClasses($settings->filterable); ?>">
					<a class="over-effect" href="<?php echo $link; ?>" data-flare-gallery="<?php echo $flareGallery; ?>">
						<?php $t->content->img(460,340) ?>
					</a>
					<h6><a href="<?php echo $link; ?>"><?php $content->title(); ?></a></h6>
					<p><?php echo $t->utils->truncateString(get_the_excerpt(),30); ?></p>
				</div>
					
				<?php $content->endRow(); ?>

				<?php endwhile; ?>
			</div>
		</div>
	</div>
</div>
<!-- /Project Feed -->

<?php if ($settings->pager === "yes"): ?>
<?php $content->pager(); ?>
<?php endif; ?>
