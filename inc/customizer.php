<?php
/**
 *Ephic Theme Customizer.
 *
 * @packageEphic
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ephic_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'ephic_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ephic_customize_preview_js() {
	wp_enqueue_script( 'ephic_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'ephic_customize_preview_js' );

/**
 * Add the theme configuration
 */
ephic_Kirki::add_config( 'ephic_theme', array(
	'option_type' => 'theme_mod',
	'capability'  => 'edit_theme_options',
) );

/**
 * Add the general section
 */
ephic_Kirki::add_section( 'general', array(
    'title'      => esc_attr__( 'General', 'ephic' ),
    'priority'   => 2,
    'capability' => 'edit_theme_options',
) );

/* Add the site color choices */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'        => 'color',
    'settings'    => 'color_primary',
    'label'       => __( 'Primary Site Color', 'ephic' ),
    'section'     => 'general',
    'default'     => '#ff8103',
    'priority'    => 10,
    'alpha'       => true,
	'output'      => ephic_primary_color(),
) );

/* Add the body typography control */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'        => 'typography',
    'settings'    => 'body_typography',
    'label'       => esc_attr__( 'Body Typography', 'ephic' ),
    'description' => esc_attr__( 'Select the main typography options for your site.', 'ephic' ),
    'help'        => esc_attr__( 'The typography options you set here apply to all content on your site.', 'ephic' ),
    'section'     => 'general',
    'priority'    => 10,
    'default'     => array(
        'font-family'    => 'Roboto',
        'variant'        => '300',
        'font-size'      => '16px',
        'line-height'    => '25px',
        'letter-spacing' => '0.015em',
        'color'          => '#333',
    ),
    'output' => array(
        array(
            'element' => '.wrapper',
        ),
    ),
) );

/* Add the header typography control H1 */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'        => 'typography',
    'settings'    => 'h1__typography',
    'label'       => esc_attr__( 'H1 Typography', 'ephic' ),
    'description' => esc_attr__( 'Select the typography options for your H1 headers.', 'ephic' ),
    'help'        => esc_attr__( 'The typography options you set here will apply to the H1 elements of your site.', 'ephic' ),
    'section'     => 'general',
    'priority'    => 10,
    'default'     => array(
        'font-family'    => 'Roboto Condensed',
        'variant'        => '700italic',
        'font-size'      => '48px',
        'line-height'    => '1.5',
        'letter-spacing' => '0',
        'color'          => '#818181',
    ),
    'output' => array(
        array(
            'element' => array( 'h1' ),
        ),
    ),
) );

/* Add the header typography control H2 */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'        => 'typography',
    'settings'    => 'h2__typography',
    'label'       => esc_attr__( 'H2 Typography', 'ephic' ),
    'description' => esc_attr__( 'Select the typography options for your H2 headers.', 'ephic' ),
    'help'        => esc_attr__( 'The typography options you set here will apply to the H2 elements of your site.', 'ephic' ),
    'section'     => 'general',
    'priority'    => 10,
    'default'     => array(
        'font-family'    => 'Roboto',
        'variant'        => '900',
        'font-size'      => '42px',
        'line-height'    => '60px',
        'letter-spacing' => '0',
        'color'          => '#818181',
    ),
    'output' => array(
        array(
            'element' => array( 'h2' ),
        ),
    ),
) );

/* Add the header typography control H3 */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'        => 'typography',
    'settings'    => 'h3__typography',
    'label'       => esc_attr__( 'H3 Typography', 'ephic' ),
    'description' => esc_attr__( 'Select the typography options for your H3 headers.', 'ephic' ),
    'help'        => esc_attr__( 'The typography options you set here will apply to the H3 elements on your site.', 'ephic' ),
    'section'     => 'general',
    'priority'    => 10,
    'default'     => array(
        'font-family'    => 'Roboto',
        'variant'        => '600',
        'font-size'      => '27px',
        'line-height'    => '35px',
        'letter-spacing' => '0',
        'color'          => '#818181',
    ),
    'output' => array(
        array(
            'element' => array( 'h3' ),
        ),
    ),
) );

/* Add the header typography control H4 */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'        => 'typography',
    'settings'    => 'h4__typography',
    'label'       => esc_attr__( 'H4 Typography', 'ephic' ),
    'description' => esc_attr__( 'Select the typography options for your H4 headers.', 'ephic' ),
    'help'        => esc_attr__( 'The typography options you set here will apply to the H4 elements on your site.', 'ephic' ),
    'section'     => 'general',
    'priority'    => 10,
    'default'     => array(
        'font-family'    => 'Roboto',
        'variant'        => '500',
        'font-size'      => '25px',
        'line-height'    => '25px',
        'letter-spacing' => '0',
        'color'          => '#818181',
    ),
    'output' => array(
        array(
            'element' => array( 'h4' ),
			'element' => array( '.posts-navigation h2, .post-navigation h2'),
		),
    ),
) );

/* Add the header typography control H5 */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'        => 'typography',
    'settings'    => 'h5__typography',
    'label'       => esc_attr__( 'H5 Typography', 'ephic' ),
    'description' => esc_attr__( 'Select the typography options for your H5 headers.', 'ephic' ),
    'help'        => esc_attr__( 'The typography options you set here will apply to the H5 elements on your site.', 'ephic' ),
    'section'     => 'general',
    'priority'    => 10,
    'default'     => array(
        'font-family'    => 'Roboto',
        'variant'        => 'regular',
        'font-size'      => '1.25em',
        'line-height'    => '1.5',
        'letter-spacing' => '0',
        'color'          => '#818181',
    ),
    'output' => array(
        array(
            'element' => array( 'h5' ),
        ),
    ),
) );

/* Add the header typography control H6 */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'        => 'typography',
    'settings'    => 'h6__typography',
    'label'       => esc_attr__( 'H6 Typography', 'ephic' ),
    'description' => esc_attr__( 'Select the typography options for your H6 headers.', 'ephic' ),
    'help'        => esc_attr__( 'The typography options you set here will apply to the H6 elements on your site.', 'ephic' ),
    'section'     => 'general',
    'priority'    => 10,
    'default'     => array(
        'font-family'    => 'Roboto',
        'variant'        => 'regular',
        'font-size'      => '1.25em',
        'line-height'    => '1.5',
        'letter-spacing' => '0',
        'color'          => '#818181',
    ),
    'output' => array(
        array(
            'element' => array( 'h6' ),
        ),
    ),
) );

/**
 * Add the Header section
 **/
ephic_Kirki::add_section( 'header_section', array(
	'title'			=> __( 'Header', 'ephic' ),
	'description'	=> __( 'Header Settings', 'ephic' ),
	'priority'		=> 2,
	'capability'	=> 'edit_theme_options'
) );
/* Logo field */
ephic_Kirki::add_field( 'ephic_theme', array(
	'type' 			=> 'image',
	'settings'		=> 'header_logo',
	'label'			=> __('Insert your logo', 'ephic'),
	'section'		=> 'header_section',
	'description'	=> __( 'Be sure to add a logo that will fit well', 'ephic'),
	'priority'		=> 10,
	'default'		=> get_template_directory_uri() . '/img/nav-logo.png' 
) );
/* Enable WPML Language Switcher */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'checkbox',
    'settings'      => 'wpml_switcher',
    'label'         => __('Enable WPML language switcher?', 'ephic'),
    'section'       => 'header_section',
    'description'   => __('Choose to display the language switcher formatted for the top menu. Only used if using WPML', 'ephic'),
    'default'       => '0',
    'priority'      => '10',
) );
/**
 * Add the Footer section
 **/
