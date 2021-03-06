<?php
/**
 * Functions for get_theme_mod()
 *
 
 */
if (!function_exists('business_form_get_option')) :

    /**
     * Get theme option.
     *
     * @since 1.0.0
     *
     * @param string $key Option key.
     * @return mixed Option value.
     */
    function business_form_get_option($key = '')
    {
        if (empty($key)) {
            return;
        }
        $business_form_default_options = business_form_get_default_theme_options();

        $default = (isset($business_form_default_options[$key])) ? $business_form_default_options[$key] : '';

        $theme_option = get_theme_mod($key, $default);

        return $theme_option;

    }

endif;

