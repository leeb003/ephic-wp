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
	'label'		=> __('404 Page background image', 'ephic' ),
	'priority'	=> 10,
	'default'	=>  get_template_directory_uri() . '/img/gallery-bg.jpg',
	'description'=> esc_attr__('Choose an image for the background for your 404 page template - our demo image size is 1920 x 1438', 'ephic'),
	'section'   => 'page_404',
) );
/* 404 Top Heading */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'page_404_heading',
    'label'     => __('Top Heading', 'ephic'),
    'priority'  => 10,
    'default'   => "The Page Cannot Be Found",
    'description'=> __('Insert the Heading below 404', 'ephic'),
    'section'   => 'page_404',
) );
/* 404 Heading Description */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'page_404_hdesc',
    'label'     => __('Heading description', 'ephic'),
    'priority'  => 10,
    'default'   => 'The page you are looking for has either moved or does not exist.  Please use the link below to return to our home page.',
    'description'=> __('Insert the description below the heading', 'ephic'),
    'section'   => 'page_404',
) );
/* 404 Banner */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'page_404_banner',
    'label'     => __('Banner Text', 'ephic'),
    'priority'  => 10,
    'default'   => 'Let us help you find your way home.',
    'description'=> __('Insert the text for the banner below', 'ephic'),
    'section'   => 'page_404',
) );
/* 404 Banner Button Text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'page_404_btn',
    'label'     => __('Banner Button Text', 'ephic'),
    'priority'  => 10,
    'default'   => 'Go Home',
    'description'=> __('Insert the home button text', 'ephic'),
    'section'   => 'page_404',
) );

/**
 * Configure Sections - Configuration of the Home and about us page sections, also will be available via shortcode
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
		'highlights'   => __('Home - Property Highlights', 'ephic'),
		'gallery'      => __('Home - Photo Gallery', 'ephic'),
		'additional'   => __('Home - Additional Information', 'ephic'),
		'posts'        => __('Home - Recent Posts', 'ephic'),
		'agent'        => __('Home - Featured Agent', 'ephic'),
		'topagents'    => __('About - Top Agents', 'ephic'),
		'testimonials' => __('About - Testimonials', 'ephic'),
		'contact'      => __('About - Contact', 'ephic'),
		'aboutmap'     => __('About - Map', 'ephic'),
    ),
	/* 'transport' => 'postMessage', */  // just prevent refreshing, nothing needs to be sent...I think
	/* Doesn't work with active_callback dependencies...maybe we can do our own javascript to hide / show options this way */
) );

/* Highlight Title */
ephic_Kirki::add_field( 'ephic_theme', array(
	'type'			=> 'text',
	'settings'		=> 'highlights_title',
	'priority'		=> 10,
	'default'		=> 'Property Highlights',
	'section'		=> 'configure_sections',
	'label'			=> __('Set the Highlights section title', 'ephic'),
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'highlights'
        ),
    ),
) );

/* Highlights Description */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'textarea',
    'settings'      => 'highlights_desc',
    'priority'      => 10,
    'default'       => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit nisi a dictum tristique.',
    'section'       => 'configure_sections',
    'label'         => __('Set the Highlights section description', 'ephic'),
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'highlights'
        ),
    ),
) );

/* Highlights Section Icons
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

	/* Highlights icon 1 */
    $wp_customize->add_setting ( 'highlight_1_icon', array (
            'default' => 'fa-heart',
        )
    );
    $wp_customize->add_control ( 'highlight_1_icon', array (
            'type'  => 'select',
            'label' => __('Highlight Icon 1', 'ephic'),
            'description'   => __('Choose an icon for the Home Page Highlight Section', 'ephic'),
            'choices'   => $fa_icons,
            'section'   => 'configure_sections',
            'priority'  => 11,
            'active_callback' => 'highlights_enabled',
        )
    );

	/* Highlights icon 2 */
    $wp_customize->add_setting ( 'highlight_2_icon', array (
            'default' => 'fa-file-image-o',
        )
    );
    $wp_customize->add_control ( 'highlight_2_icon', array (
            'type'  => 'select',
            'label' => __('Highlight Icon 2', 'ephic'),
            'description'   => __('Choose an icon for the Home Page Highlight Section', 'ephic'),
            'choices'   => $fa_icons,
            'section'   => 'configure_sections',
            'priority'  => 14,
            'active_callback' => 'highlights_enabled',
        )
    );
	
	/* Highlights icon 3 */
    $wp_customize->add_setting ( 'highlight_3_icon', array (
            'default' => 'fa-briefcase',
        )
    );
    $wp_customize->add_control ( 'highlight_3_icon', array (
            'type'  => 'select',
            'label' => __('Highlight Icon 3', 'ephic'),
            'description'   => __('Choose an icon for the Home Page Highlight Section', 'ephic'),
            'choices'   => $fa_icons,
            'section'   => 'configure_sections',
            'priority'  => 17,
            'active_callback' => 'highlights_enabled',
        )
    );
}

