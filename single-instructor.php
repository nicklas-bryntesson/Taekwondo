<?php
/**
* The Template for displaying Instructors.
*
* @package Taekwondo
*/

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php if( function_exists( 'get_field' ) ) { // Check for ACF ?>

          <?php 
            // Variables
            $instructor = get_field('instructor');

            include( locate_template( 'components/instructors/single-instructor-header.php', false, false ) ); 
          ?>
          
          <div class="entry-content">
            <?php the_content();?>
          </div><!-- .entry-content -->

        <?php } else { // Default back to normal page if ACF is disbaled ?>

          <?php get_template_part( 'template-parts/content', 'page' ); ?>

        <?php } ?>

      </article><!-- #post-<?php the_ID(); ?> -->

		<?php endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar('instructors');
get_footer();
