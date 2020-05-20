<?php
/**
 * Template part for displaying the page content when a 404 error has occurred
 *
 * @package my_butler
 */

namespace WP_Rig\WP_Rig;

?>
<section class="error">
	<?php get_template_part( 'template-parts/content/page_header' ); ?>

	<div class="page-content">
		<p>
			<?php esc_html_e( 'It looks like nothing was found at this location.', 'my-butler' ); ?>
			<p>If you reached this page from a bookmark please <a href="https://my.butler.edu">visit the MY.BUTLER homepage</a> and update your bookmark for this site.</p>

		<?php

		my_butler()->print_styles( 'my-butler-widgets' );
		the_widget( 'WP_Widget_Recent_Posts' );
		?>

		<h2>Try one of these links</h2>
		<ul>
			<li><a href="https://my.butler.edu">my.butler.edu</a></li>
			<li><a href="https://my-test.butler.edu/quick-links/">Popular Butler Sites</a></li>
			<li><a href="https://my-test.butler.edu/student-links/">Student Links</a></li>
			<li><a href="https://csprd.butler.edu/psp/ps/EMPLOYEE/SA/c/NUI_FRAMEWORK.PT_LANDINGPAGE.GBL?NAVSTACK=Clear">PeopleSoft Campus Solutions</a></li>
			<li><a href="https://hrprd.butler.edu/psc/ps/EMPLOYEE/HRMS/c/NUI_FRAMEWORK.PT_LANDINGPAGE.GBL?NAVSTACK=Clear">PeopleSoft HR/Payroll</a></li>
			<li><a href="https://fnliv.butler.edu/psc/fprd/EMPLOYEE/ERP/c/NUI_FRAMEWORK.PT_LANDINGPAGE.GBL?">PeopleSoft Financials</a></li>
		</ul>
	</div><!-- .page-content -->
</section><!-- .error -->
