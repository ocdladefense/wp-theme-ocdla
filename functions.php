<?php

// Comment this line to use the parent theme's widget areas.
// add_action( 'widgets_init', 'override_parent_widget_areas' );
add_action( 'wp_enqueue_scripts', 'init_transparent_header' );





/**
 * Override the default WordPress behavior of linking internally to posts.
 * 
 *  If a post has a URL custom field, then link to that instead.
 *  Return false if no URL custom field was set.
 */
function post_external_link($id) {
	$meta = get_post_meta($id);
	
	return isset($meta['URL']) ? $meta['URL'][0] : false;
}




function test_output($out) {
	return "<pre>" . print_r($out,true) . "</pre>";
}



function child_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'block-editor-style', get_theme_file_uri( '/assets/css/editor-blocks.css' ), array('wireframe-block-editor-style'), '1.1' );
}



/**
  * @function add_child_stylesheets
  *
  * @description Queue up stylesheets for this theme.
  */
function add_child_stylesheets() {
	$basedir = get_stylesheet_directory_uri()."/styles";
	
	$styles = array(
		'child.structure' => 'structure.css',
		'child.header' => 'header.css',
		'child.image' => 'images.css',
		'child.menu' => 'menu.css',
		'child.post' => 'post.css',
		'child.footer' => 'footer.css',
		'child.homepage' => 'home.css',
		'child.widescreen' => 'widescreen.css',
		'child.sidebar' => 'sidebar.css',
		'child.widget' => 'widget.css',
	);
	$styles = array();
	
	
	wp_enqueue_style(
		'child-styles',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'parent-styles','menu','sidebar')
		//wp_get_theme()->get('Version')
	);
	
	
	wp_enqueue_style(
		'footerx',
		$basedir.'/footer.css',
		array( 'child-styles')
		//wp_get_theme()->get('Version')
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