/* The check for highlights being selected to display the icons */
function highlights_enabled($control) {
    if( $control->manager->get_setting('section_choice')->value() == 'highlights') {
        return true;
    } else {
        return false;
    }
}

add_action( 'customize_register', 'configure_sections_customize');

/* Highlight 1 Title */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'highlight_1_title',
    'label'     => __('Highlight 1 Title', 'ephic'),
    'priority'  => 12,
    'default'   => 'Creative Interior Design',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'highlights'
        ),
    ),
) );

/* Highlight 1 Text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'highlight_1_text',
    'label'     => __('Highlight 1 Text', 'ephic'),
    'priority'  => 13,
    'default'   => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque lauda.',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'highlights'
        ),
    ),
) );

/* Highlight 2 Title */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'highlight_2_title',
    'label'     => __('Highlight 2 Title', 'ephic'),
    'priority'  => 15,
    'default'   => 'Fabulous Views',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'highlights'
        ),
    ),
) );

/* Highlight 2 Text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'highlight_2_text',
    'label'     => __('Highlight 2 Text', 'ephic'),
    'priority'  => 16,
    'default'   => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque lauda.',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'highlights'
        ),
    ),
) );

/* Highlight 3 Title */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'highlight_3_title',
    'label'     => __('Highlight 3 Title', 'ephic'),
    'priority'  => 18,
    'default'   => 'Quite Neighborhood',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'highlights'
        ),
    ),
) );

/* Highlight 3 Text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'highlight_3_text',
    'label'     => __('Highlight 3 Text', 'ephic'),
    'priority'  => 19,
    'default'   => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque lauda.',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'highlights'
        ),
    ),
) );

/* Highlight Icon Hover Color */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'        => 'color',
    'settings'    => 'highlight_icon_color',
    'label'       => __( 'Highlight Icon Hover Color', 'ephic' ),
    'section'     => 'configure_sections',
    'default'     => '#daa70a',
    'priority'    => 20,
    'alpha'       => true,
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'highlights'
        ),
    ),
    'output'      => array(
        array(
            'element'  => '.highlight-info .col-md-4:hover .rct',
            'property' => 'background-color',
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

/* Highlight slider enable */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'highlight_slides_enable',
    'label'       => __( 'Highlight Slider', 'ephic' ),
    'description' => __( 'Enable or disable the highlight slider. Note - you need at least 2 slides.', 'ephic'),
    'section'     => 'configure_sections',
    'default'     => 'enable',
    'priority'    => 22,
    'choices'     => array(
        'enable'   => esc_attr__( 'Enable', 'ephic' ),
        'disable' => esc_attr__( 'Disable', 'ephic' ),
    ),
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'highlights'
        ),
    ),
) );

/* Highligh slides */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'repeater',
    'settings'      => 'highlight_slides',
    'label'         => __('Slide settings', 'ephic'),
    'section'       => 'configure_sections',
    'description'   => __('Set up the slides for the highlights section.', 'ephic'),
    'priority'      => 23,
    'row_label'   => array(          // row_label is not yet documented in Kirki
        'type' => 'text',
        'value' => __('Slide', 'ephic'),
    ),
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'highlight_slides_enable',
            'operator'  => '==',
            'value'     => 'enable'
        ),
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'highlights'
        ),
    ),
    'default'       => array(
    ),

    'fields' => array(
        'slide_title' => array(
            'type'        => 'text',
            'label'       => __('Title', 'ephic'),
            'description' => __('This is the slide title', 'ephic'),
            'default'     => 'Interior Details',
        ),
        'slide_text' => array(
            'type'        => 'textarea',
            'label'       => __('Slide Text', 'ephic'),
            'default'     => 'Debitis euripidis expetendis eos an, vim case complectitur ut, ex discere utroque contentiones qui. Augue vitae reprimique cu usu.',
        ),
		'slide_feature_list' => array(
			'type'		  => 'textarea',
			'label'		  => __('Feature list, separate items with commas', 'ephic'),
			'default'	  => 'Year Built: 2016, Appliances: Included, Fireplace: Gas, Heating: Natural Gas, Laundry: Main Level, Basement: Full',
		),
		'slide_feature_text' => array(
			'type'		  => 'text',
			'label'		  => __('Slide feature text', 'ephic'),
			'default'	  => 'Total sq.ft.',
		),
		'slide_feature_text_2' => array(
			'type'		  => 'text',
			'label'		  => __('Slide feature text 2', 'ephic'),
			'default'	  => '4,078',
		),
		'slide_image'	=> array(
			'type'		  => 'image',
			'label'		  => __('Slide Image', 'ephic'),
			'default'	  => '',
		),
    )
) );

/* Configure Sections Photo Section */

/* Photo Section Title */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'gallery_title',
    'label'     => __('Photo Gallery Title', 'ephic'),
    'priority'  => 10,
    'default'   => 'Photo Gallery',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'gallery'
        ),
    ),
) );

/* Photo Section Description */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'gallery_text',
    'label'     => __('Photo Gallery Description', 'ephic'),
    'priority'  => 10,
    'default'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit nisi a dictum tristique.',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'gallery'
        ),
    ),
) );

