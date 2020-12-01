<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Taekwondo
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'tkd' ); ?></a>

	<header id="masthead" class="site-header">		

		<?php if ( has_nav_menu( 'admin' ) ) { ?>
			<nav id="top-navigation" class="admin-navigation menu">
				<?php
				wp_nav_menu( array(
					'theme_location'	=> 'admin',
					'depth'				=> 1,
					'container'			=> false,
				) );
				?>
			</nav>
		<?php } ?>

		<div class="site-branding">
			<div class="header-titles">

				<?php
				// Site title or logo.
				tkd_site_logo();

				// Site description.
				tkd_site_description();
				?>

			</div><!-- .header-titles -->
		</div><!-- .site-branding -->

		<?php if ( has_nav_menu( 'admin' ) && !has_nav_menu( 'main' ) ) { ?>
			<nav id="site-navigation" class="main-navigation menu">
				<button class="menu-toggle toggle--elastic" aria-controls="admin-menu" aria-expanded="false">
					<span class="menu-label"><?php esc_html_e( 'Admin Menu', 'tkd' ); ?></span>
					<span class="toggle-box"><span class="toggle-inner"></span></span>
				</button>
				<?php
					wp_nav_menu(
						array(
							'theme_location'    => 'admin',
							'menu_id'           => 'top-navigation',
							'menu_class'        => 'admin-menu admin-mobile',
							'depth'             => 1,
							'container'         => false,
						)
					);
				?>
			</nav>
		<?php } elseif ( !has_nav_menu( 'admin' ) && has_nav_menu( 'main' ) ) { ?>
			<nav id="site-navigation" class="main-navigation menu">
				<button class="menu-toggle toggle--elastic" aria-controls="primary-menu" aria-expanded="false">
					<span class="menu-label"><?php esc_html_e( 'Primary Menu', 'tkd' ); ?></span>
					<span class="toggle-box"><span class="toggle-inner"></span></span>
				</button>
				<?php
					wp_nav_menu(
						array(
							'theme_location'    => 'main',
							'menu_id'           => 'primary-menu',
							'menu_class'        => 'main-menu',
							'container'         => false,
						)
					);
				?>
			</nav>
		<?php } elseif ( has_nav_menu( 'admin' ) && has_nav_menu( 'main' ) ) { ?>
			<nav id="site-navigation" class="main-navigation menu">
				<button class="menu-toggle toggle--elastic" aria-controls="primary-menu" aria-expanded="false">
					<span class="menu-label"><?php esc_html_e( 'Primary Menu', 'tkd' ); ?></span>
					<span class="toggle-box"><span class="toggle-inner"></span></span>
				</button>
				<?php
					wp_nav_menu(
						array(
							'theme_location'    => 'main',
							'menu_id'           => 'primary-menu',
							'menu_class'        => 'main-menu',
							'container'         => false,
						)
					);
					wp_nav_menu(
						array(
							'theme_location'    => 'admin',
							'menu_id'           => 'top-navigation',
							'menu_class'        => 'admin-mobile',
							'depth'             => 1,
							'container'         => false,
						)
					);
				?>
			</nav>
		<?php } else { /* No active menu! */ } ?>

	</header><!-- #masthead -->
