<?php
if (!function_exists('business_form_sidebar_layout')) :
    function business_form_sidebar_layout()
    {
        $business_form_sidebar_layout = array(
            'right-sidebar' => esc_html__('Right Sidebar', 'business-form'),
            'left-sidebar' => esc_html__('Left Sidebar', 'business-form'),
            'no-sidebar' => esc_html__('No Sidebar', 'business-form'),
        );
        return apply_filters('business_form_sidebar_layout', $business_form_sidebar_layout);
    }
endif;

/**
 * Blog/Archive Description Option
 *
 * @since Business agency 1.0.0
 *
 *
 * 
 * @param null
 * @return array $business_form_blog_excerpt
 *
 */
if (!function_exists('business_form_blog_excerpt')) :
    function business_form_blog_excerpt()
    {
        $business_form_blog_excerpt = array(
            'excerpt' => esc_html__('Excerpt', 'business-form'),
            'content' => esc_html__('Content', 'business-form'),

        );
        return apply_filters('business_form_blog_excerpt', $business_form_blog_excerpt);
    }
endif;

/**
 * Show/Hide Feature Image  options
 *
 * @since Business agency 1.0.0
 *
 * @param null
 * @return array $business_form_show_feature_image_option
 *
 */
if (!function_exists('business_form_show_feature_image_option')) :
    function business_form_show_feature_image_option()
    {
        $business_form_show_feature_image_option = array(
            'show' => esc_html__('Show', 'business-form'),
            'hide' => esc_html__('Hide', 'business-form')
        );
        return apply_filters('business_form_show_feature_image_option', $business_form_show_feature_image_option);
    }
endif;
