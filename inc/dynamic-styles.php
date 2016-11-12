<?php
/**
 *  Dynamic style generation for Kirki to output
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
            'element'  => '.alert-status',
            'property' => 'background-color'
        ),
        array(
            'element'  => '.alert-status',
            'property' => '.border-color'
        ),
        array(
            'element'  => '.infoblock h3:after',
            'property' => 'border-color'
        ),
        array(
            'element'  => '.infoblock ul li:before, .infoblock ul li::after',
            'property' => 'color'
        ),
        array(
            'element'  => 'a.detail-switch i',
            'property' => 'background-color'
        ),
        array(
            'element'  => '.sqft',
            'property' => 'color'
        ),
		array(
			'element'  => '.navbar.navbar-default .navbar-nav > li > a:hover',
			'property' => 'color',
		),
        array(
            'element'  => '.btn-sec',
            'property' => 'background-color'
        ),
        array(
            'element'  => '.btn-sec',
            'property' => 'border-color'
        ),
        array(
            'element'  => '.btn-third',
            'property' => 'border-color'
        ),
        array(
            'element'  => '.btn-third',
            'property' => 'color'
        ),
		array(
			'element'  => '.top-cta',
			'property' => 'background-color'
		),
		array( 
			'element'  => '.features i',
			'property' => 'color'
		),		
		array(
			'element'  => '.decagon .rct',
			'property' => 'background-color'
		),
		array(
			'element'  => '.add-item i',
			'property' => 'color'
		),
		array(
			'element'  => 'ul.filter > li > a:hover, ul.filter > li > a:hover, ul.filter > li.active a',
			'property' => 'color'
		),
		array(
			'element'  => '.bl-date',
			'property' => 'background-color'
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
			'element'  => '.agent-info h3',
			'property' => 'color'
		),
		array(
			'element'  => '.contact-items',
			'property' => 'background-color'
		),
		array(
			'element'  => '.owl-carousel-agents .owl-prev, .owl-carousel-agents .owl-next',
			'property' => 'border-color'
		),
		array(
            'element'  => '.owl-carousel-agents .owl-prev, .owl-carousel-agents .owl-next',
            'property' => 'color'
        ),
		array(
			'element'  => '.owl-carousel-agents .owl-prev:hover,.owl-carousel-agents .owl-next:hover',
			'property' => 'background-color'
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
			'element'  => '.statement h4',
			'property' => 'color'
		),
		array(
			'element'  => '.statement h4::before',
			'property' => 'border-color'
		),
		array(
			'element'  => '.icon-holder .icon-surround',
			'property' => 'border-color'
		),
		array(
			'element'  => '.icon-surround i',
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
			'element'  => '.footer_icons a:hover',
			'property' => 'color'
		),
    );
	return $output;
}}

