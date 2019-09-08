<?php
function zentoolkit_uncoverpro_about_customizer( $wp_customize ) {
	/*============about SECTION PANEL============*/
	$wp_customize->add_section(
		'uncoverpro_about_section',
		array(
			'title' 			=> esc_html__( 'About Settings', 'uncoverpro' ),
			'panel'				=> 'uncoverpro_homepage_panel',
			'priority' => '4'
		)
	);

	//ENABLE/DISABLE about SECTION
	$wp_customize->add_setting(
		'uncoverpro_about_section_disable',
		array(
			'sanitize_callback' => 'uncoverpro_sanitize_text',
		)
	);

	$wp_customize->add_control(
		new uncoverpro_Switch_Control(
			$wp_customize,
			'uncoverpro_about_section_disable',
			array(
				'settings'		=> 'uncoverpro_about_section_disable',
				'section'		=> 'uncoverpro_about_section',
				'label'			=> esc_html__( 'Disable Section', 'uncoverpro' ),
				'on_off_label' 	=> array(
					'on' => esc_html__( 'Yes', 'uncoverpro' ),
					'off' => esc_html__( 'No', 'uncoverpro' )
					),
			)
		)
	);

	$wp_customize->add_setting(
		'uncoverpro_about_title_sub_title_heading',
		array(
			'sanitize_callback' => 'uncoverpro_sanitize_text'
		)
	);

	$wp_customize->add_control(
		new uncoverpro_Customize_Heading(
			$wp_customize,
			'uncoverpro_about_title_sub_title_heading',
			array(
				'settings'		=> 'uncoverpro_about_title_sub_title_heading',
				'section'		=> 'uncoverpro_about_section',
				'label'			=> esc_html__( 'about heading & description', 'uncoverpro' ),
			)
		)
	);

	$wp_customize->add_setting(
		'uncoverpro_about_title',
		array(
			'sanitize_callback' => 'uncoverpro_sanitize_text',
			'default'			=> esc_html__( 'Who we are', 'uncoverpro' )
		)
	);

	$wp_customize->add_control(
		'uncoverpro_about_title',
		array(
			'settings'		=> 'uncoverpro_about_title',
			'section'		=> 'uncoverpro_about_section',
			'type'			=> 'text',
			'label'			=> esc_html__( 'Heading', 'uncoverpro' )
		)
	);

	$wp_customize->add_setting(
		'uncoverpro_about_sub_title',
		array(
			'sanitize_callback' => 'uncoverpro_sanitize_text',
			'default'			=> esc_html__( 'Something about us.', 'uncoverpro' )
		)
	);

	$wp_customize->add_control(
		'uncoverpro_about_sub_title',
		array(
			'settings'		=> 'uncoverpro_about_sub_title',
			'section'		=> 'uncoverpro_about_section',
			'type'			=> 'textarea',
			'label'			=> esc_html__( 'Description', 'uncoverpro' ),
		)
	);

	//PAGES
	for( $i = 1; $i < 4; $i++ ){
		$wp_customize->add_setting(
			'uncoverpro_about_header'.$i,
			array(
				'sanitize_callback' => 'uncoverpro_sanitize_text'
			)
		);

		$wp_customize->add_control(
			new uncoverpro_Customize_Heading(
				$wp_customize,
				'uncoverpro_about_header'.$i,
				array(
					'settings'		=> 'uncoverpro_about_header'.$i,
					'section'		=> 'uncoverpro_about_section',
					'label'			=> esc_html__( 'about Page ', 'uncoverpro' ).$i
				)
			)
		);

		$wp_customize->add_setting(
			'uncoverpro_about_page'.$i,
			array(
				'sanitize_callback' => 'absint'
			)
		);

		$wp_customize->add_control(
			'uncoverpro_about_page'.$i,
			array(
				'settings'		=> 'uncoverpro_about_page'.$i,
				'section'		=> 'uncoverpro_about_section',
				'type'			=> 'dropdown-pages',
				'label'			=> esc_html__( 'Select a Page', 'uncoverpro' )
			)
		);
	}
		
	$wp_customize->add_setting(
		'uncoverpro_about_info',
		array(
			'sanitize_callback' => 'uncoverpro_sanitize_text'
		)
	);

	$wp_customize->add_control(
		new uncoverpro_Info_Text( 
			$wp_customize,
			'uncoverpro_about_info',
			array(
				'settings'		=> 'uncoverpro_about_info',
				'section'		=> 'uncoverpro_about_section',
				'label'			=> esc_html__( 'Note:', 'uncoverpro' ),	
				'description'	=> wp_kses_post(__( 'The Page featured image works as a header image and the title & content work as a about caption. <br/> Recommended Image Size: 400X420', 'uncoverpro' )),
			)
		)
	);
	
}		
add_action( 'customize_register', 'zentoolkit_uncoverpro_about_customizer' );
	?>