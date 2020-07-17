<?php
/**
 * Customizer Single Accordion Controls
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

use WP_Customize_Control;

/**
 * Custom Single Accordion Custom Control Class
 */
class Butler_Single_Accordion_Custom_Control extends WP_Customize_Control {
	/**
	 * The type of control being rendered
	 *
	 * @var $type
	 */
	public $type = 'single_accordion';
	/**
	 * Render the control in the customizer
	 */
	public function render_content() {
		$allowed_html = array(
			'a' => array(
				'href' => array(),
				'title' => array(),
				'class' => array(),
				'target' => array(),
			),
			'br' => array(),
			'em' => array(),
			'strong' => array(),
			'i' => array(
				'class' => array(),
			),
			'span' => array(
				'class' => array(),
			),
		);
		?>
		<div class="single-accordion-custom-control">
			<div class="single-accordion-toggle"><?php echo esc_html( $this->label ); ?><span class="accordion-icon-toggle dashicons dashicons-plus"></span></div>
			<div class="single-accordion customize-control-description">
				<?php
				if ( is_array( $this->description ) ) {
					echo '<ul class="single-accordion-description">';
					foreach ( $this->description as $key => $value ) {
						echo '<li>' . $key . wp_kses( $value, $allowed_html ) . '</li>'; /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
					}
					echo '</ul>';
				} else {
					echo wp_kses( $this->description, $allowed_html );
				}
				?>
			</div>
		</div>
		<?php
	}
	/**
	 * Take a string of text sanitize them and convert to array
	 *
	 * @param string $input string of url's.
	 */
	public function butler_text_sanitization( $input ) {
		if ( strpos( $input, ',' ) !== false ) {
			$input = explode( ',', $input );
		}
		if ( is_array( $input ) ) {
			foreach ( $input as $key => $value ) {
				$input[ $key ] = sanitize_text_field( $value );
			}
			$input = implode( ',', $input );
		} else {
			$input = sanitize_text_field( $input );
		}
		return $input;
	}
}
