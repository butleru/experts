<?php
/**
 * Template part for displaying the page content when a 404 error has occurred
 *
 * @package my_butler
 */

namespace WP_Rig\WP_Rig;

?>
<section class="error">
	<?php get_template_part( 'template-parts/content/page_header' ); ?>

	<div class="page-content">
		<p>
			<?php esc_html_e( 'It looks like nothing was found at this location.', 'wp-rig' ); ?>
			<p>If you reached this page from a bookmark please <a href="https://my.butler.edu">visit the MY.BUTLER homepage</a> and update your bookmark for this site.</p>

		<?php

		my_butler()->print_styles( 'wp-rig-widgets' );
		the_widget( 'WP_Widget_Recent_Posts' );
		?>
	</div><!-- .page-content -->
</section><!-- .error -->