ephic_Kirki::add_section( 'footer_section', array(
    'title'         => __( 'Footer', 'ephic' ),
    'description'   => __( 'Footer Settings', 'ephic' ),
    'priority'      => 2,
    'capability'    => 'edit_theme_options'
) );
/* Footer Text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'textarea',
    'settings'      => 'footer_text',
    'label'         => __('Insert your footer text', 'ephic'),
    'section'       => 'footer_section',
    'description'   => __( 'Text for the footer area', 'ephic'),
    'priority'      => 10,
    'default'       => 'Copyright &copy; 2016 EPHIC TEMPLATE'
) );
/* Enable Social Links */
/*
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'checkbox',
    'settings'      => 'footer_social',
    'label'         => __('Enable Footer social links?', 'ephic'),
    'section'       => 'footer_section',
    'description'   => __('Choose to display social links in the footer', 'ephic'),
    'default'       => '0',
    'priority'      => '10',
) );
*/
/* Social Link Repeater fields - footer */
/*
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'repeater',
    'settings'      => 'footer_social_pick',
    'label'         => __('Social Links', 'ephic'),
    'section'       => 'footer_section',
    'description'   => __('Choose the social network and set a link.', 'ephic'),
    'priority'      => '10',
    'row_label'   => array(          // row_label is not yet documented in Kirki
        'type' => 'text',
        'value' => __('Social Link', 'ephic'),
    ),
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'footer_social',
            'operator'  => '==',
            'value'     => 1
        ),
    ),
    'default'       => array(
    ),

    'fields' => array(
        'social_url' => array(
            'type'        => 'text',
            'label'       => __('Social URL', 'ephic'),
            'description' => __('This is the Link URL', 'ephic'),
            'default'     => '',
        ),
        'social_choice' => array(
            'type'        => 'select',
            'label'       => __('Social Network', 'ephic'),
            'default'     => '',
            'choices' => ephic_social_icons(),
        ),
    )
) );
*/
/**
 * Home page template settings
 */
ephic_Kirki::add_section( 'page_home', array(
	'title'		=> __( 'Home Page', 'ephic'),
	'priority'	=> 10,
	'capability'=> 'edit_theme_options',
) );

/* Home Page top image or slider */
ephic_Kirki::add_field( 'ephic_theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'home_top',
	'label'       => __( 'Top Image or Slider', 'ephic' ),
	'description' => __( 'Choose to use either an image or slider for the top of the home page.  Note - you need to use the Home Page template on the page you selected for your homepage.', 'ephic'),
	'section'     => 'page_home',
	'default'     => 'topimage',
	'priority'    => 10,
	'choices'     => array(
		'topimage'   => esc_attr__( 'Top Image', 'ephic' ),
		'slider' => esc_attr__( 'Top Slider', 'ephic' ),
	),
) );
/* Home Page top image */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'        => 'image',
    'settings'    => 'home_image',
    'label'       => __('Home Page Top Image', 'ephic' ),
    'priority'    => 10,
    'default'     => get_template_directory_uri() . '/img/main.jpg',
    'description' => esc_attr__('Choose an image for the top of your home page template - our demo image size is 1920 x 1081', 'ephic'),
    'section'     => 'page_home',
    'output'      => array(
        array(
            'element'  => '.main-image',
            'property' => 'background-image',
        ),
    ),
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'home_top',
            'operator'  => '==',
            'value'     => 'topimage'
        ),
    ),
) );

/* Home Page Single Image Large Text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'home_si_large',
    'label'     => __('Top Large Text', 'ephic'),
    'priority'  => 10,
    'default'   => "Created<br /> With Passion",
    'description'=> __('Set Your Large Text', 'ephic'),
    'section'   => 'page_home',
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'home_top',
            'operator'  => '==',
            'value'     => 'topimage'
        ),
    ),
) );
/* Home Page Single Image Small Text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'home_si_small',
    'label'     => __('Top Small Text', 'ephic'),
    'priority'  => 10,
    'default'   => "I'm different.  I create things that matter.",
    'description'=> __('Set Your Smaller Text', 'ephic'),
    'section'   => 'page_home',
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'home_top',
            'operator'  => '==',
            'value'     => 'topimage'
        ),
    ),
) );

/* Home Page Top Slider repeater slides and text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'repeater',
    'settings'      => 'home_slides',
    'label'         => __('Home Page Top Slider', 'ephic'),
    'section'       => 'page_home',
    'description'   => __('Add, Remove, and sort your home page slides and text.', 'ephic'),
    'priority'      => 11,
    'row_label'   => array(          // row_label is not yet documented in Kirki
        'type' => 'text',
        'value' => __('Slide', 'ephic'),
    ),
    'default'       => array(
		array(
			'slider' => get_template_directory_uri() . '/img/main.jpg',
			'home_slide_large' => "Created<br /> With Passion",
			'home_slide_small' => "I'm different.  I create things that matter."
		),
		array(
            'slider' => get_template_directory_uri() . '/img/main2.jpg',
            'home_slide_large' => "Created<br /> With Passion",
            'home_slide_small' => "I'm different.  I create things that matter."
        ),
		array(
            'slider' => get_template_directory_uri() . '/img/main3.jpg',
            'home_slide_large' => "Created<br /> With Passion",
            'home_slide_small' => "I'm different.  I create things that matter."
        ),
    ),
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'home_top',
            'operator'  => '==',
            'value'     => 'slider'
        ),
    ),
    'fields' => array(
        'slider' => array(
            'type'        => 'image',
            'label'       => __('Slide Image', 'ephic'),
            'description' => __('Choose an image', 'ephic'),
			'default'     => get_template_directory_uri() . '/img/main.jpg',
        ),
        'home_slide_large'  => array(
            'type'        => 'textarea',
            'label'       => __( 'Slide Large Text', 'ephic' ),
            'description' => __( 'Set the large text for the slide.', 'ephic'),
            'default'     => '',
        ),
		'home_slide_small'  => array(
            'type'        => 'textarea',
            'label'       => __( 'Slide Small Text', 'ephic' ),
            'description' => __( 'Set the small text for the slide.', 'ephic'),
            'default'     => '',
        ),
    ),
) );
/* Top Features Section 
 * Using customizer select list since Kirki's won't let us add icons.  
 * All direct customize calls go in this block for this section 
 * The priority will keep them all in the correct order
*/
function configure_features_customize($wp_customize) {
    /* Get the icon arrays from font-arrays.php */
    $theme_font_awesome = theme_font_awesome();
    $theme_font_awesome_num = theme_font_awesome_num();
    // build new array with name and icon
    $fa_icons = array();
    foreach ($theme_font_awesome as $k => $v) {
        $fa_icons[$k] = $v . ' ' . str_replace('\f', '&#xf', $theme_font_awesome_num[$k]);
    }

    /* Linear icons */
    $theme_linearicons = theme_linearicons();
    $theme_linearicons_num = theme_linearicons_num();
    $linear_icons = array();
    foreach ($theme_linearicons as $k => $v) {
        $linear_icons[$k] = $v . ' ' . str_replace('\e', '&#xe', $theme_linearicons_num[$k]);
    }


    $wp_customize->add_setting ( 'feature_1_icon', array (
            'default' => 'icon-bed',
        )
    );
    $wp_customize->add_control ( 'feature_1_icon', array (
            'type'  => 'select',
            'label' => __('Top Feature Icon 1', 'ephic'),
            'description'   => __('Choose the first icon for the Home Page top feature section', 'ephic'),
            'choices'   => $linear_icons,
            'section'   => 'page_home',
            'priority'  => 11,
			'active_callback' => 'features_enabled',
        )
    );
    
    $wp_customize->add_setting ( 'feature_2_icon', array (
            'default' => 'icon-bathtub',
        )
    );
    $wp_customize->add_control ( 'feature_2_icon', array (
            'type'  => 'select',
            'label' => __('Top Feature Icon 2', 'ephic'),
            'description'   => __('Choose the first icon for the Home Page top feature section', 'ephic'),
            'choices'   => $linear_icons,
            'section'   => 'page_home',
            'priority'  => 13,
			'active_callback' => 'features_enabled',
        )
    );

    $wp_customize->add_setting ( 'feature_3_icon', array (
            'default' => 'icon-car2',
        )
    );
    $wp_customize->add_control ( 'feature_3_icon', array (
            'type'  => 'select',
            'label' => __('Top Feature Icon 3', 'ephic'),
            'description'   => __('Choose the first icon for the Home Page top feature section', 'ephic'),
            'choices'   => $linear_icons,
            'section'   => 'page_home',
            'priority'  => 15,
			'active_callback' => 'features_enabled',
        )
    );

    $wp_customize->add_setting ( 'feature_4_icon', array (
            'default' => 'icon-pencil-ruler',
        )
    );
    $wp_customize->add_control ( 'feature_4_icon', array (
            'type'  => 'select',
            'label' => __('Top Feature Icon 4', 'ephic'),
            'description'   => __('Choose the first icon for the Home Page top feature section', 'ephic'),
            'choices'   => $linear_icons,
            'section'   => 'page_home',
            'priority'  => 17,
			'active_callback' => 'features_enabled',
        )
    );
}

