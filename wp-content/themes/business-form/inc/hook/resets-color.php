<?php
//=============================================================
// Color reset
//=============================================================
if ( ! function_exists( 'business_form_reset_colors' ) ) :

    function business_form_reset_colors($data) {


        set_theme_mod('business_form_top_footer_background_color','#1A1E21');


        set_theme_mod('business_form_primary_color','#ef4a2b');

        set_theme_mod('business_form_color_reset_option','do-not-reset');

    }

endif;
add_action( 'business_form_colors_reset','business_form_reset_colors', 10 );

