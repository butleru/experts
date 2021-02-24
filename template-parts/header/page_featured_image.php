<?php
/**
 * Template part for displaying the featured image
 *
 * @package wp_rig
 */

if ( 'experts' !== get_post_type() ) {
	get_template_part( 'template-parts/header/header_thumbnail', get_post_type() );
}
