<?php

/*** Child Theme Function  ***/

if ( ! function_exists( 'biagiotti_mikado_child_theme_enqueue_scripts' ) ) {
	function biagiotti_mikado_child_theme_enqueue_scripts() {
		$parent_style = 'biagiotti-mikado-default-style';
		
		wp_enqueue_style( 'biagiotti-mikado-child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ) );
	}
	
	add_action( 'wp_enqueue_scripts', 'biagiotti_mikado_child_theme_enqueue_scripts' );
}