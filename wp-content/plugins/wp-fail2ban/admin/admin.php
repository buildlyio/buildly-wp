<?php

/**
 * Admin
 *
 * @package wp-fail2ban
 * @since 4.0.0
 */
namespace org\lecklider\charles\wordpress\wp_fail2ban;

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
require __DIR__ . '/config.php';
require __DIR__ . '/lib/about.php';
/**
 * Register admin menus
 *
 * @since 4.0.0
 */
function admin_menu()
{
    global  $submenu ;
    add_menu_page(
        'WP fail2ban',
        'WP fail2ban',
        'manage_options',
        'wp-fail2ban',
        __NAMESPACE__ . '\\about',
        'dashicons-analytics'
    );
    add_submenu_page(
        'wp-fail2ban',
        'Settings',
        'Settings',
        'manage_options',
        'wp-fail2ban-settings',
        __NAMESPACE__ . '\\settings'
    );
    $submenu['wp-fail2ban'][0][0] = __( 'Welcome' );
}

add_action( 'admin_menu', __NAMESPACE__ . '\\admin_menu' );
/**
 * Add Settings link on Plugins page
 *
 * @since 4.2.0
 *
 * @param array     $links
 * @param string    $file
 */
function plugin_action_links( $links, $file )
{
    if ( preg_match( "|{$file}\$|", WP_FAIL2BAN_FILE ) ) {
        // Add Settings at the start
        array_unshift( $links, '<a href="' . admin_url( 'admin.php' ) . '?page=wp-fail2ban-settings&tab=about">Settings</a>' );
    }
    return $links;
}

add_filter(
    'plugin_action_links',
    __NAMESPACE__ . '\\plugin_action_links',
    10,
    2
);