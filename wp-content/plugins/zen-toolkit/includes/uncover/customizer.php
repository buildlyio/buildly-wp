<?php
if ( ! function_exists( 'zentoolkit_customize_register' ) ) :
	/**
	 * zen toolkit Customize Register
	 */
	 
	function zentoolkit_customize_register( $wp_customize ) {
		$uncover_features_content_control = $wp_customize->get_setting( 'uncover_service_content' );
		if ( ! empty( $uncover_features_content_control ) ) {
			$uncover_features_content_control->default = zentoolkit_uncover_get_service_default();
	}
	}

	add_action( 'customize_register', 'zentoolkit_customize_register' );
endif;
?>