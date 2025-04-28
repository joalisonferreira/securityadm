<?php
// Register action to declare required plugins
add_action( 'tgmpa_register', 'themesflat_recommend_plugin' );
function themesflat_recommend_plugin() {
    $plugins = array(
        array(
            'name'               => 'Elementor',
            'slug'               => 'elementor',
            'required'           => true,            
        ), 
        array(
            'name'      => 'WPBakery Visual Composer',
            'slug'      => 'js_composer',
            'source'    => esc_url( PROTOCOL . '://themesflat.co/3rdplugins/js_composer.zip' ),
            'required'  => true
        )               
    );
    if ( did_action( 'elementor/loaded' ) ) {
        $plugins = array(
            array(
                'name'               => 'Elementor',
                'slug'               => 'elementor',
                'required'           => true,            
            ), 
            array(
               'name'               => 'Themesflat Addons Elementor',
               'slug'               => 'themesflat-addons-elementor',
               'source'             => THEMESFLAT_DIR . 'inc/plugins/elementor/themesflat-addons-elementor.zip',
               'required'           => true,           
            ),
            array(
                'name' => 'Revslider',
                'slug' => 'revslider',
                'source' => esc_url( PROTOCOL . '://themesflat.co/3rdplugins/revslider.zip' ),
                'required' => true
            ),
            array(
                'name'               => 'MetForm',
                'slug'               => 'metform',
                'required'           => true,            
            ),
            array(
                'name'            => esc_html__( 'One Click Demo Import' ),
                'slug'            => 'one-click-demo-import',
                'required'        => false,
            )            
        );
    } else if( function_exists( 'visual_composer' ) ) {
        $plugins = array(
            array(
               'name'               => 'ThemesFlat',
               'slug'               => 'themesflat',
               'source'             => THEMESFLAT_DIR . 'inc/plugins/visual-composer/themesflat.zip',
               'required'           => true,           
            ),  

            // 3rdplugin
            array(
                'name' => 'Revslider',
                'slug' => 'revslider',
                'source' => esc_url( PROTOCOL . '://themesflat.co/3rdplugins/revslider.zip' ),
                'required' => true
            ),
            array(
                'name'               => 'Contact Form 7',
                'slug'               => 'contact-form-7',
                'required'           => true,            
            ),  

            array(
                'name'               => 'Mailchimp',
                'slug'               => 'mailchimp-for-wp',
                'required'           => true,            
            ),
            array(
                'name'            => esc_html__( 'One Click Demo Import' ),
                'slug'            => 'one-click-demo-import',
                'required'        => false,
            )        
        ); 
    } 
 
    tgmpa( $plugins);
 }

