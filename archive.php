<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

get_header();

wp_rig()->print_styles( 'wp-rig-content' );

?>
	<main id="primary" class="site-main here">
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>

			<?php
			if ( have_posts() ) {

				get_template_part( 'template-parts/content/page_header' );

				?>
				<div class="archive-content">

					<?php
					do_action( 'bu_taxonomy_custom_dropdowns' );

					while ( have_posts() ) {
						the_post();

						get_template_part( 'template-parts/content/entry_archive', get_post_type() );
					}
					?>

				</div><!-- .archive-content -->

				<?php
				get_template_part( 'template-parts/content/pagination' );
			} else {
				get_template_part( 'template-parts/content/error' );
			}
			?>
		</article><!-- article -->
	</main><!-- #primary -->
<?php
get_sidebar();
get_footer();
