<?php
get_header();


 $business_form_hide_front_page_content = business_form_get_option('business_form_front_page_hide_option');
if (!is_home()){
    $business_form_slider_section_option = business_form_get_option('business_form_homepage_slider_option');

    if ($business_form_slider_section_option != 'hide') {
        ?>
        <section id="intro">
            <div class="intro-container">
                <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <?php
                        $all_slider = json_decode(business_form_get_option('business_form_banner_all_sliders'));
                        $post_in = array();
                        $slides_other_data = array();

                        if (is_array($all_slider)) {

                            foreach ($all_slider as $slides_data) {

                                if (isset($slides_data->selectpage) && !empty($slides_data->selectpage)) {
                                    $post_in[] = $slides_data->selectpage;

                                    $slides_other_data[$slides_data->selectpage] = array(
                                        'button_text' => $slides_data->button_text,
                                        'button_link' => $slides_data->button_url,

                                    );


                                }


                            }
                        }
                        if (!empty($post_in)) :
                            $business_form_slider_page_args = array(
                                'post__in' => $post_in,
                                'orderby' => 'post__in',
                                'posts_per_page' => count($post_in),
                                'post_type' => 'page',
                                'no_found_rows' => true,
                                'post_status' => 'publish'
                            );
                            $slider_query = new WP_Query($business_form_slider_page_args);
                            $i = 0;
                            /*The Loop*/
                            if ($slider_query->have_posts()):
                                while ($slider_query->have_posts()):$slider_query->the_post();
                                    $slides_single_data = $slides_other_data[get_the_ID()];
                                    ?>

                                    <div class="carousel-item <?php if ($i == 0) {
                                        echo "active";
                                    } ?>">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            $image_id = get_post_thumbnail_id();
                                            $image_url = wp_get_attachment_image_src($image_id, 'full', true); ?>


                                            <div class="carousel-background"><img
                                                    src="<?php echo esc_url($image_url[0]); ?>"
                                                    alt="<?php the_title_attribute(); ?>"></div>

                                        <?php } ?>
                                        <div class="carousel-container">
                                            <div class="carousel-content">

                                                <h2><?php the_title() ?></h2>
                                                <p> <?php echo esc_html(wp_trim_words(get_the_content(), 20)); ?></p>
                                                <?php if (!empty($slides_single_data['button_text'])) { ?>
                                                    <a href="<?php echo esc_url($slides_single_data['button_link']); ?>"
                                                       class="btn-get-started scrollto"><?php echo esc_html($slides_single_data['button_text']) ?></a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    $i++;
                                endwhile;
                                wp_reset_postdata();
                            endif; endif;

                        ?>


                    </div>

                    <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>

                    <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>

                </div>
            </div>
        </section><!-- #intro -->
    <?php } ?>


    <main id="main">

        <?php dynamic_sidebar('homepage_widgets'); ?>


    </main>


    <?php

}

if ('posts' == get_option('show_on_front')) {

    include(get_home_template());
} else {
    if (0 == $business_form_hide_front_page_content) {
        include(get_page_template());


    }
}

get_footer();
?>


