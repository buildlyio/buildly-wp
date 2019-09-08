<?php
/**
 * testimonial section for the homepage.
 */
if ( ! function_exists( 'zentoolkit_arenabiz_testimonial' ) ) :

	function zentoolkit_arenabiz_testimonial() {
	
 	if (get_theme_mod('arenabiz_testimonial_section_disable') != "on") { ?>   
<div class="container">  
   <div class="testimonial_item_container"> 
                    <div class="testimonial_heading_container"> 
                        <h2 class="arenabiz_testimonial_main_head">
	<?php if(esc_html(get_theme_mod('arenabiz_testimonial_title')) != NULL){ echo esc_html(get_theme_mod('arenabiz_testimonial_title'));} ?></h2>
                        <p class="arenabiz_testimonial_main_desc"><?php if(esc_html(get_theme_mod('arenabiz_testimonial_sub_title')) != NULL){ echo esc_html(get_theme_mod('arenabiz_testimonial_sub_title'));} ?></p>
                    </div>
     
                        <div class="testimonial_item_content row"> 
						
			<?php for ($i = 1; $i <= 3; $i++) { 
			
					$arenabiz_testimonial_page_id = esc_html(get_theme_mod('arenabiz_testimonial_page'.$i));

		if($arenabiz_testimonial_page_id){
			$args = array( 
                        'page_id' => absint($arenabiz_testimonial_page_id) 
                        );
			$query = new WP_Query($args);
			if( $query->have_posts() ):
				while($query->have_posts()) : $query->the_post();
				?>			
										
                            <div class="col-md-4 col-sm-4 testimonial_col_wrap">
                                <div class="testimonial_item arenabiz_testimonial center">  
                                    <p class="testm_descbox">
									<?php if(has_excerpt()){
						the_excerpt();
					}else{
						the_content(); 
					} ?>
									</p>
                                    <div class="testimonial_item_inner arenabiz_testimonial_img">  
					<?php 
					if(has_post_thumbnail()){
						$arenabiz_testimonial_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'full');
						echo '<img alt="'. the_title_attribute('echo=0') .'" src="'.esc_url($arenabiz_testimonial_image[0]).'">';
			} else echo '<img alt="'. the_title_attribute('echo=0') .'" src="'.esc_url(get_template_directory_uri()) . '/images/quote.png'.'">';
					?>
                                        <div class="testimonial_name_wrapper">  
                        <p><?php if(the_title_attribute('echo=0') != NULL){ echo the_title_attribute('echo=0');} ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

				<?php
				endwhile;
			endif;
		}
	} ?>
                        </div>
                       
                </div>
	 	</div><!-- container end -->	
		          

<div class="clearfix"></div>	
<?php } }

endif;

		if ( function_exists( 'zentoolkit_arenabiz_testimonial' ) ) {
		$section_priority = apply_filters( 'arenabiz_section_priority', 13, 'zentoolkit_arenabiz_testimonial' );
		add_action( 'zentoolkit_arenabiz_sections', 'zentoolkit_arenabiz_testimonial', absint( $section_priority ) );

		}