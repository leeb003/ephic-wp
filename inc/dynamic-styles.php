<?php
/**
 *	Dynamic style generation for Kirki to output
 * 
 */
/* Primary Color */
if( ! function_exists('ephic_accent_color') ){
function ephic_primary_color(){
	$output = array (
		array(
			'element'  => 'a, a:active',
			'property' => 'color',
		),
		array(
			'element'  => '.navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > li > a:hover,.navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:focus, .navbar-default .navbar-nav > li > a:focus',
			'property' => 'color',
		),
		array(
			'element'  => '.owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span',
			'property' => 'color',
		),
		array(
			'element'  => '.totop:hover, .totop:focus, .totop:active',
			'property' => 'color',
		),
		array(
			'element'  => '.totop:hover, .totop:focus, .totop:active',
			'property' => 'border-color',
		),
		array(
			'element'  => '.page-banner-inner a:hover',
			'property' => 'color',
		),
		array(
			'element'  => '.navbar.navbar-default .navbar-nav > li > a:hover',
			'property' => 'color',
		),
		array(
			'element'  => '.primary-btn',
			'property' => 'background-color'
		),
		array( 
			'element'  => '.primary-btn',
			'property' => 'border-color'
		),
		array( 
			'element'  => '.primary-btn:hover, .primary-btn:focus, .primary-btn:active',
			'property' => 'color'
		),
		array(
			'element'  => '.primary-btn:hover, .primary-btn:focus, .primary-btn:active',
			'property' => 'border-color'
		),
		array(
			'element'  => '.comment-form input[type="submit"]:hover, .comment-form input[type="submit"]:focus, .comment-form input[type="submit"]:active',
			'property' => 'color',
		),
		array(
			'element'  => '.comment-form input[type="submit"]',
			'property' => 'border-color',
		),
		array(
			'element'  => '.tags ul li a:hover',
			'property' => 'border-color',
		),
		array(
			'element'  => '.tags ul li a:hover',
			'property'  => 'background-color',
		),
		array( 
			'element'  => '.features i',
			'property' => 'color'
		),		
		array(
			'element'  => 'ul.filter > li > a:hover, ul.filter > li > a:hover, ul.filter > li.active a',
			'property' => 'color'
		),
		array(
			'element'  => '.bl-title h3',
			'property' => 'color'
		),
		array(
			'element'  => '.entry-title a:hover, .entry-title a:active, .entry-title a:focus',
			'property' => 'color'
		),
		array( 
			'element'  => 'h2.colorh, .stat.colorh',
			'property' => 'color'
		),
		array(
			'element'  => '.search-form .submits:hover',
			'property' => 'background-color'
		),
		array(
			'element'  => '.search-form .submits:hover',
			'property' => 'border-color'
		),
		array(
			'element'  => '.blog-post a',
			'property' => 'color'
		),
		array(
			'element'  => '.blog-post .featured',
			'property' => 'color',
		),
		array(
			'element'  => 'ul.social-links li a:active, ul.social-links li a:focus, ul.social-links li a:hover',
			'property' => 'background-color'
		),
		array(
			'element'  => '#text404',
			'property' => 'fill'
		),
		array(
			'element'  => '.intro-info .col-md-4:hover i, .services-icons .col-md-4:hover i',
			'property' => 'color'
		),
		array(
			'element'  => '.blog-header-inner h1::after',
			'property' => 'border-color'
		),
		array(
			'element'  => '.blog-sidebar a:hover',
			'property' => 'color'
		),
		array(
			'element'  => '.search-form .submits:hover',
			'property' => 'background-color'
		),
		array(
			'element'  => '.search-form .submits:hover',
			'property' => 'border-color'
		),
		array(
			'element'  => '.comment-actions a:hover',
			'property' => 'background-color'
		),	
		array(
			'element'  => '.comment-meta-content cite a:hover, .comment-meta-content p a:hover',
			'property' => 'color'
		),
		array(
			'element'  => '.comment-form input[type="submit"]',
			'property' => 'background-color'
		),
		array(
			'element'  => '.dropdown-menu',
			'property' => 'border-top',
			'prefix'   => '1px solid',
		),
		array( 
			'element'  => '.dropdown-menu > li > a:focus, .dropdown-menu > li > a:hover',
			'property' => 'color',
		),
		array(
			'element'  => '.navbar-default .navbar-nav > li::before, .navbar-default .navbar-nav > li > a::before, .navbar-default .navbar-nav > li > a::after',
			'property' => 'background',
			'media_query' => '@media (min-width: 991px)'
		),
	);
	return $output;
}}

