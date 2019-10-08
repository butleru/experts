<?php
/**
 * WP_Rig\WP_Rig\Editor\Component class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\Editor;

use WP_Rig\WP_Rig\Component_Interface;
use function add_action;
use function add_theme_support;

/**
 * Class for integrating with the block editor.
 *
 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
 */
class Component implements Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'editor';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'after_setup_theme', [ $this, 'action_add_editor_support' ] );
	}

	/**
	 * Adds support for various editor features.
	 */
	public function action_add_editor_support() {
		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Add support for default block styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for wide-aligned images.
		add_theme_support( 'align-wide' );

		/**
		 * Add support for color palettes.
		 *
		 * To preserve color behavior across themes, use these naming conventions:
		 * - Use primary and secondary color for main variations.
		 * - Use `theme-[color-name]` naming standard for standard colors (red, blue, etc).
		 * - Use `custom-[color-name]` for non-standard colors.
		 *
		 * Add the line below to disable the custom color picker in the editor.
		 * add_theme_support( 'disable-custom-colors' );
		 */
		add_theme_support(
			'editor-color-palette',
			[
				[
					'name'  => __( 'Primary', 'wp-rig' ),
					'slug'  => 'theme-primary',
					'color' => '#13294b',
				],
				[
					'name'  => __( 'Secondary', 'wp-rig' ),
					'color' => '#d1e0d7',
				],
				[
					'name'  => __( 'Red', 'wp-rig' ),
					'slug'  => 'theme-red',
					'color' => '#c0392b',
				],
				[
					'name'  => __( 'Green', 'wp-rig' ),
					'slug'  => 'theme-green',
					'color' => '#26d07c',
				],
				[
					'name'  => __( 'Blue', 'wp-rig' ),
					'slug'  => 'theme-blue',
					'color' => '#00a3e0',
				],
				[
					'name'  => __( 'Yellow', 'wp-rig' ),
					'slug'  => 'theme-yellow',
					'color' => '#ece81a',
				],
				[
					'name'  => __( 'Black', 'wp-rig' ),
					'slug'  => 'theme-black',
					'color' => '#1c2833',
				],
				[
					'name'  => __( 'Grey', 'wp-rig' ),
					'slug'  => 'theme-grey',
					'color' => '#95a5a6',
				],
				[
					'name'  => __( 'White', 'wp-rig' ),
					'slug'  => 'theme-white',
					'color' => '#ecf0f1',
				],
				[
					'name'  => __( 'Dusty daylight', 'wp-rig' ),
					'slug'  => 'custom-daylight',
					'color' => '#97c0b7',
				],
				[
					'name'  => __( 'Dusty sun', 'wp-rig' ),
					'slug'  => 'custom-sun',
					'color' => '#eee9d1',
				],
			]
		);

		/*
		 * Add support custom font sizes.
		 *
		 * Add the line below to disable the custom color picker in the editor.
		 * add_theme_support( 'disable-custom-font-sizes' );
		 */
		add_theme_support(
			'editor-font-sizes',
			[
				[
					'name'      => __( 'Small', 'wp-rig' ),
					'shortName' => __( 'XXS', 'wp-rig' ),
					'size'      => 8,
					'slug'      => 'smallest',
				],
				[
					'name'      => __( 'Smaller', 'wp-rig' ),
					'shortName' => __( 'XS', 'wp-rig' ),
					'size'      => 11,
					'slug'      => 'smaller',
				],
				[
					'name'      => __( 'Small', 'wp-rig' ),
					'shortName' => __( 'S', 'wp-rig' ),
					'size'      => 14,
					'slug'      => 'small',
				],
				[
					'name'      => __( 'Regular', 'wp-rig' ),
					'shortName' => __( 'S', 'wp-rig' ),
					'size'      => 20,
					'slug'      => 'regular',
				],
				[
					'name'      => __( 'Large', 'wp-rig' ),
					'shortName' => __( 'M', 'wp-rig' ),
					'size'      => 24,
					'slug'      => 'large',
				],
				[
					'name'      => __( 'Larger', 'wp-rig' ),
					'shortName' => __( 'L', 'wp-rig' ),
					'size'      => 29,
					'slug'      => 'larger',
				],
				[
					'name'      => __( 'Largest', 'wp-rig' ),
					'shortName' => __( 'XL', 'wp-rig' ),
					'size'      => 38,
					'slug'      => 'largest',
				],
			]
		);
	}
}
