<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper footer-style" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">
			<!-- OLD CONTENT (between col-12 > now 4)-->
			<!-- <footer class="site-footer" id="colophon"> -->
			<!-- <div class="site-info"> -->
			<!-- </div> //.site-info -->
			<!-- </footer> //#colophon -->

			<div id="left-footer-part" class="col-md-4 col-sm-12">
				<?php
					if ( is_active_sidebar( 'footer-widget-area-left' ) ) : ?>
					<div id="footer-widgetS-left" class="chw-widget-area widget-area" role="complementary">
						<?php dynamic_sidebar( 'footer-widget-area-left' ); ?>
					</div>
				<?php endif; ?>
			</div><!--col end -->

			<div id="mid-footer-part" class="col-md-4 col-sm-12">
				<?php
					if ( is_active_sidebar( 'footer-widget-area-mid' ) ) : ?>
					<div id="footer-widget-mid" class="chw-widget-area widget-area" role="complementary">
						<?php dynamic_sidebar( 'footer-widget-area-mid' ); ?>
					</div>
				<?php endif; ?>
			</div><!--col end -->

			<div id="right-footer-part" class="col-md-4 col-sm-12">
				<?php
					if ( is_active_sidebar( 'footer-widget-area-right' ) ) : ?>
					<div id="footer-widget-right" class="chw-widget-area widget-area" role="complementary">
						<?php dynamic_sidebar( 'footer-widget-area-right' ); ?>
					</div>
				<?php endif; ?>
			</div><!--col end -->
			
		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>