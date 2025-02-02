<?php

/**
 * clever-assessment functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package clever-assessment
 */

if (! defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function clever_assessment_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on clever-assessment, use a find and replace
		* to change 'clever-assessment' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('clever-assessment', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'clever-assessment'),
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

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'clever_assessment_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'clever_assessment_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function clever_assessment_content_width()
{
	$GLOBALS['content_width'] = apply_filters('clever_assessment_content_width', 640);
}
add_action('after_setup_theme', 'clever_assessment_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function clever_assessment_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'clever-assessment'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'clever-assessment'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'clever_assessment_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function clever_assessment_scripts()
{
	wp_enqueue_style('clever-assessment-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('clever-assessment-style', 'rtl', 'replace');

	// wp_enqueue_script('clever-assessment-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	// enqueue bundled custom scripts and styles
	wp_enqueue_style('theme-styles', get_template_directory_uri() . '/dist/bundle.css');
	wp_enqueue_script('theme-scripts', get_template_directory_uri() . '/dist/bundle.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'clever_assessment_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

function remove_editor_on_homepage()
{
	if (is_admin()) {
		$screen = get_current_screen();

		// Check if we are on the 'edit' screen for the homepage
		if ($screen && $screen->id === 'page' && get_option('page_on_front') == get_the_ID()) {
			remove_post_type_support('page', 'editor');
		}
	}
}
add_action('admin_head', 'remove_editor_on_homepage');

function enqueue_custom_scripts()
{
	wp_enqueue_script(
		'signup-form', // Handle
		get_template_directory_uri() . '/js/signup-form.js', // Script URL
		array(), // Dependencies
		filemtime(get_template_directory() . '/js/signup-form.js'), // Version
		false // Load in footer
	);
	wp_enqueue_script(
		'video-section', // Handle
		get_template_directory_uri() . '/js/video-section.js', // Script URL
		array(), // Dependencies
		filemtime(get_template_directory() . '/js/video-section.js'), // Version
		true // Load in footer
	);
	wp_enqueue_script(
		'review-cards-carousel', // Handle
		get_template_directory_uri() . '/js/review-cards-carousel.js', // Script URL
		array(), // Dependencies
		filemtime(get_template_directory() . '/js/review-cards-carousel.js'), // Version
		true // Load in footer
	);
	wp_enqueue_script(
		'before-after-revealer', // Handle
		get_template_directory_uri() . '/js/before-after-revealer.js', // Script URL
		array(), // Dependencies
		filemtime(get_template_directory() . '/js/before-after-revealer.js'), // Version
		true // Load in footer
	);
	wp_enqueue_script(
		'swatches-modal', // Handle
		get_template_directory_uri() . '/js/swatches-modal.js', // Script URL
		array(), // Dependencies
		filemtime(get_template_directory() . '/js/swatches-modal.js'), // Version
		true // Load in footer
	);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');
