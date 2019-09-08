<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Secure
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php $hidetopbar = get_theme_mod('hide_topbar', '1'); ?>
<?php if($hidetopbar == ''){ ?>
<div class="header-top">
            <div class="container">
            	<div class="head-top-left">
                	<?php if(get_theme_mod('welcm-txt') != '') { ?>
                		<p><?php echo esc_attr(get_theme_mod('welcm-txt')); ?></p>
                    <?php } ?>
                </div><!-- head-top-left -->
                <div class="head-top-right">
                	<?php if(get_theme_mod('phone') != '') { ?>
                	<span><i class="fa fa-phone"></i> : <?php echo esc_html(get_theme_mod('phone',true)); ?></span>
                    <?php } ?>
                          <div class="social-icons">
                          		<?php if((get_theme_mod('scname1')) || (get_theme_mod('sclink1')) != '') {?>
                					<a href="<?php echo esc_url(get_theme_mod('sclink1',true)); ?>"><i class="fa fa-<?php echo esc_attr(get_theme_mod('scname1',true)); ?>" aria-hidden="true"></i></a>
                    			<?php } ?>
                                <?php if((get_theme_mod('scname2')) || (get_theme_mod('sclink2')) != '') { ?>
                    				<a href="<?php echo esc_url(get_theme_mod('sclink2',true)); ?>"><i class="fa fa-<?php echo esc_attr(get_theme_mod('scname2',true)); ?>" aria-hidden="true"></i></a>
                    			<?php } ?>
                                <?php if((get_theme_mod('scname3')) || (get_theme_mod('sclink3')) != '') { ?>
                    				<a href="<?php echo esc_url(get_theme_mod('sclink3',true)); ?>"><i class="fa fa-<?php echo esc_attr(get_theme_mod('scname3',true)); ?>" aria-hidden="true"></i></a>
                    			<?php } ?>
                                <?php if((get_theme_mod('scname4')) || (get_theme_mod('sclink4')) != '') { ?>
                    				<a href="<?php echo esc_url(get_theme_mod('sclink4',true)); ?>"><i class="fa fa-<?php echo esc_attr(get_theme_mod('scname4',true)); ?>" aria-hidden="true"></i></a>
                    			<?php } ?>
                          </div><!-- social-icons -->
                </div><!-- head-top-right -->
                <div class="clear"></div>
            </div><!-- cpntainer -->
        </div><!-- header-top -->
<?php } ?>


<div id="header">
	<div class="header-inner">
      <div class="logo">
           <?php secure_the_custom_logo(); ?>
			    <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_attr(bloginfo( 'name' )); ?></a></h1>
					<?php $description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
						<p><?php echo esc_attr($description); ?></p>
					<?php endif; ?>
      </div><!-- logo -->      
      <div class="prime-menu">
	<div class="prime-inner">
        <div class="toggle">
                <a class="toggleMenu" href="#">
                    <?php esc_attr_e('Menu','secure'); ?>                
                </a>
         </div><!-- toggle -->    
        <div class="sitenav">                   
            <?php wp_nav_menu( array('theme_location' => 'primary') ); ?> 
        </div><!--.sitenav -->
        <div class="clear"></div>
      </div><!-- prime-inner -->
</div><!-- prime-menu --><div class="clear"></div>
</div><!-- .header-inner-->
</div><!-- .header -->