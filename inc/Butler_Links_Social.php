<?php
/**
 * Butler website links/icons and social links/icons
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

use WP_Customize_Control;

/**
 * Custom links and social, icons
 */
class Butler_Links_Social {
	/**
	 * The type of control being rendered
	 *
	 * @var $type
	 */
	public $type = 'icons_link_social';
	/**
	 * Render the control in the customizer
	 */
	public function butler_generate_defaults() {
		$customizer_defaults = array(
			'links_li_class' => '',
			'social_newtab' => 0,
			'social_urls' => '',
			'social_alignment' => '',
			'social_rss' => 0,
			'social_url_icons' => '',
			'contact_phone' => '',
			'search_menu_icon' => 0,
			'woocommerce_shop_sidebar' => 1,
			'woocommerce_product_sidebar' => 0,
			'sample_toggle_switch' => 0,
			'sample_slider_control' => 48,
			'sample_slider_control_small_step' => 2,
			'sample_sortable_repeater_control' => '',
			'sample_image_radio_button' => 'sidebarright',
			'sample_text_radio_button' => 'right',
			'sample_image_checkbox' => 'stylebold,styleallcaps',
			'sample_single_accordion' => '',
			'sample_alpha_color' => 'rgba(209,0,55,0.7)',
			'sample_simple_notice' => '',
			'sample_dropdown_select2_control_single' => 'vic',
			'sample_dropdown_select2_control_multi' => array(
				'Antarctica/McMurdo',
				'Australia/Melbourne',
				'Australia/Broken_Hill',
			),
			'sample_dropdown_posts_control' => '',
			'sample_tinymce_editor' => '',
			'sample_google_font_select' => json_encode(
				array(
					'font' => 'Open Sans',
					'regularweight' => 'regular',
					'italicweight' => 'italic',
					'boldweight' => '700',
					'category' => 'sans-serif',
				)
			),
			'sample_default_text' => '',
			'sample_email_text' => '',
			'sample_url_text' => '',
			'sample_number_text' => '',
			'sample_hidden_text' => '',
			'sample_date_text' => '',
			'sample_default_checkbox' => 0,
			'sample_default_select' => 'jet-fuel',
			'sample_default_radio' => 'spider-man',
			'sample_default_dropdownpages' => '1548',
			'sample_default_textarea' => '',
			'sample_default_color' => '#333',
			'sample_default_media' => '',
			'sample_default_image' => '',
			'sample_default_cropped_image' => '',
			'sample_date_only' => '2017-08-28',
			'sample_date_time' => '2017-08-28 16:30:00',
			'sample_date_time_no_past_date' => date( 'Y-m-d' ),
		);

		return apply_filters( 'butler_customizer_defaults', $customizer_defaults );
	}
	/**
	 * Set our Social Icons URLs.
	 * Only needed for our sample customizer preview refresh
	 *
	 * @return array Multidimensional array containing social media data
	 */
	/**
	 *
	 * Arrays containing info to setup social urls
	 */
	public function butler_generate_social_urls() {
		$social_icons = array(
			array( 'url' => 'behance.net', 'icon' => 'fa-lg fab fa-behance', 'title' => esc_html__( 'Follow me on Behance', 'wp-rig' ), 'class' => 'behance' ), /* phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound */
			array( 'url' => 'bitbucket.org', 'icon' => 'fa-lg fab fa-bitbucket', 'title' => esc_html__( 'Fork me on Bitbucket', 'wp-rig' ), 'class' => 'bitbucket' ), /* phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound */
			array( 'url' => 'codepen.io', 'icon' => 'fa-lg fab fa-codepen', 'title' => esc_html__( 'Follow me on CodePen', 'wp-rig' ), 'class' => 'codepen' ), /* phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound */
			array( 'url' => 'deviantart.com', 'icon' => 'fa-lg fab fa-deviantart', 'title' => esc_html__( 'Watch me on DeviantArt', 'wp-rig' ), 'class' => 'deviantart' ), /* phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound */
			array( 'url' => 'discord.gg', 'icon' => 'fa-lg fab fa-discord', 'title' => esc_html__( 'Join me on Discord', 'wp-rig' ), 'class' => 'discord' ), /* phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound */
			array( 'url' => 'dribbble.com', 'icon' => 'fa-lg fab fa-dribbble', 'title' => esc_html__( 'Follow me on Dribbble', 'wp-rig' ), 'class' => 'dribbble' ), /* phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound */
			array( 'url' => 'etsy.com', 'icon' => 'fa-lg fab fa-etsy', 'title' => esc_html__( 'favorite me on Etsy', 'wp-rig' ), 'class' => 'etsy' ), /* phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound */
			array( 'url' => 'facebook.com', 'icon' => 'fa-lg fab fa-facebook-f', 'title' => esc_html__( 'Like us on Facebook', 'wp-rig' ), 'class' => 'facebook' ), /* phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound */
			array( 'url' => 'flickr.com', 'icon' => 'fa-lg fab fa-flickr', 'title' => esc_html__( 'Connect with me on Flickr', 'wp-rig' ), 'class' => 'flickr' ), /* phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound */
			array( 'url' => 'foursquare.com', 'icon' => 'fa-lg fab fa-foursquare', 'title' => esc_html__( 'Follow me on Foursquare', 'wp-rig' ), 'class' => 'foursquare' ), /* phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound */
			array( 'url' => 'github.com', 'icon' => 'fa-lg fab fa-github', 'title' => esc_html__( 'Fork me on GitHub', 'wp-rig' ), 'class' => 'github' ), /* phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound */
			array( 'url' => 'instagram.com', 'icon' => 'fa-lg fab fa-instagram', 'title' => esc_html__( 'Follow me on Instagram', 'wp-rig' ), 'class' => 'instagram' ), /* phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound */
			array( 'url' => 'kickstarter.com', 'icon' => 'fa-lg fab fa-kickstarter-k', 'title' => esc_html__( 'Back me on Kickstarter', 'wp-rig' ), 'class' => 'kickstarter' ), /* phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound */
			array( 'url' => 'last.fm', 'icon' => 'fa-lg fab fa-lastfm', 'title' => esc_html__( 'Follow me on Last.fm', 'wp-rig' ), 'class' => 'lastfm' ), /* phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound */
			array( 'url' => 'linkedin.com', 'icon' => 'fa-lg fab fa-linkedin-in', 'title' => esc_html__( 'Connect with me on LinkedIn', 'wp-rig' ), 'class' => 'linkedin' ), /* phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound */
			array( 'url' => 'medium.com', 'icon' => 'fa-lg fab fa-medium-m', 'title' => esc_html__( 'Follow me on Medium', 'wp-rig' ), 'class' => 'medium' ), /* phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound */
			array( 'url' => 'patreon.com', 'icon' => 'fa-lg fab fa-patreon', 'title' => esc_html__( 'Support me on Patreon', 'wp-rig' ), 'class' => 'patreon' ), /* phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound */
			array( 'url' => 'pinterest.com', 'icon' => 'fa-lg fab fa-pinterest-p', 'title' => esc_html__( 'Follow me on Pinterest', 'wp-rig' ), 'class' => 'pinterest' ), /* phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound */
			array( 'url' => 'plus.google.com', 'icon' => 'fa-lg fab fa-google-plus-g', 'title' => esc_html__( 'Connect with me on Google+', 'wp-rig' ), 'class' => 'googleplus' ), /* phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound */
			array( 'url' => 'reddit.com', 'icon' => 'fa-lg fab fa-reddit-alien', 'title' => esc_html__( 'Join me on Reddit', 'wp-rig' ), 'class' => 'reddit' ), /* phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound */
			array( 'url' => 'slack.com', 'icon' => 'fa-lg fab fa-slack-hash', 'title' => esc_html__( 'Join me on Slack', 'wp-rig' ), 'class' => 'slack.' ), /* phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound */
			array( 'url' => 'slideshare.net', 'icon' => 'fa-lg fab fa-slideshare', 'title' => esc_html__( 'Follow me on SlideShare', 'wp-rig' ), 'class' => 'slideshare' ), /* phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound */
			array( 'url' => 'snapchat.com', 'icon' => 'fa-lg fab fa-snapchat-ghost', 'title' => esc_html__( 'Add me on Snapchat', 'wp-rig' ), 'class' => 'snapchat' ), /* phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound */
			array( 'url' => 'soundcloud.com', 'icon' => 'fa-lg fab fa-soundcloud', 'title' => esc_html__( 'Follow me on SoundCloud', 'wp-rig' ), 'class' => 'soundcloud' ), /* phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound */
			array( 'url' => 'spotify.com', 'icon' => 'fa-lg fab fa-spotify', 'title' => esc_html__( 'Follow me on Spotify', 'wp-rig' ), 'class' => 'spotify' ), /* phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound */
			array( 'url' => 'stackoverflow.com', 'icon' => 'fa-lg fab fa-stack-overflow', 'title' => esc_html__( 'Join me on Stack Overflow', 'wp-rig' ), 'class' => 'stackoverflow' ), /* phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound */
			array( 'url' => 'tumblr.com', 'icon' => 'fa-lg fab fa-tumblr', 'title' => esc_html__( 'Follow me on Tumblr', 'wp-rig' ), 'class' => 'tumblr' ), /* phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound */
			array( 'url' => 'twitch.tv', 'icon' => 'fa-lg fab fa-twitch', 'title' => esc_html__( 'Follow me on Twitch', 'wp-rig' ), 'class' => 'twitch' ), /* phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound */
			array( 'url' => 'twitter.com', 'icon' => 'fa-lg fab fa-twitter', 'title' => esc_html__( 'Follow me on Twitter', 'wp-rig' ), 'class' => 'twitter' ), /* phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound */
			array( 'url' => 'vimeo.com', 'icon' => 'fa-lg fab fa-vimeo-v', 'title' => esc_html__( 'Follow me on Vimeo', 'wp-rig' ), 'class' => 'vimeo' ), /* phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound */
			array( 'url' => 'weibo.com', 'icon' => 'fa-lg fab fa-weibo', 'title' => esc_html__( 'Follow me on weibo', 'wp-rig' ), 'class' => 'weibo' ), /* phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound */
			array( 'url' => 'youtube.com', 'icon' => 'fa-lg fab fa-youtube', 'title' => esc_html__( 'Subscribe to me on YouTube', 'wp-rig' ), 'class' => 'youtube' ), /* phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing.AssociativeArrayFound */
		);

		return apply_filters( 'butler_social_icons', $social_icons );
	}


