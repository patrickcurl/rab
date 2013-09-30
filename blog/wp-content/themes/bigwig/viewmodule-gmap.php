<?php $t =& peTheme(); ?>
<?php list($gmap) = $t->template->data(); ?>

<div class="gmapWrap">
	<div class="gmap" data-latitude="<?php echo $gmap->latitude; ?>" data-longitude="<?php echo $gmap->longitude; ?>" data-title="<?php echo esc_attr($gmap->title); ?>" data-zoom="<?php echo $gmap->zoom; ?>" >
		<div class="description"><?php echo $gmap->description; ?></div>
	</div>
</div>

