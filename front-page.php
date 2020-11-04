<?php
/**
 * The template for displaying the "Home" page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Taekwondo
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if( function_exists('get_field')) { ?>


		<?php while ( have_posts() ) : the_post(); ?>
		
			<?php
				// Variables
				$hero = get_field( 'fp-hero' );
			?>

			<?php if ( $hero['video-switch'] ) { ?>

				<section class="<?php echo $hero['class']; ?>">
					<?php include( locate_template( 'components/frontpage/hero-video.php', false, false ) ); ?>
				</section>

			<?php } else { ?>

				<section class="<?php echo $hero['class']; ?>">
					<?php include( locate_template( 'components/frontpage/hero.php', false, false ) ); ?>
				</section>

			<?php } ?>

		<?php endwhile; ?>

		<!-- Frontpage "Training Groups" Section -->

		<?php if( get_field( 'fp-groups-switch' ) ) { ?>


			<section id="fp-groups" class="fp-section">
				<?php 
					// Variables
					$groups = get_field( 'fp-groups' );
				?>

				<?php include( locate_template( 'components/frontpage/training-groups.php', false, false ) ); ?>
			
			</section> <!-- #fp-groups-section -->
		
		<?php } ?>

		<!-- Frontpage "Banner" Section -->

		<?php if( get_field( 'fp-banner-switch' ) ) { 
			// variable
			$bannerstyle = get_field( 'fp-banner' );
		?>
			<section class="fp-section <?php echo $bannerstyle['class']; ?>">
				<?php 
					// Variables
					$banner             = get_field( 'fp-banner' );
					$button_one_type    = get_field( 'fp-banner' )['type-one'];
					$button_two_type    = get_field( 'fp-banner' )['type-two'];
					$button_three_type  = get_field( 'fp-banner' )['type-three'];
				?>
				
				<?php include( locate_template( 'components/frontpage/banner.php', false, false ) ); ?>
			
			</section>

		<?php } ?>

		<!-- Frontpage "News Reel" Section -->

		<?php if( get_field( 'fp-news-switch' ) ) { ?>

			<section id="fp-newsfeed" class="fp-section">
				<div class="wrap-full-width">

					<?php
						// Variables
						$number = get_field( 'fp-news-number' );

						$args = array(
						'posts_per_page'  => $number,
						'orderby'         => 'DESC',
						'post_status'     => 'publish',
						'perm'            => 'readable'
						);

						$loop = new WP_Query( $args );

						while ( $loop->have_posts() ) : $loop->the_post();

							include( locate_template( 'components/frontpage/newsfeed.php', false, false ) );

						endwhile;

						wp_reset_postdata();
					?>

					<div class="fp-newsfeed-link">
						<button type="button" id="newsfeed-link" onclick="window.open('<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>', '_self')"><i class="fas fa-chevron-circle-right"></i> News Page</button>
					</div>
				</div>
			</section>
		<?php } ?>

		<?php } else { ?>

			<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

				endwhile; // End of the loop.
			?>

		<?php } ?>

	</main><!-- #main -->

<?php
get_footer();
