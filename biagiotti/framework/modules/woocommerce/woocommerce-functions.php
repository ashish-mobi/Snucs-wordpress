<?php
/**
 * Woocommerce helper functions
 */

if ( ! function_exists( 'biagiotti_mikado_woocommerce_meta_box_functions' ) ) {
	function biagiotti_mikado_woocommerce_meta_box_functions( $post_types ) {
		$post_types[] = 'product';
		
		return $post_types;
	}
	
	add_filter( 'biagiotti_mikado_filter_meta_box_post_types_save', 'biagiotti_mikado_woocommerce_meta_box_functions' );
}

if ( ! function_exists( 'biagiotti_mikado_woocommerce_add_social_share_option' ) ) {
	function biagiotti_mikado_woocommerce_add_social_share_option( $container ) {
		if ( biagiotti_mikado_is_plugin_installed( 'woocommerce' ) ) {
			biagiotti_mikado_add_admin_field(
				array(
					'type'          => 'yesno',
					'name'          => 'enable_social_share_on_product',
					'default_value' => 'no',
					'label'         => esc_html__( 'Product', 'biagiotti' ),
					'description'   => esc_html__( 'Show Social Share for Product Items', 'biagiotti' ),
					'parent'        => $container
				)
			);
		}
	}
	
	add_action( 'biagiotti_mikado_action_post_types_social_share', 'biagiotti_mikado_woocommerce_add_social_share_option', 10, 1 );
}

if ( ! function_exists( 'biagiotti_mikado_woocommerce_style_dynamics_deps' ) ) {
    function biagiotti_mikado_woocommerce_style_dynamics_deps( $deps ) {
        $style_dynamic_deps_array = array();
        if ( biagiotti_mikado_is_plugin_installed( 'woocommerce' ) && biagiotti_mikado_load_woo_assets() ) {
            $style_dynamic_deps_array[] = 'biagiotti-mikado-woo';
            if (biagiotti_mikado_is_responsive_on()) {
                $style_dynamic_deps_array[] = 'biagiotti-mikado-woo-responsive';
            }
        }

        return array_merge($deps, $style_dynamic_deps_array);
    }

    add_filter('biagiotti_mikado_filter_style_dynamic_deps','biagiotti_mikado_woocommerce_style_dynamics_deps');
}

if ( ! function_exists( 'biagiotti_mikado_get_woo_shortcode_module_template_part' ) ) {
	/**
	 * Loads module template part.
	 *
	 * @param string $template name of the template to load
	 * @param string $module name of the module folder
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 * @param array $additional_params array of additional parameters to pass to template
	 *
	 * @return html
	 * @see biagiotti_mikado_get_template_part()
	 */
	function biagiotti_mikado_get_woo_shortcode_module_template_part( $template, $module, $slug = '', $params = array(), $additional_params = array() ) {
		
		//HTML Content from template
		$html          = '';
		$template_path = 'framework/modules/woocommerce/shortcodes/' . $module;
		
		$temp = $template_path . '/' . $template;
		
		if ( is_array( $params ) && count( $params ) ) {
			extract( $params );
		}
		
		if ( is_array( $additional_params ) && count( $additional_params ) ) {
			extract( $additional_params );
		}
		
		$templates = array();
		
		if ( $temp !== '' ) {
			if ( $slug !== '' ) {
				$templates[] = "{$temp}-{$slug}.php";
			}
			
			$templates[] = $temp . '.php';
		}
		$located = biagiotti_mikado_find_template_path( $templates );
		if ( $located ) {
			ob_start();
			include( $located );
			$html = ob_get_clean();
		}
		
		return $html;
	}
}

if ( ! function_exists( 'biagiotti_mikado_is_woocommerce_page' ) ) {
	/**
	 * Function that checks if current page is woocommerce shop, product or product taxonomy
	 * @return bool
	 *
	 * @see is_woocommerce()
	 */
	function biagiotti_mikado_is_woocommerce_page() {
		if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
			return is_woocommerce();
		} elseif ( function_exists( 'is_cart' ) && is_cart() ) {
			return is_cart();
		} elseif ( function_exists( 'is_checkout' ) && is_checkout() ) {
			return is_checkout();
		} elseif ( function_exists( 'is_account_page' ) && is_account_page() ) {
			return is_account_page();
		}
	}
}

if ( ! function_exists( 'biagiotti_mikado_is_woocommerce_shop' ) ) {
	/**
	 * Function that checks if current page is shop or product page
	 * @return bool
	 *
	 * @see is_shop()
	 */
	function biagiotti_mikado_is_woocommerce_shop() {
		return function_exists( 'is_shop' ) && ( is_shop() || is_singular( 'product' ) || biagiotti_mikado_is_woo_archive_page() );
	}
}

