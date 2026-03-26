<?php
/**
 * The front page template file
 * Modified to show footer widgets above panels
 *
 * @package La_Bruja_Child
 */

get_header(); ?>

<?php
// Display featured image at the top
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		if ( has_post_thumbnail() ) :
			?>
			<div class="homepage-featured-image">
				<div class="panel-image">
					<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
				</div><!-- .panel-image -->
			</div><!-- .homepage-featured-image -->
			<?php
		endif;
	endwhile;
	rewind_posts();
endif;
?>

<div class="homepage wrap has-sidebar">

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			// Show the selected front page content.
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/page/content', 'front-page' );
				endwhile;
			else :
				get_template_part( 'template-parts/post/content', 'none' );
			endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	// Display homepage sidebar widget area
	if ( is_active_sidebar( 'homepage-sidebar' ) ) :
		?>
		<aside id="secondary" class="widget-area homepage-sidebar">
			<?php dynamic_sidebar( 'homepage-sidebar' ); ?>
		</aside><!-- .widget-area -->
		<?php
	endif;
	?>

</div><!-- .wrap -->

<?php
// Display homepage footer widget area
if ( is_active_sidebar( 'homepage-footer' ) ) :
	?>
	<div class="homepage-footer-widget-area">
		<div class="wrap">
			<aside class="widget-area homepage-footer">
				<?php dynamic_sidebar( 'homepage-footer' ); ?>
			</aside><!-- .widget-area -->
		</div><!-- .wrap -->
	</div><!-- .homepage-footer-widget-area -->
	<?php
endif;
?>

<div class="homepage-panels-wrapper">
	<main id="main" class="site-main">

		<?php
		// Get each of our panels and show the post data.
		if ( 0 !== twentyseventeen_panel_count() || is_customize_preview() ) : // If we have pages to show.

			/**
			 * Filters the number of front page sections in Twenty Seventeen.
			 *
			 * @since Twenty Seventeen 1.0
			 *
			 * @global int|string $twentyseventeencounter Front page section counter.
			 *
			 * @param int $num_sections Number of front page sections.
			 */
			$num_sections = apply_filters( 'twentyseventeen_front_page_sections', 4 );
			global $twentyseventeencounter;

			// Create a setting and control for each of the sections available in the theme.
			for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
				$twentyseventeencounter = $i;
				twentyseventeen_front_page_section( null, $i );
			}

	endif; // The if ( 0 !== twentyseventeen_panel_count() ) ends here.
		?>

	</main><!-- #main -->
</div><!-- .homepage-panels-wrapper -->

<?php
get_footer();
