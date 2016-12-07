<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @packageEphic
 */
$footer_text = get_theme_mod( 'footer_text', esc_html__('Copyright &copy; 2016 EPHIC TEMPLATE', 'ephic') );
?>

	</main><!-- #main content -->
	<?php do_action('ephic_before_footer'); ?>

	<a href="#" id="toparrow" class="totop"><i class="fa fa-long-arrow-up"> </i></a>

	<footer id="colophon" class="footer">
		<div class="container container-large">
			<div class="row">
				<div class="col-md-12 text-center">
					<p><?php echo wp_kses_post($footer_text);?></p>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php do_action('ephic_after_wrapper'); ?>

<?php wp_footer(); ?>

</body>
</html>
