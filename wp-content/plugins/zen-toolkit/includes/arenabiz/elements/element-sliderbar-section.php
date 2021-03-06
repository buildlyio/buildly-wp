<?php 
function zentoolkit_arenabiz_sliderbar_customize_register($wp_customize){


	/*============CALL TO ACTION PANEL============*/
	$wp_customize->add_section(
		'arenabiz_sliderbar_section',
		array(
			'title' 			=> esc_html__( 'Welcome bar Settings', 'arenabiz' ),
			'panel'				=> 'arenabiz_homepage_panel',
			'priority' => '2'
		)
	);

	//ENABLE/DISABLE SECTION
	$wp_customize->add_setting(
		'arenabiz_sliderbar_section_disable',
		array(
			'sanitize_callback' => 'arenabiz_sanitize_text',
			'default' => 'off'
		)
	);

	$wp_customize->add_control(
		new arenabiz_Switch_Control(
			$wp_customize,
			'arenabiz_sliderbar_section_disable',
			array(
				'settings'		=> 'arenabiz_sliderbar_section_disable',
				'section'		=> 'arenabiz_sliderbar_section',
				'label'			=> esc_html__( 'Disable Section', 'arenabiz' ),
				'on_off_label' 	=> array(
					'on' => esc_html__( 'Yes', 'arenabiz' ),
					'off' => esc_html__( 'No', 'arenabiz' )
					)	
			)
		)
	);

	$wp_customize->add_setting(
		'arenabiz_sliderbar_sub_title',
		array(
			'sanitize_callback' => 'arenabiz_sanitize_text',
			'default'			=> esc_html__( 'Business and Consulting WordPress theme for you, get started now.', 'arenabiz' )
		)
	);

	$wp_customize->add_control(
		'arenabiz_sliderbar_sub_title',
		array(
			'settings'		=> 'arenabiz_sliderbar_sub_title',
			'section'		=> 'arenabiz_sliderbar_section',
			'type'			=> 'textarea',
			'label'			=> esc_html__( 'sliderbar text ', 'arenabiz' )
		)
	);

	$wp_customize->add_setting(
		'arenabiz_sliderbar_button_text',
		array(
			'sanitize_callback' => 'arenabiz_sanitize_text'
		)
	);

	$wp_customize->add_control(
		'arenabiz_sliderbar_button_text',
		array(
			'settings'		=> 'arenabiz_sliderbar_button_text',
			'section'		=> 'arenabiz_sliderbar_section',
			'type'			=> 'text',
			'label'			=> esc_html__( 'Button Text', 'arenabiz' )
		)
	);

	$wp_customize->add_setting(
		'arenabiz_sliderbar_button_link',
		array(
			'default'			=> '',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		'arenabiz_sliderbar_button_link',
		array(
			'settings'		=> 'arenabiz_sliderbar_button_link',
			'section'		=> 'arenabiz_sliderbar_section',
			'type'			=> 'url',
			'label'			=> esc_html__( 'Button Link', 'arenabiz' )
		)
	);			
		
}

add_action( 'customize_register', 'zentoolkit_arenabiz_sliderbar_customize_register' );
?>