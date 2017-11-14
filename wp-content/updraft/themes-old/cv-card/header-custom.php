<div class="site-single">

		<div class="container">
			
			<header class="site-header" role="banner">

				<div class="home-icon">

					<a href="<?php echo esc_url(home_url('/')); ?>" class="u-url"><i class="fa fa-home"></i></a>
					
				</div> <!-- end home-icon -->

				<div class="mobile-touch">

					<i class="fa fa-align-justify"></i>
					
				</div> <!-- end mobile-touch -->

				<?php wp_nav_menu(array(
						'theme_location' => 'top-menu',												
						'menu_class' => 'nav navbar-nav',
						'depth' => 1,
						'fallback_cb' => 'cvcard_menu'
					)); ?>
				
			</header> <!-- site-header -->