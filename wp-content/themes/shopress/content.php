<?php
/**
 * The template for displaying the content.
 * @package shopress
 */
?>
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
				<?php the_author(); ?>
				</a> 
			</div>
				<?php the_content( ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="link">' . __('Pages:', 'shopress' ), 'after' => '</div>' ) ); ?>
		</article>
	</div>
</div>