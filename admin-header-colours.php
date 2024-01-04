<?php
/*
Plugin Name: Admin Bar Colour
Description: Changes the colour of the admin bar based on the environment.
*/

function custom_admin_css() {
   if (strpos($_SERVER['HTTP_HOST'], 'development') !== false) {
       $color = '#f54242'; // Red for development
   } else (strpos($_SERVER['HTTP_HOST'], 'staging') !== false) {
       $color = '#4287f5'; // Blue for staging
   }
   echo '<style>
   #wpadminbar { background-color: ' . $color . '; }
   </style>';
}
add_action('admin_head', 'custom_admin_css');