/* Photo Section Banner Enable */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'gallery_banner_enable',
    'label'       => __( 'Enable Banner', 'ephic' ),
    'description' => __( 'Enable or disable the bottom gallery banner and link.', 'ephic'),
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
            'value'     => 'gallery'
        ),
    ),
) );

/* Photo Section Banner Text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'gallery_banner_text',
    'label'     => __('Photo Gallery Banner Text', 'ephic'),
    'priority'  => 10,
    'default'   => 'TRY A 360° VIRTUAL TOUR IN THIS HOUSE',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'gallery'
        ),
		array(
            'setting'   => 'gallery_banner_enable',
            'operator'  => '==',
            'value'     => 'enable'
        ),
    ),
) );
/* Photo Section Banner Button Text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'gallery_banner_btn_text',
    'label'     => __('Photo Gallery Banner Text', 'ephic'),
    'priority'  => 10,
    'default'   => 'Take a Look',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'gallery'
        ),
        array(
            'setting'   => 'gallery_banner_enable',
            'operator'  => '==',
            'value'     => 'enable'
        ),
    ),
) );
/* Photo Section Banner Button Link */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'gallery_banner_btn_link',
    'label'     => __('Photo Gallery Banner Link', 'ephic'),
	'description' => __('Link in the form http://www.example.com', 'ephic'),
    'priority'  => 10,
    'default'   => 'http://www.example.com',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'gallery'
        ),
        array(
            'setting'   => 'gallery_banner_enable',
            'operator'  => '==',
            'value'     => 'enable'
        ),
    ),
) );
/* Photo Section Banner Enable */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'gallery_banner_btn_window',
    'label'       => __( 'Banner Button Link Window', 'ephic' ),
    'description' => __( 'Choose to open link in new or existing window.', 'ephic'),
    'section'     => 'configure_sections',
    'default'     => 'blank',
    'priority'    => 10,
    'choices'     => array(
        'blank'   => __( 'Blank Page', 'ephic' ),
        'self' => __( 'Same Page', 'ephic' ),
    ),
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'gallery'
        ),
		array(
            'setting'   => 'gallery_banner_enable',
            'operator'  => '==',
            'value'     => 'enable'
        ),
    ),
) );

/* Photo Section Background Image */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'        => 'image',
    'settings'    => 'gallery_background',
    'label'       => __( 'Photo Gallery Background Image', 'ephic' ),
    'description' => __( 'Choose a background image for the photo gallery section.  All images and categories are set under the Port
folio Entries tab in your WordPress admin.', 'ephic' ),
    'section'     => 'configure_sections',
    'default'     => '',
    'priority'    => 10,
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'gallery'
        ),
    ),
) );


/* 
 * Additional Information Section 
 */
/* Additional Information title */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'additional_title',
    'label'     => __('Additional Information Title', 'ephic'),
    'priority'  => 10,
    'default'   => 'Additional Information',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'additional'
        ),
    ),
) );
/* Additional Information description */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'additional_text',
    'label'     => __('Additional Information Description', 'ephic'),
    'priority'  => 10,
    'default'   => 'Lorum ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit nisi a dictum tristique.',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'additional'
        ),
    ),
) );

/* Additional Information Icons */
function configure_additional_customize($wp_customize) {
    /* Linear icons */
    $theme_linearicons = theme_linearicons();
    $theme_linearicons_num = theme_linearicons_num();
    $linear_icons = array();
    foreach ($theme_linearicons as $k => $v) {
        $linear_icons[$k] = $v . ' ' . str_replace('\e', '&#xe', $theme_linearicons_num[$k]);
    }


    $wp_customize->add_setting ( 'additional_1_icon', array (
            'default' => 'icon-bandage',
        )
    );
    $wp_customize->add_control ( 'additional_1_icon', array (
            'type'  => 'select',
            'label' => __('Additional Icon 1', 'ephic'),
            'description'   => __('Choose an icon for the Additional Information area.', 'ephic'),
            'choices'   => $linear_icons,
            'section'   => 'configure_sections',
            'priority'  => 11,
            'active_callback' => 'additional_enabled',
        )
    );

	$wp_customize->add_setting ( 'additional_2_icon', array (
            'default' => 'icon-bus',
        )
    );
    $wp_customize->add_control ( 'additional_2_icon', array (
            'type'  => 'select',
            'label' => __('Additional Icon 2', 'ephic'),
            'description'   => __('Choose an icon for the Additional Information area.', 'ephic'),
            'choices'   => $linear_icons,
            'section'   => 'configure_sections',
            'priority'  => 13,
            'active_callback' => 'additional_enabled',
        )
    );
	
	$wp_customize->add_setting ( 'additional_3_icon', array (
            'default' => 'icon-cart',
        )
    );
    $wp_customize->add_control ( 'additional_3_icon', array (
            'type'  => 'select',
            'label' => __('Additional Icon 3', 'ephic'),
            'description'   => __('Choose an icon for the Additional Information area.', 'ephic'),
            'choices'   => $linear_icons,
            'section'   => 'configure_sections',
            'priority'  => 15,
            'active_callback' => 'additional_enabled',
        )
    );

	$wp_customize->add_setting ( 'additional_4_icon', array (
            'default' => 'icon-tree',
        )
    );
    $wp_customize->add_control ( 'additional_4_icon', array (
            'type'  => 'select',
            'label' => __('Additional Icon 4', 'ephic'),
            'description'   => __('Choose an icon for the Additional Information area.', 'ephic'),
            'choices'   => $linear_icons,
            'section'   => 'configure_sections',
            'priority'  => 17,
            'active_callback' => 'additional_enabled',
        )
    );
}

