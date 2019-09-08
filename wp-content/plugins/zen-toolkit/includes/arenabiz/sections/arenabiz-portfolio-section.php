<?php
/**
 * Portfolio section for the homepage.
 */
if ( ! function_exists( 'zentoolkit_arenabiz_portfolio' ) ) :

	function zentoolkit_arenabiz_portfolio() {
	
 	if (get_theme_mod('arenabiz_portfolio_section_disable') != "on") {	?>
			
<!-- Portfolio Section -->
<section class="portfolio-section">
	<div class="container">
	
		<!-- Section Title -->
                    <div class="portfolio_heading_container"> 
                        <h2 class="arenabiz_portfolio_main_head">
						<?php if(esc_html(get_theme_mod('arenabiz_portfolio_title')) != NULL){ echo esc_html(get_theme_mod('arenabiz_portfolio_title'));}  ?></h2>
                        <p class="arenabiz_portfolio_main_desc"><?php if(esc_html(get_theme_mod('arenabiz_portfolio_sub_title')) != NULL){ echo esc_html(get_theme_mod('arenabiz_portfolio_sub_title'));}?>
						</p>
                    </div>
		<!-- /Section Title -->
				
			
			<div class="row">

			<?php for ($i = 1; $i <= 3; $i++) { 
			
					$arenabiz_portfolio_page_id = esc_html(get_theme_mod('arenabiz_portfolio_page'.$i));

		if($arenabiz_portfolio_page_id){
			$args = array( 
                        'page_id' => absint($arenabiz_portfolio_page_id) 
                        );
			$query = new WP_Query($args);
			if( $query->have_posts() ):
				while($query->have_posts()) : $query->the_post();
				?>			
				
					<div class="col-md-4 col-sm-4">						
						<article class="post">
							<figure class="post-thumbnail">
								
					<?php 
					if(has_post_thumbnail()){
						$arenabiz_portfolio_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'full');
						echo '<img class="img-responsive" alt="'. the_title_attribute('echo=0') .'" src="'.esc_url($arenabiz_portfolio_image[0]).'">';
			} else echo '<img alt="'. the_title_attribute('echo=0') .'" src="'.esc_url(get_template_directory_uri()) . '/images/port'.absint($i).'.jpg'.'">';
					?>
							</figure>
							
							<header class="entry-header">
								<h4 class="entry-title"><?php if(the_title_attribute('echo=0') != NULL){ echo the_title_attribute('echo=0');} ?></h4>
							</header>	
							<div class="entry-content">
							
								<?php if(has_excerpt()){
						the_excerpt();
					}else{
						the_content(); 
					} ?>
				
							</div>	
						</article>
					</div>
					
				<?php
				endwhile;
			endif;
		}
	} ?>
				</div>			
			
	
		
	</div>
</section>
<!-- /Portfolio Section -->

<div class="clearfix"></div>	
<?php } }

endif;

		if ( function_exists( 'zentoolkit_arenabiz_portfolio' ) ) {
		$section_priority = apply_filters( 'arenabiz_section_priority', 12, 'zentoolkit_arenabiz_portfolio' );
		add_action( 'zentoolkit_arenabiz_sections', 'zentoolkit_arenabiz_portfolio', absint( $section_priority ) );

		}