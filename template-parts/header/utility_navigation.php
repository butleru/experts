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

<nav id="utility-navigation" class="utility-navigation nav--toggle-sub nav--toggle-small" aria-label="<?php esc_attr_e( 'Utility menu', 'wp-rig' ); ?>"
	<?php
	if ( wp_rig()->is_amp() ) {
		?>
		[class]=" utility-navigation"
		<?php
	}
	?>
>
	<?php
	if ( wp_rig()->is_amp() ) {
		?>
		<amp-state id="siteUtilityNavigationMenu">
			<script type="application/json">
				{
					"expanded": false
				}
			</script>
		</amp-state>
		<?php
	}
	?>

	<div class="utility-menu-container">
		<div class="utility-menu-container-inner">
			<?php wp_rig()->display_utility_nav_menu( [ 'menu_id' => 'utility-menu' ] ); ?>
		</div>
	</div>
</nav><!-- #site-navigation -->
