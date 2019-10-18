<?php
/**
 * WP_Rig\WP_Rig\Customizer\Component class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\Customizer;

use WP_Rig\WP_Rig\Component_Interface;
use function WP_Rig\WP_Rig\wp_rig;
use WP_Customize_Manager;
use function add_action;
use function bloginfo;
use function wp_enqueue_script;
use function get_theme_file_uri;

/**
 * Class for managing Customizer integration.
 */
class Component implements Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'customizer';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'customize_register', [ $this, 'action_customize_register' ] );
		add_action( 'customize_preview_init', [ $this, 'action_enqueue_customize_preview_js' ] );
		add_action( 'customize_controls_enqueue_scripts', [ $this, 'action_enqueue_butler_customizer' ] );
	}

	/**
	 * Adds postMessage support for site title and description, plus a custom Theme Options section.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer manager instance.
	 */
	public function action_customize_register( WP_Customize_Manager $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial(
				'blogname',
				[
					'selector'        => '.site-title a',
					'render_callback' => function() {
						bloginfo( 'name' );
					},
				]
			);
			$wp_customize->selective_refresh->add_partial(
				'blogdescription',
				[
					'selector'        => '.site-description',
					'render_callback' => function() {
						bloginfo( 'description' );
					},
				]
			);
		}

		/**
		 * Top header.
		 */
		$wp_customize->add_panel(
			'top_header',
			[
				'title'     => __( 'Top Header', 'wp-rig' ),
				'priority'  => 50,
			]
		);

		$wp_customize->add_section(
			'top_header_cta',
			[
				'title'     => __( 'Top Header CTA', 'wp-rig' ),
				'panel'     => 'top_header',
			]
		);

		$wp_customize->add_section(
			'top_header_icon_links',
			[
				'title'   => __( 'Top Header Icon Links', 'wp-rig' ),
				'panel'   => 'top_header',
			]
		);
		/**
		 * Google Fonts Control
		 */
		$wp_customize->add_section(
			'google_fonts_custom_controls_section',
			[
				'title'    => __( 'Google Fonts', 'wp-rig' ),
				'priority' => 45,
			]
		);
		/**
		 * Theme options.
		 */
		$wp_customize->add_section(
			'theme_options',
			[
				'title'    => __( 'Theme Options', 'wp-rig' ),
				'priority' => 130, // Before Additional CSS.
			]
		);
	}

	/**
	 * Enqueues JavaScript to make Customizer preview reload changes asynchronously.
	 */
	public function action_enqueue_customize_preview_js() {
		wp_enqueue_script(
			'wp-rig-customizer',
			get_theme_file_uri( '/assets/js/customizer.min.js' ),
			[ 'customize-preview' ],
			wp_rig()->get_asset_version( get_theme_file_path( '/assets/js/customizer.min.js' ) ),
			true
		);
	}
	/**
	 * Enqeues JS and CSS
	 */
	public function action_enqueue_butler_customizer() {
		wp_enqueue_script(
			'butler-customizer',
			get_theme_file_uri( '/assets/js/custom-customizer.min.js' ),
			[ 'jquery' ],
			wp_rig()->get_asset_version( get_theme_file_path( '/assets/js/custom-customizer.min.js' ) ),
			true
		);
		wp_enqueue_script(
			'butler-select2-js',
			'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js',
			[ 'jquery' ],
			'4.0.6',
			true
		);
		wp_enqueue_style(
			'butler-customizer-css',
			get_theme_file_uri( '/assets/css/custom-customizer.min.css' ),
			[],
			wp_rig()->get_asset_version( get_theme_file_path( '/assets/css/custom-customizer.min.css' ) ),
			'all'
		);
		wp_enqueue_style(
			'butler-font-awesome-css',
			get_theme_file_uri( '/assets/css/font-awesome.min.css' ),
			[],
			wp_rig()->get_asset_version( get_theme_file_path( '/assets/css/font-awesome.min.css' ) ),
			'all'
		);
		wp_enqueue_style(
			'butler-select2-css',
			'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css',
			[],
			'4.0.6',
			'all'
		);
		wp_enqueue_style(
			'butler-icons',
			'https://butler-cdn.s3.amazonaws.com/custom-icons/css/butler-icons.css',
			[],
			wp_rig()->get_asset_version( 'https://butler-cdn.s3.amazonaws.com/custom-icons/css/butler-icons.css' ),
			'all'
		);
	}
}
