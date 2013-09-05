<?php 
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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
    <?php if (have_posts()) : while (have_posts()) : ?>
    <div class="span8" id="post-<?php the_ID(); ?>><?php  the_post(); ?>
      <div class="media"> <a class="pull-left" href="<?php the_permalink(); ?>"> 
      <?php the_post_thumbnail('thumbnail', array('class' => 'img-rounded')); ?>
      </a>
        <div class="media-body">
          <a href="<?php the_permalink(); ?>"><h4 class="media-heading"><?php the_title(); ?></h4></a>
          <p class="meta"><em><em>Created on:</em> <?php the_time('F jS, Y') ?><a href="#">:by.<?php the_author() ?></a></em></p>
          <?php the_content(); ?>
          <?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
           </div>
           <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
      </div>
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
    <?php endwhile; endif; ?>
  </div>
</div>
<hr>
<?php get_footer(); ?>
