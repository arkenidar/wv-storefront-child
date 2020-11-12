<?php

// https://wpexplorer-themes.com/total/snippets/child-css-after-parent-css/

function my_load_child_theme_styles() {

	if ( ! defined( 'WPEX_THEME_STYLE_HANDLE' ) ) {
		wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array(), '1.0' );
	}

	// First de-register the main stylesheet (which is now your child theme style.css)
	wp_dequeue_style( WPEX_THEME_STYLE_HANDLE );
	wp_deregister_style( WPEX_THEME_STYLE_HANDLE );

	// Add the parent style.css with the main style handle
	wp_enqueue_style( WPEX_THEME_STYLE_HANDLE, get_template_directory_uri() . '/style.css', array(), WPEX_THEME_VERSION );

	// Re-add child CSS with parent as dependency
	wp_enqueue_style( 'child-css', get_stylesheet_directory_uri() . '/style.css', array( WPEX_THEME_STYLE_HANDLE ), '1.0' );

}
add_action( 'wp_enqueue_scripts', 'my_load_child_theme_styles' );