/* The check for home features being enabled to display the icons */
/*
function features_enabled($control) {
    if( $control->manager->get_setting('home_features')->value() == 'on') {
        return true;
    } else {
        return false;
    }
}

add_action( 'customize_register', 'configure_features_customize');
*/
/* Top Feature 1 Text */
/*
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'feature_1_text',
    'label'     => __('Top Feature Text 1', 'ephic'),
    'priority'  => 12,
    'default'   => '4 Bedrooms',
    'description'=> __('Add your short description', 'ephic'),
    'section'   => 'page_home',
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'home_features',
            'operator'  => '==',
            'value'     => 'on'
        ),
    ),
) );
*/
/* Top Feature 2 Text */
/*
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'feature_2_text',
    'label'     => __('Top Feature Text 2', 'ephic'),
    'priority'  => 14,
    'default'   => '4 Bathrooms',
    'description'=> __('Add your short description', 'ephic'),
    'section'   => 'page_home',
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'home_features',
            'operator'  => '==',
            'value'     => 'on'
        ),
    ),
) );
*/
/* Top Feature 3 Text */
/*
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'feature_3_text',
    'label'     => __('Top Feature Text 3', 'ephic'),
    'priority'  => 16,
    'default'   => '3 Car Garage',
    'description'=> __('Add your short description', 'ephic'),
    'section'   => 'page_home',
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'home_features',
            'operator'  => '==',
            'value'     => 'on'
        ),
    ),
) );
*/
/* Top Feature 4 Text */
/*
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'feature_4_text',
    'label'     => __('Top Feature Text 4', 'ephic'),
    'priority'  => 18,
    'default'   => '4078 sq.ft.',
    'description'=> __('Add your short description', 'ephic'),
    'section'   => 'page_home',
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'home_features',
            'operator'  => '==',
            'value'     => 'on'
        ),
    ),
) );
*/
/* Seperator */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'custom',
    'settings'  => 'seperator',
    'label'     => '',
    'section'   => 'page_home',
    'default'   => '<div style="height:1px;border-bottom:1px solid #ccc;"></div>',
    'priority'  => 13
) );

/* Home Page Sections Repeater fields */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'repeater',
    'settings'      => 'home_sections',
    'label'         => __('Home Page Sections', 'ephic'),
    'section'       => 'page_home',
    'description'   => __('Add, Remove, and sort your home page sections.  Sections are setup in the Configure Sections Tab.', 'ephic'),
    'priority'      => 20,
    'row_label'   => array(          // row_label is not yet documented in Kirki
        'type' => 'text',
        'value' => __('Page Section', 'ephic'),
    ),
    'default'       => array(
    ),

    'fields' => array(
        'section' => array(
            'type'        => 'select',
            'label'       => __('Section', 'ephic'),
            'description' => __('Choose a section', 'ephic'),
            'default'     => 'na',
			'choices' => array(
				'na'		 => __('Select A Section', 'ephic'),
            	'welcome'    => __('Welcome', 'ephic'),
            	'parallax'   => __('Parallax', 'ephic'),
				'parallax2'  => __('Parallax 2', 'ephic'),
				'parallax3'  => __('Parallax 3', 'ephic'),
            	'services'   => __('Services', 'ephic'),
            	'projects'   => __('Projects', 'ephic'),
            	'about'      => __('About', 'ephic'),
				'contact'    => __('Contact', 'ephic'),
				'builder'	 => __('Page Builder Section', 'ephic'),
        	),
        ),
		'page'	=> array(
			'type'        => 'dropdown-pages',
			'label'       => __( 'Page Builder Choice', 'ephic' ),
			'description' => __( 'If this is a Page Builder Section, choose the page with content to use.', 'ephic'),
			'default'     => '',
		),
    )
) );

/**
 * About Us template settings
 */
ephic_Kirki::add_section( 'page_about', array(
    'title'     => __( 'About Us Page', 'ephic'),
    'priority'  => 10,
    'capability'=> 'edit_theme_options',
) );

/**
 * Add the 404 page template settings
 */
