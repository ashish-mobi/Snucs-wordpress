<?php

if ( ! function_exists( 'biagiotti_mikado_meta_boxes_map_after_setup_theme' ) ) {
	function biagiotti_mikado_meta_boxes_map_after_setup_theme() {
		/**
		 * Loades all meta-boxes by going through all folders that are placed directly in meta-boxes folder
		 * and loads map.php file in each.
		 *
		 * @see http://php.net/manual/en/function.glob.php
		 */
		do_action( 'biagiotti_mikado_action_before_meta_boxes_map' );
		
		foreach ( glob( BIAGIOTTI_MIKADO_FRAMEWORK_ROOT_DIR . '/admin/meta-boxes/*/map.php' ) as $meta_box_load ) {
			include_once $meta_box_load;
		}
		
		do_action( 'biagiotti_mikado_action_meta_boxes_map' );
		
		do_action( 'biagiotti_mikado_action_after_meta_boxes_map' );
	}
	
	add_action( 'after_setup_theme', 'biagiotti_mikado_meta_boxes_map_after_setup_theme', 1 );
}

if ( ! function_exists( 'biagiotti_mikado_meta_boxes_map_init' ) ) {
    function biagiotti_mikado_meta_boxes_map_init() {

        do_action( 'biagiotti_mikado_action_meta_boxes_map_on_init_action' );

    }

    add_action( 'init', 'biagiotti_mikado_meta_boxes_map_init', 1 );
}