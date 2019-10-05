<?php

// Comment this line to use the parent theme's widget areas.
// add_action( 'widgets_init', 'override_parent_widget_areas' );
add_action( 'wp_enqueue_scripts', 'init_transparent_header' );
// add_action( 'wp_enqueue_scripts', 'add_parent_stylesheets' );
add_action( 'wp_enqueue_scripts', 'add_child_stylesheets' );





/**
  * @function add_parent_stylesheets
  *
  * @description Queue up stylesheets for the parent theme.

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
  */



/**
  * @function add_parent_stylesheets
  *
  * @description Queue up stylesheets for this theme.
  */
function add_child_stylesheets() {
	$basedir = get_stylesheet_directory_uri()."/styles";
	
	$styles = array(
		'child.structure-overrides' => 'structure.css',
		'child.header-overrides' => 'header.css',
		'child.image-overrides' => 'images.css',
		'child.menu-overrides' => 'menu.css',
		'child.post-overrides' => 'post.css',
		'child.footer-overrides' => 'footer.css',
		'child.homepage-overrides' => 'home.css',
		'child.widescreen-overrides' => 'widescreen.css',
		'child.sidebar-overrides' => 'sidebar.css',
		'child.widget-overrides' => 'widget.css',
	);
	
	wp_enqueue_style( 'child-styles',
			$basedir . '/style.css',
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
// function override_parent_widget_areas() {}