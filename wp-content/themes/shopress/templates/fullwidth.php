<?php
/**
 * Template Name: Full Width Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package shopress
 */
get_header(); ?>
<?php get_template_part('index','banner'); ?>
<main id="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div id="primary" class="content-area">
          <main id="main" class="site-main" role="main">
            <?php
			while ( have_posts() ) : the_post(); ?>

					<div class="col-md-12">
						<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>" class="ta-blog-thumb">
						<?php if(has_post_thumbnail()): ?>
						<?php $defalt_arg =array('class' => "img-responsive"); ?>
						<?php the_post_thumbnail('', $defalt_arg); ?>
						<?php endif; ?>
						</a>
						<article class="small">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="link">' . __( 'Pages:', 'shopress' ), 'after' => '</div>' ) ); ?>
						</article>
					</div>
				<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
          </main>
          <!-- #main --> 
        </div>
        <!-- #primary --> 
      </div>
    </div>
  </div>
</main>
<?php
get_footer();