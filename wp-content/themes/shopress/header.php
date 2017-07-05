<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package shopress
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<div class="wrapper">
<header>
  <div class="shopress-head-detail hidden-xs hidden-sm">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-xs-12 col-sm-6">
         <?php wp_nav_menu(array(  
              'theme_location'  => 'top-left',
              'container' => '',
              'menu_class' => 'info-left'
            ) ); ?>
        </div>
        <div class="col-md-6 col-xs-12 col-sm-6">
            <?php wp_nav_menu(array(  
              'theme_location'  => 'top-right',
              'container' => '',
              'menu_class' => 'info-right'
            ) ); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="shopress-main-nav">
      <div class="container">
      <div class="row">
          <div class="col-md-3 col-sm-4">
            <div class="navbar-header">
            <!-- Logo -->
            <?php
            if(has_custom_logo())
            {
            // Display the Custom Logo
            the_custom_logo();
            }
             else { ?>
            <a class="navbar-brand" href="<?php echo esc_url(home_url( '/' )); ?>"><?php bloginfo('name'); ?><br>
            <span class="site-description"><?php echo  get_bloginfo( 'description', 'display' ); ?></span>   
            </a>      
            <?php } ?>
            <!-- Logo -->
            </div>
          </div>

          <div class="col-md-6 col-sm-4">
            <div class="header-widget">
              <div class="shopress-header-box">
               <?php get_search_form();?>
			</div>
            </div>
          </div>
		 
          <div class="col-md-3 hidden-xs col-sm-4">
            <div class="header-widget">
              <ul class="shopress-header-cart">
                <li>
                   <?php global $woocommerce; ?>
              <?php if( class_exists('woocommerce')) { ?>
              <a href="<?php echo WC()->cart->get_cart_url(); ?>" 
        title="<?php esc_attr_e( 'View your shopping cart','shopress' ); ?>"> 
        <span class="shopress-cart-icon"><i class="fa fa-shopping-basket"></i></span>
        <span class="shopress-cart-total"> 
        <span class="shopress-cart-title"><?php _e('Cart','shopress'); ?></span>

        <span class="shopress-cart-item">
        <?php echo wp_kses_data( sprintf( _n( '%d item -', '%d item', WC()->cart->get_cart_contents_count(), 'shopress' ), WC()->cart->get_cart_contents_count() ) ); ?>
		
        </span></span></a>
     <?php } ?>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    <nav class="navbar navbar-default navbar-static-top navbar-wp">
        <div class="container"> 
          <!-- navbar-toggle -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-wp"> <span class="sr-only"><?php echo 'Toggle Navigation'; ?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

          <?php if( class_exists('woocommerce')) { ?>
      <a class="shopress-header-cart-mob" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php _e( 'View your shopping cart','shopress' ); ?>"> <span class="shopress-cart-icon"><i class="fa fa-shopping-basket"></i></span> 
	  <span class="shopress-cart-total"><span class="shopress-cart-item">  <?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span>  </span></a>
      <?php } ?>
          <!-- /navbar-toggle --> 
          <!-- Navigation -->
          
          <div class="collapse navbar-collapse" id="navbar-wp">
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav', 'fallback_cb' => 'shopress_custom_navwalker::fallback' , 'walker' => new shopress_custom_navwalker() ) ); ?>
          </div>
          <!-- /Navigation --> 
        </div>
      </nav>
  </div>
</header>
<!-- #masthead -->