<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package shopress
 */
?>
<!--==================== FOOTER AREA ====================-->
<footer> 
  <div class="overlay"> 
  <!--Start shopress-footer-widget-area-->
  <?php if ( is_active_sidebar( 'footer_widget_area' ) ) { ?>
  <div class="shopress-footer-widget-area">
    <div class="container">
      <div class="row">
        <?php  dynamic_sidebar( 'footer_widget_area' ); ?>
      </div>
    </div>
  </div>
  <?php } ?>
  <!--End shopress-footer-widget-area-->
  <div class="shopress-footer-copyright">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
        <p><?php echo esc_html(get_theme_mod('shopress_footer_copyright_setting','Copyright 2017 Powered by WordPress')); ?></p>
        </div>
        <div class="col-md-6 text-right">
          <?php if(get_theme_mod('hide_footer_icon') != 'false' ) { ?>
          <ul class="shopress-social">
            <?php if(get_theme_mod('social_link_facebook','#')) { ?>
                <li><span class="icon-soci"> <a href="<?php echo esc_url(get_theme_mod('social_link_facebook')); ?>" <?php if(get_theme_mod('Social_link_facebook_tab')==1){ echo "target='_blank'"; } ?> ><i class="fa fa-facebook"></i></a></span></li>
                <?php } if(get_theme_mod('social_link_twitter','#')) { ?>
            <li><span class="icon-soci"><a href="<?php echo esc_url(get_theme_mod('social_link_twitter')); ?>" <?php if(get_theme_mod('Social_link_twitter_tab')==1){ echo "target='_blank'"; } ?> ><i class="fa fa-twitter"></i></a></span></li>
            <?php } if(get_theme_mod('social_link_linkedin','#')) { ?>
            <li><span class="icon-soci"><a href="<?php echo esc_url(get_theme_mod('social_link_linkedin')); ?>" <?php if(get_theme_mod('Social_link_linkedin_tab')==1){ echo "target='_blank'"; } ?> ><i class="fa fa-linkedin"></i></a></span></li>
            <?php } if(get_theme_mod('social_link_google','#')) { ?>
            <li><span class="icon-soci"><a href="<?php echo esc_url(get_theme_mod('social_link_google')); ?>" <?php if(get_theme_mod('Social_link_google_tab')==1){ echo "target='_blank'"; } ?> ><i class="fa fa-google-plus"></i></a></span></li>
            <?php } ?>
          </ul>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  </div>
</footer>
</div>
<!--Scroll To Top--> 
<a href="#" class="shopress_scroll"><i class="fa fa-angle-up"></i></a> 
<!--/Scroll To Top-->
<?php wp_footer(); ?>
</body>
</html>