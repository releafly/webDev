<?php

if ( !defined( 'WP_DEBUG' ) ) {
	die( 'Direct access forbidden.' );
}

function marketo_theme_enqueue_styles() {
	wp_enqueue_style( 'marketo-child-style', get_template_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'marketo_theme_enqueue_styles' );
