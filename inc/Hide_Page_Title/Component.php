<?php
/**
 * WP_Rig\WP_Rig\Hide_Page_Title\Component class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\Hide_Page_Title;

use WP_Rig\WP_Rig\Component_Interface;
use WP_Rig\WP_Rig\Templating_Component_Interface;
use function add_action;
use function add_meta_boxe;

/**
 * Class for adding ability to hide page titles on a per page basis.
 */
class Component implements Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'hide_page_title';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'add_meta_boxes', [ $this, 'add_hide_meta_box' ] );
		add_action( 'save_post', [ $this, 'save' ] );
	}

	/**
	 * Add the meta box.
	 */
	public function add_hide_meta_box() {
		add_meta_box(
			'hide_the_page_title',
			'Page Title',
			[ $this, 'html' ],
			'page',
			'side',
			'low'
		);
	}

	/**
	 * Save the meta box value.
	 *
	 * @param int $post_id id of the post.
	 */
	public function save( $post_id ) {
		global $post;

		if ( ! isset( $_POST['hide_page_title_nonce_field'] ) || ! wp_verify_nonce( $_POST['hide_page_title_nonce_field'], 'hide_page_title_nonce' ) ) {
			return;
		}

		$update_value = ( wp_unslash( $_POST['hide_page_title_field'] ) ) == 'on' ? 1 : 0;

		if ( isset( $update_value ) ) {
			$update = update_post_meta(
				$post_id,
				'_hide_page_title__meta_key',
				intval( $update_value )
			);
		}
	}

	/**
	 * Creates the meta box input.
	 *
	 * @param array $post array of post data.
	 */
	public function html( $post ) {
		wp_nonce_field( 'hide_page_title_nonce', 'hide_page_title_nonce_field' );
		$checked = ( get_post_meta( $post->ID, '_hide_page_title__meta_key', 1 ) ) ? 'checked' : '';
		$initial_checked = ( empty( get_post_meta( $post->ID, '_hide_page_title__meta_key' ) ) ) ? 'checked' : '';
		?>
		<input type="checkbox" name="hide_page_title_field" <?php echo esc_html( $checked ); ?><?php echo esc_html( $initial_checked ); ?> />
		<label for="hide_page_title_field">Hide the page title</label>
		<?php
	}


}
