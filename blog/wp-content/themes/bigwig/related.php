<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>

<div class="row-fluid">
	<div class="span6">
		<h3><?php e__pe("Related Projects"); ?><span class="subtitle"><?php e__pe("You might also be interested in these"); ?></span></h3>
	</div>
	
	
	<div class="carousel-nav">
		<a href="#" class="prev-btn"><i class="icon-left-open"></i></a>
		<a href="#" class="next-btn"><i class="icon-right-open"></i></a>
	</div>
</div>

<div class="row-fluid carouselBox" data-slidewidth="240">
	<?php while ($content->looping()): ?>
	<?php $link = get_permalink(); ?>
	<div>                    
		<div>
			<div class="project-item">
				<a class="over-effect" href="<?php echo $link ?>">
					<?php $content->img(420,372); ?>
				</a>
				<h6><a href="<?php echo $link ?>"><?php $content->title(); ?></a></h6>
				<p><?php echo $t->utils->truncateString(get_the_excerpt(),100); ?></p>
			</div>
		</div>  
	</div>
	<?php endwhile; ?>
</div>
