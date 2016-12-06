<?php
/**
 * Ephic functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @packageEphic
 */
// Define constants
define('EPHIC_ADMIN_DIR', get_template_directory() . '/admin/');
define('EPHIC_INC_DIR', get_template_directory() . '/inc/');
define('EPHIC_TEMPLATES_DIR', get_template_directory() . '/page-templates/');
define('EPHIC_CSS_DIR', get_template_directory() . '/css/'); // used for less generation

if ( ! function_exists( 'ephic_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ephic_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based onEphic, use a find and replace
	 * to change 'ephic' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'ephic', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Add html5 searchform support
	add_theme_support( 'html5', array( 'search-form' ) );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'ephicprimary' => __( 'Primary', 'ephic' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
}
endif;
add_action( 'after_setup_theme', 'ephic_setup' );

/** 
 * WPML Language Switcher bootstrap nav layout
 */
function ephic_lang_switch($items, $args) {
	$wpml_switcher = esc_html(get_theme_mod('wpml_switcher', ''));
	if ($wpml_switcher != '1') { return $items; }
	$languages = apply_filters( 'wpml_active_languages', NULL, array( 'skip_missing' => 0) );
	$count = count($languages);
	$icl = '';
	if(!empty ($languages) ) {
		foreach( $languages as $lang ){
			if ($lang['active']) {
				$extra_class = ' class="menu-item dropdown icl-menu"';
				$icl .= sprintf( '<li' . "%s" . '><a href="' . "%s" . '" class="dropdown-toggle"'
					 . ' data-toggle="dropdown">'
					 . '<img src="' . "%s" . '" alt="' . "%s" . '" /><span class="language-name">%s</span>'
					 . ' <span class="caret"> </span></a>',
					$extra_class,
					$lang['url'],
					$lang['country_flag_url'],
					$lang['native_name'],
					$lang['native_name']
				);
				if ($count > 1) {  // Only create the dropdown if there is more than the current language
					$icl .= '<ul class="dropdown-menu" role="menu">';
				}
			}
		}
		foreach ( $languages as $lang ) {
			if (!$lang['active']) {
				$icl .= sprintf( '<li class="menu-item"><a href="' . "%s" . '"><img src="' . "%s" . '" alt="'
					. "%s" . '" /><span class="language-name">' . "%s" . '</span></a></li>',
					$lang['url'],
					$lang['country_flag_url'],
					$lang['native_name'],
					$lang['native_name']
					);
			}
		}
		if ($count > 1) {
			$icl .= '</ul>';
		}
		$icl .= '</li>';
	}
	return $items . $icl;
}
// Add Styled Language select for wpml
add_filter('wp_nav_menu_items', 'ephic_lang_switch', 20, 2);

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ephic_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ephic_content_width', 640 );
}
add_action( 'after_setup_theme', 'ephic_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ephic_widgets_init() {
	register_sidebar( array(
		'name'			=> esc_html__( 'Sidebar', 'ephic' ),
		'id'			=> 'sidebar-1',
		'description'	=> esc_html__( 'Add widgets here.', 'ephic' ),
		'before_widget' => '<section id="%1$s" class="widget sidebar-widget %2$s">',
		'after_widget'	=> '</section>',
		'before_title'	=> '<h4 class="widget-title">',
		'after_title'	=> '</h4>',
	) );
}
add_action( 'widgets_init', 'ephic_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ephic_scripts() {
	$ephic_theme = wp_get_theme();
	$templates = array(
		'page-templates/home-template.php',
		'page-templates/home-demo-sticky-template.php',
		'page-templates/home-demo-template.php'
	);
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/css/jquery.fancybox.css' );
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.min.css' );
	wp_enqueue_style( 'ephic-style', get_stylesheet_uri() );
	// Other pages (not Front Page) styles
	if (!is_page_template($templates)) {
		$top_background = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
		$top_background = $top_background[0];
		$testimonial_bg = esc_url(get_theme_mod('testimonial_bg'));
		$four_o_four_bg = esc_url(get_theme_mod('background_404'));
		$color_primary = get_theme_mod('color_primary');
		$other_css = "
			.page-template.blog-header {
				background: transparent url('$top_background') no-repeat fixed top;
				background-size: cover;
			}
			.blog-header h1 {
				color: #fff;
				font-size: 42px;
				font-style: normal;
				font-weight: 500;
			}
			.four-header {
				background: transparent url('$four_o_four_bg') no-repeat fixed top;
			}
			";
		wp_add_inline_style( 'ephic-style', $other_css );
	} else { // home template
		$color_primary = get_theme_mod('color_primary');
		$inline_css = "
		";
		/* Home page slide background images */
		$sliders_bgs = '';
		if (get_theme_mod('home_top', '') == 'slider') {
			$sliders = get_theme_mod('home_slides', array());
			$i = 1;
			foreach ($sliders as $k => $v) {
				$slide_url = $v['slider'];
				if (is_numeric($slide_url) ) {
					$slide_url = wp_get_attachment_url($slide_url);
				}
				$slide_url = esc_url($slide_url);
				$slide_class = '.main-image';
				if ($i > 1) {
					$slide_class = '.main-image.main-image' . $i;
				}
				$sliders_bgs .= "
				$slide_class {
					background-image: url('$slide_url');
				}
				";
				$i++;
			}
		}
		$inline_css .= $sliders_bgs;

		wp_add_inline_style( 'ephic-style', $inline_css );
	}


	// Scripts
	wp_enqueue_script( 'ephic-navigation', get_template_directory_uri() . '/js/navigation.js', 
	array(), '20151215', true );
	wp_enqueue_script( 'ephic-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', 
	array(), '20151215', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true );
	wp_enqueue_script( 'bootstrap-dropdown', get_template_directory_uri() . '/js/jquery.bootstrap-dropdown-hover.min.js', 
	array('bootstrap'), '1.0.4', true ); 
	wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/jquery.fancybox.pack.js', array('jquery'), '', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), '', true);
	wp_enqueue_script( 'owlcarousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '', true);
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/js/waypoints.min.js', array('owlcarousel'), '', true);
	wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/parallax.min.js', array('waypoints'), '', true);
	wp_enqueue_script( 'mystickymenu', get_template_directory_uri() . '/js/mystickymenu.min.js', array('parallax'), '', true);
	wp_enqueue_script( 'ephic-js', get_template_directory_uri() . '/js/ephic.js', 
		array( 'mystickymenu' ), $ephic_theme->get('Version'), true);
	wp_localize_script(  'ephic-js', 'ephic_vars', array(
		'is_rtl'	  => is_rtl()
	));

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ephic_scripts' );

/**
 * Enqueue Customizer scripts and styles.
 */
function ephic_admin_scripts() {
	$ephic_theme = wp_get_theme();
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'ephic-customizer', get_template_directory_uri() . '/css/ephic-customizer.css' );
	wp_enqueue_script( 'ephic_customizer_admin', 
		get_template_directory_uri() . '/js/customizer-admin.js', array(), $ephic_theme->get('Version'), true );
}
add_action( 'customize_controls_enqueue_scripts', 'ephic_admin_scripts'); // only for the customizer
//add_action( 'admin_enqueue_scripts', 'ephic_admin_scripts');

/**
 * Add Placeholders to the comment form
 */
function ephic_comment_placeholders( $fields ) {
	$fields['author'] = str_replace(
		'<input', '<input placeholder="'
		. __('Name', 'ephic') . '"',
	$fields['author']
	);
	$fields['email'] = str_replace(
		'<input id="email"',
		'<input id="email" placeholder="'
		. __('Email', 'ephic') . '"',
	$fields['email']
	);		
	$fields['url'] = str_replace(
		'<input id="url"',
		'<input id="url" placeholder="' . __('Website', 'ephic') . '"',
	$fields['url']
	);
	return $fields;
}
add_filter( 'comment_form_default_fields', 'ephic_comment_placeholders' );

/**
 * Move comment below other inputs
 * 
 */
function ephic_comment_field_placeholder( $fields ) {
	$comment_field = str_replace(
		'<textarea id="comment"',
		'<textarea id="comment" placeholder="' . __('Comment', 'ephic') . '"',
		$fields['comment']
	);
	unset ( $fields['comment'] );

	$fields['comment'] = $comment_field;

	return $fields;
}
add_filter( 'comment_form_fields', 'ephic_comment_field_placeholder' );

/**
 * Custom comment display for blog
 */
function ephic_comments($comment, $args, $depth) {
	if ( 'div' === $args['style'] ) {
		$tag	   = 'div';
		$add_below = 'comment';
	} else {
		$tag	   = 'li';
		$add_below = 'div-comment';
	}
	?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>

	<div class="comment-meta comment-author vcard">
		<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		<div class="comment-meta-content">
			<?php 
			$post_author = '';
			if (get_comment_author() == get_the_author()) {
				$post_author = '<span class="post-author">(' . __('Post author', 'ephic') . ')</span>';
			}
			printf( '<cite class="fn">%s' . ' ' . $post_author . '</cite>', get_comment_author_link() ); ?>
			<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'ephic' ); ?></em>
			<br />
			<?php endif; ?>

			<p><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
			/* translators: 1: date, 2: time */
			printf( '%1$s - %2$s', get_comment_date(),	get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'ephic' ), '  ', '' );
			?>
			</p> 
		</div> <!-- .comment-meta-content -->
	
		<div class="comment-actions">
			<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div>
	</div> <!-- .comment-meta -->
	<div class="comment-content post-content">
	<?php comment_text(); ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>

<?php
}

