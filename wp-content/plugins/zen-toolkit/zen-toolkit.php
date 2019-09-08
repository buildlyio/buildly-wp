<?php
/*
Plugin Name: Zen Toolkit
Plugin URI:
Description: zen-toolkit is a companion for WordPress themes by ThemesZen
Version: 1.0.5
Author: themeszen
Author URI: https://themeszen.com
Text Domain: zen-toolkit
*/
define( 'ZENTOOLKIT_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'ZENTOOLKIT_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

function zentoolkit_activate() {
	$theme = wp_get_theme(); // gets the current theme
	if ( 'arenabiz' == $theme->name ){
		require_once('includes/arenabiz/elements/element-slider-section.php');
		require_once('includes/arenabiz/elements/element-sliderbar-section.php');	
		require_once('includes/arenabiz/elements/element-about-section.php');
		require_once('includes/arenabiz/elements/element-portfolio-section.php');
		require_once('includes/arenabiz/elements/element-testimonial-section.php');
		require_once('includes/arenabiz/elements/element-cta-section.php');
		require_once('includes/arenabiz/sections/arenabiz-slider-section.php');		
		require_once('includes/arenabiz/sections/arenabiz-sliderbar-section.php');	
		require_once('includes/arenabiz/sections/arenabiz-about-section.php');	
		require_once('includes/arenabiz/sections/arenabiz-portfolio-section.php');
		require_once('includes/arenabiz/sections/arenabiz-testimonial-section.php');
		require_once('includes/arenabiz/sections/arenabiz-cta-section.php');			
		require_once('includes/arenabiz/customizer.php');
		
	}
	
	if ( 'uncover' == $theme->name ){
		require_once('includes/uncover/elements/element-slider-section.php');
		require_once('includes/uncover/elements/element-sliderbar-section.php');	
		require_once('includes/uncover/elements/element-service-section.php');		
		require_once('includes/uncover/elements/element-about-section.php');
		require_once('includes/uncover/sections/uncover-slider-section.php');		
		require_once('includes/uncover/sections/uncover-sliderbar-section.php');	
		require_once('includes/uncover/sections/uncover-service-section.php');
		require_once('includes/uncover/sections/uncover-about-section.php');		
		require_once('includes/uncover/customizer.php');
		wp_enqueue_style( 'font-awesome', ZENTOOLKIT_PLUGIN_URL . '/assets/css/fontawesome.css', array(), '4.6.3' );				
	}	
	
	if ( 'arenabizpro' == $theme->name ){
		require_once('includes/arenabiz/elements/element-sliderpro-section.php');
		require_once('includes/arenabiz/elements/element-sliderbar-section.php');	
		require_once('includes/arenabiz/elements/element-about-section.php');
		require_once('includes/arenabiz/elements/element-portfolio-section.php');
		require_once('includes/arenabiz/elements/element-testimonial-section.php');
		require_once('includes/arenabiz/elements/element-cta-section.php');
		require_once('includes/arenabiz/sections/arenabiz-sliderpro-section.php');		
		require_once('includes/arenabiz/sections/arenabiz-sliderbar-section.php');	
		require_once('includes/arenabiz/sections/arenabiz-about-section.php');	
		require_once('includes/arenabiz/sections/arenabiz-portfolio-section.php');
		require_once('includes/arenabiz/sections/arenabiz-testimonial-section.php');
		require_once('includes/arenabiz/sections/arenabiz-cta-section.php');			
		require_once('includes/arenabiz/customizer.php');
		
	}	

}
add_action( 'init', 'zentoolkit_activate' );




//Sanatize text
function zentoolkit_arenabiz_home_page_sanitize_text( $input ) {

		return wp_kses_post( force_balance_tags( $input ) );

}

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
?>