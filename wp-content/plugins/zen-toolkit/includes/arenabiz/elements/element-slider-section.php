<?php
function zentoolkit_arenabiz_slider_customize_register($wp_customize){

	/*============HOME PANEL============*/
	$wp_customize->add_panel(
		'arenabiz_homepage_panel',
		array(
			'title' => esc_html__( 'arenabiz Homepage Settings', 'arenabiz' ),
			'priority' => 20,
			'description' => esc_html__('Allows you to setup home page section.', 'arenabiz'),
		)
	);
	
	//ENABLE/DISABLE slider SECTION
	$wp_customize->add_setting(
		'arenabiz_slider_section_disable',
		array(
			'sanitize_callback' => 'arenabiz_sanitize_text',
		)
	);

	$wp_customize->add_control(
		new arenabiz_Switch_Control(
			$wp_customize,
			'arenabiz_slider_section_disable',
			array(
				'settings'		=> 'arenabiz_slider_section_disable',
				'section'		=> 'arenabiz_slider_section',
				'label'			=> esc_html__( 'Disable Section', 'arenabiz' ),
				'on_off_label' 	=> array(
					'on' => esc_html__( 'Yes', 'arenabiz' ),
					'off' => esc_html__( 'No', 'arenabiz' )
					),
			)
		)
	);	

	/*============SLIDER IMAGES SECTION============*/
	$wp_customize->add_section(
		'arenabiz_slider_section',
		array(
			'title' => esc_html__( 'Slider Settings', 'arenabiz' ),
			'panel' => 'arenabiz_homepage_panel',
			'priority' => '1'
		)
	);

	//SLIDERS
	for ( $i=1; $i < 3; $i++ ){

		$wp_customize->add_setting(
			'arenabiz_slider_heading'.$i,
			array(
				'sanitize_callback' => 'arenabiz_sanitize_text'
			)
		);

		$wp_customize->add_control(
			new arenabiz_Customize_Heading(
				$wp_customize,
				'arenabiz_slider_heading'.$i,
				array(
					'settings'		=> 'arenabiz_slider_heading'.$i,
					'section'		=> 'arenabiz_slider_section',
					'label'			=> esc_html__( 'Slider ', 'arenabiz' ).$i,
				)
			)
		);

		$wp_customize->add_setting(
			'arenabiz_slider_page'.$i,
			array(
				'sanitize_callback' => 'absint'
			)
		);

		$wp_customize->add_control(
			'arenabiz_slider_page'.$i,
			array(
				'settings'		=> 'arenabiz_slider_page'.$i,
				'section'		=> 'arenabiz_slider_section',
				'type'			=> 'dropdown-pages',
				'label'			=> esc_html__( 'Select a Page', 'arenabiz' ),	
			)
		);

		$wp_customize->add_setting(
			'arenabiz_slider_link'.$i,
			array(
				'sanitize_callback' => 'esc_url_raw'
			)
		);

		$wp_customize->add_control(
			'arenabiz_slider_link'.$i,
			array(
				'settings'		=> 'arenabiz_slider_link'.$i,
				'section'		=> 'arenabiz_slider_section',
				'type'			=> 'url',
				'label'			=> esc_html__( 'Slide Link', 'arenabiz' ),	
			)
		);
		
	}

	$wp_customize->add_setting(
		'arenabiz_slider_info',
		array(
			'sanitize_callback' => 'arenabiz_sanitize_text'
		)
	);

	$wp_customize->add_control(
		new arenabiz_Info_Text( 
			$wp_customize,
			'arenabiz_slider_info',
			array(
				'settings'		=> 'arenabiz_slider_info',
				'section'		=> 'arenabiz_slider_section',
				'label'			=> esc_html__( 'Note:', 'arenabiz' ),	
				'description'	=> wp_kses_post(__( 'The Page featured image works as a slider banner and the title & content work as a slider caption. <br/> Recommended Image Size: 2500X1000', 'arenabiz' )),
			)
		)
	);
	
	//ENABLE/DISABLE SECTION
	$wp_customize->add_setting(
		'arenabiz_caption_section_disable',
		array(
			'sanitize_callback' => 'arenabiz_sanitize_text',
			'default' => 'off'
		)
	);

	$wp_customize->add_control(
		new arenabiz_Switch_Control(
			$wp_customize,
			'arenabiz_caption_section_disable',
			array(
				'settings'		=> 'arenabiz_caption_section_disable',
				'section'		=> 'arenabiz_slider_section',
				'label'			=> esc_html__( 'Disable Caption', 'arenabiz' ),
				'on_off_label' 	=> array(
					'on' => esc_html__( 'Yes', 'arenabiz' ),
					'off' => esc_html__( 'No', 'arenabiz' )
					)	
			)
		)
	);	
	
	//ENABLE/DISABLE SECTION
	$wp_customize->add_setting(
		'arenabiz_imgoverlay_section_disable',
		array(
			'sanitize_callback' => 'arenabiz_sanitize_text',
			'default' => 'off'
		)
	);

	$wp_customize->add_control(
		new arenabiz_Switch_Control(
			$wp_customize,
			'arenabiz_imgoverlay_section_disable',
			array(
				'settings'		=> 'arenabiz_imgoverlay_section_disable',
				'section'		=> 'arenabiz_slider_section',
				'label'			=> esc_html__( 'Disable Image Overlay', 'arenabiz' ),
				'on_off_label' 	=> array(
					'on' => esc_html__( 'Yes', 'arenabiz' ),
					'off' => esc_html__( 'No', 'arenabiz' )
					)	
			)
		)
	);
		
}

add_action( 'customize_register', 'zentoolkit_arenabiz_slider_customize_register' );
?>