if ( ! function_exists( 'biagiotti_mikado_get_woo_shop_page_id' ) ) {
	/**
	 * Function that returns shop page id that is set in WooCommerce settings page
	 * @return int id of shop page
	 */
	function biagiotti_mikado_get_woo_shop_page_id() {
		if ( biagiotti_mikado_is_plugin_installed( 'woocommerce' ) ) {
			//get shop page id from options table
			$shop_id = get_option( 'woocommerce_shop_page_id' );
			$page_id = ! empty( $shop_id ) ? $shop_id : '-1';
			
			return $page_id;
		}
	}
}

if ( ! function_exists( 'biagiotti_mikado_is_product_category' ) ) {
	function biagiotti_mikado_is_product_category() {
		return function_exists( 'is_product_category' ) && is_product_category();
	}
}

if ( ! function_exists( 'biagiotti_mikado_is_product_tag' ) ) {
	function biagiotti_mikado_is_product_tag() {
		return function_exists( 'is_product_tag' ) && is_product_tag();
	}
}

if ( ! function_exists( 'biagiotti_mikado_is_woo_archive_page' ) ) {
	function biagiotti_mikado_is_woo_archive_page() {
		return biagiotti_mikado_is_product_category() || biagiotti_mikado_is_product_tag();
	}
}

if ( ! function_exists( 'biagiotti_mikado_load_woo_assets' ) ) {
	/**
	 * Function that checks whether WooCommerce assets needs to be loaded.
	 *
	 * @see biagiotti_mikado_is_woocommerce_page()
	 * @see biagiotti_mikado_has_woocommerce_shortcode()
	 * @see biagiotti_mikado_has_woocommerce_widgets()
	 * @return bool
	 */
	function biagiotti_mikado_load_woo_assets() {
		return biagiotti_mikado_is_plugin_installed( 'woocommerce' ) && ( biagiotti_mikado_is_woocommerce_page() || biagiotti_mikado_has_woocommerce_shortcode() || biagiotti_mikado_has_woocommerce_widgets() );
	}
}

if ( ! function_exists( 'biagiotti_mikado_return_woocommerce_global_variable' ) ) {
	function biagiotti_mikado_return_woocommerce_global_variable() {
		if ( biagiotti_mikado_is_plugin_installed( 'woocommerce' ) ) {
			global $product;
			
			return $product;
		}
	}
}

if ( ! function_exists( 'biagiotti_mikado_has_woocommerce_shortcode' ) ) {
	/**
	 * Function that checks if current page has at least one of WooCommerce shortcodes added
	 * @return bool
	 */
	function biagiotti_mikado_has_woocommerce_shortcode() {
		$woocommerce_shortcodes = array(
			'add_to_cart',
			'add_to_cart_url',
			'product_page',
			'product',
			'products',
			'product_categories',
			'product_category',
			'recent_products',
			'featured_products',
			'sale_products',
			'best_selling_products',
			'top_rated_products',
			'product_attribute',
			'related_products',
			'woocommerce_messages',
			'woocommerce_cart',
			'woocommerce_checkout',
			'woocommerce_order_tracking',
			'woocommerce_my_account',
			'woocommerce_edit_address',
			'woocommerce_change_password',
			'woocommerce_view_order',
			'woocommerce_pay',
			'woocommerce_thankyou'
		);
		
		$woocommerce_shortcodes = apply_filters( 'biagiotti_mikado_filter_woocommerce_shortcodes_list', $woocommerce_shortcodes );
		
		foreach ( $woocommerce_shortcodes as $woocommerce_shortcode ) {
			$has_shortcode = biagiotti_mikado_has_shortcode( $woocommerce_shortcode );
			
			if ( $has_shortcode ) {
				return true;
			}
		}
		
		return false;
	}
}

if ( ! function_exists( 'biagiotti_mikado_has_woocommerce_widgets' ) ) {
	/**
	 * Function that checks if current page has at least one of WooCommerce shortcodes added
	 * @return bool
	 */
	function biagiotti_mikado_has_woocommerce_widgets() {
		$widgets_array = array(
			'mkdf_woocommerce_dropdown_cart',
			'woocommerce_widget_cart',
			'woocommerce_layered_nav',
			'woocommerce_layered_nav_filters',
			'woocommerce_price_filter',
			'woocommerce_product_categories',
			'woocommerce_product_search',
			'woocommerce_product_tag_cloud',
			'woocommerce_products',
			'woocommerce_recent_reviews',
			'woocommerce_recently_viewed_products',
			'woocommerce_top_rated_products'
		);
		
		$widgets_array = apply_filters( 'biagiotti_mikado_filter_woocommerce_widgets_list', $widgets_array );
		
		foreach ( $widgets_array as $widget ) {
			$active_widget = is_active_widget( false, false, $widget );
			
			if ( $active_widget ) {
				return true;
			}
		}
		
		return false;
	}
}

