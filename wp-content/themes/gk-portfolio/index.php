<?php
/**
 * The main template file
 *
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content archive" role="main">
			<?php
				global $query_string;
				parse_str($query_string, $args);
				$args['category__not_in'] = array(52);
				query_posts($args);
			?>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content-archive', get_post_format() ); ?>
				<?php endwhile; ?>
			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>
		</div><!-- #content -->
		
		<?php portfolio_paging_nav(); ?>
	</div><!-- #primary -->

<?php get_footer(); ?>