/**
 * Customize Password Protected Post Form
 */
add_filter( 'the_password_form', 'ephic_password_form' );
function ephic_password_form() {
	global $post;
	$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	$placeholder = esc_html__('Password', 'ephic');
	$pwform = '<form class="protected-post-form" action="' 
		. esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">'
		. '<input name="post_password" id="' . $label . '" type="password" placeholder="' . $placeholder 
		. '" /><input type="submit" name="Submit" class="button primary-btn" value="' 
		. esc_html__( 'Submit', 'ephic' ) . '" /></form>';
    return $pwform;
}

/**
 * Custom template tags for this theme.
 */
require EPHIC_INC_DIR . 'template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require EPHIC_INC_DIR . 'extras.php';

/**
 * Font Selection functions for customizer
 */
require EPHIC_INC_DIR . 'font-arrays.php';

/**
 * Kirki Dynamic styles
 */
require EPHIC_INC_DIR . 'dynamic-styles.php';

/**
 * Recommend the Kirki plugin
 */
require_once EPHIC_INC_DIR . 'include-kirki.php';

/**
 * Load the Kirki Fallback class (if Kirki is uninstalled, settings should still work on the frontend)
 */
require EPHIC_INC_DIR . 'ephic-kirki.php';

/**
 * Customizer additions.
 */
