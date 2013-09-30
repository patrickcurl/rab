<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php $layout =& $t->layout; ?>

<div class="site-body">

	<?php if ($layout->fullscreen === "yes"): // fullscreen  ?>
	<div class="pe-full-page">
	<?php else: // not fullscreen ?>
	<?php if ($layout->title !== "no") $t->get_template_part("common","title"); ?>
	<?php if ($layout->headerMargin !== "no"): // boxed content ?>
	<div class="pe-spacer size70"></div>
	<?php endif; // boxed ?>

	<?php if ($layout->content != "fullwidth"): ?>
	<div class="pe-container">
		<?php if ($layout->sidebar === "right"): ?>
		<?php $t->media->w(619); ?>
		<div class="row-fluid">
			<section class="span8">
		<?php endif; ?>
	<?php endif; ?>

	<?php endif; ?>

