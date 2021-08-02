<?php

if ( ! function_exists( 'biagiotti_mikado_sticky_header_meta_boxes_options_map' ) ) {
	function biagiotti_mikado_sticky_header_meta_boxes_options_map( $header_meta_box ) {
		
		$sticky_amount_container = biagiotti_mikado_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'sticky_amount_container_meta_container',
				'dependency' => array(
					'hide' => array(
						'mkdf_header_behaviour_meta'  => array( '', 'no-behavior','fixed-on-scroll','sticky-header-on-scroll-up' )
					)
				)
			)
		);

		biagiotti_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_sticky_header_in_grid_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Sticky Header in Grid', 'biagiotti' ),
				'description'   => esc_html__( 'Enabling this option will put sticky header in grid', 'biagiotti' ),
				'parent'        => $header_meta_box,
				'options'       => biagiotti_mikado_get_yes_no_select_array()
			)
		);
		
		biagiotti_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_scroll_amount_for_sticky_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Scroll Amount for Sticky Header Appearance', 'biagiotti' ),
				'description' => esc_html__( 'Define scroll amount for sticky header appearance', 'biagiotti' ),
				'parent'      => $sticky_amount_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);
		
		$biagiotti_custom_sidebars = biagiotti_mikado_get_custom_sidebars();
		if ( count( $biagiotti_custom_sidebars ) > 0 ) {
			biagiotti_mikado_create_meta_box_field(
				array(
					'name'        => 'mkdf_custom_sticky_menu_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area In Sticky Header Menu Area', 'biagiotti' ),
					'description' => esc_html__( 'Choose custom widget area to display in sticky header menu area"', 'biagiotti' ),
					'parent'      => $header_meta_box,
					'options'     => $biagiotti_custom_sidebars,
					'dependency' => array(
						'show' => array(
							'mkdf_header_behaviour_meta' => array( 'sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up' )
						)
					)
				)
			);
		}
	}
	
	add_action( 'biagiotti_mikado_action_additional_header_area_meta_boxes_map', 'biagiotti_mikado_sticky_header_meta_boxes_options_map', 8 );
}