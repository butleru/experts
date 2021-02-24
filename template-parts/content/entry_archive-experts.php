<?php
/**
 * Template part for displaying a experts's content
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

	$expert_page_url = get_permalink( $post->ID );


	$expert_email = get_field( 'expert_email' );
	$expert_phone = get_field( 'expert_phone' );
	$expert_faculty_bio_page = get_field( 'expert_faculty_bio_page' );
	$expert_areas_of_focus = get_field( 'expert_areas_of_focus' );
	$expert_research_study = get_field( 'expert_research_study' );
	$expert_career_info = get_field( 'expert_career_info' );
	$expert_fields_list = get_the_term_list( $post->ID, 'expert_fields', '', ', ', '' );
	$expert_focus_areas_list = get_the_term_list( $post->ID, 'focus_areas', '', ', ', '' );
	$expert_affiliations_list = wp_get_object_terms( $post->ID, 'expert_affiliations' );
	$expert_titles = get_field( 'expert_titles' );

	$expert_areas_of_focus_array = explode( ',', $expert_areas_of_focus );
	$expert_research_study_array = explode( ',', $expert_research_study );


	//echo do_shortcode( "[wpcd_child_categories_dropdown default_option_text='All' default_option_sub='All' category='expert_fields'  orderby='NAME' hide_empty=0 hierarchical=1]" );
?>

	<div class="expert-archive-main">
		<div class="expert-archive-thumbnail">
			<?php
			the_post_thumbnail( 'wp-rig-featured-expert-archive', [ 'class' => 'skip-lazy' ] );
			?>
		</div>
		<div class="expert-archive-content">
			<?php
			echo '<a href="' . $expert_page_url . '">'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				the_title( '<span class="has-larger-font-size">', '</span><br>' );
			echo '</a>';
			foreach ( $expert_affiliations_list as $key => $expert_affiliation ) {
				echo '<strong>' . esc_html( $expert_affiliation->name ) . '</strong><br>';
			}
			$expert_titles_array = explode( ',', $expert_titles );
			foreach ( $expert_titles_array as $key => $expert_title ) {
				echo esc_html( $expert_title ) . '<br>';
			}
			echo '<p>Field: ' . $expert_fields_list . '</p>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo '<p>Focus Area: ' . $expert_focus_areas_list . '</p>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			?>
		</div>
		<div class="expert-archive-contact">
			<div class="expert-phone-container">
					<span class="butler-icon bi-phone">&nbsp;</span><span><a href="tel:<?php echo esc_html( str_replace( [ '(', ')', ' ', '-' ], '', $expert_phone ) ); ?>"><?php echo esc_html( $expert_phone ); ?></a></span>
				</div>
				<div class="expert-email-container">
					<span class="butler-icon bi-envelope">&nbsp;</span><span><a href="mailto:<?php echo esc_html( $expert_email ); ?>"><?php echo esc_html( $expert_email ); ?></a></span>
				</div>
		</div>
	</div>
<?php