	/**
	 * Return an unordered list of linked social media icons, based on the urls provided in the Customizer Sortable Repeater
	 * This is a sample function to display some social icons on your site.
	 * This sample function is also used to show how you can call a PHP function to refresh the customizer preview.
	 * Add the following to header.php if you want to see the sample social icons displayed in the customizer preview and your theme.
	 * Before any social icons display, you'll also need to add the relevent URL's to the Header Navigation > Social Icons section in the Customizer.
	 * <div class="social">
	 * <?php echo butler_get_social_media(); ?>
	 * </div>
	 *
	 * @return string Unordered list of linked social media icons
	 */
	/**
	 *
	 * Function to get the social media urls and set them up
	 */
	public function butler_get_social_media() {
		$defaults = $this->butler_generate_defaults();
		$output = array();
		$social_icons = $this->butler_generate_social_urls();
		$social_urls = explode( ',', get_theme_mod( 'social_urls', $defaults['social_urls'] ) );
		$social_newtab = get_theme_mod( 'social_newtab', $defaults['social_newtab'] );
		$social_alignment = get_theme_mod( 'social_alignment', $defaults['social_alignment'] );
		$contact_phone = get_theme_mod( 'contact_phone', $defaults['contact_phone'] );

		if ( ! empty( $contact_phone ) ) {
			$output[] = sprintf(
				'<li class="%1$s"><i class="%2$s"></i>%3$s</li>',
				'phone',
				'fas fa-phone fa-flip-horizontal',
				$contact_phone
			);
		}

		foreach ( $social_urls as $key => $value ) {
			if ( ! empty( $value ) ) {
				$domain = str_ireplace( 'www.', '', parse_url( $value, PHP_URL_HOST ) );
				$index = array_search( strtolower( $domain ), array_column( $social_icons, 'url' ) );
				if ( false !== $index ) {
					$output[] = sprintf(
						'<li class=" %1$s %2$s"><a href="%3$s" title="%4$s"%5$s><i class="%6$s"></i></a></li>',
						$social_icons[ $index ]['class'],
						'social-icon',
						esc_url( $value ),
						$social_icons[ $index ]['title'],
						( ! $social_newtab ? '' : ' target="_blank"' ),
						$social_icons[ $index ]['icon']
					);
				} else {
					$output[] = sprintf(
						'<li class="nosocial"><a href="%2$s"%3$s><img src="%4$s" style="height: 67px;" /></a></li>',
						$social_icons[ $index ]['class'],
						esc_url( $value ),
						( ! $social_newtab ? '' : ' target="_blank"' ),
						esc_url( 'localhost/butler-research-dev/wp-content/uploads/2019/10/bulldog.png' )
					);
				}
			}
		}

		if ( get_theme_mod( 'social_rss', $defaults['social_rss'] ) ) {
			$output[] = sprintf(
				'<li class="%1$s"><a href="%2$s" title="%3$s"%4$s><i class="%5$s"></i></a></li>',
				'rss',
				home_url( '/feed' ),
				'Subscribe to my RSS feed',
				( ! $social_newtab ? '' : ' target="_blank"' ),
				'fas fa-rss'
			);
		}

		if ( ! empty( $output ) ) {
			$output = apply_filters( 'butler_social_icons_list', $output );
			array_unshift( $output, '<ul class="social-icons ' . $social_alignment . '">' );
			$output[] = '</ul>';
		}

		return implode( '', $output );
	}
}
