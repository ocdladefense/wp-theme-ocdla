<?php

// Comment this line to use the parent theme's widget areas.
add_action( 'widgets_init', 'child_widgets_init' );
add_action( 'wp_enqueue_scripts', 'init_transparent_header' );
add_action( 'wp_enqueue_scripts', 'add_parent_stylesheets' );
add_action( 'wp_enqueue_scripts', 'add_child_stylesheets' );





/**
  * @function add_parent_stylesheets
  *
  * @description Queue up stylesheets for the parent theme.
  */
function add_parent_stylesheets() {

	$basedir = get_template_directory_uri() .'/style-overrides';
	$styles = array(
		'general-overrides' => 'style.css',
		'header-overrides' => 'header.css',
		'menu-overrides' => 'menu.css',
		'post-overrides' => 'post.css',
		'footer-overrides' => 'footer.css'
	);
	
	wp_enqueue_style( 'parent-styles', get_template_directory_uri() . '/style.css' );
	
	foreach($styles as $id => $uri) {
		wp_enqueue_style($id,$basedir.'/'.$uri);
	}
	
}



/**
  * @function add_parent_stylesheets
  *
  * @description Queue up stylesheets for this theme.
  */
function add_child_stylesheets() {
		
	$styles = array(
		'structure-overrides' => 'structure.css',
		'header-overrides' => 'header.css',
		'image-overrides' => 'images.css',
		'menu-overrides' => 'menu.css',
		'post-overrides' => 'post.css',
		'footer-overrides' => 'footer.css',
		'homepage-overrides' => 'home.css',
		'widescreen-overrides' => 'widescreen.css',
		'sidebar-overrides' => 'sidebar.css',
		'widget-overrides' => 'widget.css',
	);
	
	wp_enqueue_style( 'child-styles',
			get_stylesheet_directory_uri() . '/style.css',
			array( 'parent-styles' ),
			wp_get_theme()->get('Version')
	);
    
	foreach($styles as $id => $uri) {
		wp_enqueue_style($id,$basedir.'/'.$uri);
	}
}

function init_transparent_header() {
	wp_enqueue_script( 'global-header', get_stylesheet_directory_uri() . '/assets/js/home.js', array('jquery'), true );
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function child_widgets_init() {



	$leftSidebar = array(
		'name'          => __( 'Left Sidebar', 'wireframe' ),
		'id'            => 'sidebar-1', // From parent theme.
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	);

	
	$rightSidebar = array(
		'name'          => __( 'Right Sidebar', 'wireframe' ),
		'id'            => 'sidebar-2', // From parent theme.
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	);
	
	
	$leftSidebar['id'] 		= 'sidebar-5'; // Override for this specific child theme.
	$rightSidebar['id'] 	= 'sidebar-1'; // Override for this specific child theme.
		
	register_sidebar($leftSidebar);
	
	register_sidebar($rightSidebar);
	
	register_sidebar(
		array(
			'name'          => __( 'Banner Widget Area', 'wireframechild_ocdla' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Add widgets here to appear in your banner area.', 'twentyseventeen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Widget Area', 'wireframechild_ocdla' ),
			'id'            => 'sidebar-3',
			'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Global Header Widget Area', 'wireframechild_ocdla' ),
			'id'            => 'sidebar-4',
			'description'   => __( 'Add widgets to appear in the global header.', 'twentyseventeen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}