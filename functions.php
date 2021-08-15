<?php

// Add theme scrips and styles
function add_theme_scripts_styles()
{
	// Load Style
	wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css', [], '5.1.0');
	wp_enqueue_style('style', get_stylesheet_uri());

	// Load Scripts
	wp_enqueue_script('bootstrap_script', "https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js", array('jquery'), 2, true);
}
add_action('wp_enqueue_scripts', 'add_theme_scripts_styles');