<?php
/**
 * Template part for displaying the hero area
 *
 * @package mudo
 */
?>

<div class="video-hero-container jquery-background-video-wrapper">

  <video class="jquery-background-video" autoplay muted loop poster="<?php echo $hero['poster']; ?>">
    <source src="<?php echo $hero['webm']; ?>" type="video/webm"/>
    <source src="<?php echo $hero['mp4']; ?>" type="video/mp4"/>
    Din webläsare stödjer ej HTML video tag.
  </video>

  <div class="hero-overlay"></div>

  <div class=".wrap-full-width">

    <div class="hero--content video-hero--content">

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