ephic_Kirki::add_section( 'page_404', array(
	'title'		=> esc_attr__( '404 Page', 'ephic' ),
	'priority'	=> 10,
	'capability'=> 'edit_theme_options',
) );
/* 404 Page Background Image */
ephic_Kirki::add_field( 'ephic_theme', array(
	'type'		=> 'image',
	'settings'	=> 'background_404',
	'label'		=> __('404 Page top background image', 'ephic' ),
	'priority'	=> 10,
	'default'	=>  get_template_directory_uri() . '/img/main2.jpg',
	'description'=> esc_attr__('Choose an image for the background at the top of the 404 page template', 'ephic'),
	'section'   => 'page_404',
) );
/* 404 Top Heading */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'page_404_heading',
    'label'     => __('Top Heading', 'ephic'),
    'priority'  => 10,
    'default'   => "404 Top Heading",
    'description'=> __('Insert your top heading', 'ephic'),
    'section'   => 'page_404',
) );
/* 404 text Background Image */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'image',
    'settings'  => 'background_text_404',
    'label'     => __('404 text background image', 'ephic' ),
    'priority'  => 10,
    'default'   =>  get_template_directory_uri() . '/img/404.jpg',
    'description'=> esc_attr__('Choose an image for the background behind the 404 text.', 'ephic'),
    'section'   => 'page_404',
) );
/* 404 Heading Description */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'page_404_desc',
    'label'     => __('404 Description', 'ephic'),
    'priority'  => 10,
    'default'   => 'Eam ut purto singulis consequat. Novum euismod ponderum vel ei, deleniti definiebas ad his.',
    'description'=> __('Insert the description below the 404', 'ephic'),
    'section'   => 'page_404',
) );

/**
 * Configure Sections - Configuration of the Home page sections
 */
ephic_Kirki::add_section( 'configure_sections', array(
	'title'		=> esc_attr__( 'Configure Sections', 'ephic' ),
	'priority'	=> 10,
	'capability'=> 'edit_theme_options',
) );

/* Section to configure choice */
ephic_Kirki::add_field( 'ephic_theme', array(
	'type'        => 'select',
	'settings'	  => 'section_choice',
	'priority'	  => 10,
	'default'	  => 'na',
	'section'	  => 'configure_sections',
	'label'       => __('Section', 'ephic'),
	'description' => __('Choose a section', 'ephic'),
	'default'     => '',
	'choices' => array(
		'na'		   => __('Choose a section', 'ephic'),
		'welcome'      => __('Home - Welcome', 'ephic'),
		'parallax'     => __('Home - Parallax 1', 'ephic'),
		'parallax2'    => __('Home - Parallax 2', 'ephic'),
		'parallax3'    => __('Home - Parallax 3', 'ephic'),
		'services'     => __('Home - Services', 'ephic'),
		'projects'     => __('Home - Projects', 'ephic'),
		'about'        => __('Home - About', 'ephic'),
		'contact'      => __('Home - Contact', 'ephic'),
    ),
	/* 'transport' => 'postMessage', */  // just prevent refreshing, nothing needs to be sent...I think
	/* Doesn't work with active_callback dependencies...maybe we can do our own javascript to hide / show options this way */
) );

/* Welcome Title */
ephic_Kirki::add_field( 'ephic_theme', array(
	'type'			=> 'text',
	'settings'		=> 'welcome_title',
	'priority'		=> 10,
	'default'		=> 'Welcome Title',
	'section'		=> 'configure_sections',
	'label'			=> __('Set the Welcome section title', 'ephic'),
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'welcome'
        ),
    ),
) );

/* Welcome Description */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'textarea',
    'settings'      => 'welcome_desc',
    'priority'      => 10,
    'default'       => 'Welcome Description',
    'section'       => 'configure_sections',
    'label'         => __('Set the Welcome section description', 'ephic'),
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'welcome'
        ),
    ),
) );
/* Welcome Left Text */
ephic_Kirki::add_field( 'ephic_theme', array(
	'type'          => 'textarea',
	'settings'	    => 'welcome_left',
	'priority'	    => 10,
	'default'       => 'Is ut graece delectus repudiare, in habeo labore electram cum. Iracundia percipitur et usu. Nonumes consequat vix et, mea inani veritus democritum ei. His ullum feugait cu, ipsum semper molestiae no ius, eam deleniti. Eam ut purto singulis consequat.',
	'section'       => 'configure_sections',
	'label'         => __('Set the Welcome section left side text', 'ephic'),
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'welcome'
        ),
    ),
) );
/* Welcome Right Text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'textarea',
    'settings'      => 'welcome_right',
    'priority'      => 10,
    'default'       => "10 Years experience in Graphic Design & Photography. Let's create memorable Digital Experiences.",
    'section'       => 'configure_sections',
    'label'         => __('Set the Welcome section right side text', 'ephic'),
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'welcome'
        ),
    ),
) );

/* Welcome Section Icons
 * Using customizer select list since Kirki's won't let us add icons.  
 * All direct customize calls go in this block for this section 
 * The priority will keep them all in the correct order
*/
function configure_sections_customize($wp_customize) {
    /* Get the icon arrays from font-arrays.php */
    $theme_font_awesome = theme_font_awesome();
    $theme_font_awesome_num = theme_font_awesome_num();
    // build new array with name and icon
    $fa_icons = array();
    foreach ($theme_font_awesome as $k => $v) {
        $fa_icons[$k] = $v . ' ' . str_replace('\f', '&#xf', $theme_font_awesome_num[$k]);
    }

	/* Welcome icon 1 */
    $wp_customize->add_setting ( 'welcome_1_icon', array (
            'default' => 'fa-paper-plane',
        )
    );
    $wp_customize->add_control ( 'welcome_1_icon', array (
            'type'  => 'select',
            'label' => __('Welcome Icon 1', 'ephic'),
            'description'   => __('Choose an icon for the Home Page Welcome Section', 'ephic'),
            'choices'   => $fa_icons,
            'section'   => 'configure_sections',
            'priority'  => 11,
            'active_callback' => 'welcome_enabled',
        )
    );

	/* Welcome icon 2 */
    $wp_customize->add_setting ( 'welcome_2_icon', array (
            'default' => 'fa-life-ring',
        )
    );
    $wp_customize->add_control ( 'welcome_2_icon', array (
            'type'  => 'select',
            'label' => __('Welcome Icon 2', 'ephic'),
            'description'   => __('Choose an icon for the Home Page Welcome Section', 'ephic'),
            'choices'   => $fa_icons,
            'section'   => 'configure_sections',
            'priority'  => 14,
            'active_callback' => 'welcome_enabled',
        )
    );
	
	/* Welcome icon 3 */
    $wp_customize->add_setting ( 'welcome_3_icon', array (
            'default' => 'fa-laptop',
        )
    );
    $wp_customize->add_control ( 'welcome_3_icon', array (
            'type'  => 'select',
            'label' => __('Welcome Icon 3', 'ephic'),
            'description'   => __('Choose an icon for the Home Page Welcome Section', 'ephic'),
            'choices'   => $fa_icons,
            'section'   => 'configure_sections',
            'priority'  => 17,
            'active_callback' => 'welcome_enabled',
        )
    );
}

/* The check for Welcome being selected to display the icons */
function welcome_enabled($control) {
    if( $control->manager->get_setting('section_choice')->value() == 'welcome') {
        return true;
    } else {
        return false;
    }
}

add_action( 'customize_register', 'configure_sections_customize');

/* Welcome 1 Title */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'welcome_1_title',
    'label'     => __('Icon 1 Title', 'ephic'),
    'priority'  => 12,
    'default'   => 'Stunning Design',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'welcome'
        ),
    ),
) );

