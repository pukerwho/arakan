<?php
/**
 * G-Info functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package G-Info
 */

if ( ! defined( 'TARAKAN_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'TARAKAN_VERSION', '1.0.0' );
}

if ( ! function_exists( 'tarakan_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function tarakan_setup() {
		load_theme_textdomain( 'tarakan', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'tarakan' ),
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
				'ginfo_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'tarakan_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tarakan_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tarakan_content_width', 640 );
}
add_action( 'after_setup_theme', 'tarakan_content_width', 0 );

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once __DIR__ . '/vendor/autoload.php';
    \Carbon_Fields\Carbon_Fields::boot();
    require_once get_template_directory() . '/inc/carbon-fields/carbon-fields-plugin.php';
    require_once get_template_directory() . '/inc/custom-fields/settings-meta.php';
    require_once get_template_directory() . '/inc/custom-fields/post-meta.php';
    require_once get_template_directory() . '/inc/custom-fields/page-meta.php';
    require_once get_template_directory() . '/inc/custom-fields/term-meta.php';
}

require_once get_template_directory() . '/inc/share-buttons.php';

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

function itsme_disable_feed() {
 wp_die( __( 'No feed available, please visit the <a href="'. esc_url( home_url( '/' ) ) .'">homepage</a>!' ) );
}

add_action('do_feed', 'itsme_disable_feed', 1);
add_action('do_feed_rdf', 'itsme_disable_feed', 1);
add_action('do_feed_rss', 'itsme_disable_feed', 1);
add_action('do_feed_rss2', 'itsme_disable_feed', 1);
add_action('do_feed_atom', 'itsme_disable_feed', 1);
add_action('do_feed_rss2_comments', 'itsme_disable_feed', 1);
add_action('do_feed_atom_comments', 'itsme_disable_feed', 1);
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tarakan_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'tarakan' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'tarakan' ),
			'before_widget' => '<section id="%1$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'tarakan_widgets_init' );

include('inc/enqueues.php');

/**
 * Enqueue scripts and styles.
 */