require EPHIC_INC_DIR . 'customizer.php';

/**
 * Theme Resources - common components used in the theme
 */
require_once EPHIC_ADMIN_DIR . 'theme-resources.php';

/**
 * Theme Custom CSS and JS Code
 */
require_once EPHIC_ADMIN_DIR . 'custom-code-output.php';
$custom_code_output = new ephic_custom_code_output;
add_action('wp_head', array($custom_code_output, 'output_custom_css') );
add_action('wp_footer', array($custom_code_output, 'output_custom_js') );

/**
 * TGMPA inclusion
 */
require_once EPHIC_INC_DIR . 'class-tgm-plugin-activation.php';
require_once EPHIC_INC_DIR . 'tgmpa-config.php';
add_action( 'tgmpa_register', 'ephic_register_required_plugins' );

/**
 * Admin Classes and functions
 */
if (is_admin()) {
	require_once EPHIC_ADMIN_DIR . '/theme-admin.php';
	new ephic_themeAdmin();
}

/**
 * Disable MasterSlider Update Notifications
 */
add_filter( 'masterslider_disable_auto_update', '__return_true' );


/**
 * Load Jetpack compatibility file.
 */
require EPHIC_INC_DIR . 'jetpack.php';

/**
 * Remove Tags, Search, Author, etc. from page titles
 */
add_filter( 'get_the_archive_title', function ($title) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>' ;
	}
	return $title;
});
