<?php
/**
 * Created by PhpStorm.
 * User: arjun
 * Date: 7/12/2017
 * Time: 8:43 AM
 */
if (!class_exists('Business_Form_faq_Widget')) {
    class Business_Form_faq_Widget extends WP_Widget
    {

        private function defaults()
        {

            $defaults = array(
                'cat_id' => 0,
                'title' => esc_html__('faq', 'business-form'),
                'sub-title' =>'',
                'image'=>'',
                'post_number' =>3,
                'section-id' =>'',

            );
            return $defaults;
        }

        public function __construct()
        {
            parent::__construct(
                'business-form-faq-widget',
                esc_html__('AT : FAQ Widgets', 'business-form'),
                array('description' => esc_html__('Business faq Section', 'business-form'))
            );
        }

        public function form($instance)
        {
            $instance = wp_parse_args((array )$instance, $this->defaults());
            $catid = absint($instance['cat_id']);
            $section_id= esc_attr( $instance['section-id'] );
            $title = esc_attr($instance['title']);
            $subtitle = esc_attr($instance['sub-title']);
            $image = esc_url($instance['image']);
            $post_number = absint($instance['post_number']);

            ?>
            <p xmlns="http://www.w3.org/1999/html">
                <label for="<?php echo esc_attr( $this->get_field_id('section-id') ); ?>">
                    <?php esc_html_e( 'Section Id', 'business-form'); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr($this->get_field_name('section-id')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('section-id')); ?>" value="<?php echo $section_id; ?>">
            </p>


            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                    <?php esc_html_e('Title', 'business-form'); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr($this->get_field_name('title')); ?>" class="widefat"
                       id="<?php echo esc_attr($this->get_field_id('title')); ?>" value="<?php echo $title; ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('sub-title')); ?>">
                    <?php esc_html_e('Sub Title', 'business-form'); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr($this->get_field_name('sub-title')); ?>" class="widefat"
                       id="<?php echo esc_attr($this->get_field_id('sub-title')); ?>" value="<?php echo $subtitle; ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('cat_id')); ?>">
                    <?php esc_html_e('Select Category', 'business-form'); ?>
                </label><br/>
                <?php
                $business_dropown_cat = array(
                    'show_option_none' => esc_html__('Select Category', 'business-form'),
                    'orderby' => 'name',
                    'order' => 'asc',
                    'show_count' => 1,
                    'hide_empty' => 1,
                    'echo' => 1,
                    'selected' => $catid,
                    'hierarchical' => 1,
                    'name' => esc_attr($this->get_field_name('cat_id')),
                    'id' => esc_attr($this->get_field_name('cat_id')),
                    'class' => 'widefat',
                    'taxonomy' => 'category',
                    'hide_if_empty' => false,
                );
                wp_dropdown_categories($business_dropown_cat);
                ?>
            </p>
            <hr>
            <p>
                <label for="<?php echo $this->get_field_id('image'); ?>">
                    <?php _e('Select Background Image', 'business-form'); ?>:
                </label>
                <span class="img-preview-wrap" <?php if (empty($image)) { ?> style="display:none;" <?php } ?>>
                    <img class="widefat" src="<?php echo esc_url($image); ?>"
                         alt="<?php esc_attr_e('Image preview', 'business-form'); ?>"/>
                </span><!-- .img-preview-wrap -->
                <input type="text" class="widefat" name="<?php echo $this->get_field_name('image'); ?>"
                       id="<?php echo $this->get_field_id('image'); ?>"
                       value="<?php echo esc_url($image); ?>"/>
                <input type="button" id="custom_media_button"
                       value="<?php esc_attr_e('Upload Image', 'business-form'); ?>" class="button media-image-upload"
                       data-title="<?php esc_attr_e('Select Background Image', 'business-form'); ?>"
                       data-button="<?php esc_attr_e('Select Background Image', 'business-form'); ?>"/>
                <input type="button" id="remove_media_button"
                       value="<?php esc_attr_e('Remove Image', 'business-form'); ?>"
                       class="button media-image-remove"/>
            </p>
            <hr>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('post_number')); ?>"><strong><?php esc_html_e('Number of Posts:', 'business-form'); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('post_number')); ?>" name="<?php echo esc_attr($this->get_field_name('post_number')); ?>" type="number" value="<?php echo $post_number; ?>" min="1"/>
            </p>
            <?php
        }

        public function update($new_instance, $old_instance)
        {
            $instance = $old_instance;
            $instance['cat_id'] = (isset($new_instance['cat_id'])) ? absint($new_instance['cat_id']) : '';
            $instance['title'] = sanitize_text_field($new_instance['title']);
            $instance['sub-title'] = sanitize_text_field($new_instance['sub-title']);
            $instance['image'] = esc_url_raw($new_instance['image']);
            $instance['post_number'] = absint( $new_instance['post_number'] );
            $instance['section-id'] = sanitize_text_field($new_instance['section-id']);


            return $instance;

        }

        public function widget($args, $instance)
        {
            if (!empty($instance)) {
                $instance = wp_parse_args((array)$instance, $this->defaults());
                $title = apply_filters('widget_title', !empty($instance['title']) ? esc_html($instance['title']) : '', $instance, $this->id_base);
                $catid = absint($instance['cat_id']);
                $image = esc_url($instance['image']);
                $post_number = absint($instance['post_number']);
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

                <?php
                $idvalue = array();
                if (!empty($catid)) {
                    $i = 1;
                    $sticky = get_option('sticky_posts');
                    $home_our_features_section = array(
                        'cat' => $catid,
                        'posts_per_page' => $post_number,
                        'ignore_sticky_posts' => true,
                        'post__not_in' => $sticky,
                        'orderby' => 'post_date',
                        'order' => 'DESC',
                    );
                    $home_our_features_section_query = new WP_Query($home_our_features_section);
                    if ($home_our_features_section_query->have_posts()) {

                        while ($home_our_features_section_query->have_posts()) {
                            $home_our_features_section_query->the_post();
                            $icon = get_post_meta(get_the_ID(), 'business_form_icon', true);
                            $idvalue[] = get_the_ID();
                            ?>


                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        <?php the_title(); ?>
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="collapseOne" class="collapse <?php if($i==1){ echo esc_attr(show); } ?>" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    <?php the_content(); ?>
                                                </div>
                                            </div>
                                        </div>



                            <?php
                            $i++;
                        }
                        wp_reset_postdata();
                    }
                }?>


                                    </div>

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="faq-bg" style="background-image: url(<?php echo  esc_url($image); ?>"></div>

                            </div>
                        </div>
                    </div>
                </div>
    </section>


                <!-- End feature Area -->
                <?php
                echo $args['after_widget'];
            }
        }

    }
}
add_action('widgets_init', 'Business_Form_faq_widget');
function Business_Form_faq_widget()
{
    register_widget('Business_Form_faq_Widget');

}

?>
