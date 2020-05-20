<?php
/**
 * Template part for displaying a post's header
 *
 * @package butler_homecoming_theme
 */

namespace Butler\Butler;

?>

<header class="entry-header">
	<?php
	$show_title = get_post_meta( $post->ID, '_hide_page_title__meta_key' );
	$post_type_obj = get_post_type_object( get_post_type() );

	if ( 0 == $show_title[0] ) {
		get_template_part( 'template-parts/content/entry_title', get_post_type() );
	}

	if ( 'page' !== $post_type_obj->name ) {
		get_template_part( 'template-parts/content/entry_meta', get_post_type() );
	}

	if ( ! is_search() && 'page' !== $post_type_obj->name ) {
		get_template_part( 'template-parts/content/entry_thumbnail', get_post_type() );
	}
	?>
</header><!-- .entry-header -->
