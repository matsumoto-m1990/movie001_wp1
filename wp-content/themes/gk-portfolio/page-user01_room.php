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

							<img class="alignnone wp-image-822 size-medium" src="http://2h-movie.sakura.ne.jp/wp/wp-content/uploads/2017/04/1124-277x300.jpg" width="277" height="300" />
							<div id="feed_area">
								<?php $loop = new WP_Query('author=2&showposts=8');
									while ($loop->have_posts() ) : $loop->the_post();
									?>
									<?php
							 			$cats = get_the_category($post->id);
										$cat = $cats[0];
										$img = '<img src="' . get_bloginfo('template_url'). '/images/category-new.gif" alt="' . $cat->cat_name . '" />';
									?>
								<dl>
									<?php the_time('Y年m月d日 (D)'); ?>
									<dd>
										<span class="article_title"><a href="<?php the_permalink(); ?>"><?php the_title_attribute(); ?> の記事を追加</a></span>
										<?php
									    $days=30;
									    $today=date('U');
									    $entry=get_the_time('U');
				    			    $diff1=date('U',($today - $entry))/86400;
											if ($days > $diff1){
												echo $img;
									    }
										?>
									</dd>
									<?php endwhile;wp_reset_query(); ?>
								</dl>
							</div><!--end feed_area-->

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
