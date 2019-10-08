<?php

// Comment this line to use the parent theme's widget areas.
// add_action( 'widgets_init', 'override_parent_widget_areas' );
add_action( 'wp_enqueue_scripts', 'init_transparent_header' );




/**
  * @function add_child_stylesheets
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
	$styles = array();
	
	wp_enqueue_style(
		'child-styles',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'parent-styles','menu-overrides'),
		wp_get_theme()->get('Version')
	);
    
	foreach($styles as $id => $uri) {
		$dep = explode('.',$id);//Setup dependency with parent theme stylesheet
		
		wp_enqueue_style(
			$id,
			$basedir.'/'.$uri,
			array($dep[1]),
			wp_get_theme()->get('Version')
		);
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