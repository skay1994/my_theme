<?php

/**
 * Register Custom Navigation Walker
 */
function register_navwalker()
{
	require_once get_template_directory() . '/MyThemeMenuWalker.php';
}
add_action('after_setup_theme', 'register_navwalker');

// Add theme menus positions
function my_theme_setup()
{
	register_nav_menus([
		'primary_menu' => __('Menu Primario'),
		'top_menu' => __('Menu Topo'),
	]);
}
add_action('after_setup_theme', 'my_theme_setup');

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