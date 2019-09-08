<?php 
function zentoolkit_uncoverpro_sliderbar_customize_register($wp_customize){


	/*============CALL TO ACTION PANEL============*/
	$wp_customize->add_section(
		'uncoverpro_sliderbar_section',
		array(
			'title' 			=> esc_html__( 'Welcome bar Settings', 'uncoverpro' ),
			'panel'				=> 'uncoverpro_homepage_panel',
			'priority' => '2'
		)
	);

	//ENABLE/DISABLE SECTION
	$wp_customize->add_setting(
		'uncoverpro_sliderbar_section_disable',
		array(
			'sanitize_callback' => 'uncoverpro_sanitize_text',
			'default' => 'off'
		)
	);

	$wp_customize->add_control(
		new uncoverpro_Switch_Control(
			$wp_customize,
			'uncoverpro_sliderbar_section_disable',
			array(
				'settings'		=> 'uncoverpro_sliderbar_section_disable',
				'section'		=> 'uncoverpro_sliderbar_section',
				'label'			=> esc_html__( 'Disable Section', 'uncoverpro' ),
				'on_off_label' 	=> array(
					'on' => esc_html__( 'Yes', 'uncoverpro' ),
					'off' => esc_html__( 'No', 'uncoverpro' )
					)	
			)
		)
	);

	$wp_customize->add_setting(
		'uncoverpro_sliderbar_sub_title',
		array(
			'sanitize_callback' => 'uncoverpro_sanitize_text',
			'default'			=> esc_html__( 'Business and Consulting WordPress theme for you, get started now.', 'uncoverpro' )
		)
	);

	$wp_customize->add_control(
		'uncoverpro_sliderbar_sub_title',
		array(
			'settings'		=> 'uncoverpro_sliderbar_sub_title',
			'section'		=> 'uncoverpro_sliderbar_section',
			'type'			=> 'textarea',
			'label'			=> esc_html__( 'sliderbar text ', 'uncoverpro' )
		)
	);

	$wp_customize->add_setting(
		'uncoverpro_sliderbar_button_text',
		array(
			'sanitize_callback' => 'uncoverpro_sanitize_text'
		)
	);

	$wp_customize->add_control(
		'uncoverpro_sliderbar_button_text',
		array(
			'settings'		=> 'uncoverpro_sliderbar_button_text',
			'section'		=> 'uncoverpro_sliderbar_section',
			'type'			=> 'text',
			'label'			=> esc_html__( 'Button Text', 'uncoverpro' )
		)
	);

	$wp_customize->add_setting(
		'uncoverpro_sliderbar_button_link',
		array(
			'default'			=> '',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		'uncoverpro_sliderbar_button_link',
		array(
			'settings'		=> 'uncoverpro_sliderbar_button_link',
			'section'		=> 'uncoverpro_sliderbar_section',
			'type'			=> 'url',
			'label'			=> esc_html__( 'Button Link', 'uncoverpro' )
		)
	);			
		
}

add_action( 'customize_register', 'zentoolkit_uncoverpro_sliderbar_customize_register' );
?>