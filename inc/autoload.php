<?php

if ( ! defined('ABSPATH') ) {
	exit;
}

require_once ZD__PATH . 'inc/lib/tgm-plugin-activation/class-tgm-plugin-activation.php';
require_once ZD__PATH . 'inc/lib/redux-framework/redux-framework.php';

require_once ZD__PATH . 'inc/cpt.php';
require_once ZD__PATH . 'inc/dynamic-options.php';
require_once ZD__PATH . 'inc/elementor-widgets.php';

/* ============== setup wizard =============== */
require_once ZD__PATH . "/inc/setup/envato_setup.php";
require_once ZD__PATH . "/inc/setup/import/init.php";


add_action( 'tgmpa_register', 'zedocs_register_required_plugins' );
function zedocs_register_required_plugins() {
    $plugins = [
        [
            'name' => 'zElementor',
            'slug' => 'elementor',
            'required' => true,
        ], 
        [
            'name' => 'Redux Framework',
            'slug' => 'redux-framework',
            'required' => true,
        ], 
        [
            'name' => 'Simple Custom Post Order',
            'slug' => 'simple-custom-post-order',
            'required' => true,
        ], 
    ];

    $config = array(
        'id'           => 'zedocs',
        'default_path' => '',
        'menu'         => 'zedocs',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
    );

    tgmpa( $plugins, $config );
}