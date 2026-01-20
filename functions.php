<?php

if (!defined('ABSPATH')) exit;

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