<?php
/**
 * Template Name: Home Page
 */
		 get_header(); 
		
		//=========== Get Home Slider ===========//
		get_template_part('sections/home','slider');

		//=========== Get Index product ===========//		
		get_template_part('sections/home', 'product');	
		
		//=========== Get Index News ===========//
		get_template_part('sections/home', 'blog');			
					

get_footer(); 
?>