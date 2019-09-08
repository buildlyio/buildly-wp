<?php
function zentoolkit_uncover_service_customize_register($wp_customize){

	/*============Services SECTION PANEL============*/
	$wp_customize->add_section(
		'uncover_services_section',
		array(
			'title' 			=> esc_html__( 'Services Settings', 'uncover' ),
			'panel'				=> 'uncover_homepage_panel',
			'priority' => '3'
		)
	);

	//ENABLE/DISABLE services SECTION
	$wp_customize->add_setting(
		'uncover_services_section_disable',
		array(
			'sanitize_callback' => 'uncover_sanitize_text',
		)
	);

	$wp_customize->add_control(
		new uncover_Switch_Control(
			$wp_customize,
			'uncover_services_section_disable',
			array(
				'settings'		=> 'uncover_services_section_disable',
				'section'		=> 'uncover_services_section',
				'label'			=> esc_html__( 'Disable Section', 'uncover' ),
				'on_off_label' 	=> array(
					'on' => esc_html__( 'Yes', 'uncover' ),
					'off' => esc_html__( 'No', 'uncover' )
					),
			)
		)
	);

	//services PAGES
	for( $i = 1; $i < 4; $i++ ){
		$wp_customize->add_setting(
			'uncover_services_header'.$i,
			array(
				'sanitize_callback' => 'uncover_sanitize_text'
			)
		);

		$wp_customize->add_control(
			new uncover_Customize_Heading(
				$wp_customize,
				'uncover_services_header'.$i,
				array(
					'settings'		=> 'uncover_services_header'.$i,
					'section'		=> 'uncover_services_section',
					'label'			=> esc_html__( 'Service Page ', 'uncover' ).$i
				)
			)
		);

		$wp_customize->add_setting(
			'uncover_services_page'.$i,
			array(
				'sanitize_callback' => 'absint'
			)
		);

		$wp_customize->add_control(
			'uncover_services_page'.$i,
			array(
				'settings'		=> 'uncover_services_page'.$i,
				'section'		=> 'uncover_services_section',
				'type'			=> 'dropdown-pages',
				'label'			=> esc_html__( 'Select a Page', 'uncover' )
			)
		);

		$wp_customize->add_setting(
			'uncover_services_page_icon'.$i,
			array(
				'default'			=> 'fa fa-bell',
				'sanitize_callback' => 'uncover_sanitize_text'
			)
		);

		$wp_customize->add_control(
			new uncover_Fontawesome_Icon_Chooser(
				$wp_customize,
				'uncover_services_page_icon'.$i,
				array(
					'settings'		=> 'uncover_services_page_icon'.$i,
					'section'		=> 'uncover_services_section',
					'type'			=> 'icon',
					'label'			=> esc_html__( 'FontAwesome Icon', 'uncover' ),
				)
			)
		);
	}
		
}

add_action( 'customize_register', 'zentoolkit_uncover_service_customize_register' );
?>