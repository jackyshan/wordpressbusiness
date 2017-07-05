<?php
/**
 * shopress functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package shopress
 */


	$shopress_theme_path = get_template_directory() . '/inc/icy/';

	require( $shopress_theme_path . '/shopress-custom-navwalker.php' );
	require( $shopress_theme_path . '/font/font.php');

	/*-----------------------------------------------------------------------------------*/
	/*	Enqueue scripts and styles.
	/*-----------------------------------------------------------------------------------*/
	require( $shopress_theme_path .'/enqueue.php');
	/* ----------------------------------------------------------------------------------- */
	/* Customizer */
	/* ----------------------------------------------------------------------------------- */
	
	require( $shopress_theme_path . '/customize/shopress_customize_copyright.php');
	require( $shopress_theme_path . '/customize/shopress_customize_homepage.php');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function shopress_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on shopress, use a find and replace
	 * to change 'shopress' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'shopress', get_template_directory() . '/languages' );

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
		'primary' => __( 'Primary menu', 'shopress' ),
        'top-left' => __( 'Top Left Menu', 'shopress' ),
        'top-right' => __( 'Top Right Menu', 'shopress' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'shopress_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

    // Set up the woocommerce feature.
    add_theme_support( 'woocommerce');
	
	//Custom logo
	add_theme_support( 'custom-logo');
	
	
		// custom header
		$args = array(
		'default-image'		=>  get_template_directory_uri() .'/images/breadcrumb/background.jpg',
		'width'			=> '1600',
		'height'		=> '200',
		'flex-height'		=> false,
		'flex-width'		=> false,
		'header-text'		=> true,
		'default-text-color'	=> '#143745'
		);
		add_theme_support( 'custom-header', $args );

}
add_action( 'after_setup_theme', 'shopress_setup' );

	function shopress_the_custom_logo() {
	
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}

	}

	add_filter('get_custom_logo','shopress_logo_class');


	function shopress_logo_class($html)
	{
	$html = str_replace('custom-logo-link', 'navbar-brand', $html);
	return $html;
	}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function shopress_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'shopress_content_width', 640 );
}
add_action( 'after_setup_theme', 'shopress_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function shopress_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'shopress' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="shopress-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'shopress' ),
		'id'            => 'footer_widget_area',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="col-md-3 col-sm-6 rotateInDownLeft animated shopress-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );
}
add_action( 'widgets_init', 'shopress_widgets_init' );

/* Implement the Custom Header feature. */

//Get slider excerpt
function shopress_slider_excerpt()
	{
		global $post;
		$excerpt = get_the_content();
		$excerpt = strip_tags(preg_replace(" (\[.*?\])",'',$excerpt));
		$excerpt = strip_shortcodes($excerpt);		
		$original_len = strlen($excerpt);
		$excerpt = substr($excerpt, 0, 100);		
		$len=strlen($excerpt);	 
		if($original_len>200) {
		$excerpt = $excerpt;
		return $excerpt . '<div><a href="' . esc_url(get_permalink()) . '" class="btn btn-theme margin-bottom-10">'.__("Read More","shopress").'</a></div>';
		}
		else
		{ return $excerpt; }
	}

		
		
		register_default_headers( array(
			'mypic' => array(
			'url'   => get_template_directory_uri() . '/images/page-header-bg.jpg',
			'thumbnail_url' => get_template_directory_uri() . '/images/breadcrumb/background.jpg',
			'description'   => _x( 'headerPic', 'header image description', 'shopress' )),
		));