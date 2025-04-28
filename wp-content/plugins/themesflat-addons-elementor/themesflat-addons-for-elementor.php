<?php
/*
Plugin Name: Themesflat Addons
Description: The theme's components
Author: Themesflat
Author URI: http://themesflat-addons.com/
Version: 1.0.2
Text Domain: themesflat-addons
Domain Path: /languages
*/

if (!defined('ABSPATH'))
    exit;

final class ThemesFlat_Addon_For_Elementor_Finance {

    const VERSION = '1.0.1';
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';
    const MINIMUM_PHP_VERSION = '5.2';

    private static $_instance = null;

    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct() {
        add_action( 'init', [ $this, 'i18n' ] );
        add_action( 'plugins_loaded', [ $this, 'init' ] );
        define('URL_THEMESFLAT_ADDONS_ELEMENTOR', plugins_url('/', __FILE__));
        
        add_action( 'elementor/frontend/after_register_styles', [ $this, 'widget_styles' ] , 100 );
        add_action( 'admin_enqueue_scripts', [ $this, 'widget_styles' ] , 100 );
        add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ], 100 );        
    }

    public function i18n() {
        load_plugin_textdomain( 'themesflat-addons', false, basename( dirname( __FILE__ ) ) . '/languages' );
    }

    public function init() {
        // Check if Elementor installed and activated        
        if ( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'tf_admin_notice_missing_main_plugin' ] );
            return;
        }

        // Check for required Elementor version
        if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
            return;
        }

        // Check for required PHP version
        if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
            return;
        }

        // Add Plugin actions
        add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
        add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );

        add_action( 'elementor/elements/categories_registered', function () {
            $elementsManager = \Elementor\Plugin::instance()->elements_manager;
            $elementsManager->add_category(
                'themesflat_addons',
                array(
                  'title' => 'THEMESFLAT ADDONS',
                  'icon'  => 'fonts',
            ));
        });

        require_once( __DIR__ . '/shortcode.php' );
        require_once( __DIR__ . '/post-type.php' );

        require_once plugin_dir_path( __FILE__ ).'pagination.php';
        require_once plugin_dir_path( __FILE__ ).'tf-function.php';
        require_once plugin_dir_path( __FILE__ ).'tf-icons.php';

        add_action( 'init', [ $this, 'tf_header_footer_post_type' ] );
        add_action( 'add_meta_boxes', [ $this, 'tf_header_footer_register_metabox' ] );
        add_action( 'save_post', [ $this, 'tf_header_footer_save_meta' ] );
        add_filter( 'single_template', [ $this, 'tf_header_footer_load_canvas_template' ] );
        add_action( 'wp', [ $this, 'hooks' ],100 );
    }    

    public function tf_admin_notice_missing_main_plugin() {
        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'themesflat-addons' ),
            '<strong>' . esc_html__( 'Themesflat Addons Elementor', 'themesflat-addons' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'themesflat-addons' ) . '</strong>'
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    public function admin_notice_minimum_elementor_version() {
        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'themesflat-addons' ),
            '<strong>' . esc_html__( 'Themesflat Addons Elementor', 'themesflat-addons' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'themesflat-addons' ) . '</strong>',
             self::MINIMUM_ELEMENTOR_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }

    public function admin_notice_minimum_php_version() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'themesflat-addons' ),
            '<strong>' . esc_html__( 'Themesflat Addons Elementor', 'themesflat-addons' ) . '</strong>',
            '<strong>' . esc_html__( 'PHP', 'themesflat-addons' ) . '</strong>',
             self::MINIMUM_PHP_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }

    public function init_widgets() {
        require_once( __DIR__ . '/widgets/widget-imagebox.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \TFImageBox_Widget_Free() );        
        require_once( __DIR__ . '/widgets/widget-carousel.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \TFCarousel_Widget_Free() );
        require_once( __DIR__ . '/widgets/widget-navmenu.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \TFNavMenu_Widget_Free() );
        require_once( __DIR__ . '/widgets/widget-search.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \TFSearch_Widget_Free() );
        require_once( __DIR__ . '/widgets/widget-posts.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \TFPosts_Widget_Free() );
        require_once( __DIR__ . '/widgets/widget-tabs.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \TFTabs_Widget_Free() );
        require_once( __DIR__ . '/widgets/widget-imagebox-type2.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \TFImageBoxType2_Widget_Free() );
        require_once( __DIR__ . '/widgets/widget-iconbox.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \TFIconBox_Widget_Free() );
    }

    public function init_controls() {}    

    public function widget_styles() {
        if ( did_action( 'elementor/loaded' ) ) {
            wp_register_style('font-awesome', ELEMENTOR_ASSETS_URL . 'lib/font-awesome/css/all.min.css', __FILE__);
            wp_enqueue_style( 'font-awesome' );
            wp_register_style('regular', ELEMENTOR_ASSETS_URL . 'lib/font-awesome/css/regular.min.css', __FILE__);
            wp_enqueue_style( 'regular' );
        }
        wp_register_style( 'owl-carousel', plugins_url( '/assets/css/owl.carousel.css', __FILE__ ) );
        wp_enqueue_style( 'owl-carousel' );
        wp_register_style( 'tf-style', plugins_url( '/assets/css/tf-style.css', __FILE__ ) );
        wp_enqueue_style( 'tf-style' );
    }

    public function widget_scripts() {
        wp_enqueue_script('jquery');
        wp_register_script( 'owl-carousel', plugins_url( '/assets/js/owl.carousel.min.js', __FILE__ ), [ 'jquery' ], false, true );
        wp_enqueue_script( 'owl-carousel' );
        wp_register_script( 'imagesloaded-pkgd', plugins_url( '/assets/js/imagesloaded.pkgd.min.js', __FILE__ ), [ 'jquery' ], false, true );
        wp_enqueue_script( 'imagesloaded-pkgd' );
        wp_register_script( 'jquery-isotope', plugins_url( '/assets/js/jquery.isotope.min.js', __FILE__ ), [ 'jquery' ], false, true );
        wp_enqueue_script( 'jquery-isotope' );
        wp_register_script( 'tf-main', plugins_url( '/assets/js/tf-main.js', __FILE__ ), [ 'jquery' ], false, true );
        wp_enqueue_script( 'tf-main' );
    }

    static function tf_get_template_elementor($type = null) {
        $args = [
            'post_type' => 'elementor_library',
            'posts_per_page' => -1,
        ];
        if ($type) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'elementor_library_type',
                    'field' => 'slug',
                    'terms' => $type,
                ],
            ];
        }
        $template = get_posts($args);
        $tpl = array();
        if (!empty($template) && !is_wp_error($template)) {
            foreach ($template as $post) {
                $tpl[$post->post_name] = $post->post_title;
            }
        }
        return $tpl;
    }  

    /* Post type header footer */
    public function tf_header_footer_post_type() {
        $labels = array(
            'name'                  => esc_html__( 'TF Header - Footer Template', 'tf-addon-for-elementer' ),
            'singular_name'         => esc_html__( 'TF Header - Footer Template', 'tf-addon-for-elementer' ),
            'rewrite'               => array( 'slug' => esc_html__( 'TF Header - Footer Template' ) ),
            'menu_name'             => esc_html__( 'TF Header - Footer Template', 'tf-addon-for-elementer' ),
            'add_new'               => esc_html__( 'Add New', 'tf-addon-for-elementer' ),
            'add_new_item'          => esc_html__( 'Add New Template', 'tf-addon-for-elementer' ),
            'new_item'              => esc_html__( 'New Template Item', 'tf-addon-for-elementer' ),
            'edit_item'             => esc_html__( 'Edit Template Item', 'tf-addon-for-elementer' ),
            'view_item'             => esc_html__( 'View Template', 'tf-addon-for-elementer' ),
            'all_items'             => esc_html__( 'All Template', 'tf-addon-for-elementer' ),
            'search_items'          => esc_html__( 'Search Template', 'tf-addon-for-elementer' ),
            'not_found'             => esc_html__( 'No Template Items Found', 'tf-addon-for-elementer' ),
            'not_found_in_trash'    => esc_html__( 'No Template Items Found In Trash', 'tf-addon-for-elementer' ),
            'parent_item_colon'     => esc_html__( 'Parent Template:', 'tf-addon-for-elementer' ),
            'not_found'             => esc_html__( 'No Template found', 'tf-addon-for-elementer' ),
            'not_found_in_trash'    => esc_html__( 'No Template found in Trash', 'tf-addon-for-elementer' )

        );
        $args = array(
            'labels'      => $labels,
            'supports'    => array( 'title', 'thumbnail', 'elementor' ),
            'public'      => true,
            'has_archive' => true,
            'rewrite'     => array('slug' => get_theme_mod('tf_header_footer_slug','tf_header_footer')),
            'menu_icon'   => 'dashicons-admin-page',
        );
        register_post_type( 'tf_header_footer', $args );

        flush_rewrite_rules();
    }

    public function tf_header_footer_register_metabox() {
        add_meta_box(
            'tfhf-meta-box',
            esc_html__( 'TF Header Or Footer Options', 'tf-addon-for-elementer' ), 
            [ $this, 'tf_header_footer_metabox_render'], 
            'tf_header_footer', 'normal', 'high' );
    }  

    public function tf_header_footer_metabox_render( $post ) {
        $values            = get_post_custom( $post->ID );
        $template_type     = isset( $values['tfhf_template_type'] ) ? esc_attr( $values['tfhf_template_type'][0] ) : '';
        ?>
        <table class="tfhf-options-table widefat">
            <tbody>
                <tr class="tfhf-options-row type-of-template">
                    <td class="tfhf-options-row-heading">
                        <label for="tfhf_template_type"><?php esc_html_e( 'Type of Template', 'tf-addon-for-elementer' ); ?></label>
                    </td>
                    <td class="tfhf-options-row-content">
                        <select name="tfhf_template_type" id="tfhf_template_type">
                            <option value="" <?php selected( $template_type, '' ); ?>><?php esc_html_e( 'Select Option', 'tf-addon-for-elementer' ); ?></option>
                            <option value="type_header" <?php selected( $template_type, 'type_header' ); ?>><?php esc_html_e( 'Header', 'tf-addon-for-elementer' ); ?></option>
                            <option value="type_footer" <?php selected( $template_type, 'type_footer' ); ?>><?php esc_html_e( 'Footer', 'tf-addon-for-elementer' ); ?></option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php
    } 

    public function tf_header_footer_save_meta( $post_id ) {

        if ( isset( $_POST['tfhf_template_type'] ) ) {
            update_post_meta( $post_id, 'tfhf_template_type', esc_attr( $_POST['tfhf_template_type'] ) );
        }

        return false;
    }

    public function tf_header_footer_load_canvas_template( $single_template ) {
        global $post;

        if ( 'tf_header_footer' == $post->post_type ) {
            $elementor_canvas = ELEMENTOR_PATH . '/modules/page-templates/templates/canvas.php';

            if ( file_exists( $elementor_canvas ) ) {
                return $elementor_canvas;
            } else {
                return ELEMENTOR_PATH . '/includes/page-templates/canvas.php';
            }
        }

        return $single_template;
    }    

    public static function tf_get_header_id() {
        $header_id = self::get_template_id( 'type_header' );

        if ( '' === $header_id ) {
            $header_id = false;
        }

        return apply_filters( 'tf_get_header_id', $header_id );
    }

    public static function tf_get_footer_id() {
        $footer_id = self::get_template_id( 'type_footer' );

        if ( '' === $footer_id ) {
            $footer_id = false;
        }

        return apply_filters( 'tf_get_footer_id', $footer_id );
    }

    public static function get_template_id( $type ) {

        $args = [
            'post_type' => 'tf_header_footer',
            'posts_per_page' => -1,
        ];
        $tfhf_templates = get_posts($args);

        foreach ( $tfhf_templates as $template ) {
            if ( get_post_meta( absint( $template->ID ), 'tfhf_template_type', true ) === $type ) {
                return $template->ID;
            }
        }

        return '';
        
    }

    public static function get_settings( $setting = '', $default = '' ) {
        if ( 'type_header' == $setting || 'type_footer' == $setting ) {
            $templates = self::get_template_id( $setting );
            $template = ! is_array( $templates ) ? $templates : $templates[0];
            return $template;
        }
    }

    public function hooks() {
        if ( tf_header_enabled() ) { 
            add_action( 'get_header', [ $this, 'tf_override_header' ] ); 
            add_action( 'tf_header', [ $this, 'tf_render_header' ] );             
        }

        if ( tf_footer_enabled() ) {
            add_action( 'get_footer', [ $this, 'tf_override_footer' ] ); 
            add_action( 'tf_footer', [ $this, 'tf_render_footer' ] ); 
        }
    }  

    public function tf_override_header() {
        require_once plugin_dir_path( __FILE__ ).'tf-header.php';
        $templates   = [];
        $templates[] = 'header.php';
        remove_all_actions( 'wp_head' );
        ob_start();
        locate_template( $templates, true );
        ob_get_clean();
    }

    public function tf_override_footer() {
        require_once plugin_dir_path( __FILE__ ).'tf-footer.php';
        $templates   = [];
        $templates[] = 'footer.php';
        remove_all_actions( 'wp_footer' );
        ob_start();
        locate_template( $templates, true );
        ob_get_clean();
    }

    public static function get_header_content() {
        $tf_get_header_id = self::tf_get_header_id();
        $frontend = new \Elementor\Frontend;
        echo $frontend->get_builder_content_for_display($tf_get_header_id);
    }

    public static function get_footer_content() {
        $tf_get_footer_id = self::tf_get_footer_id();
        $frontend = new \Elementor\Frontend;
        echo $frontend->get_builder_content_for_display($tf_get_footer_id);
    }

    public function tf_render_header() {
        ?>        
        <header class="site-header tf-custom-header" role="banner"> 
            <div class="tf-container"> 
                <div class="tf-row">
                    <div class="tf-col">              
                    <?php echo self::get_header_content(); ?>
                    </div>
                </div>
            </div>
        </header>
        <?php
    }

    public function tf_render_footer() {
        ?>
        <footer class="site-footer tf-custom-footer" role="contentinfo">
            <div class="tf-container"> 
                <div class="tf-row">
                    <div class="tf-col">                
                    <?php echo self::get_footer_content(); ?>
                    </div>
                </div>
            </div>
        </footer>
        <?php
    } 

    /* post */
    static function tf_get_post_types() {
        $post_type_args = [
            'show_in_nav_menus' => true,
        ];
        $post_types = get_post_types($post_type_args, 'objects');

        foreach ( $post_types as $post_type ) {
            $post_type_name[$post_type->name] = $post_type->label;      
        }
        return $post_type_name;
    }

    static function tf_get_taxonomies( $category = 'category' ){
        $category_posts = get_terms( 
            array(
                'taxonomy' => $category,
            )
        );

        $category_posts_name = [];
        
        foreach ( $category_posts as $category_post ) {
            $category_posts_name[$category_post->slug] = $category_post->name;      
        }
        return $category_posts_name;
    }  

}
ThemesFlat_Addon_For_Elementor_Finance::instance();