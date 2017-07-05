<?php $shopress_news_enable = get_theme_mod('shopress_news_enable');
	if($shopress_news_enable){ ?>
<!--==================== BLOG SECTION ====================-->
<section id="blog" class="shopress-blog-section">
  <div class="overlay">
    <div class="container">
      <div class="row">
        <div class="col-md-12 wow fadeInDown animated padding-bottom-50 text-center">
          <div class="shopress-heading">
            <?php $shopress_news_title = esc_attr(get_theme_mod('shopress_news_title'));
            if( !empty($shopress_news_title) ):
              echo '<h3 class="shopress-heading-inner">'.$shopress_news_title.'</h3>';
            endif; ?>
            <?php $shopress_news_subtitle = esc_attr(get_theme_mod('shopress_news_subtitle'));
            if( !empty($shopress_news_subtitle) ):
              echo '<span class="shopress-sub-title">'.$shopress_news_subtitle.'</span>';
            endif; ?>
          </div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="row">
      <?php $shopress_latest_loop = new WP_Query( array( 'post_type' => 'post', 'order' => 'DESC','ignore_sticky_posts' => true ) );
			if ( $shopress_latest_loop->have_posts() ) :
				while ( $shopress_latest_loop->have_posts() ) : $shopress_latest_loop->the_post();?>
        <div class="col-md-4">
          <div class="shopress-blog-post-box"> 
          <a class="shopress-blog-thumb" href="<?php echo esc_url(get_permalink()) ?>" title="<?php the_title_attribute('echo=0'); ?>">
            <?php if ( has_post_thumbnail() ) :
							the_post_thumbnail();
					    endif; ?>
            <span class="shopress-blog-date"> <span class="h3"><?php echo get_the_date('j'); ?></span> <?php echo get_the_date('M'); ?> </span> </a>
            <article class="small">
              <h1> <a href="<?php echo esc_url(get_permalink()) ?>" title="<?php the_title_attribute('echo=0'); ?>"> <?php the_title(); ?> </a> </h1>
              <div class="shopress-blog-category"> <i class="fa fa-folder"></i>&nbsp;
                <?php $cat_list = get_the_category_list();
								if(!empty($cat_list)) { ?>
                <?php the_category(', '); ?>
                <?php } ?>
                <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"> <i class="fa fa-user"></i>&nbsp;
                <?php _e('by','shopress'); the_author(); ?>
                </a> 
              </div>
            </article>
          </div>
        </div>
        <?php  endwhile; endif;	wp_reset_postdata(); ?>
      </div>
      <!-- .container --> 
    </div>
  </div>
</section>
<?php } ?>