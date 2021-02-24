<?php
/**
 * Template part for displaying an experts's basic info
 *
 * @package wp_rig
 */

$expert_first_name = get_field( 'expert_first_name' );
$expert_middle_name_initial = get_field( 'expert_middle_name_initial' );
$expert_last_name = get_field( 'expert_last_name' );
$expert_suffix = get_field( 'expert_suffix' );
$expert_academic_suffix = get_field( 'expert_academic_suffix' );
$expert_titles = get_field( 'expert_titles' );
$expert_affiliations_list = wp_get_object_terms( $post->ID, 'expert_affiliations' );
$expert_full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', false );

?>

<div class="experts-details-container">
	<h2><?php echo esc_html( $expert_first_name ) . ' ' . esc_html( $expert_middle_name_initial ) . ' ' . esc_html( $expert_last_name ) . ', ' . esc_html( $expert_academic_suffix ); ?></h2>
	<div class="expert-affiliations-titles-container">
		<?php
		foreach ( $expert_affiliations_list as $key => $expert_affiliation ) {
			echo esc_html( $expert_affiliation->name ) . '<br>';
		}
		$expert_titles_array = explode( ',', $expert_titles );
		foreach ( $expert_titles_array as $key => $expert_title ) {
			echo esc_html( $expert_title ) . '<br>';
		}
		?>
	</div>
	<p><a href='<?php echo $expert_full_image_url[0]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>' target='_blank'>Get High Res Image</a></p>
</div>
