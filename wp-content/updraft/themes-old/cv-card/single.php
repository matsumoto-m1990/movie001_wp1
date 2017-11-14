<?php if(get_post_type()=='portfolio'){

get_header();

get_template_part('header','custom');

while(have_posts()):the_post(); ?>

<div class="portfolio-content col-sm-12">

	<div class="portfolio-head">
		
		<h2><?php the_title(); ?></h2>

		<div class="portfolio-nav">

			<?php previous_post_link('%link','<i class="fa fa-caret-left fa-2x"></i>'); ?>
			
			<?php next_post_link('%link','<i class="fa fa-caret-right fa-2x"></i>'); ?>

		</div> <!-- end portfolio-nav -->

	</div> <!-- end portfolio-head -->

	<div class="portfolio-deep">

		<?php if(function_exists('get_field')){ 

			$portfolio_image=get_field('portfolio_image');

		?>
			<div class="portfolio-image col-sm-8">
				
				<img src="<?php echo $portfolio_image['url']; ?>" alt="<?php _e('Portfolio Image','cvcard'); ?>">

			</div> <!-- end col-sm-8 -->

		<?php } ?>
		
		<div class="col-sm-4">
			
			<?php the_content(); ?>			

		</div> <!-- end col-sm-4 -->

	</div> <!-- end portfolio-deep -->

</div> <!-- end portfolio-content -->

<?php endwhile; ?>

<?php get_footer(); 

}else{

get_header(); ?>

<?php get_template_part('header','blog'); ?>

<div class="blog-wrap blog-single">

<?php while(have_posts()):the_post(); ?>
				
	<div class="col-sm-9">

		<?php get_template_part('format',get_post_format()); ?>

	</div> <!-- end col-sm-9 -->	

	<?php if(comments_open()){ ?>

		<div class="col-sm-9">
			<?php comments_template(); ?>
		</div><!-- end col-sm-9 -->

	<?php } ?>

<?php endwhile; ?>			

</div> <!-- end blog-wrap -->

<?php get_template_part('footer','blog'); ?>

<?php get_footer();

} ?>