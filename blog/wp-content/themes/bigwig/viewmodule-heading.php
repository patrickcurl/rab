<?php $t =& peTheme(); ?>
<?php list($data) = $t->template->data(); ?>

<h3>
<?php echo $data->title ?>
<?php if (!empty($data->subtitle)): ?>
<span class="subtitle"><?php echo $data->subtitle; ?></span>
<?php endif; ?>
</h3>