/* The check for the additional information section being selected to display the icons */
function additional_enabled($control) {
    if( $control->manager->get_setting('section_choice')->value() == 'additional') {
        return true;
    } else {
        return false;
    }
}

add_action( 'customize_register', 'configure_additional_customize');

/* Additional Icon Text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'additional_1_text',
    'label'     => __('Icon 1 Text', 'ephic'),
    'priority'  => 12,
    'default'   => 'Nearby Hostpitals',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'additional'
        ),
    ),
) );

/* Additional Icon Text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'additional_2_text',
    'label'     => __('Icon 2 Text', 'ephic'),
    'priority'  => 14,
    'default'   => 'Excellent Schools',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'additional'
        ),
    ),
) );

/* Additional Icon Text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'additional_3_text',
    'label'     => __('Icon 3 Text', 'ephic'),
    'priority'  => 16,
    'default'   => 'Nearby Shopping',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'additional'
        ),
    ),
) );

/* Additional Icon Text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'additional_4_text',
    'label'     => __('Icon 4 Text', 'ephic'),
    'priority'  => 18,
    'default'   => 'Neighborhood Parks',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'additional'
        ),
    ),
) );

/* Additional Button Text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'additional_btn_text',
    'label'     => __('Additional Information Button Text', 'ephic'),
    'priority'  => 19,
    'default'   => 'Contact Us',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'additional'
        ),
    ),
) );

/* Additional Button Text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'additional_btn_link',
    'label'     => __('Additional Information Button Link', 'ephic'),
    'priority'  => 20,
    'default'   => 'http://www.example.com',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'additional'
        ),
    ),
) );

/* Additional Button Window */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'additional_btn_window',
    'label'       => __( 'Button Link Window', 'ephic' ),
    'description' => __( 'Choose to open link in new or existing window.', 'ephic'),
    'section'     => 'configure_sections',
    'default'     => 'blank',
    'priority'    => 21,
    'choices'     => array(
        'blank'   => __( 'Blank Page', 'ephic' ),
        'self' => __( 'Same Page', 'ephic' ),
    ),
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'additional'
        ),
    ),
) );

/* 
 * Posts Section Configure
 */

/* Posts Title */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'posts_title',
    'label'     => __('Posts Section Title', 'ephic'),
    'priority'  => 10,
    'default'   => 'Recent Posts',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'posts'
        ),
    ),
) );

/* Posts Description */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'posts_text',
    'label'     => __('Posts Section Description', 'ephic'),
    'priority'  => 10,
    'default'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit nisi a dictum tristique.',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'posts'
        ),
    ),
) );

/* Section to configure choice */
$posts_num = array();
for ($i=1;$i<=25; $i++) {
	$posts_num[$i] = $i;
}
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'        => 'select',
    'settings'    => 'posts_number',
    'priority'    => 10,
    'default'     => 'na',
    'section'     => 'configure_sections',
    'label'       => __('Posts', 'ephic'),
    'description' => __('Choose the number of posts to display in this section', 'ephic'),
    'default'     => '2',
    'choices' => $posts_num,
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'posts'
        ),
    ),
) );
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'        => 'select',
    'settings'    => 'posts_sort',
    'priority'    => 10,
    'default'     => 'na',
    'section'     => 'configure_sections',
    'label'       => __('Posts Sorting', 'ephic'),
    'description' => __('Choose how you would like to sort the posts', 'ephic'),
    'default'     => 'asc',
    'choices' => array( 
		'ASC' => __('Ascending', 'ephic'),
		'DESC'=> __('Descending', 'ephic')
	),
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'posts'
        ),
    ),
) );
/* Post Attributes */
ephic_Kirki::add_field( 'ephic_theme', array(
	'type'        => 'sortable',
	'settings'    => 'posts_atts',
	'label'       => __( 'Choose the meta attributes to display', 'ephic' ),
	'description' => __( '3 or less recommended for display', 'ephic' ),
	'section'     => 'configure_sections',
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
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'posts'
        ),
    ),
) );

/**
 * Featured Agent Section
 */

/* Agent Title */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'agent_title',
    'label'     => __('Agent Title', 'ephic'),
    'priority'  => 10,
    'default'   => 'Presented By',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
        ),
    ),
) );

/* Agent Description */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'agent_desc',
    'label'     => __('Agent Description', 'ephic'),
    'priority'  => 10,
    'default'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit nisi a dictum tristique.',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
        ),
    ),
) );

