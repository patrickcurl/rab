<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php list($data) = $t->template->data(); ?>

<?php if (!empty($data->logo)): ?>
<div class="logo-wrap">
	<img src="<?php echo $data->logo ?>" />
</div>
<?php endif; ?>
<?php if (!empty($data->content)): ?>
<?php echo $data->content; ?>
<?php endif; ?>

<?php if (!empty($data->social)): ?>
<div class="social-media">
	<?php $t->content->socialLinks($data->social,"bottom"); ?>
</div>
<?php endif; ?>

