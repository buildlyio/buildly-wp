<?php
/**
 * service section for the homepage.
 */
if ( ! function_exists( 'zentoolkit_uncoverpro_service' ) ) :

	function zentoolkit_uncoverpro_service() {
	
 	if (get_theme_mod('uncoverpro_services_section_disable') != "on") { ?>   
				
<section class="services-section">
	<div class="container">

		<div class="services-post-wrap clear">
			<?php 
			for( $i = 1; $i < 4; $i++ ){
				$uncoverpro_services_page_id = get_theme_mod('uncoverpro_services_page'.$i); 
				$uncoverpro_services_page_icon = get_theme_mod('uncoverpro_services_page_icon'.$i);
			
			if($uncoverpro_services_page_id){
				$args = array( 
                    'page_id' => absint($uncoverpro_services_page_id) 
                    );
				$query = new WP_Query($args);
				if( $query->have_posts() ):
					while($query->have_posts()) : $query->the_post();
				?>
					<div class="services-post">
						<div class="services-icon"><i class="<?php echo esc_attr($uncoverpro_services_page_icon); ?>"></i></div>
						<h5><?php if(the_title_attribute('echo=0') != NULL){ echo the_title_attribute('echo=0');} ?></h5>
						<div class="services-excerpt">
						
					<?php 
					if(has_excerpt()){
						the_excerpt();
					}else{
						the_content(); 
					} ?>
					
						</div>
						<div class="services-link">
							<a href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e( 'Read More', 'uncoverpro' ); ?></a>
						</div>
					</div>
				<?php
				endwhile;
				endif;	
				wp_reset_postdata();
				}
			}
			?>
		</div>
	</div>
</section>
<?php } }

endif;

		if ( function_exists( 'zentoolkit_uncoverpro_service' ) ) {
		$section_priority = apply_filters( 'uncoverpro_section_priority', 12, 'zentoolkit_uncoverpro_service' );
		add_action( 'zentoolkit_uncoverpro_sections', 'zentoolkit_uncoverpro_service', absint( $section_priority ) );

		}