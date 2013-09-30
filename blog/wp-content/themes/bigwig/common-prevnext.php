<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>

<!--post pagination-->
<div class="row-fluid post-pagination">
	<div class="span12">
		
		<div class="row-fluid">
			<?php if ($prev = $content->adjPost(true)): ?>
			<a href="<?php echo $prev->link ?>" class="span6 prev-post">
				<span><?php e__pe("Previous Article"); ?></span>
				<h3><?php echo $prev->title; ?></h3>
				<span class="date"><?php echo $prev->date; ?></span>
				<i class="icon-left-open"></i>
			</a>
			<?php endif; ?>
			<?php if ($next = $content->adjPost()): ?>
			<a href="<?php echo $next->link ?>" class="span6 next-post">
				<span><?php e__pe("Next Article"); ?></span>
				<h3><?php echo $next->title; ?></h3>
				<span class="date"><?php echo $next->date; ?></span>
				<i class="icon-right-open"></i>
			</a>
			<?php endif; ?>
		</div>
		
	</div>
</div>

