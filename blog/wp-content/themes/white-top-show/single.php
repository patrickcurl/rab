<?php 
/**
 * The Template for displaying all single posts.
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
    <div class="span8"><?php  the_post(); ?>
      <div class="media"> <a class="pull-left" href="<?php the_permalink(); ?>"> 
      <?php the_post_thumbnail('thumbnail', array('class' => 'img-rounded')); ?>
      </a>
        <div class="media-body">
          <a href="<?php the_permalink(); ?>"><h4 class="media-heading"><?php the_title(); ?></h4></a>
          <p class="meta"><em><em>Posted on:</em> <?php the_time('F jS, Y') ?>:by.<?php the_author() ?></em></p>
          <?php the_content(); ?> </div>
          <?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
      </div>
      <div class="span8 row">Categories:<?php the_category(' &bull;  ');?></div>
      <div class="span8 row"><?php the_tags('Tagged with: ',' &bull; ','<br />'); ?></div>
      <div class="row span8">
       <ul class="pager">
          <li class="previous maxWidth"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentytwelve' ) . '</span> %title' ); ?></li>
          <li class="next maxWidth"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentytwelve' ) . '</span>' ); ?></li>
        </ul>
        </div>
      <div class="span8">
        <ul class="media-list">
        <?php comments_template(); ?>
        </ul>
      </div>
    </div>
  </div>
</div>
<hr>
<?php get_footer(); ?>
