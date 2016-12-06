<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @packageEphic
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<?php do_action('ephic_before_sidebar'); ?>
<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
<?php do_action('ephic_after_sidebar'); ?>
