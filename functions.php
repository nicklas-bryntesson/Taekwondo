<?php
/**
 * Taekwondo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Taekwondo
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'tkd_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function tkd_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Taekwondo, use a find and replace
		 * to change 'tkd' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'tkd', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		
		// Set post thumbnail size.
		set_post_thumbnail_size( 1200, 9999 );


		/**
		 * Custom Logo Function -> Remove and exchange with SVG on Demo site.
		 */

		// Custom logo.
		$logo_width  = 120;
		$logo_height = 90;

		// If the retina setting is active, double the recommended width and height.
		if ( get_theme_mod( 'retina_logo', false ) ) {
			$logo_width  = floor( $logo_width * 2 );
			$logo_height = floor( $logo_height * 2 );
		}

		add_theme_support(
			'custom-logo',
			array(
				'height'      => $logo_height,
				'width'       => $logo_width,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);

		/*
		 * Opt in features to extend block editor.
		 *
		 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/
		 */
		
		 add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'main'	=> esc_html__( 'Primary', 'tkd' ),
				'admin' 	=> esc_html__( 'Administration Menu', 'tkd' ),
				'social'	=> esc_html__( 'Social Media Menu', 'tkd' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

	}
endif;
add_action( 'after_setup_theme', 'tkd_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tkd_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tkd_content_width', 640 );
}
add_action( 'after_setup_theme', 'tkd_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tkd_widgets_init() {
	register_sidebar( 
		array(
			'name'          => esc_html__( 'Post Sidebar', 'tkd' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add Post Sidebar widgets here.', 'tkd' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) 
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Page Sidebar', 'tkd' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'tkd' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Instructor Sidebar', 'tkd' ),
			'id'            => 'sidebar-3',
			'description'   => esc_html__( 'Add widgets here.', 'tkd' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar( 
		array(
			'name'          	=> esc_html__( 'Footer Sidebar', 'tkd' ),
			'id'            	=> 'sidebar-4',
			'description'   	=> esc_html__( 'Add footer widgets here.', 'tkd' ),
			'before_widget' 	=> '<section id="%1$s" class="widget %2$s">',
			'after_widget'  	=> '</section>',
			'before_title'  	=> '<h2 class="widget-title">',
			'after_title'   	=> '</h2>',
		) 
	);
}
add_action( 'widgets_init', 'tkd_widgets_init' );

/**
 * Add preconnect for Google Fonts.
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function tkd_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'tkd-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'tkd_resource_hints', 10, 2 );

/**
* Custom Load Font Awesome.
*/

add_action( 'wp_enqueue_scripts', 'custom_load_font_awesome' );
function custom_load_font_awesome() {
   wp_enqueue_script( 'font-awesome', 'https://use.fontawesome.com/releases/v5.0.6/js/all.js', array(), null );
}

add_filter( 'script_loader_tag', 'add_defer_attribute', 10, 2 );
/**
* Filter the HTML script tag of `font-awesome` script to add `defer` attribute.
*
* @param string $tag    The <script> tag for the enqueued script.
* @param string $handle The script's registered handle.
*
* @return   Filtered HTML script tag.
*/
function add_defer_attribute( $tag, $handle ) {
    if ( 'font-awesome' === $handle ) {
       $tag = str_replace( ' src', ' defer src', $tag );
   }
   return $tag;
}

/**
 * Enqueue scripts and styles.
 */
function tkd_scripts() {
	// Google Fonts -> Updatde + Code
	wp_enqueue_style( 'tkd-google-fonts', 'https://fonts.googleapis.com/css?family=Merriweather:400,700|Nunito+Sans:300,400,700,900|Fira+Code:500');


	wp_enqueue_style( 'tkd-style', get_stylesheet_uri(), array(), _S_VERSION );

	if ( is_front_page() ) {
		wp_enqueue_style( 'frontpage', get_template_directory_uri() . '/layouts/frontpage.css' );
	}

	wp_style_add_data( 'tkd-style', 'rtl', 'replace' );

	/**
	 * Based on the proposed CSS :focus-visible pseudo-selector, 
	 * this prototype adds a focus-visible class to the focused element, 
	 * in situations in which the :focus-visible pseudo-selector should match.
	 * 
	 * @link https://github.com/WICG/focus-visible
	 */
	wp_enqueue_script( 'focus-visible', get_template_directory_uri() . '/js/focus-visible.min.js', array(), _S_VERSION, true );



	/**
	 * Default Navigation
	 */
	// wp_enqueue_script( 'tkd-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );


	
	/**
	 * Minda Navigation -> Refractor
	 */
	wp_enqueue_script( 'tkd-navigation', get_template_directory_uri() . '/js/navigation-minda.js', array('jquery'), _S_VERSION, true );
	wp_localize_script( 'tkd-navigation', 'tkdScreenReaderText', array(
		'expand' => __( 'Open menu', 'tkd'),
		'collapse' => __( 'Close menu', 'tkd'),
	));



	// Load Background Video script
	wp_enqueue_script( 'tkd-background-video', get_template_directory_uri() . '/js/background-video.js', array( 'jquery' ), '20201103', true );
	wp_enqueue_script( 'tkd-background-functions', get_template_directory_uri() . '/js/video-functions.js', array( 'jquery' ), '20201103', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tkd_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Disbable Block editor on specific pages and templates.
 */
require get_template_directory() . '/inc/disable-block-editor.php';

/**
 * Load SVG icon functions.
 */
require get_template_directory() . '/inc/icon-functions.php';


/**
 * Navigation Description Component.
 */
// require get_template_directory() . '/inc/navigation-description.php';
