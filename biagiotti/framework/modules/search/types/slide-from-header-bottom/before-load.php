<?php

if ( ! function_exists( 'biagiotti_mikado_set_search_slide_from_hb_global_option' ) ) {
    /**
     * This function set search type value for search options map
     */
    function biagiotti_mikado_set_search_slide_from_hb_global_option( $search_type_options ) {
        $search_type_options['slide-from-header-bottom'] = esc_html__( 'Slide From Header Bottom', 'biagiotti' );

        return $search_type_options;
    }

    add_filter( 'biagiotti_mikado_filter_search_type_global_option', 'biagiotti_mikado_set_search_slide_from_hb_global_option' );
}