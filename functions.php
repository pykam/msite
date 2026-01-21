<?php

if (!defined('ABSPATH')) exit;

add_action( 'after_setup_theme', function(){

	add_theme_support( 'menus' );

	add_theme_support( 'custom-logo', [
		// 'height'      => 190,
		// 'width'       => 190,
		'flex-width'  => false,
		'flex-height' => false,
		'header-text' => '',
	] );
});

/**
 * Disable frontend requests
 */
function disable_wp_frontend() {
    // If it's an API request or an admin page, allow it
    if (is_admin() || strpos($_SERVER['REQUEST_URI'], '/wp-json/') === 0) {
        return;
    }

    // global $wp_query;
    // $wp_query->set_404();
    status_header( 404 );
    get_template_part(404); 
    die();

}
add_action('template_redirect', 'disable_wp_frontend');

// Register Navigation Menu
add_action( 'after_setup_theme', 'theme_register_nav_menu' );

function theme_register_nav_menu() {
	register_nav_menu( 'primary', 'Primary Menu' );
    register_nav_menu( 'footer', 'Footer Menu' );
}