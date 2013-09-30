<?php $t =& peTheme(); ?>
<?php list($conf) = $t->template->data(); ?>
<?php $settings =& $conf->settings; ?>

<?php $content =& $t->content; ?>
<?php $project =& $t->project; ?>
<?php $media =& $t->media; ?>
<?php $w = $settings->width; ?>
<?php $h = $settings->height; ?>

<?php $filterable = $settings->filterable; ?>
<?php $flareGallery = "portfolioGallery".$conf->id; ?>

<div class="peIsotope portfolio">

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

	<div class="peIsotopeContainer peIsotopeGrid" 
		 data-cell-width="<?php echo $w; ?>" 
		 data-cell-height="<?php echo $h; ?>"
		 data-sort="<?php echo $settings->sort; ?>"
		 >
		<div class="row-fluid">
			<div class="span12">

				<?php $clayout = empty($settings->clayout) || $settings->clayout != "fixed" ? false : array(1,1); ?>

				<?php while ($content->looping()): ?>
				<?php $meta =& $content->meta(); ?>
				<?php $img = $content->get_origImage();  ?>

				<?php $portfolio = empty($meta->portfolio) ? false : $meta->portfolio;  ?>

				<?php $thumb = empty($meta->portfolio->image) ? $img : $meta->portfolio->image ; ?>
				<?php list($cols,$rows) = $clayout ? $clayout : (explode("x",empty($meta->portfolio->layout) ? "1x1" : $meta->portfolio->layout)); ?>
				<?php $cw = $w*$cols; ?>
				<?php $ch = $h*$rows; ?>
				<?php $link = $content->getLink(); ?>
				
				<div class="peIsotopeItem <?php $content->filterClasses($settings->filterable); ?>">
					<span class="cell-title"><a href="<?php echo $link ?>"><?php $content->title(); ?></a></span>

					<div class="scalable" data-cols="<?php echo $cols; ?>" data-rows="<?php echo $rows; ?>">
						<?php if ($settings->lightbox === "yes" && (empty($portfolio->lightbox) || $portfolio->lightbox === "yes")): ?>
						<?php $format = $content->format();  ?>
						<?php switch($format): case "gallery": // Gallery post ?>
						
						<?php $view = $t->gallery->conf($meta->gallery->id,"GalleryCover"); ?>
						<?php $view->settings->cover = $thumb; ?>
						<?php $t->view->resize($view,$cw,$ch) ?>

						<?php break; default: // Standard post ?>
						
						<?php if ($thumb): ?>

						<?php $video = $format === "video" ? $t->video->conf() : false; ?>
						
						<a 
							data-title="<?php echo empty($portfolio->title) ? "" : esc_attr($portfolio->title); ?>" 
							data-description="<?php echo empty($portfolio->description) ? "" : esc_attr($portfolio->description); ?>"
							<?php if (!empty($video->url)): ?>
							data-flare-video="<?php echo $video->url; ?>"
							<?php endif; ?>
							<?php if (!empty($video->poster)): ?>
							data-flare-videoposter="<?php echo $video->poster; ?>"
							<?php endif; ?>
							<?php if (!empty($video->width)): ?>
							data-flare-videowidth="<?php echo $video->width; ?>"
							<?php endif; ?>

							data-flare-gallery="<?php echo $flareGallery; ?>"
							data-flare-thumb="<?php echo $t->image->resizedImgUrl($thumb,90,74); ?>"
							data-flare-plugin="default"
							data-flare-scale="fit"

							href="<?php $content->origImage(); ?>">
							<?php $content->img($cw,$ch,$thumb); ?>
						</a>

						<?php endif; ?>
						<?php endswitch; ?>
						

						<?php else: ?>
						<a href="<?php echo $link; ?>">
							<?php $content->img($cw,$ch,$thumb); ?>
						</a>
						<?php endif; ?>						

					</div>
				</div>
					

				<?php endwhile; ?>
			</div>
		</div>
	</div>
</div>
<!-- /Project Feed -->

<?php if ($settings->pager === "yes"): ?>
<?php $content->pager(); ?>
<?php endif; ?>
