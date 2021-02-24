<?php
/**
 * Template part for displaying a single experts's content
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>

<div class="entry-content">
	<?php
	$expert_email = get_field( 'expert_email' );
	$expert_phone = get_field( 'expert_phone' );
	$expert_faculty_bio_page = get_field( 'expert_faculty_bio_page' );
	$expert_areas_of_focus = get_field( 'expert_areas_of_focus' );
	$expert_research_study = get_field( 'expert_research_study' );
	$expert_career_info = get_field( 'expert_career_info' );
	$expert_fields_list = get_the_term_list( $post->ID, 'expert_fields', '', ', ', '' );
	$expert_focus_areas_list = get_the_term_list( $post->ID, 'focus_areas', '', ', ', '' );

	$expert_areas_of_focus_array = explode( ',', $expert_areas_of_focus );
	$expert_research_study_array = explode( ',', $expert_research_study );

	/**
	 * Get the media contact block.
	 * Need to look at moving this function and make the id dynamic.
	 *
	 * @param int $block_id The id of the needed block.
	 */
	function advent_get_reusable_block( $block_id = 92 ) {
		if ( empty( $block_id ) || (int) $block_id !== $block_id ) {
			return;
		}
		$content = get_post_field( 'post_content', $block_id );
		return apply_filters( 'the_content', $content );
	}
	?>
	<div class="expert-content-main">
		<div class="areas-of-focus-container">
			<h2>Areas of Focus</h2>
			<div class="expert-content-container">
				<ul class="expert-research-study-areas">
				<?php
				foreach ( $expert_areas_of_focus_array as $key => $expert_areas_of_focus_item ) {
					echo '<li>';
					echo esc_html( $expert_areas_of_focus_item );
					echo '</li>';
				}
				?>
				</ul>
			</div>
		</div>
		<div class='expert-research-study-container'>
		<h2>Research/Study</h2>
			<div class="expert-content-container">
				<ul class="expert-research-study-areas">
				<?php
				foreach ( $expert_research_study_array as $key => $expert_research_study_item ) {
					echo '<li>';
					echo esc_html( $expert_research_study_item );
					echo '</li>';
				}
				?>
				</ul>
			</div>
		</div>
		<div class='experts-bio-container'>
			<h2>Bio</h2>
			<?php echo $expert_career_info; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</div>
	</div>
</div><!-- .entry-content -->
</div><!-- .experts-content-main -->

	<div class="expert-content-sidebar">
		<div class="expert-content-sidebar-inner butler-blue-branded-top">
			<h2>Fields</h2>
			<p class="expert-sidebar-list"><?php echo $expert_fields_list; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<h2>Focus Areas</h2>
			<p class="expert-sidebar-list"><?php echo $expert_focus_areas_list; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<h2>Contact</h2>
			<div class="expert-contact-container">
				<div class="expert-phone-container">
					<span class="butler-icon bi-phone">&nbsp;</span><span><a href="tel:<?php echo esc_html( str_replace( [ '(', ')', ' ', '-' ], '', $expert_phone ) ); ?>"><?php echo esc_html( $expert_phone ); ?></a></span>
				</div>
				<div class="expert-email-container">
					<span class="butler-icon bi-envelope">&nbsp;</span><span><a href="mailto:<?php echo esc_html( $expert_email ); ?>"><?php echo esc_html( $expert_email ); ?></a></span>
				</div>
				<div class="expert-website-container">
					<span class="butler-icon bi-globe">&nbsp;</span><span><a href="<?php echo esc_html( $expert_faculty_bio_page ); ?>">Website</a></span>
				</div>
			</div>
			<div class="media-contact">
				<?php echo advent_get_reusable_block(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</div>
		</div>
	</div><!-- .experts-content-sidebar -->
</div><!-- .experts-content -->
<?php
