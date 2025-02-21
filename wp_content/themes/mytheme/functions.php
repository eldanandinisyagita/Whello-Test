<?php
/**
 * mytheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mytheme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mytheme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on mytheme, use a find and replace
		* to change 'mytheme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'mytheme', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'mytheme' ),
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
			'mytheme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

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
add_action( 'after_setup_theme', 'mytheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mytheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mytheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'mytheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mytheme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'mytheme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'mytheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'mytheme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mytheme_scripts() {
	wp_enqueue_style( 'mytheme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'mytheme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'mytheme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mytheme_scripts' );

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function register_my_menu() 
{
    /**
     * Register the main navigation menu for this theme.
     * 
     * This function uses `register_nav_menu()` to declare the menu location
     * called 'primary'. This allows users to assign a navigation menu
     * through the WordPress admin page in “Appearance” > “Menus”.
     *
     */

    register_nav_menu('primary', __('Primary Menu'));
}
add_action('after_setup_theme', 'register_my_menu');

function create_product_post_type() {
    register_post_type('product',
        array(
            'labels'      => array(
                'name'          => __('Products'), 
                'singular_name' => __('Product'), 
                'add_new'       => __('Add New Product'),
                'add_new_item'  => __('Add New Product'),
                'edit_item'     => __('Edit Product'),
                'new_item'      => __('New Product'),
                'view_item'     => __('View Product'),
                'search_items'  => __('Search Products'),
                'not_found'     => __('No Products found'),
                'not_found_in_trash' => __('No Products found in Trash'),
            ),
            'public'      => true,
            'has_archive' => true,
            'supports'    => array('title', 'editor', 'thumbnail'),
            'menu_icon'   => 'dashicons-cart',
            'rewrite'     => array('slug' => 'shop'), 
        )
    );
}
add_action('init', 'create_product_post_type');


function product_custom_fields() {
    add_meta_box(
        'product_details',
        'Detail product',
        'product_custom_fields_callback',
        'product',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'product_custom_fields');

function product_custom_fields_callback($post) {
    $price = get_post_meta($post->ID, '_product_price', true);
    $content = get_post_meta($post->ID, '_product_content', true);

    wp_nonce_field('save_product_data', 'product_nonce');

    echo '<label>Price Product ($): </label>';
    echo '<input type="number" name="product_price" value="' . esc_attr($price) . '" style="width: 100%;" /><br><br>';

    echo '<label>Product Quantity: </label>';
    echo '<input type="text" name="product_content" value="' . esc_attr($content) . '" style="width: 100%;" />';
}

function save_product_custom_fields($post_id) {

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
 
    if (get_post_type($post_id) !== 'product') return;

    if (!current_user_can('edit_post', $post_id)) return;

    if (!isset($_POST['product_nonce']) || !wp_verify_nonce($_POST['product_nonce'], 'save_product_data')) {
        return;
    }

    if (isset($_POST['product_price'])) {
        update_post_meta($post_id, '_product_price', sanitize_text_field($_POST['product_price']));
    }
    if (isset($_POST['product_content'])) {
        update_post_meta($post_id, '_product_content', sanitize_text_field($_POST['product_content']));
    }
}
add_action('save_post', 'save_product_custom_fields');

add_theme_support('post-thumbnails', array('product'));


// TESTIMONIALS SECTION //

// Register Testimonials CPT
function create_testimonial_cpt() {
    $args = array(
        'labels' => array(
            'name'          => __('Testimonials'),
            'singular_name' => __('Testimonial'),
            'menu_name'     => __('Testimonials'),
            'add_new'       => __('Add New Testimonial'),
            'add_new_item'  => __('Add New Testimonial'),
            'edit_item'     => __('Edit Testimonial'),
            'new_item'      => __('New Testimonial'),
            'view_item'     => __('View Testimonial'),
            'all_items'     => __('All Testimonials'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-testimonial',
        'supports'     => array('title', 'editor', 'thumbnail'),
    );
    register_post_type('testimonial', $args);
}
add_action('init', 'create_testimonial_cpt');


// Add Meta Boxes for Testimonials
function add_testimonial_meta_boxes() {
    add_meta_box('testimonial_details', 'Testimonial Details', 'testimonial_meta_callback', 'testimonial', 'normal', 'high');
}
add_action('add_meta_boxes', 'add_testimonial_meta_boxes');

// Meta Box Callback Function
function testimonial_meta_callback($post) {
    $location = get_post_meta($post->ID, '_testimonial_location', true);
    $rating = get_post_meta($post->ID, '_testimonial_rating', true);
    
    echo '<label for="testimonial_location">Location:</label>';
    echo '<input type="text" id="testimonial_location" name="testimonial_location" value="'.esc_attr($location).'" style="width:100%;" /><br><br>';
    
    echo '<label for="testimonial_rating">Rating (1-5):</label>';
    echo '<input type="number" id="testimonial_rating" name="testimonial_rating" value="'.esc_attr($rating).'" min="1" max="5" style="width:100%;" />';
}

// Save Meta Box Data
function save_testimonial_meta($post_id) {
    if (isset($_POST['testimonial_location'])) {
        update_post_meta($post_id, '_testimonial_location', sanitize_text_field($_POST['testimonial_location']));
    }
    if (isset($_POST['testimonial_rating'])) {
        update_post_meta($post_id, '_testimonial_rating', intval($_POST['testimonial_rating']));
    }
}
add_action('save_post', 'save_testimonial_meta');


// for custom post type menu

function mytheme_register_menus() {
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'mytheme'),
    ));
}
add_action('after_setup_theme', 'mytheme_register_menus');

