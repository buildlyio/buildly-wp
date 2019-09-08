<?php
/**
 * Copyright Info Section
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'business_form_copyright_info_section',
    array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('Footer Option', 'business-form'),
    )
);

/**
 * Field for Copyright
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
    'business_form_copyright',
    array(
        'default' => $default['business_form_copyright'],
        'sanitize_callback' => 'wp_kses_post',
    )
);
$wp_customize->add_control(
    'business_form_copyright',
    array(
        'type' => 'text',
        'label' => esc_html__('Copyright', 'business-form'),
        'section' => 'business_form_copyright_info_section',
        'priority' => 8
    )
);

