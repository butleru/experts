<?php
/**
 * The sidebar containing the footer widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

if ( ! wp_rig()->is_footer_sidebar_active() ) {
	return;
}

wp_rig()->print_styles( 'wp-rig-footer-sidebar', 'wp-rig-footer-widgets' );

?>
<div id="footer-widgets" class="footer-sidebar widget-area">
	<?php wp_rig()->display_footer_sidebar(); ?>
</div><!-- #footer-widgets -->
