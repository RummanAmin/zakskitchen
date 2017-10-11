<?php

	// Hide Wordpress Version
	remove_action('wp_head', 'wp_generator');
	add_theme_support( "title-tag" );
	add_editor_style();

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );


  // Add Main Menu
	add_theme_support( 'menus' );

  function register_theme_menus() {
  	register_nav_menus(

  		array(
  			'main-menu' => _( 'Main Menu' ),
  			'social-menu' => _( 'Social Menu' )
  		)

  	);
  }

  add_action( 'init', 'register_theme_menus' );

  // Add CSS Files
	function wpt_theme_styles() {
		wp_enqueue_style( 'google_font', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:900|Lato:400,600' );
		wp_enqueue_style( 'style.css', get_template_directory_uri() . '/style.css' );

	}

	add_action( 'wp_enqueue_scripts', 'wpt_theme_styles' );

	// Add JS Files
	function wpt_theme_js() {

		wp_enqueue_script( 'modernizr_min_js', get_template_directory_uri() . '/js/vendor/modernizr-3.2.1.min.js', '', '', false );
		wp_enqueue_script( 'main_js', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true );

	}

	add_action( 'wp_enqueue_scripts', 'wpt_theme_js' );

	// Remove Query Strings
	function _remove_script_version( $src ){
		$parts = explode( '?ver', $src );
		return $parts[0];
	}
	add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
	add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );


	// Comment Reply
	function zakskitchen_enqueue_comment_reply() {
    // on single blog post pages with comments open and threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      // enqueue the javascript that performs in-link comment reply fanciness
      wp_enqueue_script( 'comment-reply' );
    }
	}
	// Hook into wp_enqueue_scripts
	add_action( 'wp_enqueue_scripts', 'zakskitchen_enqueue_comment_reply' );

	// Remove Image Attributes
	add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
	add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

	function remove_width_attribute( $html ) {
	   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
	   return $html;
	}

	// Add class to Post Images
	function my_content_filter($content) {
    return preg_replace('|<p>(<img[^<]*)</p>|i', '<p class="foo">${1}</p>', $content);
	}
	add_filter('the_content', 'my_content_filter');

	// Thumbnails
	add_theme_support( 'post-thumbnails' ); 

	// Custom Excerpt Length
	function custom_excerpt_length( $length ) {
		return 20;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

	// Register widget area
	function zakskitchen_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Widget Area', 'zakskitchen' ),
			'id'            => 'sidebar',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'zakskitchen' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
	}
	add_action( 'widgets_init', 'zakskitchen_widgets_init' );

?>
