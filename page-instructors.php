<?php
/**
 * The template for instructors page
 *
 * @package Taekwondo
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php while ( have_posts() ) : the_post(); ?>
		
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<?php tkd_post_thumbnail(); ?>

				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->

			</article><!-- #post-<?php the_ID(); ?> -->

		<?php endwhile; ?>
	
		<!-- List of all instructors -->

		<?php if( function_exists('get_field')) { 
			
			$args = array(
				'post_type'         => 'instructor',
				'post_status'       => 'publish',
				'posts_per_page'    => -1,
				'perm'              => 'readable',
				'orderby'           =>  array('meta_value_num' => 'ASC', 'menu_order' => 'ASC'),
				'order'             => 'ASC'
			);

			$loop = new WP_Query( $args );

			if ( have_posts() ) : ?>
				
					<section id="instructors" class="instructor-cards">
						<?php while ( $loop->have_posts() ) : $loop->the_post();
							// Variables
							$instructor = get_field( 'instructor' );

							include( locate_template( 'components/instructors/instructor-card-list.php', false, false ) );
						
							endwhile; 
						?>
					</section>

				<?php endif ?>

		<?php } // End check for ACF support ?>
		
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
