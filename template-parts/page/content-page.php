<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage wireframe
 * @since 1.0
 * @version 1.0
 */
global $scope;




$url = post_external_link( get_the_ID() );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		
		<?php /* the_title( '<h1 class="entry-title">', '</h1>' );*/ ?>
		<?php 
		
			if(false !== $url) {
				print "<h1 class='entry-title'><a target='_new' href='{$url}'>{$post->post_title}</a></h1>";
			} else {
				print "<h1 class='entry-title'>{$post->post_title}</h1>";
			}
		?>
				
		<?php wireframe_edit_link( get_the_ID() ); ?>
		
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
			// print test_output($post);
			the_content();
			
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'wireframe' ),
					'after'  => '</div>',
				)
			);
			?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
