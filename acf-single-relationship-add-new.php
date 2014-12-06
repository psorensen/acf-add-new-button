<?php
/**
 * Plugin Name: ACF: ‘Add New’ Button
 * Plugin URI: http://github.com/gabyferman/acf-single-relationship-add-new/
 * Description: Adds an ‘Add New’ button to the Relationship Field so you can create a new post without leaving the form your working on.
 * Version: 1.0.0
 * Author: Gaby Ferman
 * Author URI: http://github.com/gabyferman/
 * License: GPLv2
 */

function asran_admin_scripts() {
	$asran_custom_admin_url = array( 'admin_url' => admin_url() );

	wp_enqueue_script( 'colorbox', plugins_url( '/js/jquery.colorbox-min.js', __FILE__ ), array( 'jquery' ) );
	wp_enqueue_script( 'asran-post', plugins_url( '/js/asran-post.js', __FILE__ ), array( 'jquery', 'colorbox' ) );
	wp_enqueue_style( 'colorbox-css', plugins_url( '/css/colorbox.css', __FILE__ ) );
	
	wp_localize_script( 'asran-post', 'asran_custom', $asran_custom_admin_url );
}

add_action( 'wp_enqueue_scripts', 'asran_admin_scripts' );


function your_function_name() {
	wp_enqueue_script( 'function', plugins_url( 'js/button.js', __FILE__ ), array( 'jquery' ), true );
	wp_localize_script( 'function', 'my_ajax_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}

add_action( 'wp_enqueue_scripts', 'your_function_name' );


function get_my_option() {
	// filter for every field
	function my_relationship_query( $args, $field, $post ) {
		// increase the posts per page
		// $args['orderby'] = 'date';
		$args['order'] = 'DESC';

		return $args;
	}

	add_filter( 'acf/fields/relationship/query', 'my_relationship_query', 10, 3 );
}

add_action( 'wp_ajax_get_my_option', 'get_my_option' );
add_action( 'wp_ajax_nopriv_get_my_option', 'get_my_option' );
