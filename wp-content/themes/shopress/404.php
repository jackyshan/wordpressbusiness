<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package shopress
 */
get_header(); ?>
<div class="shopress-breadcrumb-section">
    <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="shopress-page-breadcrumb">
              <li><a href="<?php echo esc_url(home_url());?>"><i class="fa fa-home"></i></a></li>
              <li class="active"><?php _e('404','shopress'); ?></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center shopress-section">
        <div class="shopress-error-404">
          <h1><?php esc_html_e('4','shopress'); ?><i class="fa fa-times-circle-o"></i><?php esc_html_e('4','shopress'); ?></h1>
          <h4><?php esc_html_e('Oops! Page not found','shopress'); ?></h4>
          <p><?php esc_html_e("Sorry, we can't find the page you're looking for. This page has moved or was never here to start with.","shopress"); ?></p>
          <a class="btn btn-theme" href="<?php echo esc_url(home_url());?>" onClick="history.back();"><?php _e('Go Back','shopress'); ?></a> </div>
      </div>
    </div>
  </div>
<?php
get_footer();