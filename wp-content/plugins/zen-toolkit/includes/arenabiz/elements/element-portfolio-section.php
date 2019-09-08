<?php
function zentoolkit_arenabiz_project_customizer( $wp_customize ) {
	/*============PORTFOLIO SECTION PANEL============*/
	$wp_customize->add_section(
		'arenabiz_portfolio_section',
		array(
			'title' 			=> esc_html__( 'Portfolio Settings', 'arenabiz' ),
			'panel'				=> 'arenabiz_homepage_panel',
			'priority' => '4'
		)
	);

	//ENABLE/DISABLE PORTFOLIO SECTION
	$wp_customize->add_setting(
		'arenabiz_portfolio_section_disable',
		array(
			'sanitize_callback' => 'arenabiz_sanitize_text',
		)
	);

	$wp_customize->add_control(
		new arenabiz_Switch_Control(
			$wp_customize,
			'arenabiz_portfolio_section_disable',
			array(
				'settings'		=> 'arenabiz_portfolio_section_disable',
				'section'		=> 'arenabiz_portfolio_section',
				'label'			=> esc_html__( 'Disable Section', 'arenabiz' ),
				'on_off_label' 	=> array(
					'on' => esc_html__( 'Yes', 'arenabiz' ),
					'off' => esc_html__( 'No', 'arenabiz' )
					),
			)
		)
	);

	$wp_customize->add_setting(
		'arenabiz_portfolio_title_sub_title_heading',
		array(
			'sanitize_callback' => 'arenabiz_sanitize_text'
		)
	);

	$wp_customize->add_control(
		new arenabiz_Customize_Heading(
			$wp_customize,
			'arenabiz_portfolio_title_sub_title_heading',
			array(
				'settings'		=> 'arenabiz_portfolio_title_sub_title_heading',
				'section'		=> 'arenabiz_portfolio_section',
				'label'			=> esc_html__( 'Portfolio heading & description', 'arenabiz' ),
			)
		)
	);

	$wp_customize->add_setting(
		'arenabiz_portfolio_title',
		array(
			'sanitize_callback' => 'arenabiz_sanitize_text',
			'default'			=> esc_html__( 'Our Portfolio', 'arenabiz' )
		)
	);

	$wp_customize->add_control(
		'arenabiz_portfolio_title',
		array(
			'settings'		=> 'arenabiz_portfolio_title',
			'section'		=> 'arenabiz_portfolio_section',
			'type'			=> 'text',
			'label'			=> esc_html__( 'Heading', 'arenabiz' )
		)
	);

	$wp_customize->add_setting(
		'arenabiz_portfolio_sub_title',
		array(
			'sanitize_callback' => 'arenabiz_sanitize_text',
			'default'			=> esc_html__( 'Some of our recent work.', 'arenabiz' )
		)
	);

	$wp_customize->add_control(
		'arenabiz_portfolio_sub_title',
		array(
			'settings'		=> 'arenabiz_portfolio_sub_title',
			'section'		=> 'arenabiz_portfolio_section',
			'type'			=> 'textarea',
			'label'			=> esc_html__( 'Description', 'arenabiz' ),
		)
	);

	//PAGES
	for( $i = 1; $i < 4; $i++ ){
		$wp_customize->add_setting(
			'arenabiz_portfolio_header'.$i,
			array(
				'sanitize_callback' => 'arenabiz_sanitize_text'
			)
		);

		$wp_customize->add_control(
			new arenabiz_Customize_Heading(
				$wp_customize,
				'arenabiz_portfolio_header'.$i,
				array(
					'settings'		=> 'arenabiz_portfolio_header'.$i,
					'section'		=> 'arenabiz_portfolio_section',
					'label'			=> esc_html__( 'Portfolio Page ', 'arenabiz' ).$i
				)
			)
		);

		$wp_customize->add_setting(
			'arenabiz_portfolio_page'.$i,
			array(
				'sanitize_callback' => 'absint'
			)
		);

		$wp_customize->add_control(
			'arenabiz_portfolio_page'.$i,
			array(
				'settings'		=> 'arenabiz_portfolio_page'.$i,
				'section'		=> 'arenabiz_portfolio_section',
				'type'			=> 'dropdown-pages',
				'label'			=> esc_html__( 'Select a Page', 'arenabiz' )
			)
		);
	}
		
	$wp_customize->add_setting(
		'arenabiz_portfolio_info',
		array(
			'sanitize_callback' => 'arenabiz_sanitize_text'
		)
	);

	$wp_customize->add_control(
		new arenabiz_Info_Text( 
			$wp_customize,
			'arenabiz_portfolio_info',
			array(
				'settings'		=> 'arenabiz_portfolio_info',
				'section'		=> 'arenabiz_portfolio_section',
				'label'			=> esc_html__( 'Note:', 'arenabiz' ),	
				'description'	=> wp_kses_post(__( 'The Page featured image works as a header image and the title & content work as a portfolio caption. <br/> Recommended Image Size: 400X420', 'arenabiz' )),
			)
		)
	);
	
}		
add_action( 'customize_register', 'zentoolkit_arenabiz_project_customizer' );
	?>