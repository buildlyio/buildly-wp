<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bussiness_agency
 */

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bussiness_agency
 */

$business_form_breadcrump_option = business_form_get_option('business_form_breadcrumb_setting_option');
$business_form_designlayout = get_post_meta(get_the_ID(), 'business_form_sidebar_layout', true);

get_header();

?>


<main id="main">
	<?php
	if ($business_form_breadcrump_option == 'enable' ) {
	/**
	 *
	 *
	 * @link https://codex.wordpress.org/Template_Hierarchy
	 *
	 * @package business_form
	 */
	global $business_form_header_image, $business_form_header_style;
	$business_form_header_image = get_header_image();

	if ($business_form_header_image) {
		$business_form_header_style = $business_form_header_image;

	} else {

		$business_form_header_style = '';
	}

	?>


	<div class="inner-header-banner overlay bg-img"
		 style="background-image: url(<?php echo esc_url($business_form_header_style); ?>);">
		<div class="container">
			<header class="section-header">
						<h3><?php  the_archive_title(); ?> </h3>

				<?php
				$business_form_breadcrump_option = business_form_get_option('business_form_breadcrumb_setting_option');

				if ($business_form_breadcrump_option == "enable") {
					?>

					<div class="breadcrumbs">
						<div class="container">
							<div class="breadcrumb-trail breadcrumbs" arial-label="Breadcrumbs" role="navigation">
								<ol class="breadcrumb trail-items">
									<li><?php breadcrumb_trail(); ?></li>
								</ol>
							</div>
						</div>
					</div>
				<?php } ?>

			</header>
		</div>
	</div>


<?php	} ?>
	<div id="content" class="site-content single-ample-page">
		<div class="container  clearfix">
			<?php
			$sidebardesignlayout = esc_attr( get_post_meta(get_the_ID(), 'business_form_sidebar_layout', true) );
			if (is_singular() && $sidebardesignlayout != "default-sidebar")
			{
				$sidebardesignlayout = esc_attr( get_post_meta(get_the_ID(), 'business_form_sidebar_layout', true) );

			} else
			{
				$sidebardesignlayout = esc_attr(business_form_get_option('business_form_sidebar_layout_option' ));
			}


			if($sidebardesignlayout == 'left-sidebar'){
			?>
			<div class="flex-row-reverse">
				<?php } else{?>
				<div class="row"><?php } ?>
					<!-- Start primary content area -->
					<div id="primary" class="content-area">
						<main id="main" class="site-main" role="main">

							<?php
							if (have_posts()) :
								/* Start the Loop */
								while (have_posts()) : the_post();
									{
										/*
                                         * Include the Post-Format-specific template for the content.
                                         * If you want to override this in a child theme, then include a file
                                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                         */
										get_template_part('template-parts/content', get_post_format());
									}

								endwhile;

								wp_reset_postdata();

								the_posts_navigation();

							else :
								get_template_part('template-parts/content', 'none');
							endif; ?>

						</main><!-- #main -->
					</div><!-- #primary -->

					<div id="sidebar-primary secondary" class="widget-area sidebar" role="complementary">
						<section  class="widget ">
							<?php get_sidebar();?>
						</section>
					</div>

				</div>
			</div>
		</div>
</main>


<?php

get_footer();
?>

