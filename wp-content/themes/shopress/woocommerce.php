<?php
/**
 * The template for displaying all WooCommerce pages.
 *
 * @package shopress
 */
get_header();  
get_template_part('index','banner'); ?>
<main id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php woocommerce_content(); ?>
			</div>
		</div><!-- .container -->
	</div>	
</main><!-- #main -->
<?php get_footer(); ?>