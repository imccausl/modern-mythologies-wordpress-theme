<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Modern_Mythologies
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
            <?php

            $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
            <h3><?php echo $description; /* WPCS: xss ok. */ ?></h3>
            <?php
            endif; ?>

            <h4><?php printf( esc_html__( 'Design and Content &copy; 2017 %2$s. All rights reserved.', 'mmwordpresstheme' ), 'mmwordpresstheme', '<a href="https://automattic.com/" rel="designer">Ian McCausland</a>' ); ?></h4>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
