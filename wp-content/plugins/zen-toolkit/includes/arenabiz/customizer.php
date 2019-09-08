<?php
if ( ! function_exists( 'zentoolkit_customize_register' ) ) :
	/**
	 * zen toolkit Customize Register
	 */
	 
	function zentoolkit_customize_register( $wp_customize ) {
		$arenabiz_features_content_control = $wp_customize->get_setting( 'arenabiz_service_content' );
		if ( ! empty( $arenabiz_features_content_control ) ) {
			$arenabiz_features_content_control->default = zentoolkit_arenabiz_get_service_default();
	}
	}

	add_action( 'customize_register', 'zentoolkit_customize_register' );
endif;
?>