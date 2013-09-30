<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>

<div class="page-title">
	<div class="pe-container">
		<h1>
			<?php if ($t->layout->pageTitle): ?>
			<?php echo $t->layout->pageTitle; ?>
			<?php elseif (is_singular()): ?>
			<?php $t->content->title(); ?>
			<?php elseif (is_home() || is_category() || is_tag()): ?>
			<?php e__pe("Our Blog"); ?>
			<?php elseif (is_search()): ?>
			<?php e__pe("Search Results"); ?>
			<?php elseif (is_404()): ?>
			<?php e__pe("Page Not Found"); ?>
			<?php else: ?>
			&nbsp;
			<?php endif; ?>
		</h1>
	</div>
</div>
