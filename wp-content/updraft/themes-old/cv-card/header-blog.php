<div class="blog-homepage">

		<div class="container">
			
			<header class="site-header clearfix" role="banner">

				<div class="col-sm-4">

					<h3 class="heading-title">
						<a href="<?php echo esc_url(home_url('/')); ?>" class="u-url"><?php bloginfo('name'); ?></a>						
					</h3>

					<p>
						<?php bloginfo('description'); ?>
					</p>
					
				</div> <!-- end home-icon -->

				<div class="mobile-touch">

					<i class="fa fa-align-justify"></i>
					
				</div> <!-- end mobile-touch -->

				<div class="col-sm-8">
					
					<?php wp_nav_menu(array(
						'theme_location' => 'top-menu',												
						'menu_class' => 'nav navbar-nav',
						'depth' => 1,
						'fallback_cb' => 'cvcard_menu'
					)); ?>

				</div> <!-- end col-sm-8 -->
				
			</header> <!-- site-header -->