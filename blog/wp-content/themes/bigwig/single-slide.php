<?php get_header(); ?>

<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>

<?php while ($content->looping() ) : ?>

<?php $meta =& $content->meta(); ?>
<?php if (empty($meta->layers)) break; ?>
<?php $layers =& $meta->layers; ?>
<?php $boxed = empty($layers->layout) ? true : ($layers->layout === "boxed"); ?>
<?php list($w,$h) = explode("x",$layers->preview); ?>

<div class="page-title">
	<div class="pe-container">
		<h1><?php $t->content->title(); ?></h1>
	</div>
</div>

<?php if ($boxed): ?>
<div class="pe-spacer size70"></div>
<div class="pe-container">
<?php endif; ?>

<?php 

// create a slider view with a single slide (this one)
$view = new PeThemeViewSliderVario();

$conf["data"] = (object) 
	array(
		  "id" => array(get_the_id()),
		  "post_type" => "slide"
		  );

$conf["settings"] = (object) 
	array(
		  "layout" => $layers->layout,
		  "max" => $h,
		  "min" => 0,
		  );

$view->output((object) $conf);
?>

<?php if ($boxed): ?>
</div>
<?php endif; ?>

<?php endwhile; ?>
<?php get_footer(); ?>