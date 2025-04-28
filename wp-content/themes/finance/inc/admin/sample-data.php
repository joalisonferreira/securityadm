<?php
/**
 * Demo Import Data
 */


function themesflat_import_files() {
    wp_delete_post(1);
    return array(
        array(
            'import_file_name'           => 'Import Demo With Elementor Page Builder',
            'import_file_url'            => THEMESFLAT_LINK.'sampledata/demo-elementor/content.xml',
            'import_widget_file_url'     => THEMESFLAT_LINK.'sampledata/demo-elementor/widgets.wie',
            'import_customizer_file_url' => THEMESFLAT_LINK.'sampledata/demo-elementor/options.dat',
            'import_preview_image_url'   => THEMESFLAT_LINK.'screenshot.png',
            'import_notice'              => esc_html__( 'Import Demo Data Elementor Page Builder.', 'finance' ),
            'preview_url'                => 'https://financewp.themesflat.co/',
        ),

        array(
            'import_file_name'           => 'Import Demo With WPBakery Page Builder',
            'import_file_url'            => THEMESFLAT_LINK.'sampledata/demo-vc/content.xml',
            'import_widget_file_url'     => THEMESFLAT_LINK.'sampledata/demo-vc/widgets.wie',
            'import_customizer_file_url' => THEMESFLAT_LINK.'sampledata/demo-vc/options.dat',
            'import_preview_image_url'   => THEMESFLAT_LINK.'screenshot.png',
            'import_notice'              => esc_html__( 'Import Demo Data WPBakery Page Builder. After you import this demo, you will have to setup the MailChimp form.', 'finance' ),
            'preview_url'                => 'https://financewp.themesflat.co/',
        ),
    );    
}
add_filter( 'pt-ocdi/import_files', 'themesflat_import_files' );

function themesflat_before_content_import() { 
    $pages = get_posts(array( 'post_type' => 'page','numberposts' => -1));    
    foreach ( $pages as $page ) {
        wp_delete_post( $page->ID, true);
    }
    $posts = get_posts(array( 'post_type' => 'post','numberposts' => -1));
    foreach ( $posts as $posts ) {
        wp_delete_post( $posts->ID, true);
    }   

    global $wp_registered_sidebars;
    $widgets = get_option('sidebars_widgets');
    foreach ($wp_registered_sidebars as $sidebar => $value) {
        unset($widgets[$sidebar]);
    }
    update_option('sidebars_widgets',$widgets);
}
add_action( 'pt-ocdi/before_content_import', 'themesflat_before_content_import' );

function themesflat_after_import_setup() {
    // Removes Elementor Global Defaults for Fonts, Colors, and Typography
    update_option( "elementor_disable_color_schemes", "yes" );
    update_option( "elementor_disable_typography_schemes", "yes" );
    $default_colors = array();
    $default_colors[1] = "#2E363A";
    $default_colors[2] = "#18BA60";
    $default_colors[3] = "#666666";
    $default_colors[4] = "#18BA60";
    update_option( "elementor_scheme_color", $default_colors );
    update_option( "elementor_container_width", 1200 );
    update_option( "elementor_space_between_widgets", 10 );
    
    $main_menu = get_term_by( 'name', 'main', 'nav_menu' );
    $footer_menu = get_term_by( 'name', 'footer', 'nav_menu' );
    $bottom_menu = get_term_by( 'name', 'bottom', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'primary' => $main_menu->term_id,
            'footer' => $footer_menu->term_id,
            'bottom' => $bottom_menu->term_id,
        )
    );

    if ( did_action( 'elementor/loaded' ) ) {
        $front_page_id = get_page_by_title( 'Home 01' );
        $blog_page_id  = get_page_by_title( 'Blog' );
    }else{
        $front_page_id = get_page_by_title( 'My Home' );
        $blog_page_id  = get_page_by_title( 'My Blog' ); 
    }        

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );
    update_option( 'posts_per_page', 3 ); 

    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure('/%postname%/');
    $wp_rewrite->flush_rules();
}
add_action( 'pt-ocdi/after_import', 'themesflat_after_import_setup' );

function themesflat_import_revsliders() {
    $file1 = THEMESFLAT_DIR . 'sampledata/slide-home.zip';
    if (class_exists('RevSlider')) {
        ob_start();
        $rev = new RevSlider();
        $response = $rev->importSliderFromPost(true,true, $file1);
        ob_end_clean();
        return 'Revolution Slider imported';
    }
}
add_action( 'pt-ocdi/after_import', 'themesflat_import_revsliders' );
