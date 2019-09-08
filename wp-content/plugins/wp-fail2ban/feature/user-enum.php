<?php

/**
 * User enumeration
 *
 * @package wp-fail2ban
 * @since 4.0.0
 */
namespace org\lecklider\charles\wordpress\wp_fail2ban;

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * @since 4.0.5 Guard
 */
if ( !function_exists( __NAMESPACE__ . '\\_log_bail_user_enum' ) ) {
    /**
     * Common enumeration handling
     *
     * @since 4.1.0 Add JSON support
     * @since 4.0.0
     *
     * @param bool  $is_json
     *
     * @return \WP_Error
     *
     * @wp-f2b-hard Blocked user enumeration attempt
     */
    function _log_bail_user_enum( $is_json = false )
    {
        openlog();
        syslog( LOG_NOTICE, 'Blocked user enumeration attempt' );
        closelog();
        // @codeCoverageIgnoreEnd
        return bail( $is_json );
    }

}
/**
 * @since 4.0.5 Guard
 */

if ( !function_exists( __NAMESPACE__ . '\\parse_request' ) ) {
    /**
     * Catch traditional user enum
     *
     * @see \WP::parse_request()
     *
     * @since 3.5.0 Refactored for unit testing
     * @since 2.1.0
     *
     * @param \WP   $query
     *
     * @return \WP
     */
    function parse_request( $query )
    {
        if ( !current_user_can( 'list_users' ) && intval( @$query->query_vars['author'] ) ) {
            _log_bail_user_enum();
        }
        return $query;
    }
    
    add_filter(
        'parse_request',
        __NAMESPACE__ . '\\parse_request',
        1,
        2
    );
}

/**
 * @since 4.0.5 Guard
 */

if ( !function_exists( __NAMESPACE__ . '\\rest_user_query' ) ) {
    /**
     * Catch RESTful user list
     *
     * @see \WP_REST_Users_Controller::get_items()
     *
     * @since 4.0.0
     *
     * @param array             $prepared_args
     * @param \WP_REST_Request  $request
     *
     * @return array|\WP_Error
     */
    function rest_user_query( $prepared_args, $request )
    {
        if ( !current_user_can( 'list_users' ) ) {
            return _log_bail_user_enum( true );
        }
        return $prepared_args;
    }
    
    add_filter(
        'rest_user_query',
        __NAMESPACE__ . '\\rest_user_query',
        10,
        2
    );
}
