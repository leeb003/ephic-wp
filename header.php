<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @packageEphic
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<?php 
$theme_resources = new ephic_theme_resources();
$options = $theme_resources->return_options();
// print_r($options);
$menu_exists = $theme_resources->menu_check('tfn-primary');

$four_o_four = is_404();  // detect 404 page for display
$header_logo = get_theme_mod( 'header_logo', get_template_directory_uri() . '/img/nav-logo.png' );
?>

<body <?php body_class(); ?>>
<?php do_action('ephic_after_body'); ?>
<div class="wrapper">
	<header id="totop">
		<?php do_action('ephic_before_header'); ?>
		<div class="top-holder top-holder-fixed">
			<!-- Main Navigation -->
			<div class="main-menu">
				<nav class="navbar navbar-default">
					<div class="container container-large">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
								<span class="sr-only"><?php echo esc_html__('Toggle navigation', 'ephic');?></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) );?>">
								<div class="nav-logo">
									<img src="<?php echo esc_url($header_logo);?>" alt="<?php bloginfo('name'); ?>" class="navbar-logo img-responsive" />
								</div>
							</a>
						</div>
						<?php
						get_template_part('inc/wp_bootstrap_navwalker');
						$current = get_page_template_slug();
						wp_nav_menu( array(
							'menu'           => 'primary',
							'theme_location' => 'ephicprimary',
							'container' => 'div',
							'container_class' => 'collapse navbar-collapse',
							'container_id' => 'navbar',
							'depth' => 2,
							'menu_class' => 'nav navbar-nav',
							'fallback_cb'   => 'wp_bootstrap_navwalker::fallback',
							'walker' => new wp_bootstrap_navwalker(),
							'walker_arg' => $current
						));
						?>
					</div>
				</nav>
			</div> <!-- End Main Navigation -->
		</div> <!-- End Top Holder -->
	</header>
	<?php do_action('ephic_before_main_content'); ?>
	<main>
