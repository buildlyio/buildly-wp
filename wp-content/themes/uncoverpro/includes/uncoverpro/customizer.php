<?php
if ( ! function_exists( 'zentoolkit_customize_register' ) ) :
	/**
	 * zen toolkit Customize Register
	 */
	 
	function zentoolkit_customize_register( $wp_customize ) {
		$uncoverpro_features_content_control = $wp_customize->get_setting( 'uncoverpro_service_content' );
		if ( ! empty( $uncoverpro_features_content_control ) ) {
			$uncoverpro_features_content_control->default = zentoolkit_uncoverpro_get_service_default();
	}
	}

	add_action( 'customize_register', 'zentoolkit_customize_register' );
endif;
?>