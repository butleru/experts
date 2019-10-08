<?php
/**
 * Customizer Custom Color Picker Controls
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

use WP_Customize_Control;

/**
 * Toggle Switch Custom Control Class
 */
class Butler_Toggle_Switch_Custom_Control extends WP_Customize_Control {
	/**
	 * The type of control being rendered
	 *
	 * @var $type
	 */
	public $type = 'toggle_switch';
	/**
	 * Render the control in the customizer
	 */
	public function render_content() {
		?>
		<div class="toggle-switch-control">
			<div class="toggle-switch">
				<?php
				//phpcs:disable Generic.Formatting.DisallowMultipleStatements.SameLine
				//phpcs:disable Squiz.PHP.EmbeddedPhp.MultipleStatements
				?>
				<input type="checkbox" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" class="toggle-switch-checkbox" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?>>
				<?php // phpcs:enable ?>
				<label class="toggle-switch-label" for="<?php echo esc_attr( $this->id ); ?>">
					<span class="toggle-switch-inner"></span>
					<span class="toggle-switch-switch"></span>
				</label>
			</div>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php if ( ! empty( $this->description ) ) { ?>
				<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php } ?>
		</div>
		<?php
	}
	/**
	 * Determin if checkbox is checked or unchecked
	 *
	 * @param number $input 0 or 1 to determin on or off.
	 */
	public function butler_switch_sanitization( $input ) {
		if ( true === $input ) {
			return 1;
		} else {
			return 0;
		}
	}
}
