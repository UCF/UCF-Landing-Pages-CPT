<?php
/*
Plugin Name: UCF Landing Pages Custom Post Type
Description: Provides a custom post type for landing pages.
Version: 1.0.0
Author: UCF Web Communications
License: GPL3
GitHub Plugin URI: UCF/UCF-Landing-Pages-CPT
*/

if ( ! defined( 'WPINC' ) ) {
    die;
}

define( 'UCF_LANDING_PAGE__PLUGIN_FILE', __FILE__ );

include_once 'includes/ucf-landing-post-type.php';

if ( ! function_exists( 'ucf_landing_page_on_activation' ) ) {
	/**
	 * Called when plugin is activated on a site.
	 */
	function ucf_landing_page_on_activation() {
		UCF_Landing_Page_PostType::register_post_type();
		flush_rewrite_rules();
	}

	register_activation_hook( UCF_LANDING_PAGE__PLUGIN_FILE, 'ucf_landing_page_on_activation' );
}

if ( ! function_exists( 'ucf_landing_page_on_deactivation' ) ) {
	/**
	 * Called when plugin is deactivated on a site.
	 * @author Jim Barnes
	 * @since 1.0.0
	 */
	function ucf_landing_page_on_deactivation() {
		flush_rewrite_rules();
	}

	register_deactivation_hook( UCF_LANDING_PAGE__PLUGIN_FILE, 'ucf_landing_page_on_deactivation' );
}

/**
 * Add action hooks not dependent on other plugins here.
 */
add_action( 'init', array( 'UCF_Landing_Page_PostType', 'register_post_type' ), 10, 0 );
