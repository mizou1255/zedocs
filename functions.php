<?php
/**
 * ZEDOCS functions and definitions.
 *
 * This file is read by WordPress to setup the theme and his additional
 * features.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package   ZEDOCS
 * @author    MELIOZE <contact@melioze.com>
 * @copyright 2023 MELIOZE
 * @license   GPL-2.0-or-later
 * @since     1.0.0
 */

/**
 * Currently theme version.
 */
define( 'ZD__VERSION', '1.0.0' );
define( 'ZD__PATH', wp_normalize_path( get_template_directory() . DIRECTORY_SEPARATOR ) );
define( 'ZD__URL', get_template_directory_uri() . '/' );

if ( ! function_exists( 'zd__setup' ) ) {
	/**
	 * Setup ZEDOCS theme and registers support for various WordPress features.
	 *
	 * @since 1.0.0
	 */
	function zd__setup() {
		// Make theme available for translation.
		load_theme_textdomain( 'zedocs', get_template_directory() . '/languages' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		$editor_css_path = get_template_directory() . '/assets/css/editor-style.css';
		add_editor_style( $editor_css_path );

		// Switch default core markup to output valid HTML5.
		add_theme_support(
			'html5',
			array(
				'caption',
				'comment-form',
				'comment-list',
				'gallery',
				'navigation-widgets',
				'script',
				'search-form',
				'style',
			)
		);

		// Add post-formats support.
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'audio',
				'chat',
				'gallery',
				'image',
				'link',
				'quote',
				'status',
				'video',
			)
		);

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'testimonial', 140, 140 );
		add_image_size( 'partners', 160, 80 );
		add_image_size( 'card', 450, 380 );
		add_image_size( 'blog_card', 850, 'auto' );
		add_image_size( 'blog_single', 1200, 550 );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Register custom menu.
		register_nav_menus(
			array(
				'primary'   => __( 'Main menu', 'zedocs' ),
			)
		);
		require_once ZD__PATH . 'inc/lib/navWalker/class-wp-bootstrap-navwalker.php';
	}
}
add_action( 'after_setup_theme', 'zd__setup' );

/**
 * Register and enqueue styles.
 *
 * @since 1.0.0
 */
function zd__enqueue_styles() {
	$style_path = get_template_directory() . '/style.css';
	$style_uri  = get_template_directory_uri() . '/style.css';

	if ( file_exists( $style_path ) ) {
		wp_register_style( 'zd__style', $style_uri, array(), ZD__VERSION );
		wp_enqueue_style( 'zd__style' );
		wp_style_add_data( 'zd__style', 'rtl', 'replace' );
	}

	wp_enqueue_style('zd__theme', ZD__URL . 'assets/css/theme.css', '');
	wp_style_add_data( 'zd__theme', 'rtl', 'replace' );
	
}
add_action( 'wp_enqueue_scripts', 'zd__enqueue_styles' );

function zd_enqueue_styles_dynmaic() {
	wp_enqueue_style('zd_dynamic_php', ZD__URL . 'assets/css/dynamic-css.css', ''); 
}
add_action( 'wp_enqueue_scripts', 'zd_enqueue_styles_dynmaic', 20 );

/**
 * Register and enqueue scripts.
 *
 * @since 1.0.0
 */
function zd__enqueue_scripts() {
	wp_enqueue_script('jquery');  
	
	$bootstrap_scripts_path  = ZD__PATH . 'assets/js/components/bootstrap.min.js';
	$bootstrap_scripts_uri  = ZD__URL . 'assets/js/components/bootstrap.min.js';

	if ( file_exists( $bootstrap_scripts_path ) ) {
		wp_register_script( 'zd__bootstrap', $bootstrap_scripts_uri, array(), ZD__VERSION, false );
		wp_enqueue_script( 'zd__bootstrap' );
	}

	wp_enqueue_script('zoom-min', ZD__URL . 'assets/js/components/zoom.min.js', array('jquery'), ZD__VERSION, false);
	wp_enqueue_script('highlight-min', ZD__URL . 'assets/js/components/highlight.min.js', array('jquery'), ZD__VERSION, false);
	wp_enqueue_script('highlight-lang', ZD__URL . 'assets/js/components/highlight_lang.js', array('jquery'), ZD__VERSION, false);
	wp_enqueue_script('scrollTo-min', ZD__URL . 'assets/js/components/scrollTo.min.js', array('jquery'), ZD__VERSION, false);
	wp_enqueue_script('fuse-min', ZD__URL . 'assets/js/components/fuse.min.js', array('jquery'), ZD__VERSION, false);

	$theme_scripts_path = get_template_directory() . '/assets/js/theme.js';
	$theme_scripts_uri  = get_template_directory_uri() . '/assets/js/theme.js';

	if ( file_exists( $theme_scripts_path ) ) {
		wp_register_script( 'zd__theme', $theme_scripts_uri, array(), ZD__VERSION, true );
		wp_enqueue_script( 'zd__theme' );
	}

}
add_action( 'wp_enqueue_scripts', 'zd__enqueue_scripts' );

/**
 * Register and enqueue editor assets.
 *
 * @since 1.0.0
 */
function zd__enqueue_editor_assets() {
	
}
add_action( 'enqueue_block_editor_assets', 'zd__enqueue_editor_assets' );

/**
 * Register sidebars.
 *
 * @since 1.0.0
 */
function zd__widgets_init() {
	
}
add_action( 'widgets_init', 'zd__widgets_init' );

/**
 * REQUIRED FILES
 * Additional features and helpers functions.
 */
require get_parent_theme_file_path( '/inc/autoload.php' );
require get_parent_theme_file_path( '/inc/helpers.php' );
require get_parent_theme_file_path( '/inc/hooks.php' );
