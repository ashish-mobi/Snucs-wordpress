<?php

/*************** YITH WISHLIST FILTERS - begin ***************/

//Add yith wishlist button shop archive pages
add_action( 'biagiotti_mikado_action_woo_pl_info_on_image_hover', 'biagiotti_mikado_woocommerce_wishlist_shortcode', 15 );
add_action( 'biagiotti_mikado_action_woo_pl_info_below_image', 'biagiotti_mikado_woocommerce_wishlist_shortcode', 4 );

//Add yith wishlist button product list shortcode
add_action('biagiotti_mikado_action_product_list_shortcode', 'biagiotti_mikado_woocommerce_wishlist_shortcode', 4);

//Remove quick view button from wishlist
remove_all_actions('yith_wcwl_table_after_product_name');

// Prevent YITH responsive list rendering
add_filter( 'yith_wcwl_is_wishlist_responsive', function(){return false;} );

/*************** YITH WISHLIST FILTERS - end ***************/