<?php
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function ephic_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		// Envato Market plugin
		array(
			'name'				 => esc_html__('WP Envato Market', 'ephic'),
			'slug'				 => 'envato-market',
			'source'			 => 'http://envato.github.io/wp-envato-market/dist/envato-market.zip',
			'version'			 => '1.0.0-RC2',
			'force_activation'	 => false,
			'force_deactivation' => false,
			'external_url'		 => 'https://github.com/envato/wp-envato-market',
			'required'			 => false
		),
		// Ephic-Plugin
		array(
			'name'				 => esc_html__('Ephic Plugin', 'ephic'),
			'slug'				 => 'ephic-plugin',
			'source'			 => EPHIC_INC_DIR . 'plugins/ephic-plugin.zip',
			'version'			 => '1.0',
			'force_activation'	 => false,
			'force_deactivation' => false,
			'external_url'		 => 'http://sh-themes.com',
			'required'			 => true
		),
		// Contact Form 7
		array(
			'name'				 => esc_html__('Contact Form 7', 'ephic'),
			'slug'				 => 'contact-form-7',
			'source'			 => 'https://wordpress.org/plugins/contact-form-7/',
			'version'			 => '4.5.1',
			'force_activation'	 => false,
			'force_deactivation' => false,
			'external_url'		 => 'http://contactform7.com/',
			'required'			 => false,
		),
		// Kirki - yes, here too
		array(
			'name'				 => esc_html__('Kirki', 'ephic'),
			'slug'				 => 'kirki',
			'source'			 => 'https://wordpress.org/plugins/kirki/',
			'version'			 => '2.3.5',
			'force_activation'	 => false,
			'force_deactivation' => false,
			'external_url'		 => 'https://wordpress.org/plugins/kirki/',
			'required'			 => true
		),
/*
		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'				 => 'TGM Example Plugin', // The plugin name.
			'slug'				 => 'tgm-example-plugin', // The plugin slug (typically the folder name).
			'source'			 => get_template_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
			'required'			 => true, // If false, the plugin is only 'recommended' instead of required.
			'version'			 => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'	 => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'		 => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'		 => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),

		// This is an example of how to include a plugin from an arbitrary external source in your theme.
		array(
			'name'		   => 'TGM New Media Plugin', // The plugin name.
			'slug'		   => 'tgm-new-media-plugin', // The plugin slug (typically the folder name).
			'source'	   => 'https://s3.amazonaws.com/tgm/tgm-new-media-plugin.zip', // The plugin source.
			'required'	   => true, // If false, the plugin is only 'recommended' instead of required.
			'external_url' => 'https://github.com/thomasgriffin/New-Media-Image-Uploader', // If set, overrides default API URL and points to an external URL.
		),

		// This is an example of how to include a plugin from a GitHub repository in your theme.
		// This presumes that the plugin code is based in the root of the GitHub repository
		// and not in a subdirectory ('/src') of the repository.
		array(
			'name'		=> 'Adminbar Link Comments to Pending',
			'slug'		=> 'adminbar-link-comments-to-pending',
			'source'	=> 'https://github.com/jrfnl/WP-adminbar-comments-to-pending/archive/master.zip',
		),

		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'		=> 'BuddyPress',
			'slug'		=> 'buddypress',
			'required'	=> false,
		),

		// This is an example of the use of 'is_callable' functionality. A user could - for instance -
		// have WPSEO installed *or* WPSEO Premium. The slug would in that last case be different, i.e.
		// 'wordpress-seo-premium'.
		// By setting 'is_callable' to either a function from that plugin or a class method
		// `array( 'class', 'method' )` similar to how you hook in to actions and filters, TGMPA can still
		// recognize the plugin as being installed.
		array(
			'name'		  => 'WordPress SEO by Yoast',
			'slug'		  => 'wordpress-seo',
			'is_callable' => 'wpseo_init',
		),
*/

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'		   => 'ephic',				   // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',					   // Default absolute path to bundled plugins.
		'menu'		   => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,					   // Show admin notices or not.
		'dismissable'  => true,					   // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',					   // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,				   // Automatically activate plugins after installation or not.
		'message'	   => '',					   // Message to output right before the plugins table.

		/*
		'strings'	   => array(
			'page_title'					  => esc_html__( 'Install Required Plugins', 'ephic' ),
			'menu_title'					  => esc_html__( 'Install Plugins', 'ephic' ),
			/* translators: %s: plugin name. * /
			'installing'					  => esc_html__( 'Installing Plugin: %s', 'ephic' ),
			/* translators: %s: plugin name. * /
			'updating'						  => esc_html__( 'Updating Plugin: %s', 'ephic' ),
			'oops'							  => esc_html__( 'Something went wrong with the plugin API.', 'ephic' ),
			'notice_can_install_required'	  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'ephic'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'ephic'
			),
			'notice_ask_to_update'			  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'ephic'
			),
			'notice_ask_to_update_maybe'	  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'ephic'
			),
			'notice_can_activate_required'	  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'ephic'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'ephic'
			),
			'install_link'					  => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'ephic'
			),
			'update_link'					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'ephic'
			),
			'activate_link'					  => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'ephic'
			),
			'return'						  => esc_html__( 'Return to Required Plugins Installer', 'ephic' ),
			'plugin_activated'				  => esc_html__( 'Plugin activated successfully.', 'ephic' ),
			'activated_successfully'		  => esc_html__( 'The following plugin was activated successfully:', 'ephic' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'			  => esc_html__( 'No action taken. Plugin %1$s was already active.', 'ephic' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'	  => esc_html__( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'ephic' ),
			/* translators: 1: dashboard link. * /
			'complete'						  => esc_html__( 'All plugins installed and activated successfully. %1$s', 'ephic' ),
			'dismiss'						  => esc_html__( 'Dismiss this notice', 'ephic' ),
			'notice_cannot_install_activate'  => esc_html__( 'There are one or more required or recommended plugins to install, update or activate.', 'ephic' ),
			'contact_admin'					  => esc_html__( 'Please contact the administrator of this site for help.', 'ephic' ),

			'nag_type'						  => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
	);

	tgmpa( $plugins, $config );
}

