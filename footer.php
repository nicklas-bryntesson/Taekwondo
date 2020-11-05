<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Taekwondo
 */

?>
	
	<footer id="colophon" class="site-footer">
		
		<?php get_sidebar( 'footer' ); ?>
		
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'tkd' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'tkd' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'tkd' ), 'Taekwondo', '<a href="https://www.nicklasbryntesson.se/">Nicklas Bryntesson</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