/* Agent Name */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'agent_name',
    'label'     => __('Agent Name', 'ephic'),
    'priority'  => 10,
    'default'   => 'Janice Smith',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
        ),
    ),
) );

/* Agent Credentials */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'agent_cred',
    'label'     => __('Agent Credentials', 'ephic'),
    'priority'  => 10,
    'default'   => 'Realtor / Broker Associate - GRI, ABR',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
        ),
    ),
) );

/* Agent Credentials */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'agent_info',
    'label'     => __('Agent Information', 'ephic'),
    'priority'  => 10,
    'default'   => 'His nonumes consequat id, ignota iriure mei in. Elit latine fastidii ex mea, ius cu solet veritus concludaturque. Mel at appetere salutatus intellegat, ut per posse iriure propriae, minim oblique ut nam. Quem necessitatibus eu sit, duo ne phaedrum aliquando dissentiet, simul persecuti te usu.',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
        ),
    ),
) );

/* Agent Photo */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'image',
    'settings'      => 'agent_photo',
    'label'         => __('Insert your agent photo', 'ephic'),
    'section'       => 'configure_sections',
    'description'   => __( 'Demo image is 350px x 558px', 'ephic'),
    'priority'      => 10,
    'default'       => '',
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
        ),
    ),
) );

/* Agent Button Text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'agent_btn_text',
    'label'     => __('Agent Button Text', 'ephic'),
    'priority'  => 10,
    'default'   => 'Schedule A Showing',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
        ),
    ),
) );
/* Agent Button Link */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'agent_btn_link',
    'label'     => __('Agent Button Link', 'ephic'),
    'description' => __('Link in the form http://www.example.com', 'ephic'),
    'priority'  => 10,
    'default'   => 'http://www.example.com',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
        ),
    ),
) );
/* Agent Button Window */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'agent_btn_window',
    'label'       => __( 'Agent Button Link Window', 'ephic' ),
    'description' => __( 'Choose to open link in new or existing window.', 'ephic'),
    'section'     => 'configure_sections',
    'default'     => 'blank',
    'priority'    => 10,
    'choices'     => array(
        'blank'   => __( 'Blank Page', 'ephic' ),
        'self' => __( 'Same Page', 'ephic' ),
    ),
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
		),
	),
) );

/* Agent Enable Infobar */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'agent_infobar',
    'label'       => __( 'Enable Infobar below agent?', 'ephic' ),
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
            'value'     => 'agent'
        ),
    ),
) );

/* Agent Contacts
 * Using customizer select list since Kirki's won't let us add icons.  
 * All direct customize calls go in this block for this section 
 * The priority will keep them all in the correct order
*/
function configure_agent_customize($wp_customize) {
    /* Get the icon arrays from font-arrays.php */
    $theme_font_awesome = theme_font_awesome();
    $theme_font_awesome_num = theme_font_awesome_num();
    // build new array with name and icon
    $fa_icons = array();
    foreach ($theme_font_awesome as $k => $v) {
        $fa_icons[$k] = $v . ' ' . str_replace('\f', '&#xf', $theme_font_awesome_num[$k]);
    }

    $wp_customize->add_setting ( 'agent_1_icon', array (
            'default' => 'fa-map-marker',
        )
    );
    $wp_customize->add_control ( 'agent_1_icon', array (
            'type'  => 'select',
            'label' => __('Agent Info Icon 1', 'ephic'),
            'choices'   => $fa_icons,
            'section'   => 'configure_sections',
            'priority'  => 11,
            'active_callback' => 'agent_infobar_enabled',
        )
    );
   
    $wp_customize->add_setting ( 'agent_2_icon', array (
            'default' => 'fa-phone',
        )
    );
    $wp_customize->add_control ( 'agent_2_icon', array (
            'type'  => 'select',
            'label' => __('Agent Info Icon 2', 'ephic'),
            'choices'   => $fa_icons,
            'section'   => 'configure_sections',
            'priority'  => 13,
            'active_callback' => 'agent_infobar_enabled',
        )
    );

    $wp_customize->add_setting ( 'agent_3_icon', array (
            'default' => 'fa-envelope-o',
        )
    );
    $wp_customize->add_control ( 'agent_3_icon', array (
            'type'  => 'select',
            'label' => __('Agent Info Icon 3', 'ephic'),
            'choices'   => $fa_icons,
            'section'   => 'configure_sections',
            'priority'  => 15,
            'active_callback' => 'agent_infobar_enabled',
        )
    );
}

/* The check for home features being enabled to display the icons */
function agent_infobar_enabled($control) {
    if( $control->manager->get_setting('agent_infobar')->value() == 'enable'
		&& $control->manager->get_setting('section_choice')->value() == 'agent' ) {
        return true;
    } else {
        return false;
    }
}

add_action( 'customize_register', 'configure_agent_customize');

