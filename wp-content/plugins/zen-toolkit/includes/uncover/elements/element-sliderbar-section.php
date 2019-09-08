<?php 
function zentoolkit_uncover_sliderbar_customize_register($wp_customize){


	/*============CALL TO ACTION PANEL============*/
	$wp_customize->add_section(
		'uncover_sliderbar_section',
		array(
			'title' 			=> esc_html__( 'Welcome bar Settings', 'uncover' ),
			'panel'				=> 'uncover_homepage_panel',
			'priority' => '2'
		)
	);

	//ENABLE/DISABLE SECTION
	$wp_customize->add_setting(
		'uncover_sliderbar_section_disable',
		array(
			'sanitize_callback' => 'uncover_sanitize_text',
			'default' => 'off'
		)
	);

	$wp_customize->add_control(
		new uncover_Switch_Control(
			$wp_customize,
			'uncover_sliderbar_section_disable',
			array(
				'settings'		=> 'uncover_sliderbar_section_disable',
				'section'		=> 'uncover_sliderbar_section',
				'label'			=> esc_html__( 'Disable Section', 'uncover' ),
				'on_off_label' 	=> array(
					'on' => esc_html__( 'Yes', 'uncover' ),
					'off' => esc_html__( 'No', 'uncover' )
					)	
			)
		)
	);

	$wp_customize->add_setting(
		'uncover_sliderbar_sub_title',
		array(
			'sanitize_callback' => 'uncover_sanitize_text',
			'default'			=> esc_html__( 'Business and Consulting WordPress theme for you, get started now.', 'uncover' )
		)
	);

	$wp_customize->add_control(
		'uncover_sliderbar_sub_title',
		array(
			'settings'		=> 'uncover_sliderbar_sub_title',
			'section'		=> 'uncover_sliderbar_section',
			'type'			=> 'textarea',
			'label'			=> esc_html__( 'sliderbar text ', 'uncover' )
		)
	);

	$wp_customize->add_setting(
		'uncover_sliderbar_button_text',
		array(
			'sanitize_callback' => 'uncover_sanitize_text'
		)
	);

	$wp_customize->add_control(
		'uncover_sliderbar_button_text',
		array(
			'settings'		=> 'uncover_sliderbar_button_text',
			'section'		=> 'uncover_sliderbar_section',
			'type'			=> 'text',
			'label'			=> esc_html__( 'Button Text', 'uncover' )
		)
	);

	$wp_customize->add_setting(
		'uncover_sliderbar_button_link',
		array(
			'default'			=> '',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		'uncover_sliderbar_button_link',
		array(
			'settings'		=> 'uncover_sliderbar_button_link',
			'section'		=> 'uncover_sliderbar_section',
			'type'			=> 'url',
			'label'			=> esc_html__( 'Button Link', 'uncover' )
		)
	);			
		
}

add_action( 'customize_register', 'zentoolkit_uncover_sliderbar_customize_register' );
?>