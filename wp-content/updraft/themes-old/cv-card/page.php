<?php get_header(); ?>

<?php get_template_part('header','blog'); ?>

<div class="blog-wrap blog-single">

<?php while(have_posts()):the_post(); ?>
				
	<div class="col-sm-9">

		<h2><?php the_title(); ?></h2>

		<?php if(current_user_can('edit_pages')){ ?>

			<div class="entry-meta">					

			<span class="edit-link edit-link-page"><?php edit_post_link(__('Edit','cvcard')); ?></span>

		</div><!-- end entry-meta -->

		<?php } ?>

		<?php the_content(); ?>

		<?php wp_link_pages(); ?>

		<div class="tags-list">
			<?php the_tags('<i class="fa fa-tags"></i> ', ' ',''); ?>
		</div> <!-- end tags-list -->

	</div> <!-- end col-sm-9 -->	

	<?php if(comments_open()){ ?>

		<div class="col-sm-9">
			<?php comments_template(); ?>
		</div><!-- end col-sm-9 -->

	<?php } ?>

<?php endwhile; ?>			

</div> <!-- end blog-wrap -->

<?php get_template_part('footer','blog'); ?>

<?php get_footer(); ?>