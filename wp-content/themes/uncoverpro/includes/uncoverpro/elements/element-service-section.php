<?php
function zentoolkit_uncoverpro_service_customize_register($wp_customize){

	/*============Services SECTION PANEL============*/
	$wp_customize->add_section(
		'uncoverpro_services_section',
		array(
			'title' 			=> esc_html__( 'Services Settings', 'uncoverpro' ),
			'panel'				=> 'uncoverpro_homepage_panel',
			'priority' => '3'
		)
	);

	//ENABLE/DISABLE services SECTION
	$wp_customize->add_setting(
		'uncoverpro_services_section_disable',
		array(
			'sanitize_callback' => 'uncoverpro_sanitize_text',
		)
	);

	$wp_customize->add_control(
		new uncoverpro_Switch_Control(
			$wp_customize,
			'uncoverpro_services_section_disable',
			array(
				'settings'		=> 'uncoverpro_services_section_disable',
				'section'		=> 'uncoverpro_services_section',
				'label'			=> esc_html__( 'Disable Section', 'uncoverpro' ),
				'on_off_label' 	=> array(
					'on' => esc_html__( 'Yes', 'uncoverpro' ),
					'off' => esc_html__( 'No', 'uncoverpro' )
					),
			)
		)
	);

	//services PAGES
	for( $i = 1; $i < 4; $i++ ){
		$wp_customize->add_setting(
			'uncoverpro_services_header'.$i,
			array(
				'sanitize_callback' => 'uncoverpro_sanitize_text'
			)
		);

		$wp_customize->add_control(
			new uncoverpro_Customize_Heading(
				$wp_customize,
				'uncoverpro_services_header'.$i,
				array(
					'settings'		=> 'uncoverpro_services_header'.$i,
					'section'		=> 'uncoverpro_services_section',
					'label'			=> esc_html__( 'Service Page ', 'uncoverpro' ).$i
				)
			)
		);

		$wp_customize->add_setting(
			'uncoverpro_services_page'.$i,
			array(
				'sanitize_callback' => 'absint'
			)
		);

		$wp_customize->add_control(
			'uncoverpro_services_page'.$i,
			array(
				'settings'		=> 'uncoverpro_services_page'.$i,
				'section'		=> 'uncoverpro_services_section',
				'type'			=> 'dropdown-pages',
				'label'			=> esc_html__( 'Select a Page', 'uncoverpro' )
			)
		);

		$wp_customize->add_setting(
			'uncoverpro_services_page_icon'.$i,
			array(
				'default'			=> 'fa fa-bell',
				'sanitize_callback' => 'uncoverpro_sanitize_text'
			)
		);

		$wp_customize->add_control(
			new uncoverpro_Fontawesome_Icon_Chooser(
				$wp_customize,
				'uncoverpro_services_page_icon'.$i,
				array(
					'settings'		=> 'uncoverpro_services_page_icon'.$i,
					'section'		=> 'uncoverpro_services_section',
					'type'			=> 'icon',
					'label'			=> esc_html__( 'FontAwesome Icon', 'uncoverpro' ),
				)
			)
		);
	}
		
}

add_action( 'customize_register', 'zentoolkit_uncoverpro_service_customize_register' );
?>