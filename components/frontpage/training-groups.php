<?php
/**
 * Template part for displaying the gruops area
 *
 * @package mudo
 */
?>

<div class="fp-groups wrap-full-width">

  <article class="fp-group card card-link">
    <a href="<?php echo $groups['children-link']; ?>">
      <figure class="fp-group-thumb">
        <img src="<?php echo $groups['children-image']['url']; ?>" alt="<?php echo $groups['children-image']['alt']; ?>" />
        <span class="fp-group-more">Läs mer</span>
      </figure>
      <div class="card-info card-info-medium">
        <h2><?php echo $groups['children-title']; ?></h2>
        <p><?php echo $groups['children-info']; ?></p>
      </div>
    </a>
  </article>

    <article class="fp-group card card-link">
    <a href="<?php echo $groups['youths-link']; ?>">
      <figure class="fp-group-thumb">
        <img src="<?php echo $groups['youths-image']['url']; ?>" alt="<?php echo $groups['youths-image']['alt']; ?>" />
        <span class="fp-group-more">Läs mer</span>
      </figure>
      <div class="card-info card-info-medium">
        <h2><?php echo $groups['youths-title']; ?></h2>
        <p><?php echo $groups['youths-info']; ?></p>
      </div>
    </a>
  </article>

  <article class="fp-group card card-link">
    <a href="<?php echo $groups['adults-link']; ?>">
      <figure class="fp-group-thumb">
        <img src="<?php echo $groups['adults-image']['url']; ?>" alt="<?php echo $groups['adults-image']['alt']; ?>" />
        <span class="fp-group-more">Läs mer</span>
      </figure>
      <div class="card-info card-info-medium">
        <h2><?php echo $groups['adults-title']; ?></h2>
        <p><?php echo $groups['adults-info']; ?></p>
      </div>
    </a>
  </article>

</div>