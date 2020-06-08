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
	/* translators: Theme name. */
	printf( esc_html__( 'Copyright &copy; %1$s by %2$s', 'wp-rig' ), date( 'Y' ), '<a href="' . esc_url( 'https://www.butler.edu' ) . '">Butler University</a>.' ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */

	if ( function_exists( 'the_privacy_policy_link' ) ) {
		the_privacy_policy_link( '<span class="sep"> | </span>' );
	}
	?>
</div><!-- .site-info -->
