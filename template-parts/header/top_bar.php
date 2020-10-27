<?php
/**
 * Template part for displaying the top header bar
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

use WP_Rig\WP_Rig\Butler_Links_Social;
$bls = new Butler_Links_Social();
$butler_links_social = $bls->butler_get_social_media();

$header_cta_background = get_theme_mod( 'top_bar_cta_background_color' );
$header_cta = get_theme_mod( 'header_top_bar_cta' );
$header_cta_url = get_theme_mod( 'header_top_bar_cta_url' );
$header_cta_newtab = ( get_theme_mod( 'cta_url_newtab' ) ) ? 'target=_blank' : '';
$header_cta_id = attachment_url_to_postid( $header_cta );
$header_cta_alt = get_post_meta( $header_cta_id, '_wp_attachment_image_alt', true );
?>

<div class="top-header-bar" style="background: linear-gradient(-90deg, <?php echo esc_html( $header_cta_background ); ?> 50%, transparent 15%);">
	<div class="top-header-bar-inner">
		<div class="top-cta-links-container top-cta-container">
			<?php
			echo $butler_links_social; /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
			?>
		</div>
		<div class="top-cta-image-container top-cta-container" style="background: <?php echo esc_html( $header_cta_background ); ?>">
			<?php
			echo '<a href="' . esc_url( $header_cta_url ) . '"' . esc_html( $header_cta_newtab ) . '><img src="' . esc_html( $header_cta ) . '" alt="' . esc_html( $header_cta_alt ) . '" /></a>';
			?>
		</div>
	</div>
</div>
<?php
