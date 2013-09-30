<?php $t =& peTheme(); ?>
<?php if ($t->comments->supported()): ?>
<!--comment section-->
<div class="row-fluid" id="comments">
	<div class="span12 commentsWrap">

		<!--title-->
		<div class="row-fluid">
			<div class="span12">
				<h3 id="comments-title">
					<?php e__pe("Comments"); ?> <span>( <?php $t->content->comments(); ?> )</span>
				</h3>
			</div>
		</div>
		
		<?php $t->comments->show(); ?>
		
		<div class="row-fluid">
			<div class="span12">
				<?php $t->comments->pager(); ?>
			</div>
		</div>
		
		<?php $t->comments->form(); ?>
		
	</div>
	<!--end comments wrap-->
</div>
<!--end comments-->
<?php endif; ?>