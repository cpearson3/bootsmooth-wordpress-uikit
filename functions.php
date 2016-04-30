<?php
/**
 * bootsmooth-wordpress-uikit functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bootsmooth-wordpress-uikit
 */

if ( ! function_exists( 'bootsmooth_wordpress_uikit_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bootsmooth_wordpress_uikit_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on bootsmooth-wordpress-uikit, use a find and replace
	 * to change 'bootsmooth-wordpress-uikit' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'bootsmooth-wordpress-uikit', get_template_directory() . '/languages' );

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

	/* This theme uses wp_nav_menu() in one location. */
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'bootsmooth-wordpress-uikit' ),
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
	add_theme_support( 'custom-background', apply_filters( 'bootsmooth_wordpress_uikit_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'bootsmooth_wordpress_uikit_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bootsmooth_wordpress_uikit_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bootsmooth_wordpress_uikit_content_width', 640 );
}
add_action( 'after_setup_theme', 'bootsmooth_wordpress_uikit_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bootsmooth_wordpress_uikit_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bootsmooth-wordpress-uikit' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'bootsmooth-wordpress-uikit' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'bootsmooth_wordpress_uikit_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bootsmooth_wordpress_uikit_scripts() {
	wp_enqueue_style( 'bootsmooth-wordpress-uikit-style', get_stylesheet_uri() );

	// wp_enqueue_script( 'bootsmooth-wordpress-uikit-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'bootsmooth-wordpress-uikit-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	// add jquery
	wp_enqueue_script('jquery');
	
	// register UIkit scripts
	wp_register_script('uikit', get_template_directory_uri() . '/bower_components/uikit/js/uikit.js');
	wp_enqueue_script('uikit');
	
	wp_register_script('autocomplete', get_template_directory_uri() . '/bower_components/uikit/js/components/autocomplete.min.js');
	wp_enqueue_script('autocomplete');
	
	wp_register_script('grid', get_template_directory_uri() . '/bower_components/uikit/js/components/grid.min.js');
	wp_enqueue_script('grid');
	
	wp_register_script('search', get_template_directory_uri() . '/bower_components/uikit/js/components/search.min.js');
	wp_enqueue_script('search');
}
add_action( 'wp_enqueue_scripts', 'bootsmooth_wordpress_uikit_scripts' );

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


/** Custom Post Types
 * 
 */
 
add_action( 'init', 'create_post_type' );
function create_post_type() {
	/* Portfolio */
	register_post_type(
		'portfolio',
		array(
			'labels' => array(
				'name' => __( 'Portfolio' ),
				'singular_name' => __( 'Portfolio' )
			),
			'public' => true,
			'has_archive' => 'portfolio'
		)
	);
	
	/* Business */
	register_post_type(
		'business',
		array(
			'labels' => array(
				'name' => __( 'Businesses' ),
				'singular_name' => __( 'Business' )
			),
			'public' => true,
			'has_archive' => 'business'
		)
	);
	
	/* Product */
	register_post_type(
		'product',
		array(
			'labels' => array(
				'name' => __( 'Products' ),
				'singular_name' => __( 'Product' )
			),
			'public' => true,
			'has_archive' => 'product'
		)
	);
	
	/* Person */
	register_post_type(
		'person',
		array(
			'labels' => array(
				'name' => __( 'People' ),
				'singular_name' => __( 'Person' )
			),
			'public' => true,
			'has_archive' => 'people'
		)
	);
	
	/* Service */
	register_post_type(
		'service',
		array(
			'labels' => array(
				'name' => __( 'Services' ),
				'singular_name' => __( 'Service' )
			),
			'public' => true,
			'has_archive' => 'service'
		)
	);
}

// ADVANCED CUSTOM FIELDS INCLUDE
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_localbusiness',
		'title' => 'LocalBusiness',
		'fields' => array (
			array (
				'key' => 'field_5723bee54dbf3',
				'label' => 'Category',
				'name' => 'category',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5723bafd498bf',
				'label' => 'Description',
				'name' => 'description',
				'type' => 'textarea',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'null',
							'operator' => '==',
							'value' => '',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_5723bb12498c0',
				'label' => 'Address',
				'name' => 'address',
				'type' => 'google_map',
				'required' => 1,
				'center_lat' => '',
				'center_lng' => '',
				'zoom' => '',
				'height' => '',
			),
			array (
				'key' => 'field_5723bbab498c1',
				'label' => 'Opening Hours',
				'name' => 'opening_hours',
				'type' => 'text',
				'instructions' => 'See http://schema.org/LocalBusiness for instructions',
				'required' => 1,
				'default_value' => '',
				'placeholder' => 'Mo-Fri 08:00-17:00',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5723bc63498c2',
				'label' => 'Telephone',
				'name' => 'telephone',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5723bc8e498c3',
				'label' => 'Website URL',
				'name' => 'website',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => 'http://',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'business',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_main-heading-page',
		'title' => 'Main Heading Page',
		'fields' => array (
			array (
				'key' => 'field_5720da5491a1d',
				'label' => 'Header Copy',
				'name' => 'header_copy',
				'type' => 'text',
				'instructions' => 'Enter header copy here.',
				'required' => 1,
				'default_value' => 'My Awesome Site',
				'placeholder' => 'My Awesome Site',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5720daaf91a1e',
				'label' => 'Lead Copy',
				'name' => 'lead_copy',
				'type' => 'text',
				'instructions' => 'Enter Lead Copy',
				'default_value' => 'Smooth. Lead. Copy. Goes. Here.',
				'placeholder' => 'Enter Lead Copy',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5720dafd91a1f',
				'label' => 'Background Image URL',
				'name' => 'background_image',
				'type' => 'text',
				'instructions' => 'Choose background image',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5720db4558207',
				'label' => 'Call To Action Copy',
				'name' => 'cta_copy',
				'type' => 'text',
				'instructions' => 'Enter CTA Copy',
				'default_value' => 'CTA!',
				'placeholder' => 'CTA!',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5720dba858208',
				'label' => 'Call to Action URL',
				'name' => 'cta_url',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5720dc31fae73',
				'label' => 'Content',
				'name' => 'content',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-mainheading.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
				1 => 'comments',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_person',
		'title' => 'Person',
		'fields' => array (
			array (
				'key' => 'field_5723c75bad4fb',
				'label' => 'Image',
				'name' => 'image',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_5723c765ad4fc',
				'label' => 'Job Title',
				'name' => 'job_title',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5723c774ad4fd',
				'label' => 'Telephone',
				'name' => 'telephone',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5723c77dad4fe',
				'label' => 'Email',
				'name' => 'email',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5723c7a662026',
				'label' => 'Description',
				'name' => 'description',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'person',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_portfolio',
		'title' => 'Portfolio',
		'fields' => array (
			array (
				'key' => 'field_5722ca8a661a0',
				'label' => 'Feature Image',
				'name' => 'feature_image',
				'type' => 'image',
				'required' => 1,
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_5722ca9d661a1',
				'label' => 'Content',
				'name' => 'content',
				'type' => 'wysiwyg',
				'required' => 1,
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_5722cd40ed0d2',
				'label' => 'Category',
				'name' => 'category',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'portfolio',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
				1 => 'comments',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_product',
		'title' => 'Product',
		'fields' => array (
			array (
				'key' => 'field_57240229b862a',
				'label' => 'Category',
				'name' => 'category',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_57240232b862b',
				'label' => 'Image',
				'name' => 'image',
				'type' => 'image',
				'required' => 1,
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_5724031ab862c',
				'label' => 'Price',
				'name' => 'price',
				'type' => 'number',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '$',
				'append' => '',
				'min' => '0.00',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_5724033cb862d',
				'label' => 'Description',
				'name' => 'description',
				'type' => 'textarea',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'product',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_service',
		'title' => 'Service',
		'fields' => array (
			array (
				'key' => 'field_57240be6f688c',
				'label' => 'Image',
				'name' => 'image',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_57240bf2f688d',
				'label' => 'Description',
				'name' => 'description',
				'type' => 'textarea',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'service',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_split-heading-page',
		'title' => 'Split Heading Page',
		'fields' => array (
			array (
				'key' => 'field_572187005574d',
				'label' => 'Header Copy',
				'name' => 'header_copy',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => 'Heading',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_572187245574e',
				'label' => 'Header Image',
				'name' => 'header_image',
				'type' => 'image',
				'required' => 1,
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_572188065574f',
				'label' => 'Lead Copy',
				'name' => 'lead_copy',
				'type' => 'wysiwyg',
				'required' => 1,
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_5721881655750',
				'label' => 'CTA Copy',
				'name' => 'cta_copy',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5721884555751',
				'label' => 'CTA URL',
				'name' => 'cta_url',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_57218d6142bda',
				'label' => 'Content',
				'name' => 'content',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-splitheading.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
				1 => 'comments',
			),
		),
		'menu_order' => 0,
	));
}
