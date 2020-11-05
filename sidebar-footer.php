<?php
/**
 * The footer sidebar containing the footer widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Taekwondo
 */

if ( ! is_active_sidebar( 'sidebar-4' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area footer-widgets">
	<?php dynamic_sidebar( 'sidebar-4' ); ?>
</aside><!-- #secondary -->
