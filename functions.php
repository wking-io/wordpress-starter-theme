<?php
/**
 * johnsonKreis functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package johnsonKreis
 */

if ( ! function_exists( 'johnsonkreis_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function johnsonkreis_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on johnsonKreis, use a find and replace
	 * to change 'johnsonkreis' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'johnsonkreis', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'johnsonkreis' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'johnsonkreis_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'johnsonkreis_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function johnsonkreis_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'johnsonkreis_content_width', 640 );
}
add_action( 'after_setup_theme', 'johnsonkreis_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function johnsonkreis_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'johnsonkreis' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'johnsonkreis' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'johnsonkreis_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function johnsonkreis_scripts() {
	wp_enqueue_style( 'johnsonkreis-style', get_template_directory_uri() . '/dist/main.bundle.css' );

	wp_enqueue_script('johnsonkreis-commons', get_template_directory_uri() . '/dist/commons.js', array(), '1.0.0', true);

	wp_enqueue_script('johnsonkreis-main', get_template_directory_uri() . '/dist/main.bundle.js', array(), '1.0.0', true);

	// Default Underscore JS

	wp_enqueue_script( 'johnsonkreis-navigation', get_template_directory_uri() . '/src/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'johnsonkreis-skip-link-focus-fix', get_template_directory_uri() . '/src/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'johnsonkreis_scripts' );

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
 * Register google fonts.
 *
 */
// function themeName_add_google_fonts() {
//
// wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Droid+Serif:400,400i', false );
// }
// add_action( 'wp_enqueue_scripts', 'themeName_add_google_fonts' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// function themeName_widgets_init() {
// 	register_sidebar( array(
// 		'name'          => esc_html__( 'Widget Area', 'theme-name' ),
// 		'id'            => 'header-widget-area',
// 		'description'   => esc_html__( 'Add widgets here.', 'theme-name' ),
// 		'before_widget' => '<div id="%1$s" class="widget %2$s">',
// 		'after_widget'  => '</div>',
// 		'before_title'  => '<h2 class="widget-title">',
// 		'after_title'   => '</h2>',
// 	) );
// }
// add_action( 'widgets_init', 'themeName_widgets_init' );

/**
 * Register new photo sizes.
 *
 */
// function themeName_theme_setup() {
//     add_image_size( 'new-size', 1600 );
// }
// add_action( 'after_setup_theme', 'themeName_theme_setup' );

/**
 * Register custom responsive sizes for images on site.
 *
 */
// function themeName_post_thumbnail_sizes_attr($attr, $attachment, $size) {
//     //Calculate Image Sizes by type and breakpoint
//     if ($size === 'new-size') {
//         $attr['sizes'] = '(max-width: 480px) 96vw, (max-width: 800px) 480px, 360px';
//     }
//     return $attr;
// }
// add_filter('wp_get_attachment_image_attributes', 'themeName_post_thumbnail_sizes_attr', 10 , 3);

// /**
//  * Pagination Function.
//  */
// function custom_pagination($numpages = '', $pagerange = '', $paged='') {
//
//   if (empty($pagerange)) {
//     $pagerange = 2;
//   }
//
//   /**
//    * This first part of our function is a fallback
//    * for custom pagination inside a regular loop that
//    * uses the global $paged and global $wp_query variables.
//    *
//    * It's good because we can now override default pagination
//    * in our theme, and use this function in default quries
//    * and custom queries.
//    */
//   global $paged;
//   if (empty($paged)) {
//     $paged = 1;
//   }
//   if ($numpages == '') {
//     global $wp_query;
//     $numpages = $wp_query->max_num_pages;
//     if(!$numpages) {
//         $numpages = 1;
//     }
//   }
//
//   /**
//    * We construct the pagination arguments to enter into our paginate_links
//    * function.
//    */
//   $pagination_args = array(
//     'base'            => get_pagenum_link(1) . '%_%',
//     'format'          => 'page/%#%',
//     'total'           => $numpages,
//     'current'         => $paged,
//     'show_all'        => False,
//     'end_size'        => 1,
//     'mid_size'        => $pagerange,
//     'prev_next'       => True,
//     'prev_text'       => __('&laquo; Newer'),
//     'next_text'       => __('Older &raquo;'),
//     'type'            => 'plain',
//     'add_args'        => false,
//     'add_fragment'    => ''
//   );
//
//   $paginate_links = paginate_links($pagination_args);
//
//   if ($paginate_links) {
//     echo "<nav class='custom-pagination'>";
//       // echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
//       echo $paginate_links;
//     echo "</nav>";
//   }
//
// }
