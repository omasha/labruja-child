<?php
/**
 * Displays content for front page
 * Modified to use regular img tag and separate image from content
 *
 * @package La_Bruja_Child
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'twentyseventeen-panel ' ); ?> >

	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

		<?php twentyseventeen_edit_link( get_the_ID() ); ?>

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
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
					'after'  => '</div>',
				)
			);
			?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
