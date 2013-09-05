<?php
/**
 * Template Name: home_Page
 *
 *
 *
 * @package WordPress
 * @subpackage White_Top_Show
 * @since White Top Show 1.00
 */
get_header();  ?>
<div class="container topPaddingSid"> 
  
  <!-- Main hero unit for a primary marketing message or call to action -->
  <div class="hero-unit">
  <?php 
/**********************
display last post start
***********************/
 $the_query = new WP_Query( 'showposts=1' ); 
 $k=1;
 while ($the_query -> have_posts()) : $the_query -> the_post();
if($k==1){ ?>
<a href="<?php the_permalink(); ?>"><h1>
<?php  if (strlen($post->post_title) > 35) {
	echo substr(the_title($before = '<h1>', $after = '</h1>', FALSE), 0, 37) . '...'; }
	 else { echo the_title(); } 
	 ?></h1></a> &nbsp;Posted On: <?php echo the_date(); ?>
<?php the_post_thumbnail('the_small', array('class' => 'media-object')); ?>
<p><?php echo the_excerpt(); ?></p><p><a href="<?php the_permalink(); ?>" class="btn btn-primary btn-large" title="Look '.<?php echo the_title(); ?>">Read more &raquo;</a></p> </div> 

<?php } $k++;
endwhile;
wp_reset_postdata();
/**********************
display last post end
***********************/  
  ?>
  
  
  <!-- Example row of columns -->
  <div class="row">
    <?php get_sidebar(); ?>
  
  <div class="span8">
  </div class="row">
  <?php  $i=0; 
  //query_posts( 'posts_per_page=4' );
  
  $featuredPosts = new WP_Query();
$featuredPosts->query('posts_per_page=4');
  while ($featuredPosts->have_posts()) : $featuredPosts->the_post();
  if($i==1){?>
    <div class="span8">
      <div class="media">
<a class="pull-left" href="<?php the_permalink(); ?>">
<?php the_post_thumbnail('the_small', array('class' => 'media-object')); ?>
</a>
<div class="media-body">
<a href="<?php the_permalink(); ?>"><h4 class="media-heading"><?php echo the_title();?></h4></a>&nbsp;Posted On :<?php echo the_date(); ?>
      <?php echo the_excerpt(); ?>
      <p><a class="btn" href="<?php the_permalink(); ?>">View details &raquo;</a></p>
    </div>
    </div>      
    </div>
    <?php } 
	if($i>1 && $i<4){
	?>
    <div class="span4">
      <div class="media">
<a class="pull-left" href="<?php the_permalink(); ?>">
<?php the_post_thumbnail('the_small', array('class' => 'media-object')); ?>
</a>
<div class="media-body">
<a href="<?php the_permalink(); ?>"><h4 class="media-heading"><?php echo the_title();?></h4></a>&nbsp;Posted On :<?php echo the_date(); ?>
      <?php echo the_excerpt(); ?>
      <p><a class="btn" href="<?php the_permalink(); ?>">View details &raquo;</a></p>
    </div>
    </div>
    </div>
    <?php } 
	
$i++;
endwhile;
/* Restore original Post Data */
wp_reset_postdata();
	?> 
    </div>
    </div>
  </div>
<?php get_footer(); ?>