/* Welcome 1 Text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'welcome_1_text',
    'label'     => __('Welcome 1 Text', 'ephic'),
    'priority'  => 13,
    'default'   => 'Eam ut purto singulis consequat. Novum euismod ponderum vel ei, deleniti definiebas ad his.',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'welcome'
        ),
    ),
) );

/* Welcome 2 Title */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'welcome_2_title',
    'label'     => __('Welcome 2 Title', 'ephic'),
    'priority'  => 15,
    'default'   => 'Lifetime Support',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'welcome'
        ),
    ),
) );

/* Welcome 2 Text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'welcome_2_text',
    'label'     => __('Welcome 2 Text', 'ephic'),
    'priority'  => 16,
    'default'   => 'Eam ut purto singulis consequat. Novum euismod ponderum vel ei, deleniti definiebas ad his.',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'welcome'
        ),
    ),
) );

/* Welcome 3 Title */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'welcome_3_title',
    'label'     => __('Welcome 3 Title', 'ephic'),
    'priority'  => 18,
    'default'   => 'Responsive Design',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'welcome'
        ),
    ),
) );

/* Welcome 3 Text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'welcome_3_text',
    'label'     => __('Welcome 3 Text', 'ephic'),
    'priority'  => 19,
    'default'   => 'Eam ut purto singulis consequat. Novum euismod ponderum vel ei, deleniti definiebas ad his.',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'welcome'
        ),
    ),
) );


/* Seperator */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'custom',
    'settings'  => 'seperator',
    'label'     => '',
    'section'   => 'configure_sections',
    'default'   => '<div style="height:1px;border-bottom:1px solid #ccc;"></div>',
    'priority'  => 21
) );

/* Parallax Sections */

/* Parallax 1 Section */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'image',
    'settings'  => 'parallax_bg',
    'label'     => __('Parallax Background Image', 'ephic'),
    'priority'  => 10,
    'default'   => '',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'parallax'
        ),
    ),
) );
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'parallax_large',
    'label'     => __('Parallax Large Text', 'ephic'),
    'priority'  => 10,
    'default'   => '',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'parallax'
        ),
    ),
) );
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'parallax_small',
    'label'     => __('Parallax Small Text', 'ephic'),
    'priority'  => 10,
    'default'   => '',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'parallax'
        ),
    ),
) );
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'select',
    'settings'  => 'parallax_text_side',
    'label'     => __('Parallax Text Side', 'ephic'),
    'priority'  => 10,
    'default'   => 'left',
    'section'   => 'configure_sections',
	'multiple'  => '1',
	'choices'   => array(
		'left'  => __('Left Side', 'ephic'),
		'right' => __('Right Side', 'ephic'),
		'center'=> __('Center', 'ephic'),
	),
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'parallax'
        ),
    ),
) );

/* Parallax 2 Section */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'image',
    'settings'  => 'parallax2_bg',
    'label'     => __('Parallax Background Image', 'ephic'),
    'priority'  => 10,
    'default'   => '',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'parallax2'
        ),
    ),
) );
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'parallax2_large',
    'label'     => __('Parallax Large Text', 'ephic'),
    'priority'  => 10,
    'default'   => '',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'parallax2'
        ),
    ),
) );
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'parallax2_small',
    'label'     => __('Parallax Small Text', 'ephic'),
    'priority'  => 10,
    'default'   => '',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'parallax2'
        ),
    ),
) );
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'select',
    'settings'  => 'parallax2_text_side',
    'label'     => __('Parallax Text Side', 'ephic'),
    'priority'  => 10,
    'default'   => 'left',
    'section'   => 'configure_sections',
    'multiple'  => '1',
    'choices'   => array(
        'left'  => __('Left Side', 'ephic'),
        'right' => __('Right Side', 'ephic'),
        'center'=> __('Center', 'ephic'),
    ),
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'parallax2'
        ),
    ),
) );

/* Parallax 3 Section */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'image',
    'settings'  => 'parallax3_bg',
    'label'     => __('Parallax Background Image', 'ephic'),
    'priority'  => 10,
    'default'   => '',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'parallax3'
        ),
    ),
) );
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'parallax3_large',
    'label'     => __('Parallax Large Text', 'ephic'),
    'priority'  => 10,
    'default'   => '',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'parallax3'
        ),
    ),
) );
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'parallax3_small',
    'label'     => __('Parallax Small Text', 'ephic'),
    'priority'  => 10,
    'default'   => '',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'parallax3'
        ),
    ),
) );
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'select',
    'settings'  => 'parallax3_text_side',
    'label'     => __('Parallax Text Side', 'ephic'),
    'priority'  => 10,
    'default'   => 'left',
    'section'   => 'configure_sections',
    'multiple'  => '1',
    'choices'   => array(
        'left'  => __('Left Side', 'ephic'),
        'right' => __('Right Side', 'ephic'),
        'center'=> __('Center', 'ephic'),
    ),
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'parallax3'
        ),
    ),
) );

/* Configure Services Section */
/* Services Section Title */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'services_title',
    'label'     => __('Services Title', 'ephic'),
    'priority'  => 10,
    'default'   => 'Your Title',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'services'
        ),
    ),
) );

/* Services Section Description */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'services_text',
    'label'     => __('Services Description', 'ephic'),
    'priority'  => 10,
    'default'   => 'Services Description.',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'services'
        ),
    ),
) );

