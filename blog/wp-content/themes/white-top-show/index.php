<?php 
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage White_Top_Show
 * @since White Top Show 1.00
 */

get_header(); ?>
<div class="container topPaddingSid"> 
  <!-- Example row of columns -->
  <div class="row">
 
    <?php get_sidebar(); ?>
     <div class="span8">
    <?php if (have_posts()) :$i=0; while (have_posts()) : the_post(); ?>
    <div class="span8">
      <div class="media"> <a class="pull-left" href="<?php the_permalink() ?>">
<?php the_post_thumbnail('the_small', array('class' => 'media-object')); ?>
       </a>
        <div class="media-body">
          <a href="<?php the_permalink() ?>"><h4 class="media-heading"><?php the_title(); ?></h4></a>
          <p id="post-<?php the_ID(); ?>" <?php post_class(); ?>><em><em>Posted on:</em> <?php the_time('F jS, Y') ?>&nbsp;by&nbsp;<?php the_author() ?></em></p>
         <?php the_excerpt(); ?>
          <div class="span6">Categories:<?php the_category(' &bull;  ');?></div>
      <div class="span6"><?php the_tags('Tagged with: ',' &bull; ','<br />'); ?></div>
          <p><a class="btn" href="<?php the_permalink() ?>">View details &raquo;</a></p>
        </div>
      </div>
     <hr/>
    </div>
    <?php endwhile;?> 
    <div class="span8">
      <ul class="pager">
                <li class="previous"><?php previous_posts_link('&laquo; Newer Posts'); ?></li>
                <li class="next"><?php next_posts_link('Older Posts &raquo;'); ?></li>
      </ul>
    </div>
    </div>
    <?php else : ?>
        <h2>No Post Found</h2>
        <?php endif; wp_reset_query(); ?>
  </div>
</div>
<hr>
<?php get_footer(); ?>