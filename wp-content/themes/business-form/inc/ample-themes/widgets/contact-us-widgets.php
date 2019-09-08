<?php
/**
 * Class for adding Contact Section Widget
 *
 * @package Acme Themes
 * @subpackage business_form
 * @since 1.0.0
 */
if ( ! class_exists( 'Business_Form_Contact' ) ) {

    class Business_Form_Contact extends WP_Widget {
        /*defaults values for fields*/
        private $defaults = array(
            'title'         => '',
            'shortcode'     => '',
            'page_id'       => '',
            'section-id' =>'',
            

        );

        function __construct() {
            parent::__construct(
            /*Base ID of your widget*/
                'business_form_contact',
                /*Widget name will appear in UI*/
                __('AT : Contact Widgets', 'business-form'),
                /*Widget description*/
                array( 'description' => __( 'Show Contact Section.', 'business-form' ), )
            );
        }

        /*Widget Backend*/
        public function form( $instance ) {
            $instance = wp_parse_args( (array) $instance, $this->defaults );
            /*default values*/
            $title = esc_attr( $instance[ 'title' ] );
            $shortcode = esc_attr( $instance[ 'shortcode' ] );
            $page_id = absint( $instance[ 'page_id' ] );
            $section_id= esc_attr( $instance['section-id'] );


            ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('section-id') ); ?>">
                    <?php esc_html_e( 'Section Id', 'business-form'); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr($this->get_field_name('section-id')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('section-id')); ?>" value="<?php echo $section_id; ?>">
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'business-form' ); ?>:</label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
            </p>
            
            
            <p>
                <label for="<?php echo $this->get_field_id( 'shortcode' ); ?>"><?php _e( 'Enter Shortcode', 'business-form' ); ?>:</label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'shortcode' ); ?>" name="<?php echo $this->get_field_name( 'shortcode' ); ?>" type="text" value="<?php echo $shortcode; ?>" />
                <small>
                    <?php
                    printf( __( 'Download contact form 7 from %1$shere%2$s', 'business-form' ), "<a target='_blank' href='".esc_url( 'https://wordpress.org/plugins/contact-form-7/' )."''>","</a>" );
                    ?>
                </small>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'page_id' ); ?>"><?php _e( 'Select Page For Contact', 'business-form' ); ?>:</label>
                <br />
                <small><?php _e( 'Select page and its title and excerpt will display in the frontend. No need of subpages.', 'business-form' ); ?></small>
                <?php
                /* see more here https://codex.wordpress.org/Function_Reference/wp_dropdown_pages*/
                $args = array(
                    'selected'              => $page_id,
                    'name'                  => $this->get_field_name( 'page_id' ),
                    'id'                    => $this->get_field_id( 'page_id' ),
                    'class'                 => 'widefat',
                    'show_option_none'      => __('Select Page','business-form'),
                );
                wp_dropdown_pages( $args );
                ?>
            <p>
                <label for="<?php echo $this->get_field_id('post_image'); ?>"><?php esc_html_e('Show Thumnail Image', 'business-form'); ?>  </label>
                <input class="checkbox" type="checkbox" <?php checked($instance['post_image'], 'on'); ?>
                       id="<?php echo $this->get_field_id('post_image'); ?>"
                       name="<?php echo $this->get_field_name('post_image'); ?>"/>

            </p>


            <?php
        }
        /**
         * Function to Updating widget replacing old instances with new
         *
         * @access public
         * @since 1.0.0
         *
         * @param array $new_instance new arrays value
         * @param array $old_instance old arrays value
         * @return array
         *
         */
        public function update( $new_instance, $old_instance ) {
            $instance = $old_instance;
            $instance[ 'title' ] = sanitize_text_field( $new_instance[ 'title' ] );
            $instance[ 'shortcode' ] = wp_kses_post( $new_instance[ 'shortcode' ] );
            $instance[ 'page_id' ] = absint( $new_instance[ 'page_id' ] );
            $instance['post_image'] = ($new_instance['post_image']);
            $instance['section-id'] = sanitize_text_field($new_instance['section-id']);



            return $instance;
        }
        public function widget($args, $instance)
        {
            $instance = wp_parse_args((array)$instance, $this->defaults);
            $title = apply_filters('widget_title', !empty($instance['title']) ? $instance['title'] : '', $instance, $this->id_base);
            $shortcode = wp_kses_post($instance['shortcode']);
            $page_id = absint($instance['page_id']);
            $post_image = $instance['post_image'] ? 'true' : 'false';
            $section_id = esc_attr($instance['section-id']);



            echo $args['before_widget'];
            ?>





            <section id="<?php echo esc_attr($section_id); ?>">

                <div id="faq" class="section-bg">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="faq-box">
                                    <div class="section-header wow fadeInUp">
                                        <h3><?php echo esc_html($title);?></h3>
                                    </div>

                                    <div id="accordion" class=" wow fadeInUp">

                                        <?php echo do_shortcode( $shortcode ); ?>

                                    </div>

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="contact-details">
                                    <?php
                                    if( !empty ( $page_id ) ) :
                                    $business_form_child_page_args = array(
                                        'page_id'             => $page_id,
                                        'posts_per_page'      => 1,
                                        'post_type'           => 'page',
                                        'no_found_rows'       => true,
                                        'post_status'         => 'publish'
                                    );
                                    $service_query = new WP_Query( $business_form_child_page_args );
                                    /*The Loop*/
                                    if ( $service_query->have_posts() ):
                                    while( $service_query->have_posts() ):$service_query->the_post();
                                    ?>
                                    <?php

                                    if (has_post_thumbnail() && $post_image == "true") {
                                        $image_id = get_post_thumbnail_id();
                                        $image_url = wp_get_attachment_image_src($image_id, 'large', true);
                                        ?>

                                        <img src="<?php echo esc_url($image_url[0]); ?>" alt=""/>


                                    <?php }
                                    else {
                                    the_title( '<h2 class="entry-title">', '</h2>' ); ?>
                                    <div class="contact-page-content">
                                        <?php
                                        the_content();
                                        ?>
                                    </div>
                                </div>
                                <?php
                                }

                                endwhile;
                                endif;
                                endif;
                                ?>
                            </div>


                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php echo $args['after_widget']; ?>
            
            <!-- End innerpage content site -->
            <?php
        }
    } // Class business_form_contact ends here
}
/**
 * Function to Register and load the widget
 *
 * @since 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'business_form_contact' ) ) :

    function business_form_contact() {
        register_widget( 'Business_Form_Contact' );
    }
endif;
add_action( 'widgets_init', 'business_form_contact' );