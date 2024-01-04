<?php
/*
Plugin Name: Admin Bar Colour
Description: Changes the colour of the admin bar based on the environment.
*/

define('COLOR_RED', '#f54242'); // Color for development
define('COLOR_BLUE', '#4287f5'); // Color for staging

function custom_admin_css() {
 // Check if HTTP_HOST is set
 if (!isset($_SERVER['HTTP_HOST'])) {
   return;
 }

 // Set default color
 $color = COLOR_RED;

 // Check if host name contains 'development'
 if (strpos($_SERVER['HTTP_HOST'], 'development') !== false) {
   $color = COLOR_RED; // Red for development
 }
 // Check if host name contains 'staging'
 elseif (strpos($_SERVER['HTTP_HOST'], 'staging') !== false) {
   $color = COLOR_BLUE; // Blue for staging
 }

 // Output CSS
 echo '<style>
 #wpadminbar { background-color: ' . $color . '; }
 </style>';
}

add_action('admin_head', 'custom_admin_css');