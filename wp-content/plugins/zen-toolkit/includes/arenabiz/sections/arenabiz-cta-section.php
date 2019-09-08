<?php
/**
 * cta section for the homepage.
 */
if ( ! function_exists( 'zentoolkit_arenabiz_cta' ) ) :

	function zentoolkit_arenabiz_cta() {
	
 if(get_theme_mod('arenabiz_cta_section_disable') != "on") { ?>	
	
	<div class="cta_bar">
		<div class="container">
	<div class="row">		
		
		<div class="col-md-12 col-sm-12 cta-caption">
			<?php if(esc_html(get_theme_mod('arenabiz_cta_sub_title')) != NULL){ echo esc_html(get_theme_mod('arenabiz_cta_sub_title'));} else echo __('Business and Consulting WordPress theme for you, get started now.', 'arenabiz');?>
			</div>
							<div class="clear"></div>			
					<div class="col-md-12 col-sm-12 cta-btn-wrapper">
							<a href="<?php echo esc_url(get_theme_mod('arenabiz_cta_button_link')); ?>"><?php if(esc_html(get_theme_mod('arenabiz_cta_button_text')) != NULL){ echo esc_html(get_theme_mod('arenabiz_cta_button_text'));} else echo __('Download Now!', 'arenabiz'); ?></a>
							<div class="clear"></div>
						</div>
						
			</div>
		</div>
	</div>
	<!-- /cta Section -->

<div class="clearfix"></div>	
<?php } }

endif;

		if ( function_exists( 'zentoolkit_arenabiz_cta' ) ) {
		$section_priority = apply_filters( 'arenabiz_section_priority', 12, 'zentoolkit_arenabiz_cta' );
		add_action( 'zentoolkit_arenabiz_sections', 'zentoolkit_arenabiz_cta', absint( $section_priority ) );

		}