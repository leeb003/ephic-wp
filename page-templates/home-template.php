<?php
/**
 * Template Name: Ephic Home Page
 *
 * The template for displaying the home page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @packageEphic
 */

get_header(); 
$home_top = get_theme_mod( 'home_top', 'topimage' );
$home_slider = get_theme_mod( 'home_slider', '' );
$home_slides = get_theme_mod( 'home_slides', array());
$home_features = get_theme_mod( 'home_features', 'off');
$home_sections = get_theme_mod( 'home_sections', array());
?>
	<?php do_action('ephic_before_home_header'); ?>
	<?php if ($home_top == 'slider') { // Top Slider ?>
		<section id="top-section" class="top-section"> <!-- Top Carousel -->
			<div id="toTop"></div>
			<!--features -->
			<div id="owl-carousel-features" class="owl-carousel">
			<?php 
				$i = 1; 
				$slide_class = '';
			?>
			<?php foreach ($home_slides as $k => $v) { ?>
				<?php if ($i > 1) {
						$slide_class = 'main-image' . $i;
					  }
				?>
				<div class="slide">
					<div class="main-image <?php echo $slide_class; ?>"></div>
					<div class="top-info">
						<div class="container container-large">
							<div class="row less-gutter">
								<div class="col-md-8 col-sm-8 col-xs-10 top-info-sect">
									<h1><?php echo wp_kses_post($v['home_slide_large'], '');?></h1>
									<p><?php echo wp_kses_post($v['home_slide_small'], '');?></p>
								</div>
							</div>
						</div>
						<div class="text-center">
							<a href="#scroll-down" class="scroll-down">&#8592;&nbsp; <?php echo esc_html__('SCROLL DOWN', 'ephic'); ?></a>
						</div>
					</div>
				</div>
				<!-- End slide -->
				<?php $i++; ?>
			<?php } // end slides ?>
			</div><!-- end owl carousel -->
		</section>	
	
	<?php } else { // Top Image ?>
		<section id="top-section" class="top-section">
			<div id="toTop"></div>
			<div class="main-image"></div>
			<div class="top-info">
				<div class="container container-large">
					<div class="row">
						<div class="col-md-8 col-sm-8 col-xs-10 top-info-sect">
							<h1><?php echo wp_kses_post(get_theme_mod( 'home_si_large', '')); ?></h1>
							<p><?php echo wp_kses_post(get_theme_mod( 'home_si_small', '')); ?></p>
						</div>
					</div>
				</div>
				<div class="text-center">
					<a href="#scroll-down" class="scroll-down">&#8592;&nbsp; <?php echo esc_html__('SCROLL DOWN', 'ephic');?></a>
				</div>
			</div>
		</section><!-- End top section / single image -->	

	<?php } ?>

	<?php do_action('ephic_before_home_content'); ?>

	<?php foreach ($home_sections as $k => $v) { // cycle through the page sections for display ?>
		<?php if ($v['section'] == 'welcome') { ?>
	<section id="intro" class="section-margin">
		<div class="container container-large">
			<div class="row">
				<div class="col-md-12 text-center">
					<h2 class="sectionh colorh"><?php echo esc_html(get_theme_mod( 'welcome_title', '')); ?></h2>
					<p class="hdesc"><?php echo esc_html(get_theme_mod( 'welcome_desc', '')); ?></p>
				</div>
			</div>
			<div class="row upper40">
				<div class="col-md-6 text-right">
					<p><?php echo esc_html(get_theme_mod( 'welcome_left', ''));?></p>
				</div>
				<div class="col-md-6 intro-summary">
					<p><?php echo esc_html(get_theme_mod( 'welcome_right', ''));?></p>
				</div>
			</div>
			<div class="row intro-info">
				<div class="col-md-4 text-center">
					<div class="shape">
						<div class="hexagon">
							<i class="fa <?php echo esc_html(get_theme_mod( 'welcome_1_icon', ''));?>"></i>
						</div>
					</div>
					<h4><?php echo esc_html(get_theme_mod( 'welcome_1_title', ''));?></h4>
					<p><?php echo esc_html(get_theme_mod( 'welcome_1_text', ''));?></p>
				</div>
				<div class="col-md-4 text-center">
					<div class="shape">
						<div class="hexagon">
							<i class="fa <?php echo esc_html(get_theme_mod( 'welcome_2_icon', ''));?>"></i>
						</div>
					</div>
					<h4><?php echo esc_html(get_theme_mod( 'welcome_2_title', ''));?></h4>
					<p><?php echo esc_html(get_theme_mod( 'welcome_2_text', ''));?></p>
				</div>
				<div class="col-md-4 text-center">
					<div class="shape">
						<div class="hexagon">
							<i class="fa <?php echo esc_html(get_theme_mod( 'welcome_3_icon', '')); ?>"></i>
						</div>
					</div>
					<h4><?php echo esc_html(get_theme_mod( 'welcome_3_title', ''));?></h4>
					<p><?php echo esc_html(get_theme_mod( 'welcome_3_text', ''));?></p>
				</div>
			</div>
		</div>
	</section><!-- End Intro -->

	<?php
		} elseif ($v['section'] == 'parallax') { // Parallax 1 ?>
	<section id="parallax1" class="section-margin"><!-- Parallax -->
		<div class="parallax-window" data-parallax="scroll" data-image-src="<?php echo esc_url(get_theme_mod('parallax_bg', ''));?>">
			<div class="container container-large">
				<div class="row less-gutter">
					<?php 
					$parallax_class = 'col-md-8 col-sm-8 col-xs-10 parallax-info p-left'; // default left
					if (is_rtl()) {
						$parallax_class = 'col-md-5 col-sm-7 col-xs-10 parallax-info p-left'; // rtl default
					} 
					if (get_theme_mod( 'parallax_text_side', '') == 'right') {
						$parallax_class = "col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-12 parallax-info p-right"; // right
					} elseif (get_theme_mod( 'parallax_text_side', '') == 'center') {
						$parallax_class = "col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 parallax-info text-center"; // center
					}
					?>
					<div class="<?php echo $parallax_class;?>">
						<h1><?php echo wp_kses_post(get_theme_mod( 'parallax_large', ''));?></h1>
						<p><?php echo wp_kses_post(get_theme_mod( 'parallax_small', ''));?></p>
					</div>
				</div>
			</div>
		</div>
	</section><!-- End Parallax -->

	<?php
		} elseif ($v['section'] == 'parallax2') { // Parallax 2 ?>
	<section id="parallax2" class="section-margin"><!-- Parallax -->
		<div class="parallax-window" data-parallax="scroll" data-image-src="<?php echo esc_url(get_theme_mod('parallax2_bg', ''));?>">
			<div class="container container-large">
				<div class="row less-gutter">
					<?php
					$parallax_class = 'col-md-8 col-sm-8 col-xs-10 parallax-info p-left'; // default left
					if (is_rtl()) {
						$parallax_class = 'col-md-5 col-sm-7 col-xs-10 parallax-info p-left'; // rtl default
					} 
					if (get_theme_mod( 'parallax2_text_side', '') == 'right') {
						$parallax_class = "col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-12 parallax-info p-right"; // right
					} elseif (get_theme_mod( 'parallax2_text_side', '') == 'center') {
						$parallax_class = "col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 parallax-info text-center"; // center
					}
					?>
					<div class="<?php echo $parallax_class;?>">
						<h1><?php echo wp_kses_post(get_theme_mod( 'parallax2_large', ''));?></h1>
						<p><?php echo wp_kses_post(get_theme_mod( 'parallax2_small', ''));?></p>
					</div>
				</div>
			</div>
		</div>
	</section><!-- End Parallax 2 -->

	<?php
		} elseif ($v['section'] == 'parallax2') { // Parallax 3 ?>
	<section id="parallax3" class="section-margin"><!-- Parallax -->
		<div class="parallax-window" data-parallax="scroll" data-image-src="<?php echo esc_url(get_theme_mod('parallax3_bg', ''));?>">
			<div class="container container-large">
				<div class="row less-gutter">
					<?php
					$parallax_class = 'col-md-8 col-sm-8 col-xs-10 parallax-info p-left'; // default left
					if (is_rtl()) {
						$parallax_class = 'col-md-5 col-sm-7 col-xs-10 parallax-info p-left'; // rtl default
					} 
					if (get_theme_mod( 'parallax3_text_side', '') == 'right') {
						$parallax_class = "col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-12 parallax-info p-right"; // right
					} elseif (get_theme_mod( 'parallax3_text_side', '') == 'center') {
						$parallax_class = "col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 parallax-info text-center"; // center
					}
					?>
					<div class="<?php echo $parallax_class;?>">
						<h1><?php echo wp_kses_post(get_theme_mod( 'parallax3_large', ''));?></h1>
						<p><?php echo wp_kses_post(get_theme_mod( 'parallax3_small', ''));?></p>
					</div>
				</div>
			</div>
		</div>
	</section><!-- End Parallax 3 -->

	<?php 
		} elseif ($v['section'] == 'services') { // Services 
			/* Build array to loop through for icons */
			$services = array(
				'1' => array(
					'icon'	=> esc_html(get_theme_mod('services_1_icon')),
					'title' => esc_html(get_theme_mod('services_1_title')),
					'text'	=> esc_html(get_theme_mod('services_1_text')),
				),
				'2' => array(
					'icon'	=> esc_html(get_theme_mod('services_2_icon')),
					'title' => esc_html(get_theme_mod('services_2_title')),
					'text'	=> esc_html(get_theme_mod('services_2_text')),
				),
				'3' => array(
					'icon'	=> esc_html(get_theme_mod('services_3_icon')),
					'title' => esc_html(get_theme_mod('services_3_title')),
					'text'	=> esc_html(get_theme_mod('services_3_text')),
				),
				'4' => array(
					'icon'	=> esc_html(get_theme_mod('services_4_icon')),
					'title' => esc_html(get_theme_mod('services_4_title')),
					'text'	=> esc_html(get_theme_mod('services_4_text')),
				),
				'5' => array(
					'icon'	=> esc_html(get_theme_mod('services_5_icon')),
					'title' => esc_html(get_theme_mod('services_5_title')),
					'text'	=> esc_html(get_theme_mod('services_5_text')),
				),
				'6' => array(
					'icon'	=> esc_html(get_theme_mod('services_6_icon')),
					'title' => esc_html(get_theme_mod('services_6_title')),
					'text'	=> esc_html(get_theme_mod('services_6_text')),
				),
			); ?>
	<section id="services" class="section-margin"><!-- Services -->
		<div class="container container-large">
			<div class="row">
				<div class="col-md-12 text-center">
					<h2 class="sectionh"><?php echo esc_html(get_theme_mod('services_title'));?></h2>
					<p class="hdesc"><?php echo esc_html(get_theme_mod('services_text'));?></p>
				</div>
			</div>
			<div class="row services-icons">
				<?php 
				foreach ($services as $k => $v) { 
					if ($v['title']) { // Only if we have a title ?>
				<div class="col-md-4 text-center">
					<div class="shape">
						<div class="hexagon">
							<i class="fa <?php echo esc_html($v['icon']);?>"></i>
						</div>
					</div>
					<h4><?php echo esc_html($v['title']);?></h4>
					<p><?php echo esc_html($v['text']);?></p>
				</div>

				<?php
					}
				}
				?>
			</div>
			<div class="row">
				<?php if (get_theme_mod('services_btn_text')) { // only if there is text in the button display ?>
				<div class="col-md-12 text-center upper60">
					<a href="<?php echo esc_url(get_theme_mod('services_btn_link', '#'));?>" 
						target="_<?php echo esc_html(get_theme_mod('services_btn_window', 'self'));?>"
						class="primary-btn"><?php echo esc_html(get_theme_mod('services_btn_text', ''));?></a>
				<?php } ?>
				</div>
				<div class="col-md-12">
					<div class="section-border upper100"></div>
				</div>
			</div>
		</div>	
	</section><!-- End Services -->

	<?php
		} elseif ($v['section'] == 'projects') { // Projects Gallery ?>

	<section id="gallery" class="gallery section-margin">
		<div class="container container-large">
			<div class="row">
				<div class="col-md-12 text-center">
					<h2 class="sectionh"><?php echo esc_html(get_theme_mod('projects_title', ''));?></h2>
					<p><?php echo esc_html(get_theme_mod('projects_text', ''));?></p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12 text-center">
					<div id="isotope-filters" class="filter-container isotopeFilters2">
						<ul class="list-inline filter">
				<?php
				// list terms in a given taxonomy
				$taxonomy = 'ephic_projectcat';
				$tax_terms = get_terms($taxonomy);
				$tax_count = count($tax_terms);
				$i = 1;
				?>
								<li class="active"><a href="#" data-filter="*"><?php echo esc_html__('All', 'ephic');?></a></li>
				<?php
				if ($tax_count > 0) {
					echo '<li class="sep"> / </li>';
				}
				foreach ($tax_terms as $tax_term) { 
				?>
								<li><a href="#" data-filter=".<?php echo $tax_term->slug;?>"><?php echo $tax_term->name; ?></a></li>

				<?php
					if ($i != $tax_count) {
						echo '<li class="sep"> / </li>';
					}
					$i++;
				} // end categories link display
				?>
						</ul>
					</div>
				</div>
			</div> <!-- Isotope Selector -->
		</div>

		<div class="container-fluid">
			<div class="row">
				<div id="isotope-container" class="isotopeContainer">
				<?php
				// display the gallery images
				$photo = '';
				$args = array(
					'post_type' => 'project_entry',
					'order'	=> 'ASC',
				);

				$my_query = new WP_Query( $args );
				$i = 0;
				while ( $my_query->have_posts() ) : $my_query->the_post();
					$i++;
					$column = 'col-md-4 col-sm-6 nopadding';
					// Pull category for each unique post using the ID 
					$terms = get_the_terms( $post->ID, 'ephic_projectcat' );
					$gallery_date = get_the_date('', $post->ID);

					if ( $terms && ! is_wp_error( $terms ) ) {

						$links = array();

						foreach ( $terms as $term ) {
							$links[] = $term->slug;
						}

						$tax_links = join( " ", $links);
						$tax = $tax_links;
					} else {
						$tax = '';
					}
					preg_match("/^\S+/", $tax, $first_tax);

					$thumbnail = get_the_post_thumbnail($post->ID);
					//get post thumbnail id
					$image_id = get_post_thumbnail_id();
					//go get image attributes [0] => url, [1] => width, [2] => height
					$image_url = wp_get_attachment_image_src($image_id,'', true);
					$full_image_url = $image_url[0];
					$title = get_the_title($post->ID);
			?>
					<div class="<?php echo $column; ?> isotopeSelector <?php echo $tax; ?>">
						<article class="">
							<figure>
								<img src="<?php echo $full_image_url;?>" alt="" />
								<div class="overlay-background">
									<div class="inner"></div>
								</div>
								<div class="overlay">
									<div class="inner-overlay">
										<div class="inner-overlay-content">
											<a title="<?php echo $title; ?>" class="fancybox-pop" data-fancybox-group="<?php echo $tax; ?>" href="<?php echo $full_image_url; ?>">
												<div class="image-info"><i>"<?php echo $title;?>"</i>
													<p class="image-group"><?php echo ucfirst($first_tax[0]);?> - <?php echo $gallery_date;?></p>
												</div>
											</a>
										</div>
									</div>
								</div>
							</figure>
						</article>
					</div> <!-- End isotopeSelector -->
				
		<?php
		endwhile;
		wp_reset_query()
		?>
				</div> <!-- End Isotope Container -->
			</div> <!-- End Row -->
		</div> <!-- End Container -->
	</section>
	<?php
		$statistics = get_theme_mod('stats', array());
		$stat_count = count($statistics);
		if ($stat_count > 0) { ?>
	<section id="stats" class="stats section-margin"><!-- Statistics -->
		<div class="container container-large">
			<div class="row">
		<?php
			$i = 0;
			foreach ($statistics as $k => $v) {
				$extra_class = '';
				if ($i&1) {
					$extra_class = 'colorh';
				}	
				$i++;
		?>
				<div class="col-md-3 col-sm-6 text-center stat-div">
					<span class="stat <?php echo $extra_class;?>" data-start="1" data-stop="<?php echo intval($v['number']);?>" 
					data-speed="1500">1</span>
					<?php echo esc_html($v['text']); ?>
				</div>	

		<?php
			} // foreach
		} // if 
		?>
			</div>
			
			<div class="row">
				<div class="section-border upper100"></div>
			</div>
		</div>
	</section>
	
	<?php 
		} elseif ($v['section'] == 'about') {
	?>
	<!-- About Section -->
	<section id="about" class="section-margin">
		<div class="container container-large">
			<div class="row">
				<div class="col-md-12 text-center">
					<h2 class="sectionh colorh"><?php echo esc_html(get_theme_mod('about_title', ''));?></h2>
					<p class="hdesc"><?php echo esc_html(get_theme_mod('about_text', ''));?></p>
				</div>
			</div>
			<div class="row upper40">
				<div class="col-md-12 text-center">
					<svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
						<defs>
							<pattern id="img" patternUnits="userSpaceOnUse" width="100" height="100">
								<image xlink:href="<?php echo esc_url(get_theme_mod('about_photo', get_template_directory_uri() . '/img/author.png'));?>" x="-25" width="150" height="100" />
							</pattern>
						</defs>
						<polygon id="hex" points="50 1 95 25 95 75 50 99 5 75 5 25" fill="url(#img)"/>
					</svg>	
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center upper40">
					<h4><?php echo esc_html(get_theme_mod('about_small_title', ''));?></h4>
					<?php echo	wp_kses_post(get_theme_mod('about_lower_text', ''));?>
					<div class="upper40">
						<img class="img-responsive center-block" 
							src="<?php echo esc_url(get_theme_mod('about_signature', get_template_directory_uri() . '/img/signature.png'));?>" alt="" />
						<ul class="social-links">
						<?php 
						$about_social = get_theme_mod('about_social_pick', array());
						if (count($about_social > 0)) {
							foreach ($about_social as $k => $v) {
						?>
							<li>
								<a href="<?php echo esc_url($v['social_url']);?>" target="_blank">
									<i class="fa <?php echo esc_html($v['social_choice']);?>"></i>
								</a>
							</li>
						<?php
							} //foreach
						} // if
						?>
						</ul>
					</div>
				</div>
			</div>
		</div><!-- container -->
		<div class="about-details upper60">
			<?php if (get_theme_mod('about_infobar') == 'enable') { ?>
			<div class="container container-large">
				<div class="about-row row">
					<div class="col-md-4">
						<i class="fa <?php echo esc_html(get_theme_mod('about_1_icon'));?>"></i><span class="vertical-sep"></span>
						<div class="details">
							<span class="detail-top"><?php echo esc_html(get_theme_mod('about_1_title'));?></span>
							<span class="detail-bot"><?php echo esc_html(get_theme_mod('about_1_text'));?></span>
						</div>
					</div>
					<div class="col-md-4">
						<i class="fa <?php echo esc_html(get_theme_mod('about_2_icon'));?>"></i><span class="vertical-sep"></span>
						<div class="details">
							<span class="detail-top"><?php echo esc_html(get_theme_mod('about_2_title'));?></span>
							<span class="detail-bot"><?php echo esc_html(get_theme_mod('about_2_text'));?></span>
						</div>
					</div>
					<div class="col-md-4">
						<i class="fa <?php echo esc_html(get_theme_mod('about_3_icon'));?>"></i><span class="vertical-sep"></span>
						<div class="details">
							<span class="detail-top"><?php echo esc_html(get_theme_mod('about_3_title'));?></span>
							<span class="detail-bot"><?php echo esc_html(get_theme_mod('about_3_text'));?></span>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</section>
		<?php 
		} elseif ($v['section'] == 'contact') {
			$contact_form = get_theme_mod( 'contact_form_shortcode', '' );
		?>
	<section id="contact" class="section-margin">
		 <div class="container container-large">
			<div class="row">
				<div class="col-md-12 text-center">
					<h2 class="sectionh"><?php echo esc_html(get_theme_mod('contact_title', ''));?></h2>
					<p class="hdesc"><?php echo esc_html(get_theme_mod('contact_text', ''));?></p>
				</div>
			</div>
			<div class="row upper80">
				<?php echo do_shortcode($contact_form);?>
			</div>
		</div>
	</section>



		<?php
		} elseif ($v['section'] == 'builder') {
			$builder_page = get_post(intval($v['page'])); ?>
	<section id="home-pb-<?php echo $v['page']; ?>">
		<div class="container container-large">
			<?php echo do_shortcode($builder_page->post_content);?>
		</div>
	</section>
		<?php } // end page builder section ?>


	<?php } // end page sections ?>

	<?php do_action('ephic_after_home_content'); ?>

<?php
get_footer();
