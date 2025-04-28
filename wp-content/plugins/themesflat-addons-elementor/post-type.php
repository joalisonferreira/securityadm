<?php 
/**
  * Register Portfolios post type
*/
add_action('init', 'elementor_register_portfolio_post_type');
function elementor_register_portfolio_post_type() {
    $labels = array(
        'name'                  => esc_html__( 'Portfolios', 'themesflat-addons' ),
        'singular_name'         => esc_html__( 'Portfolios', 'themesflat-addons' ),
        'rewrite'               => array( 'slug' => esc_html__( 'portfolios' ) ),
        'menu_name'             => esc_html__( 'Portfolios', 'themesflat-addons' ),
        'add_new'               => esc_html__( 'New Portfolios', 'themesflat-addons' ),
        'add_new_item'          => esc_html__( 'Add New Portfolios', 'themesflat-addons' ),
        'new_item'              => esc_html__( 'New Portfolios Item', 'themesflat-addons' ),
        'edit_item'             => esc_html__( 'Edit Portfolios Item', 'themesflat-addons' ),
        'view_item'             => esc_html__( 'View Portfolios', 'themesflat-addons' ),
        'all_items'             => esc_html__( 'All Portfolios', 'themesflat-addons' ),
        'search_items'          => esc_html__( 'Search Portfolios', 'themesflat-addons' ),
        'not_found'             => esc_html__( 'No Portfolios Items Found', 'themesflat-addons' ),
        'not_found_in_trash'    => esc_html__( 'No Portfolios Items Found In Trash', 'themesflat-addons' ),
        'parent_item_colon'     => esc_html__( 'Parent Portfolios:', 'themesflat-addons' ),
        'not_found'             => esc_html__( 'No portfolios found', 'themesflat-addons' ),
        'not_found_in_trash'    => esc_html__( 'No portfolios found in Trash', 'themesflat-addons' )

    );
    $args = array(
        'labels'      => $labels,
        'supports'    => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'elementor' ),
        'public'      => true,
        'has_archive' => true,
        'menu_icon'   => 'dashicons-format-gallery',
    );
    register_post_type( 'portfolios', $args );

    flush_rewrite_rules();
}


/**
  * Portfolios update messages.
*/
add_filter( 'post_updated_messages', 'elementor_portfolios_updated_messages' );
function elementor_portfolios_updated_messages ( $messages ) {
    Global $post, $post_ID;
    $messages[esc_html__( 'portfolios' )] = array(
        0  => '',
        1  => sprintf( esc_html__( 'Portfolios Updated. <a href="%s">View portfolios</a>', 'themesflat-addons' ), esc_url( get_permalink( $post_ID ) ) ),
        2  => esc_html__( 'Custom Field Updated.', 'themesflat-addons' ),
        3  => esc_html__( 'Custom Field Deleted.', 'themesflat-addons' ),
        4  => esc_html__( 'Portfolios Updated.', 'themesflat-addons' ),
        5  => isset( $_GET['revision']) ? sprintf( esc_html__( 'Portfolios Restored To Revision From %s', 'themesflat-addons' ), wp_post_revision_title((int)$_GET['revision'], false)) : false,
        6  => sprintf( esc_html__( 'Portfolios Published. <a href="%s">View Portfolios</a>', 'themesflat-addons' ), esc_url( get_permalink( $post_ID ) ) ),
        7  => esc_html__( 'Portfolios Saved.', 'themesflat-addons' ),
        8  => sprintf( esc_html__('Portfolios Submitted. <a target="_blank" href="%s">Preview Portfolios</a>', 'themesflat-addons' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
        9  => sprintf( esc_html__( 'Portfolios Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Portfolios</a>', 'themesflat-addons' ),date_i18n( esc_html__( 'M j, Y @ G:i', 'themesflat-addons' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
        10 => sprintf( esc_html__( 'Portfolios Draft Updated. <a target="_blank" href="%s">Preview Portfolios</a>', 'themesflat-addons' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
    );
    return $messages;
}



/**
  * Register portfolios taxonomy
*/
add_action( 'init', 'elementor_register_portfolios_taxonomy' );
function elementor_register_portfolios_taxonomy() {
    $labels = array(
        'name'                       => esc_html__( 'Categories', 'themesflat-addons' ),
        'singular_name'              => esc_html__( 'Categories', 'themesflat-addons' ),
        'search_items'               => esc_html__( 'Search Categories', 'themesflat-addons' ),
        'menu_name'                  => esc_html__( 'Categories', 'themesflat-addons' ),
        'all_items'                  => esc_html__( 'All Categories', 'themesflat-addons' ),
        'parent_item'                => esc_html__( 'Parent Categories', 'themesflat-addons' ),
        'parent_item_colon'          => esc_html__( 'Parent Categories:', 'themesflat-addons' ),
        'new_item_name'              => esc_html__( 'New Categories Name', 'themesflat-addons' ),
        'add_new_item'               => esc_html__( 'Add New Categories', 'themesflat-addons' ),
        'edit_item'                  => esc_html__( 'Edit Categories', 'themesflat-addons' ),
        'update_item'                => esc_html__( 'Update Categories', 'themesflat-addons' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove Categories', 'themesflat-addons' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used Categories', 'themesflat-addons' ),
        'not_found'                  => esc_html__( 'No Categories found.' ),
        'menu_name'                  => esc_html__( 'Categories' ),
    );
    $args = array(
        'labels'       => $labels,
        'hierarchical' => true,
    );
    register_taxonomy( 'portfolios_category', 'portfolios', $args );
    flush_rewrite_rules();
}