<?php
/**
 * The template for displaying all pages
 *
 */

get_header(); ?>

	<div id="primary" class="content-area<?php if (!(have_comments() || comments_open())) : ?> no-comments-area<?php endif; ?>">
		<div id="content" class="site-content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div>
						<header class="entry-header">
							<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
							<div class="entry-thumbnail">
								<?php the_post_thumbnail(); ?>
							</div>
							<?php endif; ?>

							<h1 class="entry-title">
								<?php the_title(); ?>
							</h1>
						</header><!-- .entry-header -->

						<div class="entry-content">
							<p>
								<strong>当サイトのおすすめ作品を紹介します</strong>
							</p>
							<?php $loop = new WP_Query('cat=-52&showposts=6&orderby=rand');
							while ( $loop->have_posts() ) : $loop->the_post(); ?>
							  <class="post_home">
							    <h2><a href="<?php the_permalink(); ?>">
							      <?php the_title(); ?>
							    </a></h2>
						  		<div class="item1"><a href="<?php the_permalink() ?>">
							      <?php the_post_thumbnail('medium'); ?>
							    </a></div>
									<?php
									  echo mb_substr(get_the_excerpt(), 0, 100);
									  $title= mb_substr($post->post_title,0,50); ?>
									  <p>
									    <a href="<?php the_permalink(); ?>">
									      &raquo;<?php the_title(); ?>…の続きを読む
									    </a>
									  </p>
							<?php endwhile;wp_reset_query(); ?>

							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'portfolio' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
						</div><!-- .entry-content -->

						<footer class="entry-meta">
							<?php edit_post_link( __( 'Edit', 'portfolio' ), '<span class="edit-link">', '</span>' ); ?>
						</footer><!-- .entry-meta -->
					</div>
				</article><!-- #post -->
			<?php endwhile; ?>
		</div><!-- #content -->
	</div><!-- #primary -->

	<?php comments_template(); ?>

<?php get_footer(); ?>
