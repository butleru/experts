<?php
/**
 * Template part for displaying the mobile navigation menu, this includes both main and utility navigation
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

if ( ! wp_rig()->is_utility_nav_menu_active() || ! wp_rig()->is_primary_nav_menu_active() ) {
	return;
}

?>

<nav id="mobile-navigation" class="mobile-navigation nav--toggle-sub nav--toggle-small" aria-label="<?php esc_attr_e( 'Utility menu', 'wp-rig' ); ?>"
	<?php
	if ( wp_rig()->is_amp() ) {
		?>
		[class]=" mobile-navigation"
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

	<button class="menu-toggle" aria-label="<?php esc_attr_e( 'Open menu', 'wp-rig' ); ?>" aria-controls="mobile-menu" aria-expanded="false"
		<?php
		if ( wp_rig()->is_amp() ) {
			?>
			on="tap:AMP.setState( { siteMobileNavigationMenu: { expanded: ! siteMobileNavigationMenu.expanded } } )"
			[aria-expanded]="siteMobileNavigationMenu.expanded ? 'true' : 'false'"
			<?php
		}
		?>
	>
		<i class="butler-icon bi-bars"></i>
		<i class="butler-icon butler-icon-2x bi-close"></i>
	</button>
	<div class="mobile-menu-container">
		<div class="mobile-menu-container-inner">
			<?php
			if ( wp_rig()->is_primary_nav_menu_active() ) {
				wp_rig()->display_primary_nav_menu( [ 'menu_id' => 'primary-menu' ] );
			}
			if ( wp_rig()->is_utility_nav_menu_active() ) {
				wp_rig()->display_utility_nav_menu( [ 'menu_id' => 'utility-menu' ] );
			}
			?>
		</div>
	</div>
</nav><!-- #site-navigation -->
