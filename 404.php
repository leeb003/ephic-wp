<?php
/**
 * The 404 template file.
 *
 * This is the page not found page template
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @packageEphic
 */

get_header(); 
$home_url = '<a href="' . esc_url(home_url('/')) . '">' . esc_html__('HOME', 'ephic') . '</a>';
$breadcrumb = esc_html__('NOT FOUND', 'ephic');
?>
<div class="wrapper">
	<main>
		<section id="top-section" class="top-section">
			<div class="four-header"> 
				<div class="four-header-inner"></div>
				<div class="four-header-overlay"></div>
			</div>
		</section>
		<!-- content -->
		<section class="page-section">
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
			<div class="container-fluid upper100 page-not-found">
				<div class="row">
					<div class="col-md-12">
						<div class="text-center">
							<h2><?php echo esc_html(get_theme_mod('page_404_heading', ''));?></h2>
						</div>
					</div>
				</div>
			</div>
			<div class="container container-large">
				<div class="row">
					<div class="col-md-12">
						<!-- Main Section -->
						<div class="page-content text-center">
							<svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
								<defs>
									<pattern id="img" patternUnits="userSpaceOnUse" width="100" height="100">
										<image xlink:href="<?php echo esc_url(get_theme_mod('background_text_404',''));?>" x="-25" width="150" height="100" />
									</pattern>
								</defs>
								<polygon id="hex404" points="50 1 95 25 95 75 50 99 5 75 5 25" fill="url(#img)"/>
								<text id="text404" font-size="35" x="50" y="60" text-anchor="middle">404</text>
							</svg>
							<p class="upper40">
								<?php echo esc_html(get_theme_mod('page_404_desc', ''));?>
							</p>
						</div>
					</div><!-- End Main Section -->
				</div>
			</div>
		</section>
	</main>
	<?php get_footer(); ?>

