<?php
/**
 * Template part for displaying the newsfeed area
 *
 * @package mudo
 */
?>

<article class="fp-newsbox card card-link">
  <a href="<?php echo get_permalink(); ?>">
    <div class="card-wrapper">
      <figure class="card-image-wrapper image-container">
        <?php if ( has_post_thumbnail() ) {
        the_post_thumbnail( 'newsfeed', array( 'class'  => 'card-image-medium' ) );
        } else {
          echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/assets/images/thumbnail-default.jpg" />';
        } ?>
      </figure>
      <div class="card-info-wrapper">
      <div class="card-info card-info-large card-position">
        <h2 class="fp-newsbox-title"><?php echo get_the_title(); ?></h2>
        <p class="fp-newsbox-posted">Posted: <span class="fp-newsbox-date"><?php echo get_the_date(); ?></span></p>
        <p><?php echo get_the_excerpt(); ?></p>
        <span class="fp-newsbox-arrow"><i class="fas fa-chevron-right"></i></span>
      </div>
    </div>
   </div>
  </a>
 </article>
