<?php
function zentoolkit_uncover_about_customizer( $wp_customize ) {
	/*============about SECTION PANEL============*/
	$wp_customize->add_section(
		'uncover_about_section',
		array(
			'title' 			=> esc_html__( 'About Settings', 'uncover' ),
			'panel'				=> 'uncover_homepage_panel',
			'priority' => '4'
		)
	);

	//ENABLE/DISABLE about SECTION
	$wp_customize->add_setting(
		'uncover_about_section_disable',
		array(
			'sanitize_callback' => 'uncover_sanitize_text',
		)
	);

	$wp_customize->add_control(
		new uncover_Switch_Control(
			$wp_customize,
			'uncover_about_section_disable',
			array(
				'settings'		=> 'uncover_about_section_disable',
				'section'		=> 'uncover_about_section',
				'label'			=> esc_html__( 'Disable Section', 'uncover' ),
				'on_off_label' 	=> array(
					'on' => esc_html__( 'Yes', 'uncover' ),
					'off' => esc_html__( 'No', 'uncover' )
					),
			)
		)
	);

	$wp_customize->add_setting(
		'uncover_about_title_sub_title_heading',
		array(
			'sanitize_callback' => 'uncover_sanitize_text'
		)
	);

	$wp_customize->add_control(
		new uncover_Customize_Heading(
			$wp_customize,
			'uncover_about_title_sub_title_heading',
			array(
				'settings'		=> 'uncover_about_title_sub_title_heading',
				'section'		=> 'uncover_about_section',
				'label'			=> esc_html__( 'about heading & description', 'uncover' ),
			)
		)
	);

	$wp_customize->add_setting(
		'uncover_about_title',
		array(
			'sanitize_callback' => 'uncover_sanitize_text',
			'default'			=> esc_html__( 'Who we are', 'uncover' )
		)
	);

	$wp_customize->add_control(
		'uncover_about_title',
		array(
			'settings'		=> 'uncover_about_title',
			'section'		=> 'uncover_about_section',
			'type'			=> 'text',
			'label'			=> esc_html__( 'Heading', 'uncover' )
		)
	);

	$wp_customize->add_setting(
		'uncover_about_sub_title',
		array(
			'sanitize_callback' => 'uncover_sanitize_text',
			'default'			=> esc_html__( 'Something about us.', 'uncover' )
		)
	);

	$wp_customize->add_control(
		'uncover_about_sub_title',
		array(
			'settings'		=> 'uncover_about_sub_title',
			'section'		=> 'uncover_about_section',
			'type'			=> 'textarea',
			'label'			=> esc_html__( 'Description', 'uncover' ),
		)
	);

	//PAGES
	for( $i = 1; $i < 4; $i++ ){
		$wp_customize->add_setting(
			'uncover_about_header'.$i,
			array(
				'sanitize_callback' => 'uncover_sanitize_text'
			)
		);

		$wp_customize->add_control(
			new uncover_Customize_Heading(
				$wp_customize,
				'uncover_about_header'.$i,
				array(
					'settings'		=> 'uncover_about_header'.$i,
					'section'		=> 'uncover_about_section',
					'label'			=> esc_html__( 'about Page ', 'uncover' ).$i
				)
			)
		);

		$wp_customize->add_setting(
			'uncover_about_page'.$i,
			array(
				'sanitize_callback' => 'absint'
			)
		);

		$wp_customize->add_control(
			'uncover_about_page'.$i,
			array(
				'settings'		=> 'uncover_about_page'.$i,
				'section'		=> 'uncover_about_section',
				'type'			=> 'dropdown-pages',
				'label'			=> esc_html__( 'Select a Page', 'uncover' )
			)
		);
	}
		
	$wp_customize->add_setting(
		'uncover_about_info',
		array(
			'sanitize_callback' => 'uncover_sanitize_text'
		)
	);

	$wp_customize->add_control(
		new uncover_Info_Text( 
			$wp_customize,
			'uncover_about_info',
			array(
				'settings'		=> 'uncover_about_info',
				'section'		=> 'uncover_about_section',
				'label'			=> esc_html__( 'Note:', 'uncover' ),	
				'description'	=> wp_kses_post(__( 'The Page featured image works as a header image and the title & content work as a about caption. <br/> Recommended Image Size: 400X420', 'uncover' )),
			)
		)
	);
	
}		
add_action( 'customize_register', 'zentoolkit_uncover_about_customizer' );
	?>