<?php


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
		
    wp_enqueue_style( 'child-styles',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'parent-styles' ),
        wp_get_theme()->get('Version')
    );
}

function init_transparent_header() {
	wp_enqueue_script( 'global-header', get_stylesheet_directory_uri() . '/assets/js/home.js', array('jquery'), true );
}



