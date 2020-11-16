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
	
		<?php if( function_exists('get_field')) { // Check for ACF support ?>
			
			<?php // Check for instructors 

				$args = array(
				'post_type'         => 'instructor',
				'post_status'       => 'publish',
				'posts_per_page'    => -1,
				'perm'              => 'readable',
				'orderby'           =>  array('meta_value_num' => 'ASC', 'menu_order' => 'ASC'),
				'meta_key'          => 'instructor_degree',
				'order'             => 'ASC'
			);

			$loop = new WP_Query( $args ); ?>

			<?php if ( have_posts() ) : // If posts -> Instructor section ?>
				
				<section id="instructors">
					<ul class="instructor-cards">
					
						<?php while ( $loop->have_posts() ) : $loop->the_post();
							
							// Variables
							$instructor = get_field( 'instructor' );
							$degree = get_field_object( 'instructor_degree' );
							$value = $degree['value'];
							$label = $degree['choices'][ $value ];
							$color = ["circle-red", "circle-black", "circle-blue"];
							
							include( locate_template( 'components/instructors/instructor-card-list.php', false, false ) ); ?>
							
						<?php endwhile; ?>
					
					</ul>
				</section>
			
			<?php endif // End check for posts?>

		<?php } // End check for ACF support ?>
		
	</main><!-- #main -->

<?php
get_sidebar('instructors');
get_footer();
