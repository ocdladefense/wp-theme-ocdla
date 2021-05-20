
<!--global-header-->

				
		<div id="global-header" class="global-header" >
			<?php if (!is_user_logged_in()) : ?>
				<a href="<?php echo salesforce_oauth_url_customer(); ?>"> Login </a> 
			<?php else : ?>
				Logout  <!--need to do single sign on logout functionality.  When the user logs out they should be redirected to the 
							wordpress home page.  The wordpress default behavior is to show the wordpress login page to the user. -->
			<?php endif; ?>
			<div class="gh-item gh-item-1">
			
				<!-- <img class="toggles icon toggles-overlay" data-controls="overlay"  src="<?php echo get_template_directory_uri(); ?>/assets/images/menu-icon.png" style="height:25px;" /> -->
				<div class="toggles icon toggles-overlay" data-controls="overlay">&nbsp;</div>


				<!--CUSTOM LOGO-->
				<?php if(is_child_theme_active() && !empty(get_theme_mod('custom_logo'))):
						the_custom_logo();
				else: ?>
					<a href="<?php print get_home_url(); ?>" class="custom-logo-link" rel="home">
						<img class="default-logo" alt="default logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/defaultLogo.png" />
					</a>
				<?php endif; ?>
				
				
				<?php 

					// wf_show_widget('widge-1');
				
				?>
				
				<?php
				if ( is_active_sidebar( 'global-header-left' ) ) {
					?>
					<div class="widget-area widget-area-global-header gh-widget-left">
						<?php dynamic_sidebar( 'global-header-left' ); ?>
					</div>
					<?php
				}?>
			</div>

			<div class="gh-item gh-item-2 gh-middle-container">
				<?php if(has_nav_menu('top')): ?>
					<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
				<?php endif; ?>
				<strong class="tagline"> 
					<?php 
						if (strtolower(wp_get_theme()) == "wireframe" || get_bloginfo('description','display')=="Just another WordPress site")
							echo "Your Company Tagline Here";
						else
							echo get_bloginfo( 'description', 'display' ); 
					?>
				</strong>
			</div> <!--tagline-container-->
			
			<div class="gh-item gh-item-3 social-media-icon-container gh-widget-right">
				<?php if(!is_active_sidebar('global-header-right')): ?>
						<a target="_new" href="https://www.facebook.com/OregonCriminalDefenseLawyersAssociation/">
							<img class="default-social" src="<?php echo get_template_directory_uri(); ?>/assets/images/default-facebook-icon.png" />
						</a>
						<a target="_new" href="https://twitter.com/oregondefense?lang=en">
							<img class="default-social" src="<?php echo get_template_directory_uri(); ?>/assets/images/default-twitter-icon.png" />
						</a>
				<?php else: dynamic_sidebar( 'global-header-right' ); endif; ?>
			</div>
			
		</div><!-- end global-header-->