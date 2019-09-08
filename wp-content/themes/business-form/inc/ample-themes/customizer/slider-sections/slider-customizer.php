<?php
/**
 * HomePage Settings Panel on customizer
 */
$wp_customize->add_panel(
    'business_form_homepage_settings_panel',
    array(
        'priority' => 5,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('HomePage Slider Settings', 'business-form'),
    )
);

/*-------------------------------------------------------------------------------------------------*/
/**
 * Slider Section
 *
 */
$wp_customize->add_section(
    'business_form_slider_section',
    array(
        'title' => esc_html__('Slider Section', 'business-form'),
        'panel' => 'business_form_homepage_settings_panel',
        'priority' => 6,
    )
);

/**
 * Show/Hide option for Homepage Slider Section
 *
 */

$wp_customize->add_setting(
    'business_form_homepage_slider_option',
    array(
        'default' => $default['business_form_homepage_slider_option'],
        'sanitize_callback' => 'business_form_sanitize_select',
    )
);
$hide_show_option = business_form_slider_option();
$wp_customize->add_control(
    'business_form_homepage_slider_option',
    array(
        'type' => 'radio',
        'label' => esc_html__('Slider Option', 'business-form'),
        'description' => esc_html__('Show/hide option for homepage Slider Section.', 'business-form'),
        'section' => 'business_form_slider_section',
        'choices' => $hide_show_option,
        'priority' => 7
    )
);


/**
 * List All Pages
 */
$slider_pages = array();
$slider_pages_obj = get_pages();
$slider_pages[''] = esc_html__('Select Page','business-form');
foreach ($slider_pages_obj as $page) {
    $slider_pages[$page->ID] = $page->post_title;
}


/*repeter call */
$wp_customize->add_setting('business_form_banner_all_sliders', array(
    'sanitize_callback' => 'business_form_sanitize_repeater',
    'default' => json_encode(array(
        array(
            'selectpage' => '',//field
            'button_text' => '',
            'button_url' => ''
        )
    ))
));

$wp_customize->add_control(new business_form_Repeater_Controler($wp_customize, 'business_form_banner_all_sliders', array(
        'label' =>esc_html__('Slider Settings Area', 'business-form'),
        'section' => 'business_form_slider_section',
        'settings' => 'business_form_banner_all_sliders',
        'business_form_box_label' =>esc_html__('Slider Settings Options', 'business-form'),
        'business_form_box_add_control' =>esc_html__('Add New Slider', 'business-form'),
    ),
        array(
            'selectpage' => array(
                'type' => 'select',
                'label' =>esc_html__('Select Slider Page', 'business-form'),
                'options' => $slider_pages//array
            ),
            'button_text' => array(
                'type' => 'text',
                'label' =>esc_html__('Enter Button Text', 'business-form'),
                'default' => ''
            ),
            'button_url' => array(
                'type' => 'text',
                'label' => esc_html__('Enter Button Url', 'business-form'),
                'default' => ''
            ),

        )
    )
);

	