<?php
/**
 * Dynamic css
 *
 * @package Ample Themes
 * @subpackage Business agency
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('business_form_dynamic_css') ):
    function business_form_dynamic_css(){


        $business_form_top_footer_color = esc_attr( business_form_get_option('business_form_top_footer_background_color') );


        $business_form_primary_color = esc_attr( business_form_get_option('business_form_primary_color') );
        


        $custom_css = '';

        $custom_css .= ".search-button button, a.btn-get-started.scrollto,.section-header h3::after,#faq #accordion .card-header .btn[aria-expanded=\"true\"],#portfolio #portfolio-flters li:hover, #portfolio #portfolio-flters li.filter-active,#call-to-action .cta-btn:hover,.back-to-top{
           background: " . $business_form_primary_color . ";}
           
    ";
        $custom_css .= ".nav-menu li:hover > a, .nav-menu > .menu-active > a,#services .icon i,#services .box:hover .title a,.contact-page-content ul li .fa,a:hover, a:active, a:focus,a{
    
           color: " . $business_form_primary_color . ";}
    ";



        $custom_css .= "#testimonials .owl-dot.active,.post-rating, .line > span, .service-icon div, .widget-business-form-theme-counter, .portfolioFilter .current, .portfolioFilter a:hover, .paralex-btn:hover, .view-more:hover, .features-slider .owl-theme .owl-controls .owl-page.active span, .widget-business-form-theme-testimonial .owl-theme .owl-controls .owl-page.active span, .read-more-background, .widget-business-form-theme-testimonial, .widget-business-form-theme-meetbutton, .footer-tags a:hover, .ample-inner-banner, .widget-search .search-submit:hover,  .pagination-blog .pagination > .active > a, .pagination-blog .pagination > li > a:hover, .scrollup, .widget_search .search-submit, posts-navigation .nav-previous, .posts-navigation .nav-next, .wpcf7-form input.wpcf7-submit

 {
    
           background-color: " . $business_form_primary_color . ";}
           
    ";

        $custom_css .= "#footer .footer-top{
         background-color: " . $business_form_top_footer_color . ";}
    ";






        $custom_css .= "..icon-box--description .fa{
         border-color: " . $business_form_primary_color .'!important'. ";}
    ";
        

        $custom_css .= ".post-rating,.line > span, .service-icon div, .widget-business-form-theme-counter, .portfolioFilter .current, .portfolioFilter a:hover, .paralex-btn:hover, .view-more:hover, .features-slider .owl-theme .owl-controls .owl-page.active span, .widget-business-form-theme-testimonial .owl-theme .owl-controls .owl-page.active span, .read-more-background, .widget-business-form-theme-testimonial, .widget-business-form-theme-meetbutton, .footer-tags a:hover, .ample-inner-banner,  .widget-search .search-submit:hover,  .pagination-blog .pagination > .active > a, .pagination-blog .pagination > li > a:hover, .scrollup ,.widget_search .search-submit ,posts-navigation .nav-previous,.posts-navigation .nav-next , .wpcf7-form input.wpcf7-submit
    
 {
    
           background-color: " . $business_form_primary_color . ";}
           
    ";
        $custom_css .= ".error404 .content-area .search-form .search-submit  ,.button-course, .read-more-background:hover,a.viewcourse , .blog-event-date{
           background: " . $business_form_primary_color .'!important'. ";}
           
    ";



        /*------------------------------------------------------------------------------------------------- */

        /*custom css*/


        wp_add_inline_style('business-form-style', $custom_css);

    }
endif;
add_action('wp_enqueue_scripts', 'business_form_dynamic_css', 99);