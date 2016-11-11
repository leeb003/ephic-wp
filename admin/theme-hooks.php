<?php
/**
 * Theme Hooks
 * tfn = Twenty Five North
 * @packageEphic
 * @subpackage inc
 */

/*-----------------------------------------------------------------------------------*/
/* Header - header.php */
/*-----------------------------------------------------------------------------------*/

function ephic_after_body() {
	// Your Code Here
}
add_action('after_body', 'ephic_after_body');

function ephic_before_header() {
	// Your Code Here
}
add_action('before_header', 'ephic_before_header');

function ephic_before_main_content() {
	// Your Code Here
}
add_action('before_main_content', 'ephic_before_main_content');

/*-----------------------------------------------------------------------------------*/
/* Footer - footer.php */
/*-----------------------------------------------------------------------------------*/

function ephic_before_footer() {
	// Your Code Here
}
add_action('before_footer', 'ephic_before_footer');

function ephic_after_wrapper() {
	// Your Code Here
}
add_action('after_wrapper', 'ephic_after_wrapper');

/*-----------------------------------------------------------------------------------*/
/* Sidebar - sidebar.php */
/*-----------------------------------------------------------------------------------*/

function ephic_before_sidebar() {
	// Your Code Here
}
add_action('before_sidebar', 'ephic_before_sidebar');

function ephic_after_sidebar() {
	// Your Code Here
}
add_action('after_sidebar', 'ephic_after_sidebar');

/*-----------------------------------------------------------------------------------*/
/* Posts List - index.php */
/*-----------------------------------------------------------------------------------*/

function ephic_before_post_header() {
	// Your Code Here
}
add_action('before_post_header', 'ephic_before_post_header');

function ephic_after_post_excerpt() {
	// Your Code Here
}
add_action('after_post_excerpt', 'ephic_after_post_excerpt');

/*-----------------------------------------------------------------------------------*/
/* Single Post - single.php */
/*-----------------------------------------------------------------------------------*/

function ephic_before_single_header() {
	// Your Code Here
}
add_action('before_single_header', 'ephic_before_single_header');

function ephic_before_single_content() {
	// Your Code Here
}
add_action('before_single_content', 'ephic_before_single_content');

function ephic_before_single_sidebar() {
	// Your Code Here
}
add_action('before_single_sidebar', 'ephic_before_single_sidebar');

function ephic_after_single_sidebar() {
	// Your Code Here
}
add_action('after_single_sidebar', 'ephic_after_single_sidebar');

/*-----------------------------------------------------------------------------------*/
/* Page - page.php */
/*-----------------------------------------------------------------------------------*/

function ephic_before_page_header() {
	// Your Code Here
}
add_action('before_page_header', 'ephic_before_page_header');

function ephic_before_page_content() {
	// Your Code Here
}
add_action('before_page_content', 'ephic_before_page_content');

/*-----------------------------------------------------------------------------------*/
/* Archive - archive.php */
/*-----------------------------------------------------------------------------------*/

function ephic_before_archive_header() {
	// Your Code Here
}
add_action('before_archive_header', 'ephic_before_archive_header');

function ephic_before_archive_content() {
	// Your Code Here
}
add_action('before_archive_content', 'ephic_before_archive_content');

function ephic_before_archive_sidebar() {
	// Your Code Here
}
add_action('before_archive_sidebar', 'ephic_before_archive_sidebar');

function ephic_after_archive_sidebar() {
	// Your Code Here
}
add_action('after_archive_sidebar', 'ephic_after_archive_sidebar');

/*-----------------------------------------------------------------------------------*/
/* Home - page-templates/home-page.php */
/*-----------------------------------------------------------------------------------*/

function ephic_before_home_header() {
	// Your Code Here
}
add_action('before_home_header', 'ephic_before_home_header');

function ephic_before_home_content() {
	// Your Code Here
}
add_action('before_home_content', 'ephic_before_home_content');

function ephic_after_home_content() {
	// Your Code Here
}
add_action('after_home_content', 'ephic_after_home_content');

/*-----------------------------------------------------------------------------------*/
/* About Us - page-templates/about-us-template.php
/*-----------------------------------------------------------------------------------*/
function ephic_before_about_header() {
    // Your Code Here
}
add_action('before_about_header', 'ephic_before_about_header');

function ephic_before_about_content() {
    // Your Code Here
}
add_action('before_about_content', 'ephic_before_about_content');

function ephic_after_about_content() {
    // Your Code Here
}
add_action('after_about_content', 'ephic_after_about_content');

/*-----------------------------------------------------------------------------------*/
/* Comments - comments.php */
/*-----------------------------------------------------------------------------------*/

function ephic_before_post_comments() {
	// Your Code Here
}
add_action('before_post_comments', 'ephic_before_post_comments');

function ephic_after_post_comments() {
	// Your Code Here
}
add_action('after_post_comments', 'ephic_after_post_comments');

?>