/* Services Section Icons
 * Using customizer select list since Kirki's won't let us add icons.  
 * All direct customize calls go in this block for this section 
 * The priority will keep them all in the correct order
*/
function configure_services_customize($wp_customize) {
    /* Get the icon arrays from font-arrays.php */
    $theme_font_awesome = theme_font_awesome();
    $theme_font_awesome_num = theme_font_awesome_num();
    // build new array with name and icon
    $fa_icons = array();
    foreach ($theme_font_awesome as $k => $v) {
        $fa_icons[$k] = $v . ' ' . str_replace('\f', '&#xf', $theme_font_awesome_num[$k]);
    }

    /* Services icon 1 */
    $wp_customize->add_setting ( 'services_1_icon', array (
            'default' => 'fa-paper-plane',
        )
    );
    $wp_customize->add_control ( 'services_1_icon', array (
            'type'  => 'select',
            'label' => __('Services Icon 1', 'ephic'),
            'description'   => __('Choose an icon for the Home Page Services Section', 'ephic'),
            'choices'   => $fa_icons,
            'section'   => 'configure_sections',
            'priority'  => 11,
            'active_callback' => 'services_enabled',
        )
    );

    /* Services icon 2 */
    $wp_customize->add_setting ( 'services_2_icon', array (
            'default' => 'fa-life-ring',
        )
    );
    $wp_customize->add_control ( 'services_2_icon', array (
            'type'  => 'select',
            'label' => __('Services Icon 2', 'ephic'),
            'description'   => __('Choose an icon for the Home Page Services Section', 'ephic'),
            'choices'   => $fa_icons,
            'section'   => 'configure_sections',
            'priority'  => 14,
            'active_callback' => 'services_enabled',
        )
    );
   
    /* Services icon 3 */
    $wp_customize->add_setting ( 'services_3_icon', array (
            'default' => 'fa-laptop',
        )
    );
    $wp_customize->add_control ( 'services_3_icon', array (
            'type'  => 'select',
            'label' => __('Services Icon 3', 'ephic'),
            'description'   => __('Choose an icon for the Home Page Services Section', 'ephic'),
            'choices'   => $fa_icons,
            'section'   => 'configure_sections',
            'priority'  => 17,
            'active_callback' => 'services_enabled',
        )
    );
		
	/* Services icon 4 */
    $wp_customize->add_setting ( 'services_4_icon', array (
            'default' => 'fa-paper-plane',
        )
    );
    $wp_customize->add_control ( 'services_4_icon', array (
            'type'  => 'select',
            'label' => __('Services Icon 4', 'ephic'),
            'description'   => __('Choose an icon for the Home Page Services Section', 'ephic'),
            'choices'   => $fa_icons,
            'section'   => 'configure_sections',
            'priority'  => 20,
            'active_callback' => 'services_enabled',
        )
    );

    /* Services icon 5 */
    $wp_customize->add_setting ( 'services_5_icon', array (
            'default' => 'fa-life-ring',
        )
    );
    $wp_customize->add_control ( 'services_5_icon', array (
            'type'  => 'select',
            'label' => __('Services Icon 5', 'ephic'),
            'description'   => __('Choose an icon for the Home Page Services Section', 'ephic'),
            'choices'   => $fa_icons,
            'section'   => 'configure_sections',
            'priority'  => 23,
            'active_callback' => 'services_enabled',
        )
    );
   
    /* Services icon 6 */
    $wp_customize->add_setting ( 'services_6_icon', array (
            'default' => 'fa-laptop',
        )
    );
    $wp_customize->add_control ( 'services_6_icon', array (
            'type'  => 'select',
            'label' => __('Services Icon 6', 'ephic'),
            'description'   => __('Choose an icon for the Home Page Services Section', 'ephic'),
            'choices'   => $fa_icons,
            'section'   => 'configure_sections',
            'priority'  => 26,
            'active_callback' => 'services_enabled',
        )
    );
}

/* The check for Welcome being selected to display the icons */
function services_enabled($control) {
    if( $control->manager->get_setting('section_choice')->value() == 'services') {
        return true;
    } else {
        return false;
    }
}

add_action( 'customize_register', 'configure_services_customize');

/* Services 1 Title */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'services_1_title',
    'label'     => __('Services 1 Title', 'ephic'),
    'priority'  => 12,
    'default'   => 'Title',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'services'
        ),
    ),
) );

/* Services 1 Text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'services_1_text',
    'label'     => __('Services 1 Text', 'ephic'),
    'priority'  => 13,
    'default'   => 'Eam ut purto singulis consequat. Novum euismod ponderum vel ei, deleniti definiebas ad his.',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'services'
        ),
    ),
) );

/* Services 2 Title */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'services_2_title',
    'label'     => __('Services 2 Title', 'ephic'),
    'priority'  => 15,
    'default'   => 'Title',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'services'
        ),
    ),
) );

/* Services 2 Text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'services_2_text',
    'label'     => __('Services 2 Text', 'ephic'),
    'priority'  => 16,
    'default'   => 'Eam ut purto singulis consequat. Novum euismod ponderum vel ei, deleniti definiebas ad his.',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'services'
        ),
    ),
) );/* Services 3 Title */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'services_3_title',
    'label'     => __('Services 3 Title', 'ephic'),
    'priority'  => 18,
    'default'   => 'Title',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'services'
        ),
    ),
) );

/* Services 3 Text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'services_3_text',
    'label'     => __('Services 3 Text', 'ephic'),
    'priority'  => 19,
    'default'   => 'Eam ut purto singulis consequat. Novum euismod ponderum vel ei, deleniti definiebas ad his.',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'services'
        ),
    ),
) );/* Services 4 Title */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'services_4_title',
    'label'     => __('Services 4 Title', 'ephic'),
    'priority'  => 21,
    'default'   => 'Title',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'services'
        ),
    ),
) );

/* Services 4 Text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'services_4_text',
    'label'     => __('Services 4 Text', 'ephic'),
    'priority'  => 22,
    'default'   => 'Eam ut purto singulis consequat. Novum euismod ponderum vel ei, deleniti definiebas ad his.',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'services'
        ),
    ),
) );/* Services 5 Title */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'services_5_title',
    'label'     => __('Services 5 Title', 'ephic'),
    'priority'  => 24,
    'default'   => 'Title',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'services'
        ),
    ),
) );

/* Services 5 Text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'services_5_text',
    'label'     => __('Services 5 Text', 'ephic'),
    'priority'  => 25,
    'default'   => 'Eam ut purto singulis consequat. Novum euismod ponderum vel ei, deleniti definiebas ad his.',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'services'
        ),
    ),
) );/* Services 6 Title */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'services_6_title',
    'label'     => __('Services 6 Title', 'ephic'),
    'priority'  => 27,
    'default'   => 'Title',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'services'
        ),
    ),
) );

/* Services 6 Text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'services_6_text',
    'label'     => __('Services 6 Text', 'ephic'),
    'priority'  => 28,
    'default'   => 'Eam ut purto singulis consequat. Novum euismod ponderum vel ei, deleniti definiebas ad his.',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'services'
        ),
    ),
) );

/* Services Button Text */
ephic_Kirki::add_field( 'ephic_theme', array(
	'type'      => 'text',
    'settings'  => 'services_btn_text',
    'label'     => __('Services Button Text', 'ephic'),
    'priority'  => 29,
    'default'   => 'Button Text',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'services'
        ),
    ),
) );


/* Services Button Link */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'services_btn_link',
    'label'     => __('Services Button Link', 'ephic'),
    'priority'  => 29,
    'default'   => 'http://google.com',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'services'
        ),
    ),
) );
/* Services Button Window */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'services_btn_window',
    'label'       => __( 'Services Button Link Window', 'ephic' ),
    'description' => __( 'Choose to open link in new or existing window.', 'ephic'),
    'section'     => 'configure_sections',
    'default'     => 'blank',
    'priority'    => 30,
    'choices'     => array(
        'blank'   => __( 'Blank Page', 'ephic' ),
        'self' => __( 'Same Page', 'ephic' ),
    ),
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'services'
        ),
    ),
) );

/* Configure Section Projects Section */

/* Projects Section Title */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'projects_title',
    'label'     => __('Projects Title', 'ephic'),
    'priority'  => 10,
    'default'   => 'Project Gallery',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'projects'
        ),
    ),
) );

/* Projects Section Description */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'projects_text',
    'label'     => __('Projects Description', 'ephic'),
    'priority'  => 10,
    'default'   => 'The Project Gallery',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'projects'
        ),
    ),
) );

