<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @packageEphic
 */

get_header();
$sidebar_pos = get_theme_mod('blog_sidebar');
$main_class = 'col-md-8 col-lg-9';
$sidebar_class = '';
$no_sidebar = false;
if ($sidebar_pos == 'left') {
		$main_class .= ' pull-right';
		$sidebar_class = 'left-sidebar';
} elseif ($sidebar_pos == 'nosidebar') {
		$main_class = 'col-sm-12';
		$no_sidebar = true;
}
$home_url = '<a href="' . esc_url(home_url('/')) . '">' . esc_html__('HOME', 'ephic') . '</a>';
$breadcrumb = esc_html__('ARCHIVES', 'ephic');
?>
	<?php do_action('before_archive_header'); ?>
	<section id="top-section" class="top-section">
		<div class="blog-header">
			<div class="blog-header-inner">
				<h1><?php the_archive_title(); ?></h1>
			</div>
		<div class="blog-header-overlay">
			</div>
		</div>
	</section>
	<?php do_action('before_archive_content'); ?>
	<!-- Blog -->
	<section class="blog-section">
		<div class="page-banner">
			<div class="page-banner-inner">
		<?php if (is_rtl()) { // RTL ?>
				<?php echo $breadcrumb; ?>
				<span class="sep">&nbsp;&nbsp;/&nbsp;&nbsp;</span>
				<?php echo $home_url;?>
		<?php } else { ?>		
				<?php echo $home_url; ?>
				<span class="sep">&nbsp;&nbsp;/&nbsp;&nbsp;</span>
				<?php echo $breadcrumb;?>
		<?php } ?>
			</div>
		</div>

		<div class="container container-large upper100">
			<div class="row">
				<!-- Main Blog -->
				<div class="col-xs-12 col-sm-12 <?php echo $main_class;?>">
					<div class="blog-content">

		<?php
		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

					</div><!--.blog-content-->
				</div><!-- .col-lg-9 -->

		<?php if (!$no_sidebar) { // if sidebar is set to left or right ?>
				<!-- Blog Sidebar -->
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
					<div class="blog-sidebar <?php echo $sidebar_class; ?>">
						<?php get_sidebar(); ?>
					</div>
				</div> <!-- \sidebar -->
		<?php } ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</section>				
<?php
get_footer();
