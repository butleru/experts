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

	<button class="menu-toggle" aria-label="<?php esc_attr_e( 'Open menu', 'wp-rig' ); ?>" aria-controls="utility-menu" aria-expanded="false"
		<?php
		if ( wp_rig()->is_amp() ) {
			?>
			on="tap:AMP.setState( { siteUtilityNavigationMenu: { expanded: ! siteUtilityNavigationMenu.expanded } } )"
			[aria-expanded]="siteUtilityNavigationMenu.expanded ? 'true' : 'false'"
			<?php
		}
		?>
	>
		<i class="butler-icon bi-bars"></i>
	</button>
	<div class="utility-menu-container">
		<div class="utility-menu-container-inner">
			<?php wp_rig()->display_utility_nav_menu( [ 'menu_id' => 'utility-menu' ] ); ?>
		</div>
	</div>
</nav><!-- #site-navigation -->
