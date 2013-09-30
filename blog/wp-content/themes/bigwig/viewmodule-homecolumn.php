<?php $t =& peTheme(); ?>
<?php list($data) = $t->template->data(); ?>

<h3><span class="accent"><i class="<?php echo $data->icon ?>"></i></span> <?php echo $data->title; ?></h3>
<?php echo $data->content; ?>
<?php if (!empty($data->label) && !empty($data->url)): ?>
<a href="<?php echo $data->url ?>" class="read-more"><?php echo $data->label; ?></a>
<?php endif; ?>
