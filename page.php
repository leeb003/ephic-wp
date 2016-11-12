<?php
/**
 *
 * The default template for all other pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @packageEphic
 */

get_header();
?>
	<?php do_action('before_page_header'); ?>
	<section id="top-section" class="top-section">
		<div class="page-template blog-header">
			<div class="blog-header-inner">
				<h1><?php echo get_the_title(); ?></h1>
			</div>
			<div class="blog-header-overlay">
			</div>
		</div>
	</section>
	<?php do_action('before_page_content'); ?>
	<!-- Blog -->
	<section class="blog-section">
		<div class="page-banner">
			<div class="page-banner-inner"><a href="<?php echo esc_url(home_url('/'));?>"><?php echo esc_html__('HOME', 'ephic');?></a>
				<span class="sep">&nbsp;&nbsp;/&nbsp;&nbsp;</span>
				<?php echo get_the_title(); ?>
			</div>
		</div>

		<div class="container container-large upper100">
			<div class="row">
				<!-- Main Blog -->
				<div class="col-xs-12 col-sm-12">
					<div class="page-content">
		<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
		?>
			</div><!-- .row -->
		</div><!-- .container -->
	</section>

<?php
get_footer();
