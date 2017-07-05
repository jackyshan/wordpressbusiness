<?php
function shopress_homepage_setting( $wp_customize ) { 

	/* Option list of all post */  
    $options_pages = array();
    $options_pages_obj = get_pages('posts_per_page=-1');
    $options_pages[''] = __( 'Choose Page', 'shopress' );
    foreach ( $options_pages_obj as $posts ) {
    	$options_pages[$posts->ID] = $posts->post_title;
    } 

	$service_pages = array();
    $service_pages_obj = get_pages('posts_per_page=-1');
    $service_pages[''] = __( 'Choose Page', 'shopress' );
    foreach ( $service_pages_obj as $posts ) {
    	$service_pages[$posts->ID] = $posts->post_title;
    } 

			$wp_customize->add_panel( 'homepage_setting', array(
                'priority'       => 400,
                'capability'     => 'edit_theme_options',
                'title'      => __('Homepage Settings', 'shopress'),
            ) );

            /* --------------------------------------
            =========================================
            Slider Section
            =========================================
            -----------------------------------------*/ 
            $wp_customize->add_section(
                'shopress_slider_section_settings', array(
                'title' => __('Slider Setting','shopress'),
                'description' => '',
                'panel'  => 'homepage_setting',
            ) );
            
            
            //Enable slider
            $wp_customize->add_setting(
                'shopress_slider_enable', 
				array(
                'capability'     => 'edit_theme_options',
                'sanitize_callback' => 'shopress_homepage_sanitize_checkbox',
            ) );    
            $wp_customize->add_control( 
                'shopress_slider_enable', array(
                'label'   => __('Enable Slider Section','shopress'),
                'section' => 'shopress_slider_section_settings',
                'type' => 'checkbox',
            ) );
            
            //Select Post One
            $wp_customize->add_setting('slider_post_one',array(
                'capability'=>'edit_theme_options',
                'sanitize_callback'=>'sanitize_text_field',
            ));
            
            $wp_customize->add_control('slider_post_one',array(
                'label' => __('Select Page One','shopress'),
                'section'=>'shopress_slider_section_settings',
                'type'=>'select',
                'choices'=>$options_pages,
            ));
            
            //Select Post Two
            $wp_customize->add_setting('slider_post_two',array(
                'capability'=>'edit_theme_options',
                'sanitize_callback'=>'sanitize_text_field',
            ));
            
            $wp_customize->add_control('slider_post_two',array(
                'label' => __('Select Page Two','shopress'),
                'section'=>'shopress_slider_section_settings',
                'type'=>'select',
                'choices'=>$options_pages,
            ));
            
            //Select Post Three
            $wp_customize->add_setting('slider_post_three',array(
                'capability'=>'edit_theme_options',
                'sanitize_callback'=>'sanitize_text_field',
            ));
            
            $wp_customize->add_control('slider_post_three',array(
                'label' => __('Select Page Three','shopress'),
                'section'=>'shopress_slider_section_settings',
                'type'=>'select',
                'choices'=>$options_pages,
            ));

            /* --------------------------------------
		    =========================================
		    product Section
		    =========================================
		    -----------------------------------------*/  
		    // add section to manage 
		    $wp_customize->add_section(
		    	'shopress_product_section_settings', array(
		        'title' => __('Product Setting','shopress'),
		        'description' => '',
		        'panel'  => 'homepage_setting',
		    ) );

		    //Enable product
            $wp_customize->add_setting(
                'shopress_product_enable', array(
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            ) );    
            $wp_customize->add_control( 
                'shopress_product_enable', array(
                'label'   => __('Enable Product Section','shopress'),
                'section' => 'shopress_product_section_settings',
                'type' => 'checkbox',
            ) );

            //product Title setting
            $wp_customize->add_setting(
                'shopress_product_title', array(
                'capability'     => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            ) );  
            $wp_customize->add_control( 
            	'shopress_product_title', array(
                'label'   => __('Product Title','shopress'),
                'section' => 'shopress_product_section_settings',
                'type' => 'text',
            ) );

            //product Subtitle setting
            $wp_customize->add_setting(
                'shopress_product_subtitle', array(
                'capability'     => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            ) );  
            $wp_customize->add_control( 'shopress_product_subtitle',array(
                'label'   => __('Product Subtitle','shopress'),
                'section' => 'shopress_product_section_settings',
                'type' => 'textarea',)  );

		    /* --------------------------------------
		    =========================================
		    Latest News Section
		    =========================================
		    -----------------------------------------*/
		    // add section to manage Latest News
		    $wp_customize->add_section(
		    	'news_section_settings', array(
		        'title' => __('News & Events Setting','shopress'),
		        'description' => '',
		        'panel'  => 'homepage_setting'
		    ) );

            //Enable news
            $wp_customize->add_setting(
                'shopress_news_enable', array(
                'capability'     => 'edit_theme_options',
                'sanitize_callback' => 'shopress_homepage_sanitize_checkbox',
            ) );    
            $wp_customize->add_control( 
                'shopress_news_enable', array(
                'label'   => __('Enable News Section','shopress'),
                'section' => 'news_section_settings',
                'type' => 'checkbox',
            ) );
		   
			// Latest News Title Setting
		    $wp_customize->add_setting(
		    	'shopress_news_title', array(
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'shopress_homepage_sanitize_text',
		    ) );	
		    $wp_customize->add_control( 
		    	'shopress_news_title',array(
		    	'label'   => __('Latest News Title','shopress'),
		    	'section' => 'news_section_settings',
		    	'type' => 'text',
		    ) );

		    // Latest News Subtitle Setting
		    $wp_customize->add_setting(
		    	'shopress_news_subtitle', array(
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'shopress_homepage_sanitize_text',
		    ) );  
		    $wp_customize->add_control( 
		    	'shopress_news_subtitle',array(
		    	'label'   => __('Latest News Subtitle','shopress'),
		    	'section' => 'news_section_settings',
		    	'type' => 'textarea',
		    ) );
			
			
	function shopress_homepage_sanitize_text( $input ) {

    return wp_kses_post( force_balance_tags( $input ) );

	}
	
	
	function shopress_homepage_sanitize_checkbox( $input ) {
	// Boolean check 
	return ( ( isset( $input ) && true == $input ) ? true : false );
	}
	
	function shopress_sanitize_image( $image, $setting ) {
	/*
	 * Array of valid image file types.
	 *
	 * The array includes image mime types that are included in wp_get_mime_types()
	 */
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
	// Return an array with file extension and mime_type.
    $file = wp_check_filetype( $image, $mimes );
	// If $image has a valid mime_type, return it; otherwise, return the default.
    return ( $file['ext'] ? $image : $setting->default );
}
}
add_action( 'customize_register', 'shopress_homepage_setting' );
?>