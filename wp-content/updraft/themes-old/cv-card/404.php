<?php get_header(); ?>

<?php get_template_part('header','blog'); ?>

<div class="blog-wrap blog-single">

<?php while(have_posts()):the_post(); ?>
				
	<div class="col-sm-9 error-page">

		<i class="fa fa-chain-broken fa-4x"></i>

		<p>Go to <a href="<?php echo esc_url(home_url('/')); ?>">Homepage</a></p>

	</div> <!-- end col-sm-12 -->	

<?php endwhile; ?>			

</div> <!-- end blog-wrap -->

<?php get_template_part('footer','blog'); ?>

<?php get_footer(); ?>