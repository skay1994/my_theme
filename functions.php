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

/**
 * Register our sidebars and widgetized areas.
 */
function mytheme_widgets_init() {
	register_sidebar( [
		'name'          => 'Home right sidebar',
		'id'            => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	] );
}
add_action( 'widgets_init', 'mytheme_widgets_init' );

// Customize excerpt post default
function my_excerpt_length($length){
	return 20;
}
add_filter('excerpt_length', 'my_excerpt_length');

// Add Bold to searched term
function highlight_results($text){
	if (is_search()) {
		$sr = get_query_var('s');
		$keys = explode(' ', $sr);
		$keys = array_filter($keys);
		$text = preg_replace('/('.implode('|', $keys) .')/iu', '<span class="search-highlight">\0</span>', $text);
	}
	return $text;
}
add_filter('the_excerpt', 'highlight_results');
add_filter('the_title', 'highlight_results');

// Add atributes for post link paginates
function previous_post_link_paginate($ars){
	return $ars.' class="btn btn-outline-primary"';
}
add_filter('previous_posts_link_attributes', "previous_post_link_paginate");
function next_post_link_paginate($ars){
	return $ars.' class="btn btn-outline-primary"';
}
add_filter('next_posts_link_attributes', "next_post_link_paginate");

// custom paginate links
function myCustomPaginate() {
	$basePageinate = '<div class="btn-group" role="group" aria-label="Post Pagination">{links}</div>';
	$links = paginate_links([
		'mid_size'  => 2,
		'prev_text' => __( 'Back', 'textdomain' ),
		'next_text' => __( 'Onward', 'textdomain' ),
		'type' => 'array'
	]);
	$formattedLinks = '';
	foreach ($links as $link) {
		if(strpos($link, 'class="prev page-numbers') || strpos($link, 'class="next page-numbers')) {
			$link = str_replace(['class="prev page-numbers', 'class="next page-numbers', '">'], ['class="btn btn-primary', 'class="btn btn-primary', '" role="button">'], $link);
		} elseif(strpos($link, 'aria-current="page" class="page-numbers current')) {
			$link = str_replace(['class="page-numbers ', '">'], ['class="btn btn-primary disabled ', '" role="button" aria-disabled="true">'], $link);
		} elseif(strpos($link, 'class="page-numbers')) {
			$link = str_replace(['class="page-numbers', '">'], ['class="btn btn-outline-primary', '" role="button">'], $link);
		}
		$formattedLinks .= $link;
	}

	return str_replace('{links}', $formattedLinks, $basePageinate);
}