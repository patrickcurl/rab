<?php $t =& peTheme(); ?>
<?php list($conf,$loop) = $t->template->data(); ?>
<?php $settings =& $conf->settings; ?>

<?php $content =& $t->content; ?>
<?php $project =& $t->project; ?>
<?php $media =& $t->media; ?>
<?php $w = empty($settings->width) ? 256 : $settings->width; ?>
<?php $h = empty($settings->height) ? "auto" : $settings->height; ?>

<?php $filterable = empty($settings->filterable) ? false : $settings->filterable; ?>
<?php $flareGallery = "gridGallery".empty($conf->id) ? "Post" : $conf->id; ?>



<div class="peIsotope portfolio">

	<?php if ($filterable): ?>
	<div class="pe-container filter">
		<div class="row-fluid">
			<section class="span12 project-filter">
				<ul class="filter-keywords peIsotopeFilter">
					<?php $content->filter(array($settings->filterable,$loop),"","","<li>%s</li>"); ?>
				</ul>									
			</section>
		</div>
	</div>
	<?php endif; ?>
						

	<div 
		 class="peIsotopeContainer peIsotopeGrid"
		 data-cell-width="<?php echo $w; ?>" 
		 data-cell-height="<?php echo $h; ?>" 
		 >
		<div class="row-fluid">
			<div class="span12">

				<?php $clayout = empty($settings->clayout) || $settings->clayout != "fixed" ? false : array(1,1); ?>

				<?php while ($item =& $loop->next()): ?>
				<?php $hidden = ($settings->max > 0 && $item->idx >= $settings->max); ?>

				
				<div
					<?php if ($hidden): ?>
					class="hiddenLightboxContent" 
					<?php else: ?>
					class="peIsotopeItem <?php $content->filterClasses("media-tags",$item->id) ?>"
					<?php endif; ?>
					>

					<span class="cell-title"><?php echo $item->caption_title; ?></span>
					<div class="scalable">
						<a 
							<?php if ($item->caption_title): ?>
							data-title="<?php echo esc_attr($item->caption_title); ?>"
							<?php endif; ?>
							<?php if ($item->caption_description): ?>
							data-description="<?php echo esc_attr($item->caption_description); ?>"
							<?php endif; ?>
							<?php if (!empty($item->video)): ?>
							data-flare-video="<?php echo esc_attr($item->video->url); ?>"
							data-flare-videowidth="<?php echo esc_attr($item->video->width); ?>"
							data-flare-videoposter="<?php echo esc_attr($item->video->poster); ?>"
							<?php endif; ?>
							class="peOver"
							data-target="flare"
							data-flare-gallery="<?php echo $flareGallery; ?>"
							id="galPostThumb<?php echo "{$id}_{$item->id}" ?>"
							data-flare-thumb="<?php echo $t->image->resizedImgUrl($item->img,90,74); ?>"
							<?php if ($settings->bw): ?>
							data-flare-bw="<?php echo $t->image->bw($item->img); ?>"
							<?php endif; ?>
							data-flare-plugin="<?php echo $settings->type ?>"
							data-flare-scale="<?php echo $settings->scale ?>"
							href="<?php echo $item->img; ?>"
							>
							<?php echo $hidden ? "" : $t->image->resizedImg($item->img,$w,$h === "auto" ? 0 : $h); ?>
						</a>
					</div>
				</div>
					

				<?php endwhile; ?>
			</div>
		</div>
	</div>
</div>
