<?php
/*
   Admin Main Class
*/

class tfn_themeAdmin {
	//properties
	public $config = array();

	//methods

    public function __construct() {
		// enqueue admin scripts
		add_action( 'admin_enqueue_scripts', array($this, 'load_custom_wp_admin_style') );

	} // end construct

	/*
    * Enqueue admin scripts
    */
	public function load_custom_wp_admin_style() {
        wp_enqueue_media();
        wp_enqueue_script( 'jquery-ui-core',  false, array('jquery') );
        wp_enqueue_script( 'jquery-ui-slider' );
        wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'jquery-ui-dialog' );
		wp_enqueue_style("wp-jquery-ui-dialog");  // styles for dialog

        wp_register_script( 'custom-admin-script', get_template_directory_uri() 
				. '/admin/js/theme-admin.js', false, '1.0.0' );
        wp_enqueue_script( 'custom-admin-script' );
		/*
		wp_localize_script(  'custom-admin-script', 'tfnThemeAdmin', array(
            'adminUrl'       => admin_url('admin-ajax.php'),
        ));
		*/
        wp_register_style( 'custom-admin-css', get_template_directory_uri() . '/admin/css/theme-admin.css', false, '1.0.0' );
        wp_enqueue_style( 'custom-admin-css' );
    }

	/*
	 * Use wp_remote_get
	 */
	public function load_remote($url) {
		$result = wp_remote_get(
			$url,
			array(
				'timeout'  => 600
			)
		);
		return $result;
	}
}
