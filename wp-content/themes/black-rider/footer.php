<div class="footer_container">
    <div class="footer_container_wrapper">
        <div class="container_24">
            <div class="grid_24">
                <div class="footer">
                    <?php
                    /* A sidebar in the footer? Yep. You can can customize
                     * your footer with four columns of widgets.
                     */
                    get_sidebar('footer');
                    ?>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div class="bottom_footer_container">
    <div class="container_24">
        <div class="grid_24">
            <div class="bottom_footer_content">
                <p class="blogdes">  <span class="blog-desc">				
                        <?php echo get_bloginfo('title'); ?>
                        -
                        <?php echo get_bloginfo('description'); ?>
                    </span></p>


 <ul class="social_logos">

<?php if (blcr_get_option('inkthemes_facebook') != '') { ?>
                            <li class="facebook"><a href="<?php echo esc_url(blcr_get_option('inkthemes_facebook')); ?>"><span></span></a></li>
                            <?php
                        }
                        ?>

                        <?php if (blcr_get_option('inkthemes_twitter') != '') { ?>
                            <li class="twitter"><a href="<?php echo esc_url(blcr_get_option('inkthemes_twitter')); ?>"><span></span></a></li>
                            <?php
                        }
                        ?>

                        <?php if (blcr_get_option('inkthemes_google') != '') { ?>
                            <li class="google"><a href="<?php echo esc_url(blcr_get_option('inkthemes_google')); ?>"><span></span></a></li>
                            <?php
                        }
                        ?>

  <?php if (blcr_get_option('inkthemes_rss') != '') { ?>
                            <li class="rss"><a href="<?php echo esc_url(blcr_get_option('inkthemes_rss')); ?>"><span></span></a></li>
                            <?php
                        }
                        ?>

                        <?php if (blcr_get_option('inkthemes_pinterest') != '') { ?>
                            <li class="pinterest"><a href="<?php echo esc_url(blcr_get_option('inkthemes_pinterest')); ?>"><span></span></a></li>
                            <?php
                        }
                        ?>

                        <?php if (blcr_get_option('inkthemes_linked') != '') { ?>
                            <li class="linkedin"><a href="<?php echo esc_url(blcr_get_option('inkthemes_linked')); ?>"><span></span></a></li>
                            <?php
                        }
                        ?>

                             <?php if (blcr_get_option('inkthemes_instagram') != '') { ?>
                            <li class="instagram"><a href="<?php echo esc_url(blcr_get_option('inkthemes_instagram')); ?>"><span></span></a></li>
                            <?php
                        }
                        ?>

                        <?php if (blcr_get_option('inkthemes_youtube') != '') { ?>
                            <li class="youtube"><a href="<?php echo esc_url(blcr_get_option('inkthemes_youtube')); ?>"><span></span></a></li>
                            <?php
                        }
                        ?>


                        <?php if (blcr_get_option('inkthemes_tumblr') != '') { ?>
                            <li class="tumblr"><a href="<?php echo esc_url(blcr_get_option('inkthemes_tumblr')); ?>"><span></span></a></li>
                            <?php
                        }
                        ?>

                        <?php if (blcr_get_option('inkthemes_flickr') != '') { ?>
                            <li class="flickr"><a href="<?php echo esc_url(blcr_get_option('inkthemes_flickr')); ?>"><span></span></a></li>
                            <?php
                        }
                        ?>
                        
                    </ul>



                <div class="copyrightinfo">
                    <?php if (blcr_get_option('inkthemes_footertext') != '') { ?>
                        <p class="copyright"><?php echo blcr_get_option('inkthemes_footertext'); ?></p> 
                    <?php } else { ?>
                        <p class="copyright"><?php printf(__('<a href="%s" rel="nofollow">Black Rider Theme</a> Powered by <a href="http://www.wordpress.org">WordPress</a>', 'black-rider'), 'https://www.inkthemes.com/market/lead-generation-wordpress-theme/'); ?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
