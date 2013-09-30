<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php get_header(); ?>

<?php while ($content->looping() ) : ?>
<?php $meta =& $t->content->meta(); ?>
<?php $t->get_template_part("common","layout-start"); ?>

<!--project content-->
<div class="row-fluid project pe-block">
	<div class="span12 media">
		<?php $h = $t->media->h(460); ?>
		<?php if ($content->media() === "image"): ?>
		<?php $content->img(940,460); ?>
		<?php endif; ?>
		<?php $h->restore(); ?>
	</div>
	
	<div class="row-fluid">	
		<section class="span8 project-description pe-wp-default">
			<?php $content->content(); ?>
		</section>

		
		<section class="span4 project-data">
			<div class="inner-spacer-left-lrg">

				<div class="project-nav">

					<?php $prev = $content->prevPostLink(); ?>
					<?php $next = $content->nextPostLink(); ?>

					<a href="<?php echo $prev ? $prev : "#"; ?>" class="prev-btn <?php echo $prev ? "" : "disabled"; ?>"><?php e__pe("Prev"); ?></a>
					<a href="<?php echo $next ? $next : "#"; ?>" class="next-btn <?php echo $next ? "" : "disabled"; ?>""><?php e__pe("Next"); ?></a>
				</div>	


				<?php if (!empty($meta->info->props)): ?>
				<h6>Project Data</h6>
				<span class="line-sml"></span>

				<div class="row-fluid">
					<div class="data1">
						<?php foreach ($meta->info->props as $prop): ?>
						<span><?php echo $prop["name"]; ?></span>						
						<?php endforeach; ?>
					</div>
					
					<div class="data2">
						<?php foreach ($meta->info->props as $prop): ?>
						<span><?php echo $prop["value"]; ?></span>						
						<?php endforeach; ?>
					</div>
				</div>
				<?php endif; ?>
				
			</div>
		</section>
		
	</div>


	<div class="row-fluid">
		<div class="span12">
			<?php $t->get_template_part("common","sharebuttons"); ?>
			<div class="divider dotted"></div>
		</div>
	</div>

</div>

<?php $content->related("project","prj-category",12); ?>
<?php comments_template(); ?>

<?php $t->get_template_part("common","layout-end"); ?>
<?php endwhile; ?>

<?php get_footer(); ?>
