<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Modern_Mythologies
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    global $mm_current_post;

    $mm_current_post = get_queried_object();
    if ( ! $mm_current_post ) {
        $mm_current_post = new WP_Query();
    }

    $featured_img = wp_get_attachment_image_url( get_post_thumbnail_id($mm_current_post->ID), 'large' );

    if ( ! $featured_img ) : ?>
    <header class="entry-header" style="background-image: url( <?php echo esc_url( get_header_image() ); ?>);" role="banner">
        <?php else : ?>
        <header class="entry-header" style="background-image: url( <?php echo $featured_img; ?>);" role="banner">
            <?php endif; ?>



                <div class="entry-meta">
                    <div class="article-header headline-text-highlight">
                        <div class="container">
                            <div class="entry-categories">
                                <?php
                                mmwordpresstheme_entry_categories();
                                ?>
                            </div>
                            <h2 class="article-headline"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                            <h3 class="article-data"><span class="article-byline"><?php mmwordpresstheme_posted_by(); ?></span><span class="article-post-date"<?php mmwordpresstheme_posted_on(); ?></span><span class="article-edit-link"><?php mmwordpresstheme_edit_post_link(); ?></span></span></h3>
                        </div><!-- .container -->
                    </div><!-- .article-header -->
                </div> <!-- .entry-meta -->
	</header> <!-- .entry-header -->

  <?php 
    if ( has_excerpt( $post->ID ) ) {
      echo '<div class="deck">';
      echo '<p>' . get_the_excerpt() .  '</p>';
      echo '</div><!-- .deck -->';
    }
  ?>

  <div class="entry-tags">
  <?php
    mmwordpresstheme_entry_tags();
  ?>
  </div>

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'mmwordpresstheme' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mmwordpresstheme' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php mmwordpresstheme_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article>