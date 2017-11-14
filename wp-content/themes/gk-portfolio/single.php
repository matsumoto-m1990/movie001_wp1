<?php
/**
 * The template for displaying all single posts
 */

get_header(); ?>

<!-- 2017/05/02 INS START MIST)森崎 -->
<!-- 個別投稿にパンくずリスト追加 -->
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
  <?php if(function_exists('bcn_display'))
  {
   bcn_display();
  }?>
</div>
<!-- 2017/05/02 INS END MIST)森崎 -->

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
		</div><!-- #content -->
	</div><!-- #primary -->
	
	<?php if(get_theme_mod('portfolio_show_post_navigation', '1') == '1') : ?>
	<?php 
		previous_post_link( 
			'<div id="prev-post">%link</div>', 
			'<i class="fa fa-arrow-left"></i>', 
			(get_theme_mod('portfolio_show_post_navigation_same_taxonomy', '0') == '0' ? FALSE : TRUE)
		); 
	?>
	<?php 
		next_post_link( 
			'<div id="next-post">%link</div>', 
			'<i class="fa fa-arrow-right"></i>', 
			(get_theme_mod('portfolio_show_post_navigation_same_taxonomy', '0') == '0' ? FALSE : TRUE)
		); 
	?>
	<?php endif; ?>
	
	<?php get_template_part( 'content', 'footer' ); ?>
	<?php comments_template(); ?>

<?php get_footer(); ?>