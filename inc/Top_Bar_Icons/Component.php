<?php
/**
 * WP_Rig\WP_Rig\Top_Bar_Icons\Component class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\Top_Bar_Icons;

use WP_Rig\WP_Rig\Component_Interface;
use function WP_Rig\WP_Rig\wp_rig;
use WP_Customize_Manager;
use \WP_Rig\WP_Rig\Butler_Links_Social;
use WP_Rig\WP_Rig\Butler_Toggle_Switch_Custom_Control;
use WP_Rig\WP_Rig\Butler_Sortable_Repeater_Custom_Control;
use WP_Rig\WP_Rig\Butler_Single_Accordion_Custom_Control;
use WP_Rig\WP_Rig\Butler_Text_Radio_Button_Custom_Control;
use function add_action;
use function is_admin;
use function butler_get_social_media;

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
		return 'header_top_bar_icons';
	}
	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'customize_register', [ $this, 'action_customize_register_header_top_bar_icons' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'action_enqueue_top_bar_assets' ] );
	}
	/**
	 * Enqueues script(s) that the top bar icons need.
	 */
	public function action_enqueue_top_bar_assets() {
		wp_enqueue_script(
			'match-height',
			get_theme_file_uri( '/assets/js/jquery.matchHeight.min.js' ),
			array( 'jquery' ),
			wp_rig()->get_asset_version( get_theme_file_path( '/assets/js/jquery.matchHeight.min.js' ) ),
			false
		);
	}
	/**
	 * Adds a setting and control for top header bar in the customizer
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer manager instance.
	 */
	public function action_customize_register_header_top_bar_icons( WP_Customize_Manager $wp_customize ) {
		// Add our Checkbox switch setting and control for opening URLs in a new tab.
		$wp_customize->add_setting(
			'social_newtab',
			[
				'default' => $this->defaults['social_newtab'],
				'transport' => 'postMessage',
				'sanitize_callback' => $this->butler_switch_sanitization,
			]
		);
		$wp_customize->add_control(
			new Butler_Toggle_Switch_Custom_Control(
				$wp_customize,
				'social_newtab',
				[
					'label' => __( 'Open in new browser tab', 'wp-rig' ),
					'section' => 'top_header_icon_links',
				]
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'social_newtab',
			[
				'selector' => '.social',
				'container_inclusive' => false,
				'render_callback' => function() {
					echo $this->butler_get_social_media(); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
				},
				'fallback_refresh' => true,
			]
		);

		// Add our Sortable Repeater setting and Custom Control for Social media URLs.
		$wp_customize->add_setting(
			'social_urls',
			array(
				'default' => $this->defaults['social_urls'],
				'transport' => 'postMessage',
				'sanitize_callback' => $this->butler_url_sanitization,
			)
		);
		$wp_customize->add_control(
			new Butler_Sortable_Repeater_Custom_Control(
				$wp_customize,
				'social_urls',
				array(
					'label' => __( 'Social URLs', 'wp-rig' ),
					'description' => esc_html__( 'Add social media and other links.', 'wp-rig' ),
					'section' => 'top_header_icon_links',
					'button_labels' => array(
						'add' => __( 'Add Icon', 'wp-rig' ),
					),
				)
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'social_urls',
			array(
				'selector' => '.social',
				'container_inclusive' => false,
				'render_callback' => function() {
					echo $this->butler_get_social_media(); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
				},
				'fallback_refresh' => true,
			)
		);

		// Add our Single Accordion setting and Custom Control to list the available Social Media icons.
		$social_icons_list = array(
			'Behance' => __( '<i class="butler-icon bi-behance"></i>', 'wp-rig' ),
			'Bitbucket' => __( '<i class="butler-icon bi-bitbucket"></i>', 'wp-rig' ),
			'CodePen' => __( '<i class="butler-icon bi-codepen"></i>', 'wp-rig' ),
			'DeviantArt' => __( '<i class="butler-icon bi-deviantart"></i>', 'wp-rig' ),
			'Discord' => __( '<i class="butler-icon bi-discord"></i>', 'wp-rig' ),
			'Dribbble' => __( '<i class="butler-icon bi-dribbble"></i>', 'wp-rig' ),
			'Etsy' => __( '<i class="butler-icon bi-etsy"></i>', 'wp-rig' ),
			'Facebook' => __( '<i class="butler-icon bi-facebook-square"></i>', 'wp-rig' ),
			'Flickr' => __( '<i class="butler-icon bi-flickr"></i>', 'wp-rig' ),
			'Foursquare' => __( '<i class="butler-icon bi-foursquare"></i>', 'wp-rig' ),
			'GitHub' => __( '<i class="butler-icon bi-github"></i>', 'wp-rig' ),
			'Google+' => __( '<i class="butler-icon bi-google-plus-square"></i>', 'wp-rig' ),
			'Instagram' => __( '<i class="butler-icon bi-instagram"></i>', 'wp-rig' ),
			'Last.fm' => __( '<i class="butler-icon bi-lastfm"></i>', 'wp-rig' ),
			'LinkedIn' => __( '<i class="butler-icon bi-linkedin-square"></i>', 'wp-rig' ),
			'Medium' => __( '<i class="butler-icon bi-medium"></i>', 'wp-rig' ),
			'Pinterest' => __( '<i class="butler-icon bi-pinterest-p"></i>', 'wp-rig' ),
			'Reddit' => __( '<i class="butler-icon bi-reddit-alien"></i>', 'wp-rig' ),
			'Slack' => __( '<i class="butler-icon bi-slack"></i>', 'wp-rig' ),
			'SlideShare' => __( '<i class="butler-icon bi-slideshare"></i>', 'wp-rig' ),
			'Snapchat' => __( '<i class="butler-icon bi-snapchat-ghost"></i>', 'wp-rig' ),
			'SoundCloud' => __( '<i class="butler-icon bi-soundcloud"></i>', 'wp-rig' ),
			'Spotify' => __( '<i class="butler-icon bi-spotify"></i>', 'wp-rig' ),
			'Stack Overflow' => __( '<i class="butler-icon bi-stack-overflow"></i>', 'wp-rig' ),
			'Tumblr' => __( '<i class="butler-icon bi-tumblr"></i>', 'wp-rig' ),
			'Twitch' => __( '<i class="butler-icon bi-twitch"></i>', 'wp-rig' ),
			'Twitter' => __( '<i class="butler-icon bi-twitter-square"></i>', 'wp-rig' ),
			'Vimeo' => __( '<i class="butler-icon bi-vimeo"></i>', 'wp-rig' ),
			'Weibo' => __( '<i class="butler-icon bi-weibo"></i>', 'wp-rig' ),
			'YouTube' => __( '<i class="butler-icon bi-youtube-play"></i>', 'wp-rig' ),
			'Butler University' => __( '<i class="butler-icon bi-bulldog"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span><span class="path14"></span><span class="path15"></span><span class="path16"></span><span class="path17"></span><span class="path18"></span><span class="path19"></span><span class="path20"></span><span class="path21"></span><span class="path22"></span><span class="path23"></span><span class="path24"></span></i>', 'wp-rig' ),
		);
		$wp_customize->add_setting(
			'butler_url_icons',
			array(
				'default' => $this->defaults['butler_url_icons'],
				'transport' => 'refresh',
				'sanitize_callback' => $this->butler_text_sanitization,
			)
		);
		$wp_customize->add_control(
			new Butler_Single_Accordion_Custom_Control(
				$wp_customize,
				'butler_url_icons',
				array(
					'label' => __( 'View list of available icons', 'wp-rig' ),
					'description' => $social_icons_list,
					'section' => 'top_header_icon_links',
				)
			)
		);

		// Add our Checkbox switch setting and Custom Control for displaying an RSS icon.
		$wp_customize->add_setting(
			'social_rss',
			array(
				'default' => $this->defaults['social_rss'],
				'transport' => 'postMessage',
				'sanitize_callback' => $this->butler_switch_sanitization,
			)
		);
		$wp_customize->add_control(
			new Butler_Toggle_Switch_Custom_Control(
				$wp_customize,
				'social_rss',
				array(
					'label' => __( 'Display RSS icon', 'wp-rig' ),
					'section' => 'top_header_icon_links',
				)
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'social_rss',
			array(
				'selector' => '.social',
				'container_inclusive' => false,
				'render_callback' => function() {
					echo $this->butler_get_social_media(); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
				},
				'fallback_refresh' => true,
			)
		);
	}
}
