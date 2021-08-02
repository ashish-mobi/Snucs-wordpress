<?php

if ( class_exists( 'BiagiottiCoreClassWidget' ) ) {
	class BiagiottiMikadoClassButtonWidget extends BiagiottiCoreClassWidget {
		public function __construct() {
			parent::__construct(
				'mkdf_button_widget',
				esc_html__( 'Biagiotti Button Widget', 'biagiotti' ),
				array( 'description' => esc_html__( 'Add button element to widget areas', 'biagiotti' ) )
			);
			
			$this->setParams();
		}
		
		protected function setParams() {
			$this->params = array(
				array(
					'type'    => 'dropdown',
					'name'    => 'type',
					'title'   => esc_html__( 'Type', 'biagiotti' ),
					'options' => array(
						'solid'   => esc_html__( 'Solid', 'biagiotti' ),
						'outline' => esc_html__( 'Outline', 'biagiotti' ),
						'simple'  => esc_html__( 'Simple', 'biagiotti' )
					)
				),
				array(
					'type'        => 'dropdown',
					'name'        => 'size',
					'title'       => esc_html__( 'Size', 'biagiotti' ),
					'options'     => array(
						'small'  => esc_html__( 'Small', 'biagiotti' ),
						'medium' => esc_html__( 'Medium', 'biagiotti' ),
						'large'  => esc_html__( 'Large', 'biagiotti' ),
						'huge'   => esc_html__( 'Huge', 'biagiotti' )
					),
					'description' => esc_html__( 'This option is only available for solid and outline button type', 'biagiotti' )
				),
				array(
					'type'    => 'textfield',
					'name'    => 'text',
					'title'   => esc_html__( 'Text', 'biagiotti' ),
					'default' => esc_html__( 'Button Text', 'biagiotti' )
				),
				array(
					'type'  => 'textfield',
					'name'  => 'link',
					'title' => esc_html__( 'Link', 'biagiotti' )
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'target',
					'title'   => esc_html__( 'Link Target', 'biagiotti' ),
					'options' => biagiotti_mikado_get_link_target_array()
				),
				array(
					'type'  => 'colorpicker',
					'name'  => 'color',
					'title' => esc_html__( 'Color', 'biagiotti' )
				),
				array(
					'type'  => 'colorpicker',
					'name'  => 'hover_color',
					'title' => esc_html__( 'Hover Color', 'biagiotti' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'background_color',
					'title'       => esc_html__( 'Background Color', 'biagiotti' ),
					'description' => esc_html__( 'This option is only available for solid button type', 'biagiotti' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'hover_background_color',
					'title'       => esc_html__( 'Hover Background Color', 'biagiotti' ),
					'description' => esc_html__( 'This option is only available for solid button type', 'biagiotti' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'border_color',
					'title'       => esc_html__( 'Border Color', 'biagiotti' ),
					'description' => esc_html__( 'This option is only available for solid and outline button type', 'biagiotti' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'hover_border_color',
					'title'       => esc_html__( 'Hover Border Color', 'biagiotti' ),
					'description' => esc_html__( 'This option is only available for solid and outline button type', 'biagiotti' )
				),
				array(
					'type'        => 'textfield',
					'name'        => 'margin',
					'title'       => esc_html__( 'Margin', 'biagiotti' ),
					'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'biagiotti' )
				)
			);
		}
		
		public function widget( $args, $instance ) {
			$params = '';
			
			if ( ! is_array( $instance ) ) {
				$instance = array();
			}
			
			// Filter out all empty params
			$instance = array_filter( $instance, function ( $array_value ) {
				return trim( $array_value ) != '';
			} );
			
			// Default values
			if ( ! isset( $instance['text'] ) ) {
				$instance['text'] = 'Button Text';
			}
			
			// Generate shortcode params
			foreach ( $instance as $key => $value ) {
				$params .= " $key='$value' ";
			}
			
			echo '<div class="widget mkdf-button-widget">';
			echo do_shortcode( "[mkdf_button $params]" ); // XSS OK
			echo '</div>';
		}
	}
}