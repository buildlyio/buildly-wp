<?php
/**
 * sliderbar section for the homepage.
 */
if ( ! function_exists( 'zentoolkit_uncoverpro_sliderbar' ) ) :

	function zentoolkit_uncoverpro_sliderbar() {
	
 if(get_theme_mod('uncoverpro_sliderbar_section_disable') != "on") { ?>
	
	<div class="slider_bar">
		<div class="container">
	<div class="row">		
		
		<div class="col-md-8 col-sm-8 sb-caption">
			<?php if(esc_html(get_theme_mod('uncoverpro_sliderbar_sub_title')) != NULL){ echo esc_html(get_theme_mod('uncoverpro_sliderbar_sub_title'));} else echo __('Business and Consulting WordPress theme for you, get started now.', 'uncoverpro');?>
			</div>
			
					<div class="col-md-4 col-sm-4 sb-btn-wrapper">
							<a href="<?php echo esc_url(get_theme_mod('uncoverpro_sliderbar_button_link')); ?>"><?php if(esc_html(get_theme_mod('uncoverpro_sliderbar_button_text')) != NULL){ echo esc_html(get_theme_mod('uncoverpro_sliderbar_button_text'));} else echo __('Download Now!', 'uncoverpro'); ?></a>
							<div class="clear"></div>
						</div>
						
			</div>
		</div>
	</div>

<div class="clearfix"></div>	
<?php } }

endif;

		if ( function_exists( 'zentoolkit_uncoverpro_sliderbar' ) ) {
		$section_priority = apply_filters( 'uncoverpro_section_priority', 10, 'zentoolkit_uncoverpro_sliderbar' );
		add_action( 'zentoolkit_uncoverpro_sections', 'zentoolkit_uncoverpro_sliderbar', absint( $section_priority ) );

		}