/* Project Section Stats Enable */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'projects_stats_enable',
    'label'       => __( 'Enable stats below projects', 'ephic' ),
    'description' => __( 'Enable or disable the bottom statistics.', 'ephic'),
    'section'     => 'configure_sections',
    'default'     => 'enable',
    'priority'    => 10,
    'choices'     => array(
        'enable'   => esc_attr__( 'Enable', 'ephic' ),
        'disable' => esc_attr__( 'Disable', 'ephic' ),
    ),
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'projects'
        ),
    ),
) );

/* Projects Sections Stats Repeater */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'repeater',
    'settings'      => 'stats',
    'label'         => __('Statistics', 'ephic'),
    'section'       => 'configure_sections',
    'description'   => __('Add, Remove, and sort your statistics.  4 is recommended.', 'ephic'),
    'priority'      => 11,
    'row_label'   => array(          // row_label is not yet documented in Kirki
        'type' => 'text',
        'value' => __('Statistic', 'ephic'),
    ),
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'projects'
        ),
		array(
			'setting'   => 'projects_stats_enable',
			'operator'  => '==',
			'value'     => 'enable'
		),
    ),
    'default'       => array(
    ),

    'fields' => array(
        'number' => array(
            'type'        => 'text',
            'label'       => __('The Ending Number', 'ephic'),
            'default'     => '',
        ),
        'text' => array(
            'type'        => 'text',
            'label'       => __('Text Below The Number', 'ephic'),
            'default'     => ''
        ),
    ),
) );

/* Configure About Section */

/* About Section Title */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'about_title',
    'label'     => __('About Title', 'ephic'),
    'priority'  => 10,
    'default'   => 'About Title',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'about'
        ),
    ),
) );

/* About Section Description */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'about_text',
    'label'     => __('About Description', 'ephic'),
    'priority'  => 10,
    'default'   => 'The About Description',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'about'
        ),
    ),
) );

/* About Image */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'        => 'image',
    'settings'    => 'about_photo',
    'label'       => __( 'About Section Image', 'ephic' ),
    'description' => __( 'Choose an image for the about section.', 'ephic' ),
    'section'     => 'configure_sections',
    'default'     => get_template_directory_uri() . '/img/author.png',
    'priority'    => 10,
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'about'
        ),
    ),
) );

/* About Section Small secondary title */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'about_small_title',
    'label'     => __('Below Image Title', 'ephic'),
    'priority'  => 10,
    'default'   => 'About Smaller Title',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'about'
        ),
    ),
) );

/* About Section Lower Description */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'about_lower_text',
    'label'     => __('About Section Large Text', 'ephic'),
    'priority'  => 10,
    'default'   => 'Is ut graece delectus repudiare, in habeo labore electram cum. Iracundia percipitur et usu. Nonumes consequat vix et, mea inani veritus democritum ei. His ullum feugait cu, ipsum semper molestiae no ius, eam deleniti.

Everti praesent sed an. Animal noluisse usu te. Abhorreant voluptatibus eu vis, eos an putent nusquam. Pri veri iracundia necessitatibus an, per id iisque imperdiet, possit utamur neglegentur ius ne.',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'about'
        ),
    ),
) );

/* About Section Signature */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'        => 'image',
    'settings'    => 'about_signature',
    'label'       => __( 'About Section Signature', 'ephic' ),
    'description' => __( 'Choose an image for your signature.', 'ephic' ),
    'section'     => 'configure_sections',
    'default'     => get_template_directory_uri() . '/img/signature.png',
    'priority'    => 10,
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'about'
        ),
    ),
) );

/* About Section Social Link Repeater fields */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'repeater',
    'settings'      => 'about_social_pick',
    'label'         => __('Social Links', 'ephic'),
    'section'       => 'configure_sections',
    'description'   => __('Choose the social network and set a link.', 'ephic'),
    'priority'      => 10,
    'row_label'   => array(          // row_label is not yet documented in Kirki
        'type' => 'text',
        'value' => __('Social Link', 'ephic'),
    ),
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'about'
        ),
    ),
    'default'       => array(
    ),

    'fields' => array(
        'social_url' => array(
            'type'        => 'text',
            'label'       => __('Social URL', 'ephic'),
            'description' => __('This is the Link URL', 'ephic'),
            'default'     => '',
        ),
        'social_choice' => array(
            'type'        => 'select',
            'label'       => __('Social Network', 'ephic'),
            'default'     => '',
            'choices' => ephic_social_icons(),
        ),
    )
) );

/* About Section Contact Info */
/* About Enable Infobar */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'about_infobar',
    'label'       => __( 'Enable Infobar at the bottom of the about section?', 'ephic' ),
    'section'     => 'configure_sections',
    'default'     => 'enable',
    'priority'    => 10,
    'choices'     => array(
        'enable'   => __( 'Enable', 'ephic' ),
        'disable' => __( 'Disable', 'ephic' ),
    ),
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'about'
        ),
    ),
) );


/*
 * Using customizer select list since Kirki's won't let us add icons.  
 * All direct customize calls go in this block for this section 
 * The priority will keep them all in the correct order
*/
function configure_about_contact_info($wp_customize) {
    /* Get the icon arrays from font-arrays.php */
    $theme_font_awesome = theme_font_awesome();
    $theme_font_awesome_num = theme_font_awesome_num();
    // build new array with name and icon
    $fa_icons = array();
    foreach ($theme_font_awesome as $k => $v) {
        $fa_icons[$k] = $v . ' ' . str_replace('\f', '&#xf', $theme_font_awesome_num[$k]);
    }

    $wp_customize->add_setting ( 'about_1_icon', array (
            'default' => '',
        )
    );
    $wp_customize->add_control ( 'about_1_icon', array (
            'type'  => 'select',
            'label' => __('About Contact Info Icon 1', 'ephic'),
            'choices'   => $fa_icons,
            'section'   => 'configure_sections',
            'priority'  => 11,
            'active_callback' => 'about_enabled',
        )
    );
  
    $wp_customize->add_setting ( 'about_2_icon', array (
            'default' => '',
        )
    );
    $wp_customize->add_control ( 'about_2_icon', array (
            'type'  => 'select',
            'label' => __('About Contact Info Icon 2', 'ephic'),
            'choices'   => $fa_icons,
            'section'   => 'configure_sections',
            'priority'  => 14,
            'active_callback' => 'about_enabled',
        )
    );

    $wp_customize->add_setting ( 'about_3_icon', array (
            'default' => '',
        )
    );
    $wp_customize->add_control ( 'about_3_icon', array (
            'type'  => 'select',
            'label' => __('About Contact Info Icon 3', 'ephic'),
            'choices'   => $fa_icons,
            'section'   => 'configure_sections',
            'priority'  => 17,
            'active_callback' => 'about_enabled',
        )
    );
}

/* The check for the about section being enabled to display the icons */
function about_enabled($control) {
    if ($control->manager->get_setting('section_choice')->value() == 'about' 
		&& $control->manager->get_setting('about_infobar')->value() == 'enable' ) {
        return true;
    } else {
        return false;
    }
}

add_action( 'customize_register', 'configure_about_contact_info');

/* About Info Icon title 1 */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'about_1_title',
    'label'     => __('About Contact Info 1 Title', 'ephic'),
    'priority'  => 12,
    'default'   => 'Title 1',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'about'
        ),
		array(
			'setting'   => 'about_infobar',
			'operator'  => '==',
			'value'     => 'enable'
		),
    ),
) );

