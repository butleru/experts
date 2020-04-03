<?php
/**
 * WP_Rig\WP_Rig\Top_Bar_CTA\Component class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\Top_Bar_CTA;

use WP_Rig\WP_Rig\Component_Interface;
use function WP_Rig\WP_Rig\wp_rig;
use WP_Customize_Manager;
use WP_Customize_Color_Control;
use WP_Customize_Image_Control;
use WP_Rig\WP_Rig\Butler_Customize_Alpha_Color_Control;
use function add_action;
use function is_admin;

/**
 * Class for managing top header CTA.
 */
class Component implements Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'header_top_bar_cta';
	}
	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'customize_register', [ $this, 'action_customize_register_header_top_bar_cta' ] );
	}
	/**
	 * Adds a setting and control for top header bar CTA in the customizer
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer manager instance.
	 */
	public function action_customize_register_header_top_bar_cta( WP_Customize_Manager $wp_customize ) {
		$wp_customize->add_setting(
			'header_top_bar_cta',
			[
				'default'    => '',
				'transport'  => 'refresh',
				'type'       => 'theme_mod',
				'capability' => 'edit_theme_options',

			]
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'header_top_bar_cta',
				[
					'label'     => __( 'Top Bar CTA Image', 'wp-rig' ),
					'section'   => 'top_header_cta',
					'mime_type'  => 'image',
				]
			)
		);

		$wp_customize->add_setting(
			'top_bar_cta_background_color',
			[
				'default'           => '#00a3e0',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'sanitize_callback'  => $this->butler_hex_rgba_sanitization,
			]
		);
		$wp_customize->add_control(
			new Butler_Customize_Alpha_Color_Control(
				$wp_customize,
				'top_bar_cta_background_color',
				[
					'label' => __( 'CTA Background Color Picker', 'wp-rig' ),
					'description' => esc_html__( 'Set the background color of the CTA', 'wp-rig' ),
					'section' => 'top_header_cta',
					'settings' => 'top_bar_cta_background_color',
					'show_opacity' => true,
					'palette' =>
					[
						'#000',
						'#fff',
						'#13294b',
						'#00a3e0',
						'#d1e0d7',
						'#e31c79',
						'#ece81a',
						'#26d07c',
						'#eaaa00',
					],
				]
			)
		);
	}
}