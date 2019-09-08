<?php
/**
 * Breadcrumb  display option options
 * @param null
 * @return array $business_form_show_breadcrumb_option
 *
 */
if (!function_exists('business_form_show_breadcrumb_option')) :
    function business_form_show_breadcrumb_option()
    {
        $business_form_show_breadcrumb_option = array(
            'enable' => esc_html__('Enable', 'business-form'),
            'disable' => esc_html__('Disable', 'business-form')
        );
        return apply_filters('business_form_show_breadcrumb_option', $business_form_show_breadcrumb_option);
    }
endif;


/**
 * Reset Option
 *
 *
 * @param null
 * @return array $business_form_reset_option
 *
 */
if (!function_exists('business_form_reset_option')) :
    function business_form_reset_option()
    {
        $business_form_reset_option = array(
            'do-not-reset' => esc_html__('Do Not Reset', 'business-form'),
            'reset-all' => esc_html__('Reset All', 'business-form'),
        );
        return apply_filters('business_form_reset_option', $business_form_reset_option);
    }
endif;



/**
 * Sanitize Multiple Category
 * =====================================
 */

if ( !function_exists('business_form_sanitize_multiple_category') ) :

    function business_form_sanitize_multiple_category( $values )
    {

        $multi_values = !is_array( $values ) ? explode( ',', $values ) : $values;

        return !empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
    }

endif;
