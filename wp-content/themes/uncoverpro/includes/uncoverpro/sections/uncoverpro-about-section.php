<?php
/**
 * about section for the homepage.
 */
if ( ! function_exists( 'zentoolkit_uncoverpro_about' ) ) :

	function zentoolkit_uncoverpro_about() {
	
 	if (get_theme_mod('uncoverpro_about_section_disable') != "on") { ?>   
				
<!-- Portfolio Section -->
<section class="about-section">
			
			<div class="container">
	
		<!-- Section Title -->
                    <div class="about_heading_container"> 
                        <h2 class="uncoverpro_about_main_head">
						<?php if(esc_html(get_theme_mod('uncoverpro_about_title')) != NULL){ echo esc_html(get_theme_mod('uncoverpro_about_title'));} ?></h2>
                        <h4 class="uncoverpro_about_main_desc"><?php if(esc_html(get_theme_mod('uncoverpro_about_sub_title')) != NULL){ echo esc_html(get_theme_mod('uncoverpro_about_sub_title'));} ?>
						</h4>
                    </div>
		<!-- /Section Title -->
		
		<div class="row box-wrapper">

			<?php for ($i = 1; $i <= 3; $i++) { 
			
					$uncoverpro_about_page_id = esc_html(get_theme_mod('uncoverpro_about_page'.$i));

		if($uncoverpro_about_page_id){
			$args = array( 
                        'page_id' => absint($uncoverpro_about_page_id) 
                        );
			$query = new WP_Query($args);
			if( $query->have_posts() ):
				while($query->have_posts()) : $query->the_post();
				?>
		
				<div class="col-md-4 col-sm-4">
				
					<div class="box-head">
	
					<?php 
					if(has_post_thumbnail()){
						$uncoverpro_about_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'full');
						echo '<img alt="'. the_title_attribute('echo=0') .'" src="'.esc_url($uncoverpro_about_image[0]).'">';
			} else echo '<img alt="'. the_title_attribute('echo=0') .'" src="'.esc_url(get_template_directory_uri()) . '/images/port'.absint($i).'.jpg'.'">';
					?>

					
					</div> <!--box-head close-->
					
				<div class="title-box">						
						
				<div class="title-head">
				
				<?php if(the_title_attribute('echo=0') != NULL){ echo the_title_attribute('echo=0');} ?>
						
			</div>		
				</div>
					
					<div class="box-content">

    				<?php 
					if(has_excerpt()){
						the_excerpt();
					}else{
						the_content(); 
					} ?>
					
					</div> <!--box-content close-->
					<div class="clear"></div>
			
				</div><!--boxes  end-->
				
				<?php
				endwhile;
			endif;
		}
	} ?>
			
	</div>
		</div>
		
</section>
<!-- /about Section -->

<div class="clearfix"></div>
<?php } }

endif;

		if ( function_exists( 'zentoolkit_uncoverpro_about' ) ) {
		$section_priority = apply_filters( 'uncoverpro_section_priority', 12, 'zentoolkit_uncoverpro_about' );
		add_action( 'zentoolkit_uncoverpro_sections', 'zentoolkit_uncoverpro_about', absint( $section_priority ) );

		}