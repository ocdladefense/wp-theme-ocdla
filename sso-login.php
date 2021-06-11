<style>
	.primary {
		border: #50668F;
	}
	.primary {
		color: #FFFFFF;
	}
	.primary, .primary:hover, .primary:focus {
		background-color: #50668F;
	}
	.primary {
		background-color: #0070d2;
		color: white;
		transition: all 0.1s;
		border: 1px solid transparent;
		text-decoration: none;
		border-radius: 4px;
		padding: 9px;
		margin: 10px;
	}
</style>


<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage wireframe
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="page-wrap wrap">
<?php get_sidebar('left'); ?>
	<div id="primary" class="basic-page content-area">
		<main id="main" class="site-main" role="main" >
		<br/>
		<div style="    width: 100%; padding: 10px; display: block;"></div>
		<a class="primary" href="<?php echo salesforce_oauth_url_admin(); ?>" title="Login Admin">Login as Administrator</a>
		<a class="primary" href="<?php echo salesforce_oauth_url_customer(); ?>" title="Login Customer">Login as customer</a>
			<?php
			/*while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/page/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			*/
            ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar('right'); ?>
</div><!-- .wrap -->

<?php
get_footer();
