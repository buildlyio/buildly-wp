<?php
function zentoolkit_arenabiz_testimonial_customizer( $wp_customize ) {
	/*============testimonial SECTION PANEL============*/
	$wp_customize->add_section(
		'arenabiz_testimonial_section',
		array(
			'title' 			=> esc_html__( 'Testimonial Settings', 'arenabiz' ),
			'panel'				=> 'arenabiz_homepage_panel',
			'priority' => '6'
		)
	);

	//ENABLE/DISABLE testimonial SECTION
	$wp_customize->add_setting(
		'arenabiz_testimonial_section_disable',
		array(
			'sanitize_callback' => 'arenabiz_sanitize_text',
		)
	);

	$wp_customize->add_control(
		new arenabiz_Switch_Control(
			$wp_customize,
			'arenabiz_testimonial_section_disable',
			array(
				'settings'		=> 'arenabiz_testimonial_section_disable',
				'section'		=> 'arenabiz_testimonial_section',
				'label'			=> esc_html__( 'Disable Section', 'arenabiz' ),
				'on_off_label' 	=> array(
					'on' => esc_html__( 'Yes', 'arenabiz' ),
					'off' => esc_html__( 'No', 'arenabiz' )
					),
			)
		)
	);

	$wp_customize->add_setting(
		'arenabiz_testimonial_title_sub_title_heading',
		array(
			'sanitize_callback' => 'arenabiz_sanitize_text'
		)
	);

	$wp_customize->add_control(
		new arenabiz_Customize_Heading(
			$wp_customize,
			'arenabiz_testimonial_title_sub_title_heading',
			array(
				'settings'		=> 'arenabiz_testimonial_title_sub_title_heading',
				'section'		=> 'arenabiz_testimonial_section',
				'label'			=> esc_html__( 'testimonial heading & description', 'arenabiz' ),
			)
		)
	);

	$wp_customize->add_setting(
		'arenabiz_testimonial_title',
		array(
			'sanitize_callback' => 'arenabiz_sanitize_text',
			'default'			=> esc_html__( 'Our Client Testimonials', 'arenabiz' )
		)
	);

	$wp_customize->add_control(
		'arenabiz_testimonial_title',
		array(
			'settings'		=> 'arenabiz_testimonial_title',
			'section'		=> 'arenabiz_testimonial_section',
			'type'			=> 'text',
			'label'			=> esc_html__( 'Heading', 'arenabiz' )
		)
	);

	$wp_customize->add_setting(
		'arenabiz_testimonial_sub_title',
		array(
			'sanitize_callback' => 'arenabiz_sanitize_text',
			'default'			=> esc_html__( 'What our Clients say.', 'arenabiz' )
		)
	);

	$wp_customize->add_control(
		'arenabiz_testimonial_sub_title',
		array(
			'settings'		=> 'arenabiz_testimonial_sub_title',
			'section'		=> 'arenabiz_testimonial_section',
			'type'			=> 'textarea',
			'label'			=> esc_html__( 'Description', 'arenabiz' ),
		)
	);

	//PAGES
	for( $i = 1; $i < 4; $i++ ){
		$wp_customize->add_setting(
			'arenabiz_testimonial_header'.$i,
			array(
				'sanitize_callback' => 'arenabiz_sanitize_text'
			)
		);

		$wp_customize->add_control(
			new arenabiz_Customize_Heading(
				$wp_customize,
				'arenabiz_testimonial_header'.$i,
				array(
					'settings'		=> 'arenabiz_testimonial_header'.$i,
					'section'		=> 'arenabiz_testimonial_section',
					'label'			=> esc_html__( 'testimonial Page ', 'arenabiz' ).$i
				)
			)
		);

		$wp_customize->add_setting(
			'arenabiz_testimonial_page'.$i,
			array(
				'sanitize_callback' => 'absint'
			)
		);

		$wp_customize->add_control(
			'arenabiz_testimonial_page'.$i,
			array(
				'settings'		=> 'arenabiz_testimonial_page'.$i,
				'section'		=> 'arenabiz_testimonial_section',
				'type'			=> 'dropdown-pages',
				'label'			=> esc_html__( 'Select a Page', 'arenabiz' )
			)
		);
	}
		
	$wp_customize->add_setting(
		'arenabiz_testimonial_info',
		array(
			'sanitize_callback' => 'arenabiz_sanitize_text'
		)
	);

	$wp_customize->add_control(
		new arenabiz_Info_Text( 
			$wp_customize,
			'arenabiz_testimonial_info',
			array(
				'settings'		=> 'arenabiz_testimonial_info',
				'section'		=> 'arenabiz_testimonial_section',
				'label'			=> esc_html__( 'Note:', 'arenabiz' ),	
				'description'	=> wp_kses_post(__( 'The Page featured image works as a icon image and the title & content work as a testimonial caption. <br/> Recommended Image Size: 512X512', 'arenabiz' )),
			)
		)
	);
	
}		
add_action( 'customize_register', 'zentoolkit_arenabiz_testimonial_customizer' );
	?>