/* Agent Infobar text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'agent_1_text',
    'label'     => __('Agent Info 1 Text', 'ephic'),
    'priority'  => 12,
    'default'   => '25 North Street / Your Town, CO 88888 United States.',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
        ),
		array(
			'setting'	=> 'agent_infobar',
			'operator'	=> '==',
			'value'		=> 'enable'
		),
    ),
) );

/* Agent Infobar text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'agent_2_text',
    'label'     => __('Agent Info 2 Text', 'ephic'),
    'priority'  => 14,
    'default'   => 'Phone: (+314) 0454 3234 23',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
        ),
        array(
            'setting'   => 'agent_infobar',
            'operator'  => '==',
            'value'     => 'enable'
		),
    ),
) );

/* Agent Infobar text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'text',
    'settings'  => 'agent_3_text',
    'label'     => __('Agent Info 3 Text', 'ephic'),
    'priority'  => 16,
    'default'   => 'Email: NOREPLY@GMAIL.COM',
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
        ),
        array(
            'setting'   => 'agent_infobar',
            'operator'  => '==',
            'value'     => 'enable'
		),
    ),
) );

/* Agent Enable Map */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'agent_map',
    'label'       => __( 'Enable Map below agent?', 'ephic' ),
    'section'     => 'configure_sections',
    'default'     => 'enable',
    'priority'    => 17,
    'choices'     => array(
        'enable'   => __( 'Enable', 'ephic' ),
        'disable' => __( 'Disable', 'ephic' ),
    ),
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
        ),
    ),
) );

/* Agent Map Marker */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'image',
    'settings'      => 'agent_map_marker',
    'label'         => __('Insert your map marker', 'ephic'),
    'section'       => 'configure_sections',
    'priority'      => 18,
    'default'       => '',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
        ),
		array(
            'setting'   => 'agent_map',
            'operator'  => '==',
            'value'     => 'enable'
        ),
    ),
) );

/* Agent Map latitude */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'text',
    'settings'      => 'agent_map_lat',
    'label'         => __('Insert the location latitude', 'ephic'),
    'section'       => 'configure_sections',
    'priority'      => 19,
    'default'       => '39.7645187',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
        ),
		array(
            'setting'   => 'agent_map',
            'operator'  => '==',
            'value'     => 'enable'
        ),
    ),
) );

/* Agent Map longitude */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'text',
    'settings'      => 'agent_map_lng',
    'label'         => __('Insert the location longitude', 'ephic'),
    'section'       => 'configure_sections',
    'priority'      => 20,
    'default'       => '-104.9951951',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'agent'
        ),
        array(
            'setting'   => 'agent_map',
            'operator'  => '==',
            'value'     => 'enable'
        ),
    ),
) );

/**
 * About Us - Top Agents 
 */
/* Top Agents Title */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'text',
    'settings'      => 'topagents_title',
    'label'         => __('Add your Agents Slider Title', 'ephic'),
    'section'       => 'configure_sections',
    'priority'      => 10,
    'default'       => 'Our Top Agents',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'topagents'
        ),
    ),
) );
/* Top Agents Description */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'textarea',
    'settings'      => 'topagents_text',
    'label'         => __('Add your Agents Slider Description', 'ephic'),
    'section'       => 'configure_sections',
    'priority'      => 10,
    'default'       => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit nisi a dictum tristique.',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'topagents'
        ),
    ),
) );

/* Add empty icon for no social icon to display */
$orig_social_icons = ephic_social_icons();
$prepend = array(
	'na' => __('Select An Icon', 'ephic')
);
$mod_social_icons = array_merge($prepend, $orig_social_icons);

/* Top Agents Section Repeater fields */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'repeater',
    'settings'      => 'topagents_agents',
    'label'         => __('Agents', 'ephic'),
    'section'       => 'configure_sections',
    'description'   => __('Add, Remove, and sort your agents and their info.', 'ephic'),
    'priority'      => 10,
    'row_label'   => array(          // row_label is not yet documented in Kirki
        'type' => 'text',
        'value' => __('Agent', 'ephic'),
    ),
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'topagents'
        ),
    ),
    'default'       => array(
    ),

    'fields' => array(
        'agent_photo' => array(
            'type'        => 'image',
            'label'       => __('Agent Photo', 'ephic'),
            'default'     => '',
        ),
		'agent_name' => array(
			'type'		  => 'text',
			'label'		  => __('Agent Name', 'ephic'),
			'default'	  => 'Stephan Ivanovs'
		),
		'agent_title' => array(
			'type'		  => 'text',
			'label'		  => __('Agent Title', 'ephic'),
			'default'	  => 'Real Estate Agent',
		),
		'agent_phone' => array(
			'type'		  => 'text',
			'label'		  => __('Agent Phone', 'ephic'),
			'default'	  => '(220) 345 675',
		),
		'agent_email' => array(
			'type'		  => 'text',
			'label'		  => __('Agent Email', 'ephic'),
			'default'	  => 'noreply@gmail.com',
		),
		'social_choice_1' => array(
            'type'        => 'select',
            'label'       => __('Social Network', 'ephic'),
            'default'     => 'na',
            'choices' => $mod_social_icons,
        ),
		'social_url_1'	  => array(
			'type'		  => 'text',
			'label'		  => __('Social Link (e.g. http://www.example.com)', 'ephic'),
			'default'	  => 'http://www.example.com',
		),
		'social_choice_2' => array(
            'type'        => 'select',
            'label'       => __('Social Network 2', 'ephic'),
            'default'     => 'na',
            'choices' => $mod_social_icons,
        ),
        'social_url_2'    => array(
            'type'        => 'text',
            'label'       => __('Social Link 2 (e.g. http://www.example.com)', 'ephic'),
            'default'     => 'http://www.example.com',
        ),  
		'social_choice_3' => array(
            'type'        => 'select',
            'label'       => __('Social Network 3', 'ephic'),
            'default'     => 'na',
            'choices' => $mod_social_icons,
        ),
        'social_url_3'    => array(
            'type'        => 'text',
            'label'       => __('Social Link 3 (e.g. http://www.example.com)', 'ephic'),
            'default'     => 'http://www.example.com',
        ),  
    )
) );

