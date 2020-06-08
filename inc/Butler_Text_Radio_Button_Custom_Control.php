<?php
/**
 * Customizer Text Radio Button Controls
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

use WP_Customize_Control;

/**
 * Custom Text Radio Button Control Class
 */
class Butler_Text_Radio_Button_Custom_Control extends WP_Customize_Control {
	/**
	 * The type of control being rendered
	 *
	 * @var $type
	 */
	public $type = 'text_radio_button';
	/**
	 * Render the control in the customizer
	 */
	public function render_content() {
		?>
		<div class="text_radio_button_control">
			<?php if ( ! empty( $this->label ) ) { ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php } ?>
			<?php if ( ! empty( $this->description ) ) { ?>
				<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php } ?>

		<div class="radio-buttons">
			<?php foreach ( $this->choices as $key => $value ) { ?>
					<label class="radio-button-label">
						<input type="radio" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php $this->link(); ?> <?php checked( esc_attr( $key ), $this->value() ); ?>/>
						<span><?php echo esc_attr( $value ); ?></span>
					</label>
				<?php	} ?>
		</div>
		</div>
		<?php
	}
	/**
	 * Get the list of possible radio box or select options and return value
	 *
	 * @param string $input radio button value.
	 * @param string $setting default setting.
	 */
	public function butler_radio_sanitization( $input, $setting ) {
		$choices = $setting->manager->get_control( $setting->id )->choices;

		if ( array_key_exists( $input, $choices ) ) {
			return $input;
		} else {
			return $setting->default;
		}
	}
}
