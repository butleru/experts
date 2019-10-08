<?php
/**
 * Template part for displaying the header navigation menu
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

if ( ! wp_rig()->is_utility_nav_menu_active() ) {
	return;
}

?>

<nav id="utility-navigation" class="utility-navigation" aria-label="<?php esc_attr_e( 'Utility menu', 'wp-rig' ); ?>"
	<?php
	if ( wp_rig()->is_amp() ) {
		?>
		[class]=" utility-navigation"
		<?php
	}
	?>
>
	<div class="utility-menu-container">
		<div class="utility-menu-container-inner">
			<?php wp_rig()->display_utility_nav_menu( [ 'menu_id' => 'utility-menu' ] ); ?>
		</div>
	</div>
</nav><!-- #site-navigation -->
