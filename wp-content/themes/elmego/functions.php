<?php

require_once 'wp-bootstrap-navwalker.php';

add_theme_support('post-thumbnails');

function mego_add_styles() {
	wp_enqueue_style('my-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');

	wp_enqueue_style('fontawesome-css', get_template_directory_uri() . '/css/font-awesome.min.css');

	wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css');
}

function mego_add_scripts() {
	wp_deregister_script('jquery');

	wp_register_script('jquery', includes_url('/js/jquery/jquery.js'), [], false, true);

	wp_enqueue_script('jquery');

	wp_enqueue_script('my-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', ['jquery'], false, true);

	wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', [], false, true);

}

function mego_register_custom_menu() {
	register_nav_menus([
		'bootstrap_menu' => 'Bootstrap Navigation Bar',
		'footer_menu' => 'Footer_Menu',
	]);
}

function mego_extend_excerpt_length() {

	if (is_author()) {
		return 15;
	}

	return 85;
}

function mego_excerpt_change_dots() {
	return '......';
}

add_filter('excerpt_length', 'mego_extend_excerpt_length');

add_filter('excerpt_more', 'mego_excerpt_change_dots');

function mego_bootstrap_menu() {
	wp_nav_menu([

		'theme_location' => 'bootstrap_menu',
		'menu_class' => 'nav navbar-nav navbar-right',
		'container' => false,
		'depth' => 2,
		'walker' => new wp_bootstrap_navwalker(),

	]);
}

add_action('wp_enqueue_scripts', 'mego_add_styles');

add_action('wp_enqueue_scripts', 'mego_add_scripts');

add_action('init', 'mego_register_custom_menu');