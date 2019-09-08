<?php
/**
 * Business agency default theme options.
 *
 * 
 * @subpackage Business agency
 */

if ( !function_exists('business_form_get_default_theme_options' ) ) :

    /**
     * Get default theme options.
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */
    function business_form_get_default_theme_options()
    {

        $default = array();

        // Homepage Slider Section
        $default['business_form_homepage_slider_option'] = 'hide';
        $default['business_form_slider_cat_id'] = 0;
        $default['business_form_no_of_slider'] = 3;
        $default['business_form_slider_get_started_txt'] = esc_html__('Get Started!', 'business-form');
        $default['business_form_slider_get_started_link'] = '#';

        // footer copyright.
        $default['business_form_copyright'] = esc_html__('Copyright Ample Themes. All Rights Reserved', 'business-form');

        // Home Page Top header Info.
        $default['business_form_top_header_section'] = 'hide';
        $default['business_form_notice_title']= esc_html__('Notice', 'business-form');
        $default['business_form_news_cat_id']='';
        $default['business_form_no_of_news']=5;
        $default['business_form_social_link_hide_option'] = 1;

        $default['business_form_button']=esc_html__('Contact Us', 'business-form');
        $default['business_form_apply_button_link']='';

        // Blog.
        $default['business_form_sidebar_layout_option'] = 'right-sidebar';
        $default['business_form_blog_title_option'] = esc_html__('Latest Blog', 'business-form');
        $default['business_form_blog_excerpt_option'] = 'excerpt';
        $default['business_form_description_length_option'] = 40;
        $default['business_form_exclude_cat_blog_archive_option'] = '';
        

        // Details page.
        $default['business_form_show_feature_image_single_option'] = 'show';

        // Color Option.
        $default['business_form_primary_color'] = '#F88C00';
       
        $default['business_form_top_footer_background_color'] = '#252020';
        $default['business_form_front_page_hide_option'] = 0;
        $default['business_form_breadcrumb_setting_option'] = 'enable';
        $default['business_form_post_search_placeholder_option'] = esc_html__('Search', 'business-form');
        $default['business_form_hide_breadcrumb_front_page_option'] = 0;
        $default['business_form_color_reset_option'] = 'do-not-reset';

        //company info
        $default['business_form_top_header_section']='hide';
        $default['business_form_info_header_section_location_icon']='fa-home';
        $default['business_form_info_header_location']='';
        $default['business_form_info_header_section_phone_number_icon']='fa-phone';
        $default['business_form_info_header_phone_no']='';
        $default['business_form_email_icon']='fa-envelope';
        $default['business_form_info_header_email']='';

        /*default value */

        $default['business_form_facebook_url']='';
        $default['business_form_youtube_url']='';
        $default['business_form_linkedin_url']='';
        $default['business_form_twitter_url']='';
        $default['business_form_instagram_url']='';
        $default['business_form_google_plus_url']='';




        // Pass through filter.
        $default = apply_filters( 'business_form_get_default_theme_options', $default );
        return $default;
    }
endif;
