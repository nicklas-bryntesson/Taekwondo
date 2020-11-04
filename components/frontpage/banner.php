<?php
/**
 * Template part for displaying the banner area
 *
 * @package mudo
 */
?>

<div class="wrap-full-width">
  <article class="card card-wrapper">
    <figure class="card-image-wrapper image-container">
      <img class="card-image-large" src="<?php echo $banner['image']['url']; ?>" alt="<?php echo $banner['image']['alt']; ?>" />
    </figure>
    <div class="card-info-wrapper">
      <div class="card-info card-info-buttons">
        <h2 class="banner-title"><?php echo $banner['title']; ?></h2>
        <p><?php echo $banner['info']; ?></p>
      </div>

      <?php if ( $banner['switch-one'] OR  $banner['switch-two'] OR $banner['switch-three'] ) { ?>

        <div class="card-buttons">

          <?php if ( $banner['switch-one'] ) { ?>
            <div class="card-buttons-wide">
              <?php if ( $button_one_type == 'file' ) { ?>
                <a class="cta-btn" id="btn-outline" href="<?php echo $banner['link-one-file']['url']; ?>"><i class="far fa-file-pdf"></i> <?php echo $banner['text-one']; ?></a>
              <?php } elseif ( $button_one_type == 'email' ) { ?>
                <a class="cta-btn" id="btn-outline" href="mailto:<?php echo $banner['link-one-email']; ?>"><i class="far fa-envelope"></i> <?php echo $banner['text-one']; ?></a>
              <?php } else { ?>
                <a class="cta-btn" id="btn-outline" href="<?php echo $banner['link-one-url']; ?>"><i class="fas fa-chevron-circle-right"></i> <?php echo $banner['text-one']; ?></a>
              <?php } ?>
            </div>
          <?php } ?>

          <?php if ( $banner['switch-two'] && $banner['switch-three'] ) { ?>
            <div class="card-buttons-split">

              <?php if ( $button_two_type == 'file' ) { ?>
                <a class="cta-btn" id="btn-solid" href="<?php echo $banner['link-two-file']['url']; ?>"><i class="far fa-file-pdf"></i> <?php echo $banner['text-two']; ?></a>
              <?php } elseif ( $button_two_type == 'email' ) { ?>
                <a class="cta-btn" id="btn-solid" href="mailto:<?php echo $banner['link-two-email']; ?>"><i class="far fa-envelope"></i> <?php echo $banner['text-two']; ?></a>
              <?php } else { ?>
                <a class="cta-btn" id="btn-solid" href="<?php echo $banner['link-two-url']; ?>"><i class="fas fa-chevron-circle-right"></i> <?php echo $banner['text-two']; ?></a>
              <?php } ?>

              <?php if ( $button_three_type == 'file' ) { ?>
                <a class="cta-btn" id="btn-solid" href="<?php echo $banner['link-three-file']['url']; ?>"><i class="far fa-file-pdf"></i> <?php echo $banner['text-three']; ?></a>
              <?php } elseif ( $button_three_type == 'email' ) { ?>
                <a class="cta-btn" id="btn-solid" href="mailto:<?php echo $banner['link-three-email']; ?>"><i class="far fa-envelope"></i> <?php echo $banner['text-three']; ?></a>
              <?php } else { ?>
                <a class="cta-btn" id="btn-solid" href="<?php echo $banner['link-three-url']; ?>"><i class="fas fa-chevron-circle-right"></i> <?php echo $banner['text-three']; ?></a>
              <?php } ?>

            </div>
          <?php } ?>

          <?php if ( $banner['switch-two'] Xor $banner['switch-three'] ) { ?>
            <div class="card-buttons-wide">
              <?php if ( $banner['switch-two'] ) { ?>

                <?php if ( $button_two_type == 'file' ) { ?>
                  <a class="cta-btn" id="btn-solid" href="<?php echo $banner['link-two-file']['url']; ?>"><i class="far fa-file-pdf"></i> <?php echo $banner['text-two']; ?></a>
                <?php } elseif ( $button_two_type == 'email' ) { ?>
                  <a class="cta-btn" id="btn-solid" href="mailto:<?php echo $banner['link-two-email']; ?>"><i class="far fa-envelope"></i> <?php echo $banner['text-two']; ?></a>
                <?php } else { ?>
                  <a class="cta-btn" id="btn-solid" href="<?php echo $banner['link-two-url']; ?>"><i class="fas fa-chevron-circle-right"></i> <?php echo $banner['text-two']; ?></a>
                <?php } ?>

              <?php } ?>
              <?php if ( $banner['switch-three'] ) { ?>

                <?php if ( $button_three_type == 'file' ) { ?>
                  <a class="cta-btn" id="btn-solid" href="<?php echo $banner['link-three-file']['url']; ?>"><i class="far fa-file-pdf"></i> <?php echo $banner['text-three']; ?></a>
                <?php } elseif ( $button_three_type == 'email' ) { ?>
                  <a class="cta-btn" id="btn-solid" href="mailto:<?php echo $banner['link-three-email']; ?>"><i class="far fa-envelope"></i> <?php echo $banner['text-three']; ?></a>
                <?php } else { ?>
                  <a class="cta-btn" id="btn-solid" href="<?php echo $banner['link-three-url']; ?>"><i class="fas fa-chevron-circle-right"></i> <?php echo $banner['text-three']; ?></a>
                <?php } ?>

              <?php } ?>
            </div>
          <?php } ?>

        </div>

      <?php } ?> <!-- endif -->

    </div>
  </article>
</div>
