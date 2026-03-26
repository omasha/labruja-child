<?php
/**
 * Displays footer widgets if assigned
 * Modified to use single footer widget area with grid layout
 *
 * @package La_Bruja_Child
 */

?>

<?php
if ( is_active_sidebar( 'site-footer' ) ) :
	?>

	<aside class="widget-area footer-widget-grid" aria-label="<?php esc_attr_e( 'Footer', 'twentyseventeen' ); ?>">
		<?php dynamic_sidebar( 'site-footer' ); ?>
	</aside><!-- .widget-area -->

	<?php
endif;
