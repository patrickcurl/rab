<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php list($data) = $t->template->data(); ?>

<?php if (!empty($data->title)): ?>
<h3><?php echo $data->title; ?></h3>
<?php endif; ?>

<?php if (!empty($data->info)): ?>
<?php foreach ($data->info as $info): ?>
<?php $info = (object) $info; ?>
<div class="address">
	<span class="<?php echo esc_attr($info->icon); ?>" ></span>
    <p><?php echo $info->content; ?></p>
</div>
<?php endforeach; ?>
<?php endif; ?>

