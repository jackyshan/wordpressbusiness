<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package shopress
 */
get_header(); ?>
<!--==================== breadcrumb section ====================-->
<?php get_template_part('index','banner'); ?>
<main id="content">
    <div class="container">
      <div class="row">
		<!-- Blog Area -->
			<?php if( class_exists('woocommerce') && (is_account_page() || is_cart() || is_checkout())) { ?>
			<div class="col-md-12" >
			<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>
			<?php endwhile; else : endif; ?>
			<?php } else { ?>
			<div class="col-md-9">
			<?php if( have_posts()) :  the_post(); ?>		
			<?php the_content(); ?>
				<?php endif; ?>
				<?php comments_template( '', true ); // show comments ?>
			<!-- /Blog Area -->			
			</div>
			<!--Sidebar Area-->
			<aside class="col-md-3">
				<?php get_sidebar(); ?>
			</aside>
			<?php } ?>
			<!--Sidebar Area-->
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>