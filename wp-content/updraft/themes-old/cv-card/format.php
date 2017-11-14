<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

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

</article>
