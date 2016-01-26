<?php
/**
 * Woo Strap functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Woo_Strap
 */

if ( ! function_exists( 'woostrap_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function woostrap_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Woo Strap, use a find and replace
	 * to change 'woostrap' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'woostrap', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Allow Admin to access without auth the Woocrommerce rest api
	// add_filter( 'woocommerce_api_check_authentication', function() { return new WP_User( 1 ); } );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'woostrap' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'woostrap_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'woostrap_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function woostrap_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'woostrap_content_width', 640 );
}
add_action( 'after_setup_theme', 'woostrap_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function woostrap_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'woostrap' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'woostrap_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function woostrap_scripts() {
	// Register Bootstrap CSS
	wp_register_style(
	    'bootstrap', // handle name
	    get_template_directory_uri() . '/assets/css/bootstrap.min.css', // the URL of the stylesheet
	    array(),// an array of dependent styles
	    '3.3.6', // version number
	    'screen' // CSS media type
	);

	// Register MyStyle CSS
	wp_register_style(
	    'main-css', // handle name
	    get_template_directory_uri() . '/assets/css/main.css', // the URL of the stylesheet
	    array(),//array( 'bootstrap-main' ), // an array of dependent styles
	    '1.0.1', // version number
	    'screen' // CSS media type
	);

	wp_enqueue_style( 'woostrap-style', get_stylesheet_uri() );

	wp_enqueue_style( 'bootstrap' );

	wp_enqueue_style( 'main-css' );

	wp_enqueue_script( 'woostrap-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'woostrap-nav-menu', get_template_directory_uri() . '/js/nav-menu.js', array(), '20120206', true );

	wp_enqueue_script( 'woostrap-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_register_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '3.3.6', false );

	wp_enqueue_script('bootstrap-js');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'woostrap_scripts' );

/**
 * Remove each style one by one from Woocommerce.
 */
// add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
// function jk_dequeue_styles( $enqueue_styles ) {
// 	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
// 	unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
// 	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
// 	return $enqueue_styles;
// }

// // Or just remove them all in one line
// add_filter( 'woocommerce_enqueue_styles', '__return_false' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Woocommerce Theme Support.
 */
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
