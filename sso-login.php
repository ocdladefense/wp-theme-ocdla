


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


<style>
	.sso-link {
		border: #50668F;
	}
	
	.sso-link a {
		color: #FFFFFF;
	}
	
	.sso-link, .sso-link:hover, .sso-link:focus {
		background-color: #50668F;
	}
	
	.sso-link {
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



<div class="page-wrap wrap">

	<?php get_sidebar('left'); ?>
	
	<div id="primary" class="basic-page content-area">
		<main id="main" class="site-main" role="main">
			<h2>Hello World!</h2>
			
			<div class="sso-link">
				<a href="<?php echo salesforce_oauth_url_admin(); ?>" title="Login Admin">Login as Administrator</a>
			</div>
			<div class="sso-link">
				<a href="<?php echo salesforce_oauth_url_customer(); ?>" title="Login Customer">Login as Customer</a>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->
	
	<?php get_sidebar('right'); ?>
	
</div><!-- .wrap -->

<?php
get_footer();
