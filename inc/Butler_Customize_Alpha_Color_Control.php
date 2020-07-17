<?php
/**
 * Customizer Custom Color Picker Controls
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

use WP_Customize_Control;

/**
 * Custom Color Picker Control Class
 */
class Butler_Customize_Alpha_Color_Control extends WP_Customize_Control {
	/**
	 * The type of control being rendered
	 *
	 * @var type
	 */
	public $type = 'alpha-color';
	/**
	 * Add support for palettes to be passed in.
	 *
	 * Supported palette values are true, false, or an array of RGBa and Hex colors.
	 *
	 * @var palette
	 */
	public $palette;
	/**
	 * Add support for showing the opacity value on the slider handle.
	 *
	 * @var show_opacity
	 */
	public $show_opacity;
	/**
	 * Render the control in the customizer
	 */
	public function render_content() {

		// Process the palette.
		if ( is_array( $this->palette ) ) {
			$palette = implode( '|', $this->palette );
		} else {
			// Default to true.
			$palette = ( false === $this->palette || 'false' === $this->palette ) ? 'false' : 'true';
		}

		// Support passing show_opacity as string or boolean. Default to true.
		$show_opacity = ( false === $this->show_opacity || 'false' === $this->show_opacity ) ? 'false' : 'true';

		?>
			<label>
				<?php
				// Output the label and description if they were passed in.
				if ( isset( $this->label ) && '' !== $this->label ) {
					echo '<span class="customize-control-title">' . sanitize_text_field( $this->label ) . '</span>'; /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
				}
				if ( isset( $this->description ) && '' !== $this->description ) {
					echo '<span class="description customize-control-description">' . sanitize_text_field( $this->description ) . '</span>'; /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
				}
				?>
			</label>
			<input class="alpha-color-control" type="text" data-show-opacity="<?php echo $show_opacity; ?>" data-palette="<?php echo esc_attr( $palette ); ?>" data-default-color="<?php echo esc_attr( $this->settings['default']->default ); ?>" <?php $this->link(); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?>  />
		<?php
	}
	/**
	 * Sanitize RGBa or Hex values
	 *
	 * @param string $input radio button value.
	 * @param string $setting default setting.
	 */
	public function butler_hex_rgba_sanitization( $input, $setting ) {
		if ( empty( $input ) || is_array( $input ) ) {
			return $setting->default;
		}

		if ( false === strpos( $input, 'rgba' ) ) {
			// If string doesn't start with 'rgba' then santize as hex color.
			$input = sanitize_hex_color( $input );
		} else {
			// Sanitize as RGBa color.
			$input = str_replace( ' ', '', $input );
			sscanf( $input, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
			$input = 'rgba(' . skyrocket_in_range( $red, 0, 255 ) . ',' . skyrocket_in_range( $green, 0, 255 ) . ',' . skyrocket_in_range( $blue, 0, 255 ) . ',' . skyrocket_in_range( $alpha, 0, 1 ) . ')';
		}
		return $input;
	}
}
