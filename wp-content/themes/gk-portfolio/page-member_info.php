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
								<strong>当サイトの管理者の皆さんを紹介します</strong>
							</p>
							<?php $users =get_users( array('orderby'=>ID,'order'=>DESC) );
							echo '<div class="writers">';
							foreach($users as $user):
								$uid = $user->ID;
								if ($uid == 1){
									continue;
								}
								$userData = get_userdata($uid);
								echo '<div class="writer-profile">';
									echo '<figure class="eyecatch">';
										echo get_avatar( $uid , 150);
									echo '</figure>';
									echo '<div class="profiletxt">';
									echo '<p class="name">'.$user->display_name.'</p>';
									echo '<div class="discription">'.$userData->user_description.'</div>';
									echo '<div class="button"><a href="'.get_bloginfo(url).'/?author='.$uid.'">'.$user->display_name.'の記事一覧</a></div>';
									echo '<p>';
									echo '</div>';
								echo '</div>';
							endforeach;
							echo '</div>'; ?>

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
