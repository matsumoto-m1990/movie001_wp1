<?php /* Template Name: Blog */ ?>

<?php get_header(); ?>

<?php get_template_part('header','blog'); ?>

<div class="blog-wrap">

	<?php if(have_posts()): ?>
				
	<div class="col-sm-12">		

		<?php while(have_posts()):the_post(); ?>
					
		<article class="item h-entry col-sm-4">						

			<div class="entry-wrap">

				<div class="entry-media">

					<a href="<?php the_permalink(); ?>" class="u-url">
						<?php the_post_thumbnail(); ?>
					</a>

					<?php if(has_post_thumbnail()){ ?>
						<p class="dt-published"><?php the_date('d M'); ?><small><?php the_time('Y'); ?></small></p>
					<?php } ?>						
							
				</div> <!-- entry-media -->

				<header class="entry-header">

					<h4 class="entry-title">
						<a href="<?php the_permalink(); ?>" class="u-url"><?php the_title(); ?></a>
					</h4>
								
				</header> <!-- end entry-header -->

			</div> <!-- end entry-wrap -->
				
		</article> <!-- end h-entry -->	

		<?php endwhile; ?>									

	</div> <!-- end col-sm-12 -->

		<div class="pagination">
			<?php posts_nav_link(' ','<i class="fa fa-angle-left fa-2x"></i>','<i class="fa fa-angle-right fa-2x"></i>'); ?>			
		</div> <!-- end pagination -->

	<?php endif; ?>					

</div> <!-- end blog-wrap -->
			
<?php get_template_part('footer','blog'); ?>

<?php get_footer(); ?>