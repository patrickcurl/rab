<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php list($data) = $t->template->data(); ?>

<?php if (!empty($data->title)): ?>
<h3><?php echo $data->title; ?></h3>
<?php endif; ?>

<?php while ($content->looping()): ?>
<span class="small"><?php $content->date(); ?></span>
<a class="comments-num small" href="#"><?php $content->comments(); ?></a>
<p><?php echo $t->utils->truncateString(get_the_excerpt(),$data->chars); ?>
<?php endwhile; ?>

<?php if (!empty($data->link)): ?>
<a class="more-link" href="<?php echo $data->url ?>"><?php echo $data->link ?></a>
<?php endif; ?>
