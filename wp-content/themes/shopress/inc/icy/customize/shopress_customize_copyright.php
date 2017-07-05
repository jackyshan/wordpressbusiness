<?php
// Footer copyright section 
function shopress_footer_copyright( $wp_customize ) {
	$wp_customize->add_panel('shopress_copyright', array(
		'priority' => 500,
		'capability' => 'edit_theme_options',
		'title' => __('Footer Settings', 'shopress'),
	) );
	
	$wp_customize->add_section('copyright_section_one', array(
        'title' => __('Copyright Setting','shopress'),
        'description' => __('This is a Footer section.','shopress'),
        'priority' => 35,
		'panel' => 'shopress_copyright',
    ) );

   $wp_customize->add_setting('shopress_footer_copyright_setting', array(
		'sanitize_callback' => 'shopress_footer_copyright_sanitize_text',
		'default' => __('Copyright 2017 Powered by WordPress','shopress'),
    ) );
    $wp_customize->add_control('shopress_footer_copyright_setting', array(
        'label' => __('Copyright text','shopress'),
        'section' => 'copyright_section_one',
        'type' => 'textarea',
    ) );
    
	//Footer social link 
	$wp_customize->add_section('copyright_social_icon', array(
        'title' => __('Social Link','shopress'),
        'priority' => 45,
		'panel' => 'shopress_copyright',
    ) );

	// Facebook link
	$wp_customize->add_setting('social_link_facebook', array(
        'sanitize_callback' => 'esc_url_raw',
		'default' => '#', 
    ) );
	$wp_customize->add_control('social_link_facebook', array(
        'label' => __('Facebook URL','shopress'),
        'section' => 'copyright_social_icon',
        'type' => 'text',
    ) );

	$wp_customize->add_setting(
        'Social_link_facebook_tab',array(
        'sanitize_callback' => 'shopress_copyright_sanitize_checkbox',
	));
	$wp_customize->add_control('Social_link_facebook_tab', array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','shopress'),
        'section' => 'copyright_social_icon',
    ) );

	//Twitter link
	$wp_customize->add_setting( 'social_link_twitter', array(
       'sanitize_callback' => 'esc_url_raw',
	   'default' => '#',
    ) );
	$wp_customize->add_control( 'social_link_twitter', array(
        'label' => __('Twitter URL','shopress'),
        'section' => 'copyright_social_icon',
        'type' => 'text',
    ) );

	$wp_customize->add_setting( 'Social_link_twitter_tab',array(
	   'sanitize_callback' => 'shopress_copyright_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'Social_link_twitter_tab', array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','shopress'),
        'section' => 'copyright_social_icon',
    ) );

	//Linkdin link
	$wp_customize->add_setting( 'social_link_linkedin', array(
       'sanitize_callback' => 'esc_url_raw',
	   'default' => '#',
    ) );
	$wp_customize->add_control( 'social_link_linkedin', array(
        'label' => __('Linkedin URL','shopress'),
        'section' => 'copyright_social_icon',
        'type' => 'text',
    ) );

	$wp_customize->add_setting( 
        'Social_link_linkedin_tab',array(
        'sanitize_callback' => 'shopress_copyright_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'Social_link_linkedin_tab', array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','shopress'),
        'section' => 'copyright_social_icon',
    ) );

	//Google-plus link
	$wp_customize->add_setting('social_link_google', array(
        'sanitize_callback' => 'esc_url_raw',
		'default' => '#',
    ) );
	$wp_customize->add_control('social_link_google', array(
        'label' => __('Google-plus URL','shopress'),
        'section' => 'copyright_social_icon',
        'type' => 'text',
    ) );

	$wp_customize->add_setting(
        'Social_link_google_tab',array(
        'sanitize_callback' => 'shopress_copyright_sanitize_checkbox',
	) );

	$wp_customize->add_control('Social_link_google_tab', array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','shopress'),
        'section' => 'copyright_social_icon',
    ) );

		
	function shopress_footer_copyright_sanitize_text( $input ) {

    return wp_kses_post( force_balance_tags( $input ) );

	}
	

	function shopress_copyright_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
}
add_action( 'customize_register', 'shopress_footer_copyright' );
?>