if ( ! function_exists( 'biagiotti_mikado_add_product_to_search_types' ) ) {
    function biagiotti_mikado_add_product_to_search_types( $post_types ) {
        $post_types['product'] = esc_html__( 'Product', 'biagiotti' );

        return $post_types;
    }

    add_filter( 'biagiotti_mikado_filter_search_post_type_widget_params_post_type', 'biagiotti_mikado_add_product_to_search_types' );
}

if ( ! function_exists( 'biagiotti_mikado_get_woocommerce_sale' ) ) {
	function biagiotti_mikado_get_woocommerce_sale( $product ) {
		$enable_percent_mark = biagiotti_mikado_options()->getOptionValue( 'woo_enable_percent_sign_value' );
		$price               = intval( $product->get_regular_price() );
		$sale_price          = intval( $product->get_sale_price() );
		
		if ( $price > 0 && $enable_percent_mark === 'yes' ) {
			return '-' . ( 100 - round( ( $sale_price * 100 ) / $price ) ) . '%';
		} else {
			return esc_html__( 'Sale', 'biagiotti' );
		}
	}
}

if ( ! function_exists( 'biagiotti_mikado_is_yith_clv_installed' ) ) {
	function biagiotti_mikado_is_yith_clv_installed() {
		return defined( 'YITH_WCCL' );
	}
}

if ( ! function_exists( 'biagiotti_mikado_is_yith_wcqv_installed' ) ) {
	function biagiotti_mikado_is_yith_wcqv_installed() {
		return defined( 'YITH_WCQV' );
	}
}

if ( ! function_exists( 'biagiotti_mikado_is_yith_wcwl_installed' ) ) {
	function biagiotti_mikado_is_yith_wcwl_installed() {
		return defined( 'YITH_WCWL' );
	}
}

if ( ! function_exists( 'biagiotti_mikado_modify_single_add_to_class_text' ) ) {
	/**
	 * Function that modifies single product add to cart text
	 *
	 * @return string modified add to cart text
	 */
	function biagiotti_mikado_modify_single_add_to_class_text() {
		return esc_html__( 'Purchase', 'biagiotti' );
	}

	add_filter( 'woocommerce_product_single_add_to_cart_text', 'biagiotti_mikado_modify_single_add_to_class_text' );
}

if ( ! function_exists( 'biagiotti_mikado_modify_product_reviews_form' ) ) {
    function biagiotti_mikado_modify_product_reviews_form( $form ) {

    	$commenter = wp_get_current_commenter();

    	$form['fields'] = array(
			'author' => '<input id="author" name="author" placeholder="' . esc_attr__( 'Your Name', 'biagiotti' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" required />',
			'email'  => '<input id="email" name="email" placeholder="' . esc_attr__( 'Your Email', 'biagiotti' ) . '" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" required />',
		);

    	$form['comment_field'] = '';

    	if ( wc_review_ratings_enabled() ) {
			$form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__( 'Your rating', 'biagiotti' ) . '</label><select name="rating" id="rating" required>
				<option value="">' . esc_html__( 'Rate&hellip;', 'biagiotti' ) . '</option>
				<option value="5">' . esc_html__( 'Perfect', 'biagiotti' ) . '</option>
				<option value="4">' . esc_html__( 'Good', 'biagiotti' ) . '</option>
				<option value="3">' . esc_html__( 'Average', 'biagiotti' ) . '</option>
				<option value="2">' . esc_html__( 'Not that bad', 'biagiotti' ) . '</option>
				<option value="1">' . esc_html__( 'Very poor', 'biagiotti' ) . '</option>
			</select></div>';
		}

		$form['comment_field'] .= '<p class="comment-form-comment"><textarea id="comment" placeholder="' . esc_attr__( 'Your review', 'biagiotti' ) . '" name="comment" cols="45" rows="6" required></textarea></p>';

        return $form;
    }

    add_filter( 'woocommerce_product_review_comment_form_args', 'biagiotti_mikado_modify_product_reviews_form' );
}