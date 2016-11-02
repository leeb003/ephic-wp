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
	<?php do_action('before_home_header'); ?>
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
							<div class="row">
								<div class="col-md-8 col-sm-8 col-xs-10 top-info-sect">
									<h1><?php echo wp_kses_post($v['home_slide_large'], '');?></h1>
									<p><?php echo wp_kses_post($v['home_slide_small'], '');?></p>
								</div>
							</div>
						</div>
						<div class="text-center">
							<a href="#scroll-down" class="scroll-down">&#8592;&nbsp; <?php echo esc_html('SCROLL DOWN', 'ephic'); ?></a>
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
					<a href="#scroll-down" class="scroll-down">&#8592;&nbsp; <?php echo esc_html('SCROLL DOWN', 'ephic');?></a>
				</div>
			</div>
		</section><!-- End top section / single image -->	

	<?php } ?>

	<?php do_action('before_home_content'); ?>

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
				<div class="row">
					<?php 
					$parallax_class = 'col-md-8 col-sm-8 col-xs-10 parallax-info'; // default left
					if (get_theme_mod( 'parallax_text_side', '') == 'right') {
						$parallax_class = "col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-12 parallax-info"; // right
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
                <div class="row">
                    <?php
                    $parallax_class = 'col-md-8 col-sm-8 col-xs-10 parallax-info'; // default left
                    if (get_theme_mod( 'parallax2_text_side', '') == 'right') {
                        $parallax_class = "col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-12 parallax-info"; // right
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
                <div class="row">
                    <?php
                    $parallax_class = 'col-md-8 col-sm-8 col-xs-10 parallax-info'; // default left
                    if (get_theme_mod( 'parallax3_text_side', '') == 'right') {
                        $parallax_class = "col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-12 parallax-info"; // right
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
		} elseif ($v['section'] == 'gallery') { // Gallery ?>

	<section id="images" class="media portfolio-section port-col">
    	<div class="overlay-col">
        	<div class="container">
            	<h2 class="sectionh"><?php echo esc_html(get_theme_mod('gallery_title', ''));?></h2>
               	<p><?php echo esc_html(get_theme_mod('gallery_text', ''));?></p>
                <div class="row">
                  	<div class="col-md-12">
                       	<div id="isotope-filters2" class="filter-container isotopeFilters2">
                           	<ul class="list-inline filter">
                               	<li class="active"><a href="#" data-filter="*"><?php echo esc_html__('All', 'ephic');?></a></li>
				<?php
				// list terms in a given taxonomy
				$taxonomy = 'tfnphotocat';
				$tax_terms = get_terms($taxonomy);
				foreach ($tax_terms as $tax_term) { 
				?>
                                <li><a href="#" data-filter=".<?php echo $tax_term->slug;?>"><?php echo $tax_term->name; ?></a></li>
				<?php
				} // end categories link display
				?>
                            </ul>
                        </div>
                    </div>
                </div> <!-- End Filter -->
				<div class="row photos-row">
					<div id="isotope-container2" class="isotopeContainer2">

				<?php
				// display the gallery images
				$photo = '';
				$args = array(
            		'post_type' => 'photo_entry',
					'order'	=> 'ASC',
        		);

        		$my_query = new WP_Query( $args );
				$i = 0;
        		while ( $my_query->have_posts() ) : $my_query->the_post();
            		$i++;
					$column = 'col-sm-6';
					if ($i > 2) {
						$column = 'col-sm-4';
					}
            		// Pull category for each unique post using the ID 
            		$terms = get_the_terms( $post->ID, 'tfnphotocat' );

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
                                    <img src="<?php echo $full_image_url;?>" alt="">
                                    <div class="overlay-background">
                                        <div class="inner"></div>
                                    </div>
                                    <div class="overlay">
                                        <div class="inner-overlay">
                                            <div class="inner-overlay-content with-icons">
                                                <a title="<?php echo $title; ?>" class="fancybox-pop" data-fancybox-group="<?php echo $tax; ?>" href="<?php echo $full_image_url; ?>"><span class="crosshair"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </figure>
                                <div class="article-title"><a href="#"><?php echo $title; ?></a></div>
                            </article>
                        </div> <!-- End isotopeSelector -->
				
		<?php
        endwhile;
        wp_reset_query()
		?>
					</div> <!-- End Isotope Container -->
				</div> <!-- End Row -->
            </div> <!-- End Container -->
        </div> <!-- End Overlay -->
    </section>
			<?php
			if (get_theme_mod('gallery_banner_enable', '') == 'enable') { ?>
	<!-- Virtual Tour Section -->
    <section class="virtual">
    	<div class="container-fluid color-back">
        	<div class="row text-center">
            	<div class="col-md-12">
                	<span><?php echo esc_html(get_theme_mod('gallery_banner_text', '')); ?></span>
					<a href="<?php echo esc_url(get_theme_mod('gallery_banner_btn_link', '')); ?>" target="_<?php echo esc_html(get_theme_mod('gallery_banner_btn_window', '')); ?>" class="vtour btn-pri"><?php echo esc_html(get_theme_mod('gallery_banner_btn_text', '')); ?></a>
                </div>
            </div>
		</div>
    </section>
			<?php
			}
			?>

	<?php
		} elseif ($v['section'] == 'additional') {
	?>
	<!-- Additional Information Section -->
    <section class="additional">
    	<div class="container">
        	<div class="row text-center">
            	<div class="col-md-12">
                	<h2 class="sectionh"><?php echo esc_html(get_theme_mod('additional_title', '')); ?></h2>
                    <p><?php echo esc_html(get_theme_mod('additional_text', '')); ?></p>
                </div>
            </div>
            <div class="row additional-items">
            	<div class="col-xs-6 col-sm-6 col-md-3">
                	<div class="add-item">
                    	<div class="add-inner">
                        	<i class="<?php echo esc_html(get_theme_mod('additional_1_icon', '')); ?>"></i><br />
                            <span><?php echo esc_html(get_theme_mod('additional_1_text', '')); ?></span>
                        </div>
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="add-item">
                        <div class="add-inner">
                            <i class="<?php echo esc_html(get_theme_mod('additional_2_icon', '')); ?>"></i><br />
                            <span><?php echo esc_html(get_theme_mod('additional_2_text', '')); ?></span>
                        </div>
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="add-item">
                        <div class="add-inner">
                            <i class="<?php echo esc_html(get_theme_mod('additional_3_icon', '')); ?>"></i><br />
                            <span><?php echo esc_html(get_theme_mod('additional_3_text', '')); ?></span>
                        </div>
                    </div>
                </div>
				<div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="add-item">
                        <div class="add-inner">
                            <i class="<?php echo esc_html(get_theme_mod('additional_4_icon', '')); ?>"></i><br />
                            <span><?php echo esc_html(get_theme_mod('additional_4_text', '')); ?></span>
                        </div>
                    </div>
                </div>
			</div>
            <div class="row text-center">
            	<div class="col-md-12">
                  	<a class="btn-sec" 
					   href="<?php echo esc_url(get_theme_mod('additional_btn_link', '')); ?>" 
					   target="<?php echo esc_html(get_theme_mod('additional_btn_window', '')); ?>"><?php echo esc_html(get_theme_mod('additional_btn_text', '')); ?></a>
                </div>
            </div>
        </div>
	</section>
	<?php
		} elseif ($v['section'] == 'posts') {
			$args = array(
				'numberposts' => get_theme_mod('posts_number', '2'),
				'order'       => get_theme_mod('posts_sort', 'asc'),
			);
			$postslist = get_posts( $args );
	?>
	<!-- Blog Section -->
    <section id="blog" class="blog-posts">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="sectionh"><?php echo esc_html(get_theme_mod('posts_title', '')); ?></h2>
                    <p><?php echo esc_html(get_theme_mod('posts_text', '')); ?></p>
                </div>
            </div>
			<div class="posts-container">

		<?php
			$i = 1;
			foreach ( $postslist as $post ) {
				//echo '<p>' . print_r($post) . '</p>';
				$featured = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				$partial_content = strip_shortcodes($post->post_content);
				$partial_content = wp_trim_words( $partial_content, 35, '...');
				$theme_resources = new tfn_theme_resources;
				$meta = $theme_resources->tfn_meta($post, 'posts_atts'); // pass the post array and theme option to get
				if ($i&1) { // odd entries
		?>
				<div class="row vcenter">
					<div class="col-md-6 col-xs-12 post-image">
						<div class="bl-entry-img">
							<img class="img-responsive" src="<?php echo $featured; ?>" alt="" />
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div class="post-content">
							<div class="bl-title">
								<h3><?php echo $post->post_title;?></h3>
							</div>
							<div class="bl-excerpt">
								<p><?php echo $partial_content; ?></p>
							</div>
							<?php echo implode(' ', $meta);?>
							<a href="<?php echo get_permalink($post->ID);?>" 
								class="readmore"><?php echo esc_html__('Read more', 'ephic');?></a>
						</div>
					</div>
				</div>
				<?php
				} else { // even entries
				?>
				<div class="row vcenter">
					<div class="col-md-6 col-xs-12 pull-left">
						<div class="post-content">
							<div class="bl-title">
								<h3><?php echo $post->post_title;?></h3>
							</div>
							<div class="bl-excerpt">
								<p><?php echo $partial_content; ?></p>
							</div>
							<a href="<?php echo get_permalink($post->ID);?>" 
								class="readmore"><?php echo esc_html__('Read more', 'ephic');?></a>
							<?php echo implode(' ', array_reverse($meta, true));?>
						</div>
					</div>
					<div class="col-md-6 col-xs-12 post-image">
						<div class="bl-entry-img">
							<img class="img-responsive" src="<?php echo $featured; ?>" alt="" />
						</div>
					</div>
				</div>
				<?php 
				} // end odd even check
				$i++;
			} // end foreach post loop
			?>

			</div> <!-- /post container -->
		</div> <!-- /container -->
	</section>

		<?php			
		} elseif ($v['section'] == 'agent') {
		?>
	<!-- Agent Section -->
	<section id="agent" class="agent">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="sectionh"><?php echo esc_html(get_theme_mod('agent_title', '')); ?></h2>
					<p><?php echo esc_html(get_theme_mod('agent_desc', '')); ?></p>
				</div>
			</div>
			<div class="row vcenter agent-info">
				<div class="col-md-6 col-sm-12">
					<img class="img-responsive" src="<?php echo esc_html(get_theme_mod('agent_photo', ''));?>" alt="" />
				</div>
				<div class="col-md-6 text-left agent-details">
					<h3><?php echo esc_html(get_theme_mod('agent_name', '')); ?></h3>
					<span><?php echo esc_html(get_theme_mod('agent_cred', '')); ?></span>
					<p><?php echo esc_html(get_theme_mod('agent_info', '')); ?></p>
					<a class="btn-third" href="<?php echo esc_url(get_theme_mod('agent_btn_link', '')); ?>" target="_<?php echo esc_html(get_theme_mod('agent_btn_window', '')); ?>"><?php echo esc_html(get_theme_mod('agent_btn_text', '')); ?></a>
				</div>
			</div>
		</div>
			<?php
			if (get_theme_mod('agent_infobar', '') == 'enable') { // show infobar
			?>
		<div class="contact-items">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-4">
						<div class="icon-ring"><i class="fa <?php echo esc_html(get_theme_mod('agent_1_icon', ''));?>"></i></div>
						<p class="text"><?php echo esc_html(get_theme_mod('agent_1_text', ''));?></p>
					</div>
					<div class="col-md-6 col-lg-4">
						<div class="icon-ring"><i class="fa <?php echo esc_html(get_theme_mod('agent_2_icon', ''));?>"></i></div>
						<p class="text"><?php echo esc_html(get_theme_mod('agent_2_text', ''));?></p>
					</div>
					<div class="col-md-6 col-lg-4">
						<div class="icon-ring"><i class="fa <?php echo esc_html(get_theme_mod('agent_3_icon', ''));?>"></i></div>
						<p class="text"><?php echo esc_html(get_theme_mod('agent_3_text', ''));?></p>
					</div>
				</div>
			</div>
		</div>
			<?php
			} // end infobar display
			?>

			<?php
			if (get_theme_mod('agent_map', '') == 'enable') { // map display
			?>

		<div class="container-fluid">
			<div class="row">
				<div class="map-holder">
					<div id="mapSection"></div>
				</div>
			</div>
		</div>
			<?php
			} // end map display
			?>
	</section>
		<?php
		} elseif ($v['section'] == 'builder') {
			$builder_page = get_post(intval($v['page'])); ?>
	<section id="home-pb-<?php echo $v['page']; ?>">
		<div class="container">
			<?php echo do_shortcode($builder_page->post_content);?>
		</div>
	</section>
		<?php } // end page builder section ?>


	<?php } // end page sections ?>

	<?php do_action('after_home_content'); ?>

<?php
get_footer();
