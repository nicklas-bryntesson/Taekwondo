<?php
/**
 * Template part for displaying instructor cards.
 *
 * @package Taekwondo
 */
?>

<article class="instructor card card-link">
    <a href="<?php echo get_permalink() ?>">
        <figure class="instructor-thumbnail">
            <img class="card-image-large" src="<?php echo $instructor['image']['url']; ?>" alt="<?php echo $instructor['image']['alt']; ?>" />
            <span class="read-more"><?php esc_html_e( 'Read more', 'tkd' ); ?></span>
        </figure>

        <div class="instructor-meta">
            <div class="meta-titles">
                <h3><?php echo $instructor['title-eng']; ?></h3>
                <span><?php echo $instructor['title-kor']; ?></span>
                <h2><?php the_title(); ?></h2>
            </div>

            <div class="meta-degree"> 
                <?php include( locate_template( 'components/instructors/instructor-degree.php', false, false ) );?>
            </div>
        </div>

    </a>
</article>