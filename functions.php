<?php
/**
 * sahakyansjewelry functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sahakyansjewelry
 */

if (!defined('_S_VERSION')) {
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
function sahakyansjewelry_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on sahakyansjewelry, use a find and replace
	 * to change 'sahakyansjewelry' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('sahakyansjewelry', get_template_directory() . '/languages');

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

	// // This theme uses wp_nav_menu() in one location.
	// register_nav_menus(
	// 	array(
	// 		'menu-1' => esc_html__('Primary', 'sahakyansjewelry'),
	// 	)
	// );

	function register_theme_menus()
	{
		register_nav_menus([
			'header_menu' => esc_html__('Header Menu', 'sahakyansjewelry'),
			'mobile_menu' => esc_html__('Mobile Menu', 'sahakyansjewelry'),
		]);
	}
	add_action('after_setup_theme', 'register_theme_menus');

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
			'sahakyansjewelry_custom_background_args',
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
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'sahakyansjewelry_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sahakyansjewelry_content_width()
{
	$GLOBALS['content_width'] = apply_filters('sahakyansjewelry_content_width', 640);
}
add_action('after_setup_theme', 'sahakyansjewelry_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sahakyansjewelry_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'sahakyansjewelry'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'sahakyansjewelry'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'sahakyansjewelry_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function sahakyansjewelry_scripts()
{
	wp_enqueue_script('jquery');

	wp_enqueue_style('sahakyansjewelry-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
	wp_enqueue_style('animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css');
	
	wp_enqueue_style('footer-css', get_template_directory_uri() . '/assets/css/footer.css');
	wp_enqueue_style('header-css', get_template_directory_uri() . '/assets/css/header.css');
	wp_enqueue_style('home-css', get_template_directory_uri() . '/assets/css/home.css');
	wp_enqueue_style('portfolio-page-css', get_template_directory_uri() . '/assets/css/portfolio-page.css');
	wp_enqueue_style('aboutUs-css', get_template_directory_uri() . '/assets/css/aboutUs.css');
	wp_enqueue_style('contactUs-css', get_template_directory_uri() . '/assets/css/contact.css');
	
	wp_style_add_data('sahakyansjewelry-style', 'rtl', 'replace');

	wp_enqueue_script('lenis', 'https://unpkg.com/@studio-freight/lenis@1.0.42/dist/lenis.min.js', array('jquery'), null, true);
	wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array('jquery'), null, true);
	wp_enqueue_script('sahakyansjewelry-header-js', get_template_directory_uri() . '/assets/js/header.js', array(), null, true);
	wp_enqueue_script('sahakyansjewelry-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	wp_localize_script('custom-js', 'ajax_object', array(
		'ajax_url' => admin_url('admin-ajax.php')  // Получаем правильный URL для admin-ajax.php
	));

	if (is_front_page()) {
		wp_enqueue_script('sahakyansjewelry-home-js', get_template_directory_uri() . '/assets/js/home.js', array('jquery', 'lenis'), null, true);
	}

	if (is_page('portfolio')) {
		wp_enqueue_script('sahakyansjewelry-portfolio-js', get_template_directory_uri() . '/assets/js/portfolio.js', array('jquery', 'lenis'), null, true);
		wp_localize_script('sahakyansjewelry-portfolio-js', 'ajax_object', array(
			'ajax_url' => admin_url('admin-ajax.php')  // Получаем правильный URL для admin-ajax.php
		));
	}

}
add_action('wp_enqueue_scripts', 'sahakyansjewelry_scripts');

function create_model_post_type()
{
	register_post_type('model', [
		'labels' => [
			'name' => 'Models',
			'singular_name' => 'Model',
			'add_new' => 'Add New Model',
			'add_new_item' => 'Add New Model',
			'edit_item' => 'Edit Model',
			'new_item' => 'New Model',
			'view_item' => 'View Model',
			'search_items' => 'Search Models',
			'not_found' => 'No models found',
			'not_found_in_trash' => 'No models found in Trash',
			'all_items' => 'All Models',
			'menu_name' => 'Models',
		],
		'public' => true,
		'supports' => ['title', 'editor', 'thumbnail'],
		'show_in_rest' => true,
		'taxonomies' => ['category'],
	]);
}
add_action('init', 'create_model_post_type');

function load_more_models()
{
	$paged = isset($_GET['page']) ? intval($_GET['page']) : 1;
	$args = array(
		'post_type' => 'model',
		'posts_per_page' => 20,
		'paged' => $paged,
	);

	$query = new WP_Query($args);

	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			$model_name = get_the_title();
			$model_images = get_field('model_images');
			$model_type = get_field('model_type');
			$model_description = get_field('model_description');
			$contact_phone = get_field('contact_phone');
			$contact_email = get_field('contact_email');
			$model_ref_number = get_field('model_ref_number');
			?>
			<div class="modelCard" data-type="<?php echo esc_attr($model_type); ?>">
				<img src="<?php echo esc_url($model_images[0]['image']['url'] ?? ''); ?>"
					alt="<?php echo esc_attr($model_name); ?>">
				<h4><?php echo esc_html($model_name); ?></h4>
				<div class="viewLink">
					<button class="viewModelBtn" data-name="<?php echo esc_attr($model_name); ?>"
						data-images='<?php echo json_encode($model_images); ?>'
						data-description='<?php echo json_encode($model_description); ?>'
						data-phone="<?php echo esc_attr($contact_phone); ?>" data-email="<?php echo esc_attr($contact_email); ?>"
						data-ref="<?php echo esc_attr($model_ref_number); ?>">
						View Model
					</button>
				</div>
			</div>
			<?php
		}
		wp_reset_postdata();
	}

	die();
}

add_action('wp_ajax_load_more_models', 'load_more_models');
add_action('wp_ajax_nopriv_load_more_models', 'load_more_models');

if (function_exists('acf_add_options_page')) {
	acf_add_options_page([
		'page_title' => 'Theme Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug' => 'theme-settings',
		'capability' => 'edit_posts',
		'redirect' => false,
	]);
}

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

