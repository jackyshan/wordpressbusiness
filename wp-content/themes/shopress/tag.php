<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package shopress
 */
get_header(); ?>
<!--==================== ti breadcrumb section ====================-->
<?php get_template_part('index','banner'); ?>
<!--==================== main content section ====================-->
<main id="content">
  <div class="container">
    <div class="row">
      <div class="<?php if( !is_active_sidebar('sidebar-1')) { echo "col-md-12"; } else { echo "col-md-9 col-sm-8"; } ?>">
        <?php while(have_posts()){the_post();?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="shopress-blog-post-box"> 
		<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>" class="shopress-blog-thumb">
			<?php if(has_post_thumbnail()): ?>
			<?php $defalt_arg =array('class' => "img-responsive"); ?>
			<?php the_post_thumbnail('', $defalt_arg); ?>
			<?php endif; ?>
			<span class="shopress-blog-date">
			          		<span class="h3"><?php echo get_the_date('j'); ?></span> <?php echo get_the_date('M'); ?>
			          	</span>
        </a>
		<article class="small"> 
			<h1><a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<div class="shopress-blog-category"> 
				<i class="fa fa-folder"></i>
				<?php   $cat_list = get_the_category_list();
				if(!empty($cat_list)) { ?>
				<?php the_category(', '); ?>
				<?php } ?>
				<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><i class="fa fa-user"></i> <?php _e('by','shopress'); ?>
				<?php the_author(); the_tags(); ?>
				</a> 
			</div>
				<?php the_content( ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="link">' . __('Pages:', 'shopress' ), 'after' => '</div>' ) ); ?>
		</article>
	</div>
</div>
          <?php } ?>
          <div class="col-md-12 text-center">
          <?php
		  //Previous / next page navigation
		  the_posts_pagination( array(
		  'prev_text'          => '<i class="fa fa-angle-left"></i>',
		  'next_text'          => '<i class="fa fa-angle-right"></i>',
		  'screen_reader_text' => ' ',
		  ) );
		  ?>
          </div>
      </div>
      <aside class="col-md-3 col-sm-4">
        <?php get_sidebar(); ?>
      </aside>
    </div>
  </div>
</main>
<?php get_footer(); ?>