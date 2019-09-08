<?php

/**
 * Slider  options
 * @param null
 * @return array $business_form_slider_option
 *
 */
if (!function_exists('business_form_slider_option')) :
    function business_form_slider_option()
    {
        $business_form_slider_option = array(
            'show' => esc_html__('Show', 'business-form'),
            'hide' => esc_html__('Hide', 'business-form')
        );
        return apply_filters('business_form_slider_option', $business_form_slider_option);
    }
endif;