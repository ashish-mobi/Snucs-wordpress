<?php

if ( ! function_exists( 'biagiotti_mikado_register_required_plugins' ) ) {
	/**
	 * Registers theme required and optional plugins. Hooks to tgmpa_register hook
	 */
	function biagiotti_mikado_register_required_plugins() {
		$plugins = array(
			array(
				'name'               => esc_html__( 'WPBakery Page Builder', 'biagiotti' ),
				'slug'               => 'js_composer',
				'source'             => get_template_directory() . '/includes/plugins/js_composer.zip',
				'version'            => '6.6.0',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false,
			),
			array(
				'name'               => esc_html__( 'Revolution Slider', 'biagiotti' ),
				'slug'               => 'revslider',
				'source'             => get_template_directory() . '/includes/plugins/revslider.zip',
				'version'            => '6.4.11',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false,
			),
			array(
				'name'     => esc_html__( 'Elementor Page Builder', 'biagiotti' ),
				'slug'     => 'elementor',
				'required' => false,
			),
			array(
				'name'     => esc_html__( 'Qi Addons for Elementor', 'biagiotti' ),
				'slug'     => 'qi-addons-for-elementor',
				'required' => false,
			),
			array(
				'name'               => esc_html__( 'Biagiotti Core', 'biagiotti' ),
				'slug'               => 'biagiotti-core',
				'source'             => get_template_directory() . '/includes/plugins/biagiotti-core.zip',
				'version'            => '2.0.3',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false,
			),
			array(
				'name'               => esc_html__( 'Biagiotti Membership', 'biagiotti' ),
				'slug'               => 'biagiotti-membership',
				'source'             => get_template_directory() . '/includes/plugins/biagiotti-membership.zip',
				'version'            => '1.0.1',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false,
			),
			array(
				'name'               => esc_html__( 'Biagiotti Instagram Feed', 'biagiotti' ),
				'slug'               => 'biagiotti-instagram-feed',
				'source'             => get_template_directory() . '/includes/plugins/biagiotti-instagram-feed.zip',
				'version'            => '2.2.2',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false,
			),
			array(
				'name'               => esc_html__( 'Biagiotti Twitter Feed', 'biagiotti' ),
				'slug'               => 'biagiotti-twitter-feed',
				'source'             => get_template_directory() . '/includes/plugins/biagiotti-twitter-feed.zip',
				'version'            => '2.0.1',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false,
			),
			array(
				'name'     => esc_html__( 'WooCommerce plugin', 'biagiotti' ),
				'slug'     => 'woocommerce',
				'required' => false,
			),
			array(
				'name'     => esc_html__( 'Contact Form 7', 'biagiotti' ),
				'slug'     => 'contact-form-7',
				'required' => false,
			),
			array(
				'name'     => esc_html__( 'Envato Market', 'biagiotti' ),
				'slug'     => 'envato-market',
				'source'   => 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
				'required' => false,
			),
		);

		$config = array(
			'domain'       => 'biagiotti',
			'default_path' => '',
			'parent_slug'  => 'themes.php',
			'capability'   => 'edit_theme_options',
			'menu'         => 'install-required-plugins',
			'has_notices'  => true,
			'is_automatic' => false,
			'message'      => '',
			'strings'      => array(
				'page_title'                      => esc_html__( 'Install Required Plugins', 'biagiotti' ),
				'menu_title'                      => esc_html__( 'Install Plugins', 'biagiotti' ),
				'installing'                      => esc_html__( 'Installing Plugin: %s', 'biagiotti' ),
				'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'biagiotti' ),
				'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'biagiotti' ),
				'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'biagiotti' ),
				'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'biagiotti' ),
				'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'biagiotti' ),
				'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'biagiotti' ),
				'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'biagiotti' ),
				'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'biagiotti' ),
				'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'biagiotti' ),
				'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'biagiotti' ),
				'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'biagiotti' ),
				'return'                          => esc_html__( 'Return to Required Plugins Installer', 'biagiotti' ),
				'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'biagiotti' ),
				'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'biagiotti' ),
				'nag_type'                        => 'updated',
			),
		);

		tgmpa( $plugins, $config );
	}

	add_action( 'tgmpa_register', 'biagiotti_mikado_register_required_plugins' );
}
