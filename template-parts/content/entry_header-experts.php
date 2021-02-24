<?php
/**
 * Template part for displaying a post's header
 *
 * @package butler_homecoming_theme
 */

namespace Butler\Butler;

$post_type_obj = get_post_type_object( get_post_type() );

?>
<?php get_template_part( 'template-parts/content/entry_title', get_post_type() ); ?>
<div class="experts-content">
	<div class="experts-content-main">
		<header class="entry-header experts-header">
			<?php

			get_template_part( 'template-parts/content/entry_details', get_post_type() );

			if ( ! is_search() && 'page' !== $post_type_obj->name ) {
				get_template_part( 'template-parts/content/entry_thumbnail', get_post_type() );
			}
			?>
		</header><!-- .entry-header -->
