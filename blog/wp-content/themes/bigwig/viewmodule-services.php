<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php list($data) = $t->template->data(); ?>

<?php if (!empty($data->title)): ?>
<h3><?php echo $data->title; ?></h3>
<?php endif; ?>

<?php if (!empty($data->content)): ?>
<?php echo str_replace('<p>','<p class="intro">',$data->content); ?>
<div class="divider dotted"></div>
<?php endif; ?>

<?php $t->get_template_part("loop","service"); ?>