<?php
/**
 * Hooks functions.
 *
 * Overwrite default WordPress functions.
 *
 * @package ZEDOCS
 * @since   1.0.0
 */

if ( ! defined('ABSPATH') ) {
	exit;
}
function remove_admin_bar() {
    $adminBar = ZD_theme_option('admin_bar');
    if ( $adminBar == 'no') {
        return add_filter( 'show_admin_bar', '__return_false' );
    }
    return true;
}
add_filter('show_admin_bar', 'remove_admin_bar');

/***************** Disable Elemenor setup wizard**********************/
add_action( 'admin_init', function() {
    delete_transient( 'elementor_activation_redirect' );
});
