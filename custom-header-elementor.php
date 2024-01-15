<?php

/**
 * Plugin Name:       Custom Header Elementor
 * Description:       Custom Header Elementor is created by Zain Hassan.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Zain Hassan
 * Author URI:        https://hassanzain.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       che-elementor 
*/

if(!defined('ABSPATH')){
exit;
}

function add_custom_header_elementor( $elements_manager ) {

	$elements_manager->add_category(
		'el-custom-header',
		[
			'title' => esc_html__( 'Custom Header', 'che-elementor' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'add_custom_header_elementor' );


function register_che_widget( $widgets_manager ) {

    require_once( __DIR__ . '/inc/header-widget.php' );
	$widgets_manager->register( new \CustomHeaderWidget );

}
add_action( 'elementor/widgets/register', 'register_che_widget' );