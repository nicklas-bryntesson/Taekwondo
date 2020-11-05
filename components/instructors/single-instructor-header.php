<?php
/**
 * Template part for displaying single instructor presentation card.
 *
 * @package Taekwondo
 */
?>

<header class="entry-header">
    <figure class="instructor-thumbnail">
        <img class="card-image-large" src="<?php echo $instructor['image']['url']; ?>" alt="<?php echo $instructor['image']['alt']; ?>" />
    </figure>
    <div class="instructor-meta">
        <div class="meta-titles">
            <h1><?php echo $instructor['title-eng']; ?></h1>
            <span><?php echo $instructor['title-kor']; ?></span>
            <h2><?php the_title(); ?></h2>
        </div>
        </div class="meta-degree">

            <?php include( locate_template( 'components/instructors/instructor-degree.php', false, false ) ); ?>
        
        <div>
    </div>
</header><!-- .entry-header -->
