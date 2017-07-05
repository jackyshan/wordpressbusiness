<?php global $woocommerce; if( class_exists('woocommerce')) { ?>
<?php $shopress_product_enable = get_theme_mod('shopress_product_enable');
if($shopress_product_enable){ ?>
<!--==================== product SECTION ====================-->
<section id="product" class="shopress-section shopress-products">
  <div class="container">
    <div class="row">
      <div class="col-md-12 wow fadeInDown animated padding-bottom-50 text-center">
        <div class="shopress-heading">
          <?php $shopress_product_title = esc_attr(get_theme_mod('shopress_product_title'));
    			if( !empty($shopress_product_title) ):
    				echo '<h3 class="shopress-heading-inner">'.esc_attr($shopress_product_title).'</h3>';
    			endif; ?>
          <?php  $shopress_product_subtitle = esc_attr(get_theme_mod('shopress_product_subtitle'));
    			if( !empty($shopress_product_subtitle) ):
    				echo '<span class="shopress-sub-title">'.esc_attr($shopress_product_subtitle).'</span>';
    			endif; ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12"> 
        <!-- Product 1 -->
        <?php $args = array(  'post_type' => 'product',  'meta_key' => '_featured',  'meta_value' => 'yes', 'featured_products_slider' => 'per_page'  );  
			$featured_query = new WP_Query( $args );  
			if ($featured_query->have_posts()) :   
			while ($featured_query->have_posts()) :   
			$featured_query->the_post();  
			$product = get_product( $featured_query->post->ID ); ?>
        <?php if ( ! defined( 'ABSPATH' ) ) {
						exit; // Exit if accessed directly
					}
					global $product, $woocommerce_loop;
					// Store loop count we're currently on
					if ( empty( $woocommerce_loop['loop'] ) )
						$woocommerce_loop['loop'] = 0;
					// Store column count for displaying the grid
					if ( empty( $woocommerce_loop['columns'] ) )
						$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
					// Ensure visibility
					if ( ! $product || ! $product->is_visible() )
						return;
					// Increase loop count
					$woocommerce_loop['loop']++;
					// Extra post classes
					$classes = array();
					if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
						$classes[] = 'first';
					if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
						$classes[] = 'last';
					?>
        <div class="col-md-3 col-sm-4">
          <div class="shopress-product"> <a href="<?php the_permalink(); ?>" >
            <?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
            <?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
            <h3>
              <?php the_title(); ?>
            </h3>
            <span class="prices">
            <?php do_action( 'woocommerce_after_shop_loop_item_title' );?>
            </span> </a>
            <div class="clearfix"></div>
            <?php do_action( 'woocommerce_after_shop_loop_item' );?>
          </div>
        </div>
        <?php if($woocommerce_loop['loop']%4 ==0) { ?>
        <div class="clearfix"></div>
        <?php } ?>
        <!-- /Product 1 -->
        <?php  endwhile;  endif;  wp_reset_query(); ?>
      </div>
    </div>
  </div>
</section>
<?php } } ?>