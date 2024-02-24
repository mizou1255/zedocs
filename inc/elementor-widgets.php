<?php

namespace ZDElementor;

class ZDWidgets {

    private static $_instance = null;

    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    private function include_widgets_files() {
        include_once(ZD__PATH . 'inc/widgets/zd-image.php');
        include_once(ZD__PATH . 'inc/widgets/zd-alert.php');
        include_once(ZD__PATH . 'inc/widgets/zd-code.php');
        include_once(ZD__PATH . 'inc/widgets/zd-progress.php');
    }
    public function register_widgets() {
        $this->include_widgets_files();
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ZeDocs_Image() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ZeDocs_Alert() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ZeDocs_Code() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ZeDocs_Progress() );
    }
    public function add_elementor_zd_widget_category( $elements_manager ) {
        $elements_manager->add_category(
            'zd_category',
            [
                'title' => __( 'ZeDocs', 'zedocs' ),
                'icon' => 'fa fa-plug',
            ]
        );
    }
    public function __construct() {
        // Register categories
        add_action( 'elementor/elements/categories_registered', [ $this, 'add_elementor_zd_widget_category'] );

        // Register widgets
        add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );

        add_action('elementor/preview/enqueue_scripts', function() {
            //wp_enqueue_script("zd_elementor-script", ZD__URI .'assets/js/elementor_preview_scripts.js', array('jquery'), "1.0", false);
        });

        add_action( 'elementor/frontend/after_register_scripts', function() {
            //wp_register_script( 'elementor-script', ZD__URI .'assets/js/scripts.js' );
            wp_enqueue_script( 'elementor-script' );
        });
    }
}
// Instantiate Plugin Class
ZDWidgets::instance();
