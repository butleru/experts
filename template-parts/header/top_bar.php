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
?>

<div class="top-header-bar" style="background: linear-gradient(-90deg, <?php echo get_theme_mod( 'top_bar_cta_background_color' ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?> 50%, transparent 15%);">
	<div class="top-header-bar-inner">
		<div class="top-cta-links-container top-cta-container">
			<?php
			echo $butler_links_social; /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
			?>
		</div>
		<div class="top-cta-image-container top-cta-container" style="background: <?php echo get_theme_mod( 'top_bar_cta_background_color' ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>">
			<?php
			// This is getting the image.
			$header_cta = get_theme_mod( 'header_top_bar_cta' );

			// This is getting the link url.
			$header_cta_url = get_theme_mod( 'header_top_bar_cta_url' );

			// This is getting the post id.
			$header_cta_id = attachment_url_to_postid( $header_cta );

			// This is getting the alt text from the image that is set in the media area.
			$header_cta_alt = get_post_meta( $header_cta_id, '_wp_attachment_image_alt', true );

			echo '<a href="' . $header_cta_url . '" target="_blank"><img src="' . $header_cta . '" alt="' . $header_cta_alt . '" /></a>'; /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
			?>
		</div>
	</div>
</div>
