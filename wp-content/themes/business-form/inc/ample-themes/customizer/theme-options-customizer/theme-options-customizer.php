<?php
/**
 * Theme Option
 *
 * @since 1.0.0
 */
$wp_customize->add_panel(
    'business_form_theme_options',
    array(
        'priority' => 7,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('Theme Option', 'business-form'),
    )
);


/*----------------------------------------------------------------------------------------------*/
/**
 * Color Options
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'business_form_primary_color_option',
    array(
        'title' => esc_html__('Color Options', 'business-form'),
        'panel' => 'business_form_theme_options',
        'priority' => 6,
    )
);

$wp_customize->add_setting(
    'business_form_primary_color',
    array(
        'default' => $default['business_form_primary_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'business_form_primary_color', array(
    'label' => esc_html__('Primary Color', 'business-form'),
    'description' => esc_html__('We recommend choose  different  background color but not to choose similar to font color', 'business-form'),
    'section' => 'business_form_primary_color_option',
    'priority' => 14,

)));


/*-----------------------------------------------------------------------------*/
/**
 * Top Footer Background Color
 *
 * @since 1.0.0
 */

$wp_customize->add_setting(
    'business_form_top_footer_background_color',
    array(
        'default' => $default['business_form_top_footer_background_color'],
        'sanitize_callback' => 'sanitize_hex_color',

    )
);

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'business_form_top_footer_background_color', array(
    'label' => esc_html__('Top Footer Background Color', 'business-form'),
    'description' => esc_html__('We recommend choose  different  background color but not to choose similar to font color', 'business-form'),
    'section' => 'business_form_primary_color_option',
    'priority' => 14,

)));


/*-------------------------------------------------------------------------------------------*/
/**
 * Hide Static page in Home page
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'business_form_front_page_option',
    array(
        'title' => esc_html__('Front Page Options', 'business-form'),
        'panel' => 'business_form_theme_options',
        'priority' => 6,
    )
);

/**
 *   Show/Hide Static page/Posts in Home page
 */
$wp_customize->add_setting(
    'business_form_front_page_hide_option',
    array(
        'default' => $default['business_form_front_page_hide_option'],
        'sanitize_callback' => 'business_form_sanitize_checkbox',
    )
);
$wp_customize->add_control('business_form_front_page_hide_option',
    array(
        'label' => esc_html__('Hide Blog Posts or Static Page on Front Page', 'business-form'),
        'section' => 'business_form_front_page_option',
        'type' => 'checkbox',
        'priority' => 10
    )
);


/*-------------------------------------------------------------------------------------------*/
/**
 * Breadcrumb Options
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'business_form_breadcrumb_option',
    array(
        'title' => esc_html__('Breadcrumb Options', 'business-form'),
        'panel' => 'business_form_theme_options',
        'priority' => 6,
    )
);

/**
 * Breadcrumb Option
 */
$wp_customize->add_setting(
    'business_form_breadcrumb_setting_option',
    array(
        'default' => $default['business_form_breadcrumb_setting_option'],
        'sanitize_callback' => 'business_form_sanitize_select',

    )
);
$hide_show_breadcrumb_option = business_form_show_breadcrumb_option();
$wp_customize->add_control('business_form_breadcrumb_setting_option',
    array(
        'label' => esc_html__('Breadcrumb/header Image Options', 'business-form'),
        'section' => 'business_form_breadcrumb_option',
        'choices' => $hide_show_breadcrumb_option,
        'type' => 'select',
        'priority' => 10
    )
);



/*-------------------------------------------------------------------------------------------*/

/**
 * Reset Options
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'business_form_reset_option',
    array(
        'title' => esc_html__('Color Reset Options', 'business-form'),
        'panel' => 'business_form_theme_options',
        'priority' => 14,
    )
);

/**
 * Reset Option
 */
$wp_customize->add_setting(
    'business_form_color_reset_option',
    array(
        'default' => $default['business_form_color_reset_option'],
        'sanitize_callback' => 'business_form_sanitize_select',
        'transport' => 'postMessage'
    )
);
$reset_option = business_form_reset_option();
$wp_customize->add_control('business_form_color_reset_option',
    array(
        'label' => esc_html__('Reset Options', 'business-form'),
        'description' => sprintf( esc_html__('Caution: Reset theme settings according to the given options. Refresh the page after saving to view the effects', 'business-form')),
        'section' => 'business_form_reset_option',
        'type' => 'select',
        'choices' => $reset_option,
        'priority' => 20
    )
);

