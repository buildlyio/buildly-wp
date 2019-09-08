<?php
function zentoolkit_uncover_slider_customize_register($wp_customize){

	/*============HOME PANEL============*/
	$wp_customize->add_panel(
		'uncover_homepage_panel',
		array(
			'title' => esc_html__( 'uncover Homepage Settings', 'uncover' ),
			'priority' => 20,
			'description' => esc_html__('Allows you to setup home page section.', 'uncover'),
		)
	);
	
	//ENABLE/DISABLE slider SECTION
	$wp_customize->add_setting(
		'uncover_slider_section_disable',
		array(
			'sanitize_callback' => 'uncover_sanitize_text',
		)
	);

	$wp_customize->add_control(
		new uncover_Switch_Control(
			$wp_customize,
			'uncover_slider_section_disable',
			array(
				'settings'		=> 'uncover_slider_section_disable',
				'section'		=> 'uncover_slider_section',
				'label'			=> esc_html__( 'Disable Section', 'uncover' ),
				'on_off_label' 	=> array(
					'on' => esc_html__( 'Yes', 'uncover' ),
					'off' => esc_html__( 'No', 'uncover' )
					),
			)
		)
	);	

	/*============SLIDER IMAGES SECTION============*/
	$wp_customize->add_section(
		'uncover_slider_section',
		array(
			'title' => esc_html__( 'Slider Settings', 'uncover' ),
			'panel' => 'uncover_homepage_panel',
			'priority' => '1'
		)
	);

	//SLIDERS
	for ( $i=1; $i < 2; $i++ ){

		$wp_customize->add_setting(
			'uncover_slider_heading'.$i,
			array(
				'sanitize_callback' => 'uncover_sanitize_text'
			)
		);

		$wp_customize->add_control(
			new uncover_Customize_Heading(
				$wp_customize,
				'uncover_slider_heading'.$i,
				array(
					'settings'		=> 'uncover_slider_heading'.$i,
					'section'		=> 'uncover_slider_section',
					'label'			=> esc_html__( 'Slider ', 'uncover' ).$i,
				)
			)
		);

		$wp_customize->add_setting(
			'uncover_slider_page'.$i,
			array(
				'sanitize_callback' => 'absint'
			)
		);

		$wp_customize->add_control(
			'uncover_slider_page'.$i,
			array(
				'settings'		=> 'uncover_slider_page'.$i,
				'section'		=> 'uncover_slider_section',
				'type'			=> 'dropdown-pages',
				'label'			=> esc_html__( 'Select a Page', 'uncover' ),	
			)
		);

		$wp_customize->add_setting(
			'uncover_slider_link'.$i,
			array(
				'sanitize_callback' => 'esc_url_raw'
			)
		);

		$wp_customize->add_control(
			'uncover_slider_link'.$i,
			array(
				'settings'		=> 'uncover_slider_link'.$i,
				'section'		=> 'uncover_slider_section',
				'type'			=> 'url',
				'label'			=> esc_html__( 'Slide Link', 'uncover' ),	
			)
		);
		
	}

	$wp_customize->add_setting(
		'uncover_slider_info',
		array(
			'sanitize_callback' => 'uncover_sanitize_text'
		)
	);

	$wp_customize->add_control(
		new uncover_Info_Text( 
			$wp_customize,
			'uncover_slider_info',
			array(
				'settings'		=> 'uncover_slider_info',
				'section'		=> 'uncover_slider_section',
				'label'			=> esc_html__( 'Note:', 'uncover' ),	
				'description'	=> wp_kses_post(__( 'The Page featured image works as a slider banner and the title & content work as a slider caption. <br/> Recommended Image Size: 2500X1000', 'uncover' )),
			)
		)
	);
	
	//ENABLE/DISABLE SECTION
	$wp_customize->add_setting(
		'uncover_caption_section_disable',
		array(
			'sanitize_callback' => 'uncover_sanitize_text',
			'default' => 'off'
		)
	);

	$wp_customize->add_control(
		new uncover_Switch_Control(
			$wp_customize,
			'uncover_caption_section_disable',
			array(
				'settings'		=> 'uncover_caption_section_disable',
				'section'		=> 'uncover_slider_section',
				'label'			=> esc_html__( 'Disable Caption', 'uncover' ),
				'on_off_label' 	=> array(
					'on' => esc_html__( 'Yes', 'uncover' ),
					'off' => esc_html__( 'No', 'uncover' )
					)	
			)
		)
	);	
	
	//ENABLE/DISABLE SECTION
	$wp_customize->add_setting(
		'uncover_imgoverlay_section_disable',
		array(
			'sanitize_callback' => 'uncover_sanitize_text',
			'default' => 'off'
		)
	);

	$wp_customize->add_control(
		new uncover_Switch_Control(
			$wp_customize,
			'uncover_imgoverlay_section_disable',
			array(
				'settings'		=> 'uncover_imgoverlay_section_disable',
				'section'		=> 'uncover_slider_section',
				'label'			=> esc_html__( 'Disable Image Overlay', 'uncover' ),
				'on_off_label' 	=> array(
					'on' => esc_html__( 'Yes', 'uncover' ),
					'off' => esc_html__( 'No', 'uncover' )
					)	
			)
		)
	);
		
}

add_action( 'customize_register', 'zentoolkit_uncover_slider_customize_register' );
?>