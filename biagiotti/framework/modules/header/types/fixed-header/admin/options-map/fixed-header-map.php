<?php

if ( ! function_exists( 'biagiotti_mikado_get_hide_dep_for_fixed_header_options' ) ) {
	function biagiotti_mikado_get_hide_dep_for_fixed_header_options() {
		$hide_dep_options = apply_filters( 'biagiotti_mikado_filter_fixed_header_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'biagiotti_mikado_get_additional_hide_dep_for_fixed_header_options' ) ) {
	function biagiotti_mikado_get_additional_hide_dep_for_fixed_header_options() {
		$additional_hide_dep_options = apply_filters( 'biagiotti_mikado_filter_fixed_header_additional_hide_global_option', $additional_hide_dep_options = array() );
		
		return $additional_hide_dep_options;
	}
}

if ( ! function_exists( 'biagiotti_mikado_header_fixed_options_map' ) ) {
	function biagiotti_mikado_header_fixed_options_map() {
		$hide_dep_options            = biagiotti_mikado_get_hide_dep_for_fixed_header_options();

		$panel_fixed_header = biagiotti_mikado_add_admin_panel(
			array(
				'title'           => esc_html__( 'Fixed Header', 'biagiotti' ),
				'name'            => 'panel_fixed_header',
				'page'            => '_header_page',
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
		
		biagiotti_mikado_add_admin_field(
			array(
				'name'          => 'fixed_header_background_color',
				'type'          => 'color',
				'default_value' => '',
				'label'         => esc_html__( 'Background Color', 'biagiotti' ),
				'description'   => esc_html__( 'Choose a background color for header area', 'biagiotti' ),
				'parent'        => $panel_fixed_header
			)
		);
		
		biagiotti_mikado_add_admin_field(
			array(
				'name'        => 'fixed_header_transparency',
				'type'        => 'text',
				'label'       => esc_html__( 'Background Transparency', 'biagiotti' ),
				'description' => esc_html__( 'Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'biagiotti' ),
				'parent'      => $panel_fixed_header,
				'args'        => array(
					'col_width' => 1
				)
			)
		);
		
		biagiotti_mikado_add_admin_field(
			array(
				'parent'        => $panel_fixed_header,
				'type'          => 'color',
				'name'          => 'fixed_header_border_bottom_color',
				'default_value' => '',
				'label'         => esc_html__( 'Border Color', 'biagiotti' ),
				'description'   => esc_html__( 'Set border bottom color for header area', 'biagiotti' ),
			)
		);
		
		$group_fixed_header_menu = biagiotti_mikado_add_admin_group(
			array(
				'title'       => esc_html__( 'Fixed Header Menu', 'biagiotti' ),
				'name'        => 'group_fixed_header_menu',
				'parent'      => $panel_fixed_header,
				'description' => esc_html__( 'Define styles for fixed menu items', 'biagiotti' )
			)
		);
		
		$row1_fixed_header_menu = biagiotti_mikado_add_admin_row(
			array(
				'name'   => 'row1',
				'parent' => $group_fixed_header_menu
			)
		);
		
		biagiotti_mikado_add_admin_field(
			array(
				'name'        => 'fixed_color',
				'type'        => 'colorsimple',
				'label'       => esc_html__( 'Text Color', 'biagiotti' ),
				'description' => '',
				'parent'      => $row1_fixed_header_menu
			)
		);
		
		biagiotti_mikado_add_admin_field(
			array(
				'name'        => 'fixed_hovercolor',
				'type'        => 'colorsimple',
				'label'       => esc_html__( esc_html__( 'Hover/Active Color', 'biagiotti' ), 'biagiotti' ),
				'description' => '',
				'parent'      => $row1_fixed_header_menu
			)
		);
		
		$row2_fixed_header_menu = biagiotti_mikado_add_admin_row(
			array(
				'name'   => 'row2',
				'parent' => $group_fixed_header_menu
			)
		);
		
		biagiotti_mikado_add_admin_field(
			array(
				'name'          => 'fixed_google_fonts',
				'type'          => 'fontsimple',
				'label'         => esc_html__( 'Font Family', 'biagiotti' ),
				'default_value' => '-1',
				'parent'        => $row2_fixed_header_menu,
			)
		);
		
		biagiotti_mikado_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'fixed_font_size',
				'label'         => esc_html__( 'Font Size', 'biagiotti' ),
				'default_value' => '',
				'parent'        => $row2_fixed_header_menu,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		biagiotti_mikado_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'fixed_line_height',
				'label'         => esc_html__( 'Line Height', 'biagiotti' ),
				'default_value' => '',
				'parent'        => $row2_fixed_header_menu,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		biagiotti_mikado_add_admin_field(
			array(
				'type'          => 'selectblanksimple',
				'name'          => 'fixed_text_transform',
				'label'         => esc_html__( 'Text Transform', 'biagiotti' ),
				'default_value' => '',
				'options'       => biagiotti_mikado_get_text_transform_array(),
				'parent'        => $row2_fixed_header_menu
			)
		);
		
		$row3_fixed_header_menu = biagiotti_mikado_add_admin_row(
			array(
				'name'   => 'row3',
				'parent' => $group_fixed_header_menu
			)
		);
		
		biagiotti_mikado_add_admin_field(
			array(
				'type'          => 'selectblanksimple',
				'name'          => 'fixed_font_style',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'biagiotti' ),
				'options'       => biagiotti_mikado_get_font_style_array(),
				'parent'        => $row3_fixed_header_menu
			)
		);
		
		biagiotti_mikado_add_admin_field(
			array(
				'type'          => 'selectblanksimple',
				'name'          => 'fixed_font_weight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'biagiotti' ),
				'options'       => biagiotti_mikado_get_font_weight_array(),
				'parent'        => $row3_fixed_header_menu
			)
		);
		
		biagiotti_mikado_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'fixed_letter_spacing',
				'label'         => esc_html__( 'Letter Spacing', 'biagiotti' ),
				'default_value' => '',
				'parent'        => $row3_fixed_header_menu,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
	}
	
	add_action( 'biagiotti_mikado_action_header_fixed_options_map', 'biagiotti_mikado_header_fixed_options_map', 10, 1 );
}