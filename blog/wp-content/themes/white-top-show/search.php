<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage White_Top_Show
 * @since White Top Show 1.00
 */
get_header(); 
?>
<div class="container topPaddingSid"> 
<?php if ( have_posts() ) : ?>

        <header class="page-header">
        <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'whitetopshow' ), '<span>' . get_search_query() . '</span>'); ?></h1>
        </header>
  <!-- Example row of columns -->
    <div class="row">
  <?php while ( have_posts() ) : the_post(); ?>

    <div class="span12">
      <div class="media"> <a class="pull-left" href="<?php the_permalink(); ?>">
      <?php the_post_thumbnail('the_small', array('class' => 'media-object')); ?>
       </a>
        <div class="media-body">
          <a href="<?php the_permalink(); ?>"><h4 class="media-heading"><?php the_title(); ?></h4></a>
          <?php echo the_excerpt(); ?>.
          <p><a class="btn" href="<?php the_permalink(); ?>">View details &raquo;</a></p>
        </div>
      </div>
    </div>
<!--<div class="nav-previous alignleft"><?php //next_posts_link( 'Older posts' ); ?></div>
<div class="nav-next alignright"><?php //previous_posts_link( 'Newer posts' ); ?></div>-->
    <?php endwhile; ?>
    <ul class="pager">
          <li class="previous"><?php previous_posts_link('&larr; Previous'); ?>    </li>
          <li class="next"> <?php next_posts_link('Next &rarr;'); ?></li>
        </ul>
    <?php else : ?>
    <div class="span12">
      <div class="media"> <a class="pull-left" href="#"> <img class="media-object" data-src="holder.js/64x64" src="img/index.png"> </a>
        <div class="media-body">
          <h4 class="media-heading"><?php printf( __( 'Nothing Found for: %s' , 'whitetopshow'), '<span>' . get_search_query() . '</span>'); ?></h4>
          
           <p><?php printf( __( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.: %s' , 'whitetopshow'), '<span>' . get_search_query() . '</span>'); ?></p>
          
        </div>
        <div class="span4"><?php get_search_form(); ?></div>
      </div>
    </div>
  </div>
  	<?php endif; ?>
</div>
<?php get_footer(); ?>