/**
 * Testimonials - Top Agents 
 */
/* Testimonials Title */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'text',
    'settings'      => 'testimonial_title',
    'label'         => __('Add your Testimonial Title', 'ephic'),
    'section'       => 'configure_sections',
    'priority'      => 10,
    'default'       => 'Testimonials',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'testimonials'
        ),
    ),
) );

/* Testimonials Background Image */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'image',
    'settings'      => 'testimonial_bg',
    'label'         => __('Insert a background image for this section', 'ephic'),
    'description'   => __( 'Our demo uses a transparent image', 'ephic'),
	'section'       => 'configure_sections',
	'default'       => '',
    'priority'      => 11,
/*  Changes are being lost for this and testimonial color so we moved the setting to add_inline_style in functions
	'output'      => array(
        array(
            'element'  => '.testimonials-section',
            'property' => 'background-image',
        ),
    ),
*/
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'testimonials'
        ),
    ),
) );

/* Testimonials Background Color */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'        => 'color',
    'settings'    => 'testimonial_color',
    'label'       => __( 'Testimonial Background Color', 'ephic' ),
    'section'     => 'configure_sections',
    'default'     => 'rgba(1, 11, 32, 0.7)',
    'priority'    => 12,
    'alpha'       => true,
	'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'testimonials'
        ),
    ),
/*
	'output'      => array(
        array(
            'element'  => '.testimonials-overlay',
            'property' => 'background-color',
        ),
    ),
*/
) );


/* Testimonials */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'repeater',
    'settings'      => 'testimonials',
    'label'         => __('Agents', 'ephic'),
    'section'       => 'configure_sections',
    'description'   => __('Add, Remove, and sort your testimonials.  You need at least 2 to display.', 'ephic'),
    'priority'      => 13,
    'row_label'   => array(          // row_label is not yet documented in Kirki
        'type' => 'text',
        'value' => __('Testimonial', 'ephic'),
    ),
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'testimonials'
        ),
    ),
    'default'       => array(
    ),

    'fields' => array(
        'testimonial' => array(
            'type'        => 'textarea',
            'label'       => __('The Testimonial', 'ephic'),
            'default'     => 'An vel utinam impetus moderatius. Commodo copiosae ocurreret id sit. Ius enim mollis scaevola cu, at natum malis decore per. Id usu eius ancillae Doming ponderum mei ei.',
        ),
        'name' => array(
            'type'        => 'text',
            'label'       => __('Name', 'ephic'),
            'default'     => 'Michael Richardson'
        ),
        'title' => array(
            'type'        => 'text',
            'label'       => __('Title', 'ephic'),
            'default'     => 'Happy Client',
        ),
	),
) );

/*
 * About Page Contact Section
 */

/* Blurb 1 Title */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'text',
    'settings'      => 'contact_title_1',
    'label'         => __('First Text Section Title', 'ephic'),
    'section'       => 'configure_sections',
    'priority'      => 10,
    'default'       => 'Our Values',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'contact'
        ),
    ),
) );

/* Blurb 1 Text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'textarea',
    'settings'      => 'contact_text_1',
    'label'         => __('First Text Section', 'ephic'),
    'section'       => 'configure_sections',
    'priority'      => 10,
    'default'       => 'Ex quaestio corrumpit consetetur mea, ne posse blandit nec. Quodsi oporteat constituto ea nec, ex nam dolor expetenda concludaturque. Pro ex nulla deleniti, magna soleat mollis duo an. Ut mel praesent dissentias. Has ea exerci constituto.',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'contact'
        ),
    ),
) );

/* Blurb 2 Title */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'text',
    'settings'      => 'contact_title_2',
    'label'         => __('Second Text Section Title', 'ephic'),
    'section'       => 'configure_sections',
    'priority'      => 10,
    'default'       => 'Our Mission',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'contact'
        ),
    ),
) );

