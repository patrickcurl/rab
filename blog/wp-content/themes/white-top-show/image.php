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
    <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php
								$metadata = wp_get_attachment_metadata();
								printf( __( '<span class="meta-prep meta-prep-entry-date">Published </span> <span class="entry-date"><time class="entry-date" datetime="%1$s">%2$s</time></span> at <a href="%3$s" title="Link to full-size image">%4$s &times; %5$s</a> in <a href="%6$s" title="Return to %7$s" rel="gallery">%8$s</a>.', 'twentytwelve' ),
									esc_attr( get_the_date( 'c' ) ),
									esc_html( get_the_date() ),
									esc_url( wp_get_attachment_url() ),
									$metadata['width'],
									$metadata['height'],
									esc_url( get_permalink( $post->post_parent ) ),
									esc_attr( strip_tags( get_the_title( $post->post_parent ) ) ),
									get_the_title( $post->post_parent )
								);
							?>
							<?php edit_post_link( __( 'Edit', 'whitetopshow' ), '<span class="edit-link">', '</span>' ); ?>
     <hr/>
    </div>
    <?php endwhile;?> 
    
    <?php
/**
 * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
 * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
 */
$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
foreach ( $attachments as $k => $attachment ) :
	if ( $attachment->ID == $post->ID )
		break;
endforeach;

$k++;
// If there is more than 1 attachment in a gallery
if ( count( $attachments ) > 1 ) :
	if ( isset( $attachments[ $k ] ) ) :
		// get the URL of the next image attachment
		$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
	else :
		// or get the URL of the first image attachment
		$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
	endif;
else :
	// or, if there's only 1 image, get the URL of the image
	$next_attachment_url = wp_get_attachment_url();
endif;
?>

<a href="<?php echo esc_url( $next_attachment_url ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><?php
								$attachment_size = apply_filters( 'whitetopshow_attachment_size', array( 960, 960 ) );
								echo wp_get_attachment_image( $post->ID, $attachment_size );
								?></a>
                                <?php if ( ! empty( $post->post_excerpt ) ) : ?>
								<div class="entry-caption">
									<?php the_excerpt(); ?>
								</div>
								<?php endif; ?>
                                
                                <div class="entry-description">
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'whitetopshow' ), 'after' => '</div>' ) ); ?>
						</div>
    
    <div class="span8">
      <ul class="pager">
                <li><?php previous_image_link( false, __( '&larr; Previous', 'whitetopshow' ) ); ?></li>
				<li><?php next_image_link( false, __( 'Next &rarr;', 'whitetopshow' ) ); ?></li>
      </ul>
    </div>
      <div class="span8">
      <?php comments_template(); ?>
    </div>
    </div>
    <?php else : ?>
        <h2>No Post Found</h2>
        <?php endif; wp_reset_query(); ?>
  </div>
</div>
<hr>
<?php get_footer(); ?>