<?php
/*
Plugin Name: Admin Bar Colour
Description: Changes the colour of the admin bar based on the environment.
*/

define('COLOR_RED', '#f54242');    // Color for development
define('COLOR_BLUE', '#4287f5');   // Color for staging
define('COLOR_GREEN', '#42f554');  // Color for production (optional)

function custom_admin_css() {
    // Set default color
    $color = COLOR_RED;
    
    // Check for WP_ENVIRONMENT_TYPE (WordPress 5.5+)
    if (defined('WP_ENVIRONMENT_TYPE')) {
        switch (WP_ENVIRONMENT_TYPE) {
            case 'local':
            case 'development':
                $color = COLOR_RED;
                break;
            case 'staging':
                $color = COLOR_BLUE;
                break;
            case 'production':
                $color = COLOR_GREEN;
                break;
        }
    }
    // Fallback: Check for custom WP_ENV constant
    elseif (defined('WP_ENV')) {
        switch (WP_ENV) {
            case 'development':
                $color = COLOR_RED;
                break;
            case 'staging':
                $color = COLOR_BLUE;
                break;
            case 'production':
                $color = COLOR_GREEN;
                break;
        }
    }
    
    // Output CSS
    echo '<style>
        #wpadminbar { background-color: ' . esc_attr($color) . '; }
    </style>';
}
add_action('admin_head', 'custom_admin_css');
add_action('wp_head', 'custom_admin_css'); // Also add to front-end for logged-in users
