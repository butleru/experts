<?php

abstract class Hide_Page_Title_Meta_Box {
	public static function add() {
		$screens = [ 'post', 'wporg_cpt' ];
		foreach ( $screens as $screen ) {
			add_meta_box(
				'wporg_box_id',
				'Hide Page Title',
				[ self::class, 'html' ],
				$screen
			);
		}
	}

	public static function save( $post_id ) {
		if ( array_key_exists( 'wporg_field', $_POST ) ) {
			update_post_meta(
				$post_id,
				'_wporg_meta_key',
				$_POST['wporg_field']
			);
		}
	}

	public static function html( $post ) {
		$value = get_post_meta( $post->ID, '_wporg_meta_key', true );
		?>
		<label for="wporg_field">Hide the page title</label>
		<checkbox value="" />
		<?php
	}
}

add_action( 'add_meta_boxes', [ 'Hide_Page_Title_Meta_Box', 'add' ] );
add_action( 'save_post', [ 'Hide_Page_Title_Meta_Box', 'save' ] );