function tarakan_scripts() {
	wp_enqueue_style( 'tailwind', get_stylesheet_directory_uri() . '/build/css/tailwind.css', false, time() );
	wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/build/css/styles.css', false, time() );
	wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'jquery-ui-core' );
	wp_enqueue_script( 'all-scripts', get_template_directory_uri() . '/build/js/all.js', '','',true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tarakan_scripts' );

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

require get_template_directory() . '/inc/comments-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


// Создаем новый тип записи - объявления
function create_post_type() {
  register_post_type( 'places',
    array(
      'labels' => array(
          'name' => __( 'Места' ),
          'singular_name' => __( 'Место' )
      ),
      'public' => true,
      'has_archive' => true,
      'hierarchical' => true,
      'show_in_rest' => false,
      'menu_icon' => 'dashicons-megaphone',
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields', 'revisions' ),
    )
  );
}
add_action( 'init', 'create_post_type' );

function category_register_taxonomy() {
  $args = array (
    'label' => 'Категории',
    'labels' => array(
      'menu_name' => 'Категории',
      'all_items' => esc_html__( 'All category', 'text-domain' ),
      'edit_item' => esc_html__( 'Edit category', 'text-domain' ),
      'view_item' => esc_html__( 'View category', 'text-domain' ),
      'update_item' => esc_html__( 'Update category', 'text-domain' ),
      'add_new_item' => esc_html__( 'Add new category', 'text-domain' ),
      'new_item_name' => esc_html__( 'New category', 'text-domain' ),
      'parent_item' => esc_html__( 'Parent category', 'text-domain' ),
      'parent_item_colon' => esc_html__( 'Parent category:', 'text-domain' ),
      'search_items' => esc_html__( 'Search category', 'text-domain' ),
      'popular_items' => esc_html__( 'Popular category', 'text-domain' ),
      'separate_items_with_commas' => esc_html__( 'Separate category with commas', 'text-domain' ),
      'add_or_remove_items' => esc_html__( 'Add or remove category', 'text-domain' ),
      'choose_from_most_used' => esc_html__( 'Choose most used category', 'text-domain' ),
      'not_found' => esc_html__( 'No category found', 'text-domain' ),
      'name' => 'Категории',
      'singular_name' => 'Категория',
    ),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_tagcloud' => true,
    'show_in_quick_edit' => true,
    'show_admin_column' => true,
    'show_in_rest' => true,
    'hierarchical' => true,
    'query_var' => true,
    'has_archive' => true,
    'sort' => true,
    'rewrite' => array(
      'slug' => 'place-type',
      'with_front'    => true,
      'hierarchical' => true,
    ),
  );

  register_taxonomy( 'place-type', array( 'places' ), $args );
}
add_action( 'init', 'category_register_taxonomy');

function city_register_taxonomy() {
  $args = array (
    'label' => 'Города',
    'labels' => array(
      'menu_name' => 'Города',
      'all_items' => esc_html__( 'All Города', 'text-domain' ),
      'edit_item' => esc_html__( 'Edit Города', 'text-domain' ),
      'view_item' => esc_html__( 'View Города', 'text-domain' ),
      'update_item' => esc_html__( 'Update Города', 'text-domain' ),
      'add_new_item' => esc_html__( 'Add new Города', 'text-domain' ),
      'new_item_name' => esc_html__( 'New Города', 'text-domain' ),
      'parent_item' => esc_html__( 'Parent Города', 'text-domain' ),
      'parent_item_colon' => esc_html__( 'Parent Города:', 'text-domain' ),
      'search_items' => esc_html__( 'Search Города', 'text-domain' ),
      'popular_items' => esc_html__( 'Popular Города', 'text-domain' ),
      'separate_items_with_commas' => esc_html__( 'Separate Города with commas', 'text-domain' ),
      'add_or_remove_items' => esc_html__( 'Add or remove Города', 'text-domain' ),
      'choose_from_most_used' => esc_html__( 'Choose most used Города', 'text-domain' ),
      'not_found' => esc_html__( 'No Города found', 'text-domain' ),
      'name' => 'Города',
      'singular_name' => 'Город',
    ),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_tagcloud' => true,
    'show_in_quick_edit' => true,
    'show_admin_column' => true,
    'show_in_rest' => true,
    'hierarchical' => true,
    'query_var' => true,
    'has_archive' => true,
    'sort' => true,
    'rewrite' => array(
      'slug' => 'city',
      'with_front'    => true,
      'hierarchical' => true,
    ),
  );

  register_taxonomy( 'city', array( 'places' ), $args );
}
add_action( 'init', 'city_register_taxonomy');

// Создаем счетчик для записей
function tutCount($id) {
  
  if ( metadata_exists( 'post', $id, 'place_count' ) ) {
    $count_value = get_post_meta( $id, 'place_count', true );
    $count_value = $count_value + 1;
    update_post_meta( $id, 'place_count', $count_value );
  } else {
    add_post_meta( $id, 'place_count', '200', true);
  }
  $place_count = get_post_meta( $id, 'place_count', true );
  return $place_count;
  
}

// Создаем скриншот (shortcode)
add_shortcode( 'snapshot', function ( $atts ) {
  $atts = shortcode_atts( array(
    'alt'    => '',
    'url'    => 'http://www.wordpress.org',
    'width'  => '400',
    'height' => '300'
  ), $atts );
  $params = array(
    'w' => $atts['width'],
    'h' => $atts['height'],
  );
  $url = urlencode( $atts['url'] );
  $src = 'http://s.wordpress.com/mshots/v1/' . $url . '?' . http_build_query( $params, null, '&' );

  $cache_key = 'snapshot_' . md5( $src );
  $data_uri = get_transient( $cache_key );
  if ( ! $data_uri ) {
    $response = wp_remote_get( $src );
    if ( 200 === wp_remote_retrieve_response_code( $response ) ) {
      $image_data = wp_remote_retrieve_body( $response );
      if ( $image_data && is_string( $image_data ) ) {
        $src = $data_uri = 'data:image/jpeg;base64,' . base64_encode( $image_data );
        set_transient( $cache_key, $data_uri, DAY_IN_SECONDS );
      }
    }
  }

  return '<img src="' . esc_attr( $src ) . '" alt="' . esc_attr( $atts['alt'] ) . '" class="w-full h-56 lg:h-full object-cover object-top rounded-lg"/>';
} );