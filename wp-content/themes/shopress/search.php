<?php
/**
 * The template for displaying search results pages.
 *
 * @package shopress
 */

get_header(); ?>
<!--==================== Breadcrumb ====================-->
<?php get_template_part('index','banner'); ?>
<div class="clearfix"></div>
<main id="content">
  <div class="container">
    <div class="row">
      <div class="<?php echo ( !is_active_sidebar( 'sidebar_primary' ) ? '12' :'9' ); ?> col-md-9">
        <div class="row">
          <?php 
		global $i;
		if ( have_posts() ) : ?>
		<h2><?php printf( __( "Search Results for: %s", 'shopress' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
		<?php while ( have_posts() ) : the_post();  
		 get_template_part('content','');
		 endwhile; else : ?>
		<h2><?php _e( "Not Found", 'shopress' ); ?></h2>
		<div class="">
		<p><?php _e( "Sorry, Do Not match.", 'shopress' ); ?>
		</p>
		<?php get_search_form(); ?>
		</div><!-- .blog_con_mn -->
		<?php endif; ?>
         </div>
      </div>
	  <aside class="col-md-3">
        <?php get_sidebar(); ?>
      </aside>
    </div>
  </div>
</main>
<?php
get_footer();
?>