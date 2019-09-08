<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package uncoverpro
 */

?>
	
	<?php
	get_sidebar( 'footer' );
			?>

	<footer id="colophon" class="site-footer">
	
	<div class="container">
	
	
		<div class="site-info">
			<?php esc_html_e( 'Copyright', 'uncoverpro' ); ?> <?php echo esc_attr(date_i18n(__('Y','uncoverpro'))); ?> <?php echo esc_html(get_theme_mod('uncoverpro_footer_title')); ?> 
		</div><!-- .site-info -->
		
	</div><!-- .container -->
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
