<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php list($conf) = $t->template->data(); ?>
<?php $settings =& $conf->settings; ?>

<div class="row-fluid">
	<div class="span3">
		<h3>
			<?php echo $settings->title; ?>
			<?php if (!empty($settings->subtitle)): ?>
			<span class="subtitle"><?php echo $settings->subtitle; ?></span>
			<?php endif; ?>
		</h3>
	</div>
	<div class="span6">
		<?php if (!empty($settings->description)): ?>
		<p><?php echo $settings->description; ?></p>
		<?php endif; ?>
	</div>
	
	<!--carousel controls-->
	<div class="carousel-nav">
		<a href="#" id="carouselPrev" class="prev-btn"><i class="icon-left-open"></i></a>
		<a href="#" id="carouselNext" class="next-btn"><i class="icon-right-open"></i></a>
	</div>
</div>


<div class="row-fluid carouselBox" data-slidewidth="<?php echo $settings->sw ?>">				
	<?php while ($content->looping()): ?>
	<?php $meta = $content->meta(); ?>
	<?php $link = empty($meta->info->url) ? get_permalink() : $meta->info->url; ?>

	<div 
		data-autopause="enabled"
		data-delay="<?php echo $settings->delay; ?>"
		>

		<div>
			<?php switch ($settings->style): case "testimonials": ?>

			<?php $cite = empty($meta->info->type) ? "" : ", ".$meta->info->type; ?>

			<div>
				<h2><?php echo get_the_excerpt(); ?></h2>
				<cite>
					&mdash;
					<span class="accent"><?php $content->title(); ?></span><?php echo $cite ?>
				</cite>
			</div>

			<?php break; case "logos": ?>

			<div class="project-item">
				<a href="<?php echo $link; ?>">
					<?php $content->img($settings->w,$settings->h) ?>
				</a>
			</div>

			<?php break; case "more": ?>

			<div>
				<a class="over-effect" href="<?php echo $link; ?>">
					<?php $content->img($settings->w,$settings->h) ?>
				</a>
				<div class="info">
					<h5><a href="<?php echo $link; ?>"><?php $content->title(); ?></a></h5>
					<p><?php echo $t->utils->truncateString(get_the_excerpt(),$settings->chars); ?></p>
					<a href="<?php echo $link; ?>" class="more-link"><?php e__pe("More"); ?></a>
				</div>
			</div>  

			<?php break; default: ?>

			<div class="project-item">
				<a class="over-effect" href="<?php echo $link; ?>">
					<?php $content->img($settings->w,$settings->h) ?>
				</a>
				<h6><a href="<?php echo $link; ?>"><?php $content->title(); ?></a></h6>
				<p><?php echo $t->utils->truncateString(get_the_excerpt(),$settings->chars); ?></p>
			</div>

			<?php endswitch; ?>
		</div>  
	</div>
	<?php endwhile; ?>
</div>