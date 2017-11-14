<?php /* Template Name: Contact */ ?>

<?php get_header(); 

get_template_part('header','custom'); ?>

<div class="single-wrap col-xs-12 col-sm-12">

	<?php while(have_posts()):the_post(); ?>
				
		<article <?php post_class('h-card'); ?> id="post-<?php the_ID(); ?>">

			<header class="card-header">

				<h1 class="entry-title"><?php the_title(); ?></h1>

			</header> <!-- end entry-header -->

			<div class="e-content">

				<?php if(function_exists('get_field')){ 
 
					$location = get_field('google_map');
					 
					if( !empty($location) ): ?>
					
					<div class="acf-map">
						<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
					</div>

					<?php endif;

				} ?>

				<?php the_content(); ?>

				<?php if(function_exists('get_field')){ ?>

					<ul class="social-list clearfix">

						<?php if(get_field('facebook')){ ?>
						<li><a href="<?php echo esc_url(get_field('facebook')); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<?php } ?>
						
						<?php if(get_field('twitter')){ ?>
						<li><a href="<?php echo esc_url(get_field('twitter')); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<?php } ?>

						<?php if(get_field('linkedin')){ ?>
						<li><a href="<?php echo esc_url(get_field('linkedin')); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
						<?php } ?>

						<?php if(get_field('github')){ ?>
						<li><a href="<?php echo esc_url(get_field('github')); ?>" target="_blank"><i class="fa fa-github"></i></a></li>
						<?php } ?>

						<?php if(get_field('behance')){ ?>
						<li><a href="<?php echo esc_url(get_field('behance')); ?>" target="_blank"><i class="fa fa-behance"></i></a></li>
						<?php } ?>

						<?php if(get_field('google_plus')){ ?>
						<li><a href="<?php echo esc_url(get_field('google_plus')); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
						<?php } ?>

						<?php if(get_field('pinterest')){ ?>
						<li><a href="<?php echo esc_url(get_field('pinterest')); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
						<?php } ?>

						<?php if(get_field('instagram')){ ?>
						<li><a href="<?php echo esc_url(get_field('instagram')); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
						<?php } ?>

						<?php if(get_field('wordpress')){ ?>
						<li><a href="<?php echo esc_url(get_field('wordpress')); ?>" target="_blank"><i class="fa fa-wordpress"></i></a></li>
						<?php } ?>

						<?php if(get_field('youtube')){ ?>
						<li><a href="<?php echo esc_url(get_field('youtube')); ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
						<?php } ?>

						<?php if(get_field('vine')){ ?>
						<li><a href="<?php echo esc_url(get_field('vine')); ?>" target="_blank"><i class="fa fa-vine"></i></a></li>
						<?php } ?>

						<?php if(get_field('rss')){ ?>
						<li><a href="<?php echo esc_url(get_field('rss')); ?>" target="_blank"><i class="fa fa-rss"></i></a></li>
						<?php } ?>

						<?php if(get_field('digg')){ ?>
						<li><a href="<?php echo esc_url(get_field('digg')); ?>" target="_blank"><i class="fa fa-digg"></i></a></li>
						<?php } ?>

						<?php if(get_field('dribbble')){ ?>
						<li><a href="<?php echo esc_url(get_field('dribbble')); ?>" target="_blank"><i class="fa fa-dribbble"></i></a></li>
						<?php } ?>

						<?php if(get_field('flickr')){ ?>
						<li><a href="<?php echo esc_url(get_field('flickr')); ?>" target="_blank"><i class="fa fa-flickr"></i></a></li>
						<?php } ?>					
					
					</ul>

				<?php } ?>
							
			</div> <!-- e-content -->
					
		</article> <!-- end h-entry -->

	<?php endwhile; ?>
							
</div> <!-- end single-wrap -->

<?php get_template_part('footer','blog'); 

get_footer(); ?>