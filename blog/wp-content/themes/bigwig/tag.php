<?php $t =& peTheme(); ?>
<?php get_header(); ?>

<?php $t->layout->pageTitle = sprintf(__pe("Tag: %s"),single_tag_title("",false));; ?>
<?php $t->get_template_part("common","layout-start"); ?>
<?php $t->content->loop() ?>
<?php $t->get_template_part("common","layout-end"); ?>

<?php get_footer(); ?>