<?php 
if(!function_exists('tf_header_enabled')){
    function tf_header_enabled() {
        $header_id = ThemesFlat_Addon_For_Elementor_Finance::get_settings( 'type_header', '' );
        $status    = false;

        if ( '' !== $header_id ) {
            $status = true;
        }

        return apply_filters( 'tf_header_enabled', $status );
    }
}

if(!function_exists('tf_footer_enabled')){
    function tf_footer_enabled() {
        $header_id = ThemesFlat_Addon_For_Elementor_Finance::get_settings( 'type_footer', '' );
        $status    = false;

        if ( '' !== $header_id ) {
            $status = true;
        }

        return apply_filters( 'tf_footer_enabled', $status );
    }
}

if(!function_exists('get_header_content')){
    function get_header_content() {
        $tf_get_header_id = ThemesFlat_Addon_For_Elementor_Finance::tf_get_header_id();
        $frontend = new \Elementor\Frontend;
        echo $frontend->get_builder_content_for_display($tf_get_header_id);
    }
}