/* Blurb 2 Text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'textarea',
    'settings'      => 'contact_text_2',
    'label'         => __('Second Text Section', 'ephic'),
    'section'       => 'configure_sections',
    'priority'      => 10,
    'default'       => 'Ex quaestio corrumpit consetetur mea, ne posse blandit nec. Quodsi oporteat constituto ea nec, ex nam dolor expetenda concludaturque. Pro ex nulla deleniti, magna soleat mollis duo an. Ut mel praesent dissentias. Has ea exerci constituto.',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'contact'
        ),
    ),
) );

function configure_contacts_customize($wp_customize) {
    /* Linear icons */
    $theme_linearicons = theme_linearicons();
    $theme_linearicons_num = theme_linearicons_num();
    $linear_icons = array();
    foreach ($theme_linearicons as $k => $v) {
        $linear_icons[$k] = $v . ' ' . str_replace('\e', '&#xe', $theme_linearicons_num[$k]);
    }

	/* Contact Info icon 1 */
    $wp_customize->add_setting ( 'contact_1_icon', array (
            'default' => 'icon-map-marker',
        )
    );
    $wp_customize->add_control ( 'contact_1_icon', array (
            'type'  => 'select',
            'label' => __('Contact Section Icon 1', 'ephic'),
            'description'   => __('Choose the first icon for the contact section', 'ephic'),
            'choices'   => $linear_icons,
            'section'   => 'configure_sections',
            'priority'  => 11,
            'active_callback' => 'contact_selected',
        )
    );
	
	$wp_customize->add_setting ( 'contact_2_icon', array (
            'default' => 'icon-telephone',
        )
    );
    $wp_customize->add_control ( 'contact_2_icon', array (
            'type'  => 'select',
            'label' => __('Contact Section Icon 2', 'ephic'),
            'description'   => __('Choose the second icon for the contact section', 'ephic'),
            'choices'   => $linear_icons,
            'section'   => 'configure_sections',
            'priority'  => 13,
            'active_callback' => 'contact_selected',
        )
    );

	$wp_customize->add_setting ( 'contact_3_icon', array (
            'default' => 'icon-envelope',
        )
    );
    $wp_customize->add_control ( 'contact_3_icon', array (
            'type'  => 'select',
            'label' => __('Contact Section Icon 3', 'ephic'),
            'description'   => __('Choose the third icon for the contact section', 'ephic'),
            'choices'   => $linear_icons,
            'section'   => 'configure_sections',
            'priority'  => 15,
            'active_callback' => 'contact_selected',
        )
    );
}

/* The check for the additional information section being selected to display the icons */
function contact_selected($control) {
    if( $control->manager->get_setting('section_choice')->value() == 'contact') {
        return true;
    } else {
        return false;
    }
}

add_action( 'customize_register', 'configure_contacts_customize');

/* Contact Icon 1 Text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'contact_1_text',
    'label'     => __('Contact Icon Text 1', 'ephic'),
    'priority'  => 12,
    'default'   => '25 North Street / Your Town,<br />CO 88888 United States',
    'description'=> __('Add your short description', 'ephic'),
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'contact'
        ),
    ),
) );

/* Contact Icon 2 Text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'contact_2_text',
    'label'     => __('Contact Icon Text 2', 'ephic'),
    'priority'  => 14,
    'default'   => '(+312) 0454 3234 23',
    'description'=> __('Add your short description', 'ephic'),
    'section'   => 'configure_sections',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'contact'
        ),
    ),
) );

/* Contact Icon 3 Text */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'      => 'textarea',
    'settings'  => 'contact_3_text',
    'label'     => __('Contact Icon Text 3', 'ephic'),
    'priority'  => 16,
    'default'   => 'Email: noreply@gmail.com',
    'description'=> __('Add your short description', 'ephic'),
    'section'   => 'configure_sections',
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
    'default'   => '[contact-form-7 title="25North Contact Form"]',
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
 * About Page Map
 */

/* About Map Marker */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'image',
    'settings'      => 'about_map_marker',
    'label'         => __('Insert your map marker', 'ephic'),
    'section'       => 'configure_sections',
    'priority'      => 10,
    'default'       => '',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'aboutmap'
        ),
    ),
) );

/* About Map latitude */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'text',
    'settings'      => 'about_map_lat',
    'label'         => __('Insert the location latitude', 'ephic'),
    'section'       => 'configure_sections',
    'priority'      => 10,
    'default'       => '39.7645187',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'aboutmap'
        ),
    ),
) );

/* About Map longitude */
ephic_Kirki::add_field( 'ephic_theme', array(
    'type'          => 'text',
    'settings'      => 'about_map_lng',
    'label'         => __('Insert the location longitude', 'ephic'),
    'section'       => 'configure_sections',
    'priority'      => 10,
    'default'       => '-104.9951951',
    'active_callback'   => array(  // Kirki field dependency
        array(
            'setting'   => 'section_choice',
            'operator'  => '==',
            'value'     => 'aboutmap'
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
    'type'        => 'radio-buttonset',
    'settings'    => 'blog_sidebar',
    'label'       => __( 'Blog Sidebar', 'ephic' ),
    'description' => __( 'Choose the blog sidebar location.', 'ephic'),
    'section'     => 'blog_settings',
    'default'     => 'right',
    'priority'    => 10,
    'choices'     => array(
        'left'   => esc_attr__( 'Left', 'ephic' ),
        'right' => esc_attr__( 'Right', 'ephic' ),
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

