<?php
function zentoolkit_uncoverpro_slider_customize_register($wp_customize){

	/*============HOME PANEL============*/
	$wp_customize->add_panel(
		'uncoverpro_homepage_panel',
		array(
			'title' => esc_html__( 'uncoverpro Homepage Settings', 'uncoverpro' ),
			'priority' => 20,
			'description' => esc_html__('Allows you to setup home page section.', 'uncoverpro'),
		)
	);
	
	//ENABLE/DISABLE slider SECTION
	$wp_customize->add_setting(
		'uncoverpro_slider_section_disable',
		array(
			'sanitize_callback' => 'uncoverpro_sanitize_text',
		)
	);

	$wp_customize->add_control(
		new uncoverpro_Switch_Control(
			$wp_customize,
			'uncoverpro_slider_section_disable',
			array(
				'settings'		=> 'uncoverpro_slider_section_disable',
				'section'		=> 'uncoverpro_slider_section',
				'label'			=> esc_html__( 'Disable Section', 'uncoverpro' ),
				'on_off_label' 	=> array(
					'on' => esc_html__( 'Yes', 'uncoverpro' ),
					'off' => esc_html__( 'No', 'uncoverpro' )
					),
			)
		)
	);	

	/*============SLIDER IMAGES SECTION============*/
	$wp_customize->add_section(
		'uncoverpro_slider_section',
		array(
			'title' => esc_html__( 'Slider Settings', 'uncoverpro' ),
			'panel' => 'uncoverpro_homepage_panel',
			'priority' => '1'
		)
	);

	//SLIDERS
	for ( $i=1; $i < 4; $i++ ){

		$wp_customize->add_setting(
			'uncoverpro_slider_heading'.$i,
			array(
				'sanitize_callback' => 'uncoverpro_sanitize_text'
			)
		);

		$wp_customize->add_control(
			new uncoverpro_Customize_Heading(
				$wp_customize,
				'uncoverpro_slider_heading'.$i,
				array(
					'settings'		=> 'uncoverpro_slider_heading'.$i,
					'section'		=> 'uncoverpro_slider_section',
					'label'			=> esc_html__( 'Slider ', 'uncoverpro' ).$i,
				)
			)
		);

		$wp_customize->add_setting(
			'uncoverpro_slider_page'.$i,
			array(
				'sanitize_callback' => 'absint'
			)
		);

		$wp_customize->add_control(
			'uncoverpro_slider_page'.$i,
			array(
				'settings'		=> 'uncoverpro_slider_page'.$i,
				'section'		=> 'uncoverpro_slider_section',
				'type'			=> 'dropdown-pages',
				'label'			=> esc_html__( 'Select a Page', 'uncoverpro' ),	
			)
		);

		$wp_customize->add_setting(
			'uncoverpro_slider_link'.$i,
			array(
				'sanitize_callback' => 'esc_url_raw'
			)
		);

		$wp_customize->add_control(
			'uncoverpro_slider_link'.$i,
			array(
				'settings'		=> 'uncoverpro_slider_link'.$i,
				'section'		=> 'uncoverpro_slider_section',
				'type'			=> 'url',
				'label'			=> esc_html__( 'Slide Link', 'uncoverpro' ),	
			)
		);
		
	}

	$wp_customize->add_setting(
		'uncoverpro_slider_info',
		array(
			'sanitize_callback' => 'uncoverpro_sanitize_text'
		)
	);

	$wp_customize->add_control(
		new uncoverpro_Info_Text( 
			$wp_customize,
			'uncoverpro_slider_info',
			array(
				'settings'		=> 'uncoverpro_slider_info',
				'section'		=> 'uncoverpro_slider_section',
				'label'			=> esc_html__( 'Note:', 'uncoverpro' ),	
				'description'	=> wp_kses_post(__( 'The Page featured image works as a slider banner and the title & content work as a slider caption. <br/> Recommended Image Size: 2500X1000', 'uncoverpro' )),
			)
		)
	);
	
	//ENABLE/DISABLE SECTION
	$wp_customize->add_setting(
		'uncoverpro_caption_section_disable',
		array(
			'sanitize_callback' => 'uncoverpro_sanitize_text',
			'default' => 'off'
		)
	);

	$wp_customize->add_control(
		new uncoverpro_Switch_Control(
			$wp_customize,
			'uncoverpro_caption_section_disable',
			array(
				'settings'		=> 'uncoverpro_caption_section_disable',
				'section'		=> 'uncoverpro_slider_section',
				'label'			=> esc_html__( 'Disable Caption', 'uncoverpro' ),
				'on_off_label' 	=> array(
					'on' => esc_html__( 'Yes', 'uncoverpro' ),
					'off' => esc_html__( 'No', 'uncoverpro' )
					)	
			)
		)
	);	
	
	//ENABLE/DISABLE SECTION
	$wp_customize->add_setting(
		'uncoverpro_imgoverlay_section_disable',
		array(
			'sanitize_callback' => 'uncoverpro_sanitize_text',
			'default' => 'off'
		)
	);

	$wp_customize->add_control(
		new uncoverpro_Switch_Control(
			$wp_customize,
			'uncoverpro_imgoverlay_section_disable',
			array(
				'settings'		=> 'uncoverpro_imgoverlay_section_disable',
				'section'		=> 'uncoverpro_slider_section',
				'label'			=> esc_html__( 'Disable Image Overlay', 'uncoverpro' ),
				'on_off_label' 	=> array(
					'on' => esc_html__( 'Yes', 'uncoverpro' ),
					'off' => esc_html__( 'No', 'uncoverpro' )
					)	
			)
		)
	);
		
}

add_action( 'customize_register', 'zentoolkit_uncoverpro_slider_customize_register' );
?>