<?php
/**
 * Template part for displaying the hero area
 *
 * @package mudo
 */
?>

<?php if ( has_post_thumbnail() ) { ?>

  <div class="image-hero-container">

    <figure class="hero-image-wrapper image-container">
      <?php echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'hero-fullbleed' ) ); ?>
    </figure>

    <div class="hero-overlay"></div>

    <div class="wrap-full-width">

      <div class="hero--content image-hero--content">

        <header class="hero-entry-header">
          <h1><?php echo $hero['title']; ?></h1>
          <i><?php echo $hero['slogan']; ?></i>
        </header>

        <div class="hero-entry-content">
          <p><?php the_content(); ?></p>
        </div>

        <?php if ( $hero['switch-1'] && $hero['switch-2']) { ?>
          <div class="hero-buttons-split">
            <a id="hero-btn" class="cta-btn" href="<?php echo $hero['link-1']; ?>"><i class="fas fa-chevron-circle-right"></i> <?php echo $hero['text-1']; ?></a>
            <a id="hero-btn" class="cta-btn" href="<?php echo $hero['link-2']; ?>"><i class="fas fa-chevron-circle-right"></i> <?php echo $hero['text-2']; ?></a>
          </div>
        <?php } ?>

        <?php if ( $hero['switch-1'] && !$hero['switch-2']) { ?>
          <div class="hero-buttons-wide">
            <a id="hero-btn" class="cta-btn" href="<?php echo $hero['link-1']; ?>"><i class="fas fa-chevron-circle-right"></i> <?php echo $hero['text-1']; ?></a>
          </div>
        <?php } ?>

        <?php if ( $hero['switch-2'] && !$hero['switch-1']) { ?>
          <div class="hero-buttons-wide">
            <a id="hero-btn" class="cta-btn" href="<?php echo $hero['link-2']; ?>"><i class="fas fa-chevron-circle-right"></i> <?php echo $hero['text-2']; ?></a>
          </div>
        <?php } ?>

      </div>
    </div>
  </div>

<?php } else { ?>

  <div class="default-hero-container">

    <div class="hero-overlay"></div>

    <div class="page-width">

      <div class="hero--content default-hero--content">

        <header class="hero-entry-header">
          <h1><?php echo $hero['title']; ?></h1>
          <i><?php echo $hero['slogan']; ?></i>
        </header>

        <div class="hero-entry-content">
          <p><?php the_content(); ?></p>
        </div>

        <?php if ( $hero['switch-1'] && $hero['switch-2']) { ?>
          <div class="hero-buttons-split">
            <a id="hero-btn" class="cta-btn" href="<?php echo $hero['link-1']; ?>"><i class="fas fa-chevron-circle-right"></i> <?php echo $hero['text-1']; ?></a>
            <a id="hero-btn" class="cta-btn" href="<?php echo $hero['link-2']; ?>"><i class="fas fa-chevron-circle-right"></i> <?php echo $hero['text-2']; ?></a>
          </div>
        <?php } ?>

        <?php if ( $hero['switch-1'] && !$hero['switch-2']) { ?>
          <div class="hero-buttons-wide">
            <a id="hero-btn" class="cta-btn" href="<?php echo $hero['link-1']; ?>"><i class="fas fa-chevron-circle-right"></i> <?php echo $hero['text-1']; ?></a>
          </div>
        <?php } ?>

        <?php if ( $hero['switch-2'] && !$hero['switch-1']) { ?>
          <div class="hero-buttons-wide">
            <a id="hero-btn" class="cta-btn" href="<?php echo $hero['link-2']; ?>"><i class="fas fa-chevron-circle-right"></i> <?php echo $hero['text-2']; ?></a>
          </div>
        <?php } ?>

      </div>
    </div>
  </div>

<?php } ?>