/* About Info Icon title 2 */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'about_2_title',
    'label'     => __('About Contact Info 2 Title', 'ephic'),
    'priority'  => 15,
    'default'   => 'Title 2',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'about'
        ),
		array(
            'setting'   => 'about_infobar',
            'operator'  => '==',
            'value'     => 'enable'
        ),
    ),
) );

/* About Info Icon title 3 */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'about_3_title',
    'label'     => __('About Contact Info 3 Title', 'ephic'),
    'priority'  => 18,
    'default'   => 'Title 3',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'about'
        ),
		array(
            'setting'   => 'about_infobar',
            'operator'  => '==',
            'value'     => 'enable'
        ),
    ),
) );

/* About Info Icon text 1 */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'about_1_text',
    'label'     => __('About Contact Info 1 Text', 'ephic'),
    'priority'  => 12,
    'default'   => 'Text 1 below',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'about'
        ),
		array(
            'setting'   => 'about_infobar',
            'operator'  => '==',
            'value'     => 'enable'
        ),
    ),
) );

/* About Info Icon text 2 */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'about_2_text',
    'label'     => __('About Contact Info 2 Text', 'ephic'),
    'priority'  => 15,
    'default'   => 'Text 2 below',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'about'
        ),
		array(
            'setting'   => 'about_infobar',
            'operator'  => '==',
            'value'     => 'enable'
        ),
    ),
) );

/* About Info Icon text 3 */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'about_3_text',
    'label'     => __('About Contact Info 3 Text', 'ephic'),
    'priority'  => 18,
    'default'   => 'Text 3 below',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'about'
        ),
		array(
            'setting'   => 'about_infobar',
            'operator'  => '==',
            'value'     => 'enable'
        ),
    ),
) );


/*
 * Contact Section
 */

/* Cpmtact Title */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'text',
    'settings'      => 'contact_title',
    'label'         => __('Section Title', 'ephic'),
    'section'       => 'configure_sections',
    'priority'      => 10,
    'default'       => 'Contact Title',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'contact'
        ),
    ),
) );

/* Contact Text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'textarea',
    'settings'      => 'contact_text',
    'label'         => __('Text below title', 'ephic'),
    'section'       => 'configure_sections',
    'priority'      => 10,
    'default'       => 'Title Text below',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'contact'
        ),
    ),
) );

/* Contact Form Selection */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'contact_form_shortcode',
    'label'     => __('Contact Form', 'ephic'),
    'priority'  => 17,
    'default'   => '[contact-form-7 title="Ephic Contact Form"]',
    'description'=> __('Set the Shortcode for the Contact Form you want to use.', 'ephic'),
    'help'      => __('We include Contact Form 7 and style it but you can use other contact forms as well', 'ephic'),
    'section'   => 'configure_sections',
    'sanitize_callback' => 'wp_kses_post',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'contact'
        ),
    ),
) );

/**
 * Blog Settings
 */
ephic_Kirki::add_section( 'blog_settings', array(
    'title'      => esc_attr__( 'Blog Settings', 'ephic' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
) );

/* Blog Section Title */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'        => 'text',
    'settings'    => 'blog_title',
    'label'       => __( 'Blog Title', 'ephic' ),
    'description' => __( 'Set the title to be displayed for your blog.', 'ephic'),
    'section'     => 'blog_settings',
    'default'     => 'Blog Entries',
    'priority'    => 10,
) );

/* Blog Top Image */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'image',
    'settings'      => 'blog_background',
    'label'         => __('Insert the blog top background image', 'ephic'),
    'section'       => 'blog_settings',
    'priority'      => 10,
    'default'       => '',
	'output'      => array(
        array(
            'element'  => '.blog-header',
            'property' => 'background-image',
        ),
    ),
) );

/* Blog Left or Right sidebar */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'radio-buttonset',
    'settings'      => 'blog_sidebar',
    'label'         => __( 'Blog Sidebar', 'ephic' ),
    'description'   => __( 'Choose the blog sidebar location.', 'ephic'),
    'section'       => 'blog_settings',
    'default'       => 'right',
    'priority'      => 10,
    'choices'       => array(
        'left'      => __( 'Left', 'ephic' ),
        'right'     => __( 'Right', 'ephic' ),
		'nosidebar' => __( 'No Sidebar', 'ephic' ),
    ),
) );

/* Blog Roll summary or full */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'blog_summary',
    'label'       => __( 'Blog Roll Content', 'ephic' ),
    'description' => __( 'Choose to display a summary or full content.', 'ephic'),
    'section'     => 'blog_settings',
    'default'     => 'summary',
    'priority'    => 10,
    'choices'     => array(
        'summary'   => esc_attr__( 'Summary', 'ephic' ),
        'full' => esc_attr__( 'Full', 'ephic' ),
    ),
) );

/* Blog summary length */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'        => 'slider',
    'settings'    => 'blog_summary_length',
    'label'       => __( 'Blog Summary Length', 'ephic' ),
    'description' => __( 'Choose how many words to display for main blog view content.', 'ephic'),
    'section'     => 'blog_settings',
    'default'     => '35',
    'priority'    => 10,
    'choices'     => array(
		'min' => '2',
		'max' => '200',
		'step' => '1'
    ),
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'blog_summary',
            'operator'  => '==',
            'value'     => 'summary'
        ),
    ),
	
) );

/* Blog Meta Tags */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'        => 'sortable',
    'settings'    => 'blog_meta',
    'label'       => __( 'Blog Meta', 'ephic' ),
    'description' => __( 'Choose the meta tags to display with posts', 'ephic' ),
    'section'     => 'blog_settings',
    'default'     => array(
        'comments',
        'like',
    ),
    'choices'     => array(
        'comments' => esc_attr__( 'Comments', 'ephic' ),
        'like' => esc_attr__( 'Like', 'ephic' ),
        'author' => esc_attr__( 'Author', 'ephic' ),
        'date' => esc_attr__( 'Date', 'ephic' ),
    ),
    'priority'    => 10,
) );


/**
 * Add the Custom Code (CSS, JS) section
 */
ephic_Kirki::add_section( 'custom_code', array(
    'title'      => esc_attr__( 'Custom Code', 'ephic' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
) );

/* Custom CSS */
ephic_Kirki::add_field( 'ephic_theme', array(
	'type'		=> 'code',
	'settings'	=> 'css_code',
	'label'		=> esc_attr__( 'Custom CSS Code', 'ephic' ),
	'section'	=> 'custom_code',
	'priority'	=> 10,
	'default'	=> '',
	'choices'	=> array(
		'language' => 'css',
		'theme'	   => 'railscasts',
		'height'   => '250',
	),
) );

/* Custom JS */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'code',
    'settings'  => 'js_code',
    'label'     => esc_attr__( 'Custom Javascript Code', 'ephic' ),
    'section'   => 'custom_code',
    'priority'  => 10,
    'default'   => '',
    'choices'   => array(
        'language' => 'javascript',
        'theme'    => 'railscasts',
        'height'   => '250',
    ),
) );

