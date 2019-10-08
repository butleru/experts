<?php
/**
 * Template part for displaying the footer info
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>

<div class="site-info">
	<?php
	$current_year = date( 'Y' );
	echo esc_html( '&copy; ' );
	echo esc_html( $current_year );
	?>
	Butler University
</div><!-- .site-info -->
