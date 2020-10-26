<?php
/**
 * Template part for displaying the header branding
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

use WP_Rig\WP_Rig\Custom_Logo;

/**
 * Get the custom logo size for the header.
 */
function theme_get_custom_logo() {

	if ( has_custom_logo() ) {

		$logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'logo-image' );

		echo '<a class="custom-logo-link" href="' . esc_url( get_site_url() ) . '" >';
		echo '<img class="custom-logo" src="' . esc_url( $logo[0] ) . '" width="' . esc_html( $logo[1] ) . '" height="' . esc_html( $logo[2] ) . '" alt="' . esc_html( get_bloginfo( 'name' ) ) . '">';
		echo '</a>';

	} else {

		echo '<h1>';
		echo '<a href="' . esc_url( get_site_url() ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>';
		echo '</h1>';

	}

}

?>

<div class="site-branding" role="heading" aria-level="1">
	<div class="site-branding-inner">
		<?php theme_get_custom_logo(); ?>

		<?php
		if ( is_front_page() && is_home() ) {
			?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php
		} else {
			?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
		}
		?>

		<?php
		$wp_rig_description = get_bloginfo( 'description', 'display' );
		if ( $wp_rig_description || is_customize_preview() ) {
			?>
			<p class="site-description">
				<?php echo $wp_rig_description; /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>
			</p>
			<?php
		}
		?>
	</div><!-- .site-branding-inner -->
</div><!-- .site-branding -->
