<?php
/**
 * Template part for displaying pages on front page
 * Modified to show image in left column below title
 *
 * @package La_Bruja_Child
 */

global $twentyseventeencounter;

?>

<article id="panel<?php echo $twentyseventeencounter; ?>" <?php post_class( 'twentyseventeen-panel ' ); ?> >

	<div class="panel-content">
		<div class="wrap">
			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

				<?php twentyseventeen_edit_link( get_the_ID() ); ?>

				<?php
				if ( has_post_thumbnail() ) :
					?>
					<div class="panel-image">
						<?php the_post_thumbnail( 'medium' ); ?>
					</div><!-- .panel-image -->
				<?php endif; ?>

			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
					the_content(
						sprintf(
							/* translators: %s: Post title. Only visible to screen readers. */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
							get_the_title()
						)
					);
					?>
			</div><!-- .entry-content -->

			<?php
			// Show recent blog posts if is blog posts page (Note that get_option returns a string, so we're casting the result as an int).
			if ( get_the_ID() === (int) get_option( 'page_for_posts' ) ) :
				?>

				<?php
				// Show three most recent posts.
				$recent_posts = new WP_Query(
					array(
						'posts_per_page'      => 3,
						'post_status'         => 'publish',
						'ignore_sticky_posts' => true,
						'no_found_rows'       => true,
					)
				);
				?>

				<?php if ( $recent_posts->have_posts() ) : ?>

					<div class="recent-posts">

						<?php
						while ( $recent_posts->have_posts() ) :
							$recent_posts->the_post();
							get_template_part( 'template-parts/post/content', 'excerpt' );
						endwhile;
						wp_reset_postdata();
						?>
					</div><!-- .recent-posts -->
				<?php endif; ?>
			<?php endif; ?>

		</div><!-- .wrap -->
	</div><!-- .panel-content -->

</article><!-- #post-<?php the_ID(); ?> -->
