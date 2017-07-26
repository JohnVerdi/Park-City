<?php

Function wp_custom_script() {
    wp_enqueue_script('wpl_custom_script',get_stylesheet_directory_uri().'/assets/js/custom.js',array(), '1.0.0', true);
}

add_action( 'wp_enqueue_scripts', 'wp_custom_script', 1);
