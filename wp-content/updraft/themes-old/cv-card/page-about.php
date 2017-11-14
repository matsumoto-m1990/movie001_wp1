<?php /* Template Name: About */ ?>

<?php get_header(); ?>

<?php get_template_part('header','custom'); ?>

<div class="single-wrap col-xs-12 col-sm-12">

	<?php while(have_posts()):the_post(); ?>
				
		<article <?php post_class('h-card'); ?> id="post-<?php the_ID(); ?>">

			<header class="card-header">

				<h1 class="entry-title"><?php the_title(); ?></h1>

			</header> <!-- end entry-header -->

			<div class="e-content">

				<?php the_content(); ?>
							
			</div> <!-- e-content -->
					
		</article> <!-- end h-entry -->

	<?php endwhile; ?>							

</div> <!-- end single-wrap -->

<?php get_template_part('footer','blog'); ?>

<?php get_footer(); ?>