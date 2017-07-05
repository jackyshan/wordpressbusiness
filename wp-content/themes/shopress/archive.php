<?php
/**
 * The template for displaying archive pages.
 *
 * @package shopress
 */
get_header(); ?> 
<!-- Breadcrumb -->
<div class="shopress-breadcrumb-section">
    <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="shopress-breadcrumb-title">
              <?php the_archive_title( '<h1 class="page-title">', '</h1>' );
              the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="clearfix"></div>
<!-- /End Breadcrumb -->
<main id="content">
  <div class="container">
    <div class="row">
      <div class="<?php echo ( !is_active_sidebar( 'sidebar_primary' ) ? '12' :'9' ); ?> col-md-9">
			<?php 
      if( have_posts() ) :
      while( have_posts() ): the_post();
      get_template_part('content',''); 
      endwhile; endif;
      ?>
        <div class="col-md-12 text-center">
  			<?php
  			//Previous / next page navigation
  			the_posts_pagination( array(
  			'prev_text'          => '<i class="fa fa-angle-left"></i>',
  			'next_text'          => '<i class="fa fa-angle-right"></i>',
  			) );
  			?>
        </div>
      </div>
	    <aside class="col-md-3">
        <?php get_sidebar(); ?>
      </aside>
    </div>
  </div>
</main>
<?php